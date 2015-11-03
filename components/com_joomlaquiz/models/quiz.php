<?php
/**
* Joomlaquiz Component for Joomla 3
* @package Joomlaquiz
* @author JoomPlace Team
* @copyright Copyright (C) JoomPlace, www.joomplace.com
* @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
*/
defined('_JEXEC') or die('Restricted access');

jimport('joomla.application.component.modellist');
/**
 * Quiz Model.
 *
 */
class JoomlaquizModelQuiz extends JModelList
{	
	public function getQuizParams($quiz_id = 0){
		
		$database = JFactory::getDBO();
		$my = JFactory::getUser();
		$app = JFactory::getApplication();

		if($app->isAdmin()){
			$params = JComponentHelper::getParams('com_joomlaquiz');
		} else {
			$params = $app->getParams();
		}
		
		$error_info = '';
		if (!isset($quiz_id) || !$quiz_id) {
			$quiz_id = intval(JFactory::getApplication()->input->get( 'quiz_id', $params->get('quiz_id', 0) ));
		}
		
		$article_id = intval(JFactory::getApplication()->input->get( 'article_id', 0));
		$lpath_id = intval(JFactory::getApplication()->input->get( 'lpath_id', $params->get('lpath_id', 0) ));
		$lid = intval(JFactory::getApplication()->input->get( 'lid', 0));
		$rel_id = intval(JFactory::getApplication()->input->get( 'rel_id', 0));
		$package_id = intval(JFactory::getApplication()->input->get( 'package_id', 0));
		$vm = $package_id < 1000000000;
		
		$quiz_params = array();
		$quiz_params[0] = new stdClass;
		
		if( ( $rel_id && !$my->id ) || 
		( !$package_id && $rel_id ) || 
		( $package_id && !$rel_id )
		){
			$quiz_params[0]->error = 1;
			$quiz_params[0]->message = '<p align="left">'.JText::_('COM_QUIZ_NOT_AVAILABLE').'</p>';
			return $quiz_params[0];
		}
		
		if ($rel_id && !$quiz_id && !$article_id) {
			$quiz_params[0] = JoomlaquizHelper::JQ_checkPackage($package_id, $rel_id, $vm);
			return $quiz_params[0];
		}
		
		if ($rel_id && $article_id) $lid = JoomlaquizHelper::JQ_checkPackage($package_id, $rel_id, $vm);
		if($article_id && $lid){
			$query = "SELECT `type`, `qid`"
			. "\n FROM #__quiz_lpath_quiz"
			. "\n WHERE lid = {$lid} AND `order` > (SELECT `order` FROM #__quiz_lpath_quiz WHERE lid = {$lid} AND `type` = 'a' AND qid = $article_id)"
			. "\n ORDER BY `order`"
			. "\n LIMIT 1"
			;
			$database->SetQuery( $query );
			$next = $database->loadObjectList();
			$next = @$next[0];
			
			$query = "DELETE FROM `#__quiz_lpath_stage`"
			. "\n WHERE uid = {$my->id} AND oid = '$package_id' AND rel_id = $rel_id AND lpid = {$lid} AND `type` = 'a' AND qid = $article_id"
			;
			$database->SetQuery( $query );
			$database->execute();
			
			$query = "INSERT INTO `#__quiz_lpath_stage` SET "
			. "\n uid = {$my->id}, oid = '$package_id', rel_id = '$rel_id', lpid = {$lid}, `type` = 'a', qid = {$article_id}, stage = 1"
			;
			$database->SetQuery( $query );
			$database->execute();
			
			$article_data = $this->JQ_GetArticle($article_id, $package_id, $rel_id, $lid, $next);
			
			ob_clean();
			ob_start();
			include_once(JPATH_SITE.'/components/com_joomlaquiz/views/quiz/tmpl/article.php');
			$content = ob_get_contents();
			ob_clean();
			
			$quiz_params[0]->error = 1;
			$quiz_params[0]->message = $content;
			
			return $quiz_params[0];
		}
		
		$query = "SELECT a.*, b.template_name FROM #__quiz_t_quiz as a, #__quiz_templates as b WHERE a.c_id = '".$quiz_id."' and a.c_skin = b.id";
		$database->SetQuery($query);
		$quiz_params = $database->LoadObjectList();
		
		if(count($quiz_params)){
			$quiz_params[0]->error = 0;
			$quiz_params[0]->message = '';
		}
				
		if (!isset($quiz_params[0]) || $quiz_params[0]->published != 1) {
			$quiz_params[0] = new stdClass;
			$quiz_params[0]->error = 1;
			$quiz_params[0]->message = '<p align="left">'.JText::_('COM_QUIZ_NOT_AVAILABLE').'</p>';
			return $quiz_params[0];
		}

		if (isset($quiz_params[0]) && $quiz_params[0]->paid_check == 1 && !$rel_id) {
			$quiz_params[0]->error = 1;
			$quiz_params[0]->message = '<p align="left">'.JText::_('COM_NOT_SUBSCRIBED').'</p>';
			return $quiz_params[0];
		}
		
		$quiz_params[0]->rel_id = $rel_id;
		$quiz_params[0]->package_id = $package_id;
		$quiz_params[0]->lid = $lid;
				
		if($rel_id) {
			$query = "SELECT * FROM #__quiz_products WHERE id = $rel_id";
			$database->setQuery($query);
			$prod_data = $database->loadObjectList();
			if(empty($prod_data)) {
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = '<p align="left">'.JText::_('COM_QUIZ_LPATH_NOT_AVAILABLE').'</p>';
				return $quiz_params[0];
			}
			$quiz_params[0]->product_data = $prod_data[0];
			
			$product_stat = array();
			$query = "SELECT *"
			. "\n FROM #__quiz_products_stat"
			. "\n WHERE uid = $my->id AND "
			. "\n oid = '$package_id' "
			. "\n AND qp_id = '{$rel_id}' "
			;
			$database->SetQuery( $query );
			$products_stat = $database->loadObjectList('qp_id');
			
			if($quiz_params[0]->product_data->xdays) {
				if(!empty($products_stat) && array_key_exists($rel_id, $products_stat)) {
					$confirm_date = strtotime($products_stat[$rel_id]->xdays_start);
				} else {
					if ($vm) {
						$query = "SELECT UNIX_TIMESTAMP(order_history.created_on) "
							. "\n FROM #__virtuemart_order_histories AS order_history"
							. "\n INNER JOIN #__virtuemart_order_items AS order_item ON order_item.virtuemart_order_id = order_history.virtuemart_order_id"
							. "\n WHERE order_history.order_status_code = 'C' AND order_item.virtuemart_order_id = $package_id AND order_item.virtuemart_product_id = {$quiz_params[0]->product_data->pid}"
							. "\n ORDER BY order_history.created_on DESC"
							. "\n LIMIT 1"
							;
					} else {
						$query = "SELECT UNIX_TIMESTAMP(p.confirmed_time) "
							. "\n FROM #__quiz_payments AS p"
							. "\n WHERE p.id = '".($package_id-1000000000)."' AND p.status = 'Confirmed' AND  p.pid = '{$quiz_params[0]->product_data->pid}' "
							. "\n ORDER BY p.confirmed_time DESC"
							. "\n LIMIT 1"
							;
					}
					$database->setQuery($query);
					$confirm_date = $database->loadResult();
				}
				
				if($confirm_date) {
					$ts_day_end = $confirm_date + $quiz_params[0]->product_data->xdays*24*60*60;
					if(strtotime(JFactory::getDate()) > $ts_day_end) {
						$quiz_params[0]->error = 1;
						$quiz_params[0]->message = '<p align="left">'.JText::_('COM_ACCESS_EXPIRED').'</p>';
						return $quiz_params[0];
					}
				} else {
					$quiz_params[0]->error = 1;
					$quiz_params[0]->message = '<p align="left">'.JText::_('COM_ACCESS_EXPIRED').'</p>';
					return $quiz_params[0];
				}

			} else if (($quiz_params[0]->product_data->period_start && $quiz_params[0]->product_data->period_start != '0000-00-00')
					|| ($quiz_params[0]->product_data->period_end && $quiz_params[0]->product_data->period_end != '0000-00-00')) {
				
				if(!empty($products_stat) && array_key_exists($rel_id, $products_stat)) {
					$quiz_params[0]->product_data->period_start = $products_stat[$rel_id]->period_start;
					$quiz_params[0]->product_data->period_end = $products_stat[$rel_id]->period_end;
				}	
				
				$ts_start = null;
				if($quiz_params[0]->product_data->period_start && $quiz_params[0]->product_data->period_start != '0000-00-00') {
					$ts_start = strtotime($quiz_params[0]->product_data->period_start . ' 00:00:00');
				}

				$ts_end = null;
				if($quiz_params[0]->product_data->period_end && $quiz_params[0]->product_data->period_end != '0000-00-00') {
					$ts_end = strtotime($quiz_params[0]->product_data->period_end . ' 23:59:59');
				}

				$ts = strtotime(JFactory::getDate());
				if(($ts_start && $ts_start > $ts) || ($ts_end && $ts_end < $ts)) {
					$quiz_params[0]->error = 1;
					$quiz_params[0]->message = '<p align="left">'.JText::_('COM_ACCESS_EXPIRED').'</p>';
					return $quiz_params[0];
				}
			}
			
			//Check attempts
			$wait_time = '';
			$is_attempts = JoomlaquizHelper::isQuizAttepmts($quiz_id, 0, $rel_id, $package_id, $wait_time);

			if (!$is_attempts) {
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = '<p align="left">'.JText::_('COM_ACCESS_NO_ATTEMPTS').'</p>';
				return $quiz_params[0];
			}
			
			$query = "SELECT *"
			. "\n FROM  #__quiz_r_student_quiz AS stud_quiz"
			. "\n WHERE stud_quiz.c_order_id = '{$package_id}' AND stud_quiz.c_rel_id = $rel_id AND stud_quiz.c_quiz_id = $quiz_id AND stud_quiz.c_student_id = {$my->id}"
			. "\n ORDER BY stud_quiz.c_passed DESC, stud_quiz.c_date_time DESC"
			. "\n LIMIT 1"
			;
			$database->setQuery($query);
			$rel_data = $database->loadObjectList();
			$quiz_params[0]->rel_data = (empty($rel_data) ? null : $rel_data[0]);
			
			$doing_quiz = 1;
		} elseif ($lid) {
			$query = "SELECT *"
				. "\n FROM  #__quiz_r_student_quiz AS stud_quiz"
				. "\n WHERE stud_quiz.c_lid = '{$lid}' AND stud_quiz.c_quiz_id = $quiz_id AND stud_quiz.c_student_id = {$my->id}"
				. "\n ORDER BY stud_quiz.c_passed DESC, stud_quiz.c_date_time DESC"
				. "\n LIMIT 1"
			;
			$database->setQuery($query);
			$lid_data = $database->loadObjectList();
			$quiz_params[0]->lid_data = (empty($lid_data) ? null : $lid_data[0]);
			$tmp = '';
			$is_attempts = JoomlaquizHelper::isQuizAttepmts($quiz_id, $lid, 0, 0, $tmp);
			
			$wait_time = '';
			$is_attempts = JoomlaquizHelper::isQuizAttepmts($quiz_id, 0, 0, 0, $wait_time);
			if (!$is_attempts) {
				if ($wait_time)
					$message = str_replace("{text}", ($wait_time>60? floor($wait_time/60).' '.JText::_('COM_QUIZ_MINUTES'): $wait_time. ' seconds'), JText::_('COM_QUIZ_COMEBACK_LATER'));
				else {
					$message = JText::_('COM_QUIZ_ALREADY_TAKEN');
				}
				
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = $message;
				return $quiz_params[0];
			}	
			
			$doing_quiz = 1;
		} else {
			$doing_quiz = 1;
			
			$wait_time = '';
			$is_attempts = JoomlaquizHelper::isQuizAttepmts($quiz_id, 0, 0, 0, $wait_time);
			if (!$is_attempts) {
				if ($wait_time)
					$message = str_replace("{text}", ($wait_time>60? floor($wait_time/60).' '.JText::_('COM_QUIZ_MINUTES'): $wait_time. JText::_('COM_QUIZ_SECONDS')), JText::_('COM_QUIZ_COMEBACK_LATER'));
				else {
					$message = JText::_('COM_QUIZ_ALREADY_TAKEN');
				}
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = $message;
				return $quiz_params[0];
			}
									
			$q_allow_guest = $quiz_params[0]->c_guest;
			if(!$my->id && !$quiz_params[0]->c_guest) {
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = '<p align="left">'.JText::_('COM_QUIZ_REG_ONLY').'</p>';
				return $quiz_params[0];
			}
		}
		
		if ($doing_quiz ==  1) {
			$doing_pool = 1;
			$query = "SELECT c_pool FROM #__quiz_t_quiz WHERE c_id = '".$quiz_id."'";
			$database->SetQuery($query);
			$c_pool = $database->loadResult();
			if(!$c_pool) {
				$doing_pool = 0;
			} else{
				$query = "SELECT q_count FROM #__quiz_pool WHERE q_id = '".$quiz_id."'";
				$database->SetQuery($query);
				if(!$database->loadResult())  {
					$error_info = JText::_('COM_JOOMLAQUIZ_NO_COUNT_QUESTIONS');
					$doing_pool = 0;
				} else {
					$query = "SELECT COUNT(*) FROM #__quiz_t_question WHERE c_quiz_id = '0' AND published = 1";
					$database->SetQuery($query);
					if(!$database->loadResult()) {
						if($c_pool == 1) $error_info = JText::_('COM_JOOMLAQUIZ_NOQUESTIONS_IN_POOL');
						$doing_pool = 0;
					}
				}
			}
		
			$query = "SELECT COUNT(*) FROM #__quiz_t_question WHERE c_quiz_id = '".$quiz_id."' AND published = 1";
			$database->SetQuery($query);
			$c_quests = $database->loadResult();
			
			if(!$c_quests && !$c_pool) $error_info = JText::_('COM_JOOMLAQUIZ_NOQUESTIONS_IN_QUIZ');
			if (!$c_quests && !$doing_pool) {
				$doing_quiz = -1;
			}
		}	
		
		if ($doing_quiz == 1) {
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_title, 'quiz_t_quiz', 'c_title', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_description, 'quiz_t_quiz', 'c_description', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_short_description, 'quiz_t_quiz', 'c_short_description', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_right_message, 'quiz_t_quiz', 'c_right_message', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_wrong_message, 'quiz_t_quiz', 'c_wrong_message', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_pass_message, 'quiz_t_quiz', 'c_pass_message', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_unpass_message, 'quiz_t_quiz', 'c_unpass_message', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_metadescr, 'quiz_t_quiz', 'c_metadescr', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_keywords, 'quiz_t_quiz', 'c_keywords', $quiz_params[0]->c_id);
			JoomlaquizHelper::JQ_GetJoomFish($quiz_params[0]->c_metatitle, 'quiz_t_quiz', 'c_metatitle', $quiz_params[0]->c_id);
		
			if(!$my->id){
				//Replace user name and email fields
				$username_field = '<label for="jq_user_name">'.JText::_('COM_JOOMLAQUIZ_INPUT_USER_NAME').'</label><input style="max-width:100%;" type="text" size="35" name="jq_user_name" id="jq_user_name" class="inputbox jq_inputbox" value=""/>';
				$usersurname_field = '<label for="jq_user_surname">'.JText::_('COM_JOOMLAQUIZ_INPUT_USER_SURNAME').'</label><input style="max-width:100%;" type="text" size="35" name="jq_user_surname" id="jq_user_surname" class="inputbox jq_inputbox" value=""/>';
				$email_field = '<label for="jq_user_email">'.JText::_('COM_JOOMLAQUIZ_INPUT_USER_EMAIL').'</label><input style="max-width:100%;" type="text" size="35" name="jq_user_email" id="jq_user_email" class="jq_inputbox" value=""/>';
				$quiz_params[0]->c_description = preg_replace('/#name#/', $username_field, $quiz_params[0]->c_description, 1);
				$quiz_params[0]->c_description = preg_replace('/#surname#/', $usersurname_field, $quiz_params[0]->c_description, 1);
				$quiz_params[0]->c_description = preg_replace('/#email#/', $email_field, $quiz_params[0]->c_description, 1);
			} else {
				$quiz_params[0]->c_description = preg_replace('/#name#/', '', $quiz_params[0]->c_description);
				$quiz_params[0]->c_description = preg_replace('/#surname#/', '', $quiz_params[0]->c_description);
				$quiz_params[0]->c_description = preg_replace('/#email#/', '', $quiz_params[0]->c_description);
			}
			JPluginHelper::importPlugin('content');
			$dispatcher = JEventDispatcher::getInstance();
			list($processed_desc) = $dispatcher->trigger('onQuizCustomFieldsRender', array($quiz_params[0]->c_description));
			if($processed_desc) $quiz_params[0]->c_description = $processed_desc;
		
			$_SESSION['quiz_lid'] = $lid;
			$_SESSION['quiz_rel_id'] = $rel_id;
			$_SESSION['quiz_package_id'] = $package_id;
			
			$query = "SELECT count(*) FROM #__quiz_t_question WHERE c_quiz_id = '".$quiz_id."' AND c_type = 4 AND published = 1";
			$database->SetQuery( $query );
			$quiz_params[0]->if_dragdrop_exist = $database->LoadResult();
			
			$quiz_params[0]->c_description = JoomlaquizHelper::JQ_ShowText_WithFeatures($quiz_params[0]->c_description);

			$quiz_params[0]->is_attempts = $is_attempts;
			$quiz_params[0]->force = intval(JFactory::getApplication()->input->get('force', 0));
			
			if (!$is_attempts) 
				$quiz_params[0]->force = 0;
			
			return $quiz_params[0];
			
		} elseif ($doing_quiz == -1) {
			if(!$error_info){
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = '<p align="left">'.JText::_('COM_QUIZ_NOT_AVAILABLE').'</p><br />';
				return $quiz_params[0];
			} else {
				$quiz_params[0]->error = 1;
				$quiz_params[0]->message = '<p align="left">'.JText::_('COM_JOOMLAQUIZ_QUIZ_IS_MISCONFIGURED').'</p><small style="">'.$error_info.'</small><br/>';
				return $quiz_params[0];
			}
		}
	}
		
	public function JQ_GetArticle($article_id, $package_id, $rel_id, $lid, $next) {
		
		$mainframe = JFactory::getApplication();
		$database = JFactory::getDBO();
				
		$query = "SELECT title FROM `#__quiz_lpath` WHERE `id` = '{$lid}' AND published = 1";
		$database->SetQuery( $query );
		$lpath_name = $database->loadResult();
			
		$lang = JFactory::getLanguage();
		$lang->load('com_content', JPATH_SITE);
		
		require_once JPATH_BASE . '/components/com_content/models/article.php';
		require_once JPATH_BASE . '/components/com_content/helpers/query.php';
		require_once JPATH_BASE . '/components/com_content/helpers/route.php';
		require_once JPATH_BASE . '/components/com_content/helpers/icon.php';
		JFactory::getApplication()->input->set('id', $article_id);
		
		$model = new ContentModelArticle();

		$user		= JFactory::getUser();
		$document	= JFactory::getDocument();
		$dispatcher	= JDispatcher::getInstance();
		$pathway	= $mainframe->getPathway();
		$params		= $mainframe->getParams('com_content');
		
		// Initialize variable
		$article  = & $model->getItem($article_id);
		
		$aparams = new JRegistry;
		$ap	=& $aparams->loadArray(json_decode($article->attribs));
		$params->merge($ap);

		$article->rel_id = $rel_id;
		$article->package_id = $package_id;
		$article->lid = $lid;
		if(!empty($next)) {
			$article->next = '&' . ($next->type == 'q' ? 'quiz_id' : 'article_id' ) . '=' . $next->qid;
		} else {
			$article->next = null;
		}
		
		if (($article->id == 0)) {
			$id = JFactory::getApplication()->input->get( 'id', '', 'default', 'int' );
			return JError::raiseError( 404, JText::sprintf( 'Article # not found', $id ) );
		}
	
		$access = null;
		$params->def('page_heading', $lpath_name);
		$article->slug			= $article->alias ? ($article->id.':'.$article->alias) : $article->id;
		$article->catslug		= $article->category_alias ? ($article->catid.':'.$article->category_alias) : $article->catid;
		$article->parent_slug	= $article->category_alias ? ($article->parent_id.':'.$article->parent_alias) : $article->parent_id;
		
		$limitstart	= JFactory::getApplication()->input->get('limitstart', 0, '', 'int');
		
		$params->set('show_item_navigation', false);
		
		if ($article->fulltext) {
			$article->text = $article->fulltext;
		}
		else  {
			$article->text = $article->introtext;
		}
		
		if ($article->params->get('show_intro','1') == '1') {
			$article->text = $article->introtext.' '.$article->fulltext;
		}

		$offset = 0;
		
		//
		// Process the content plugins.
		//
		JPluginHelper::importPlugin('content');
		$results = $dispatcher->trigger('onContentPrepare', array ('com_content.article', &$article, &$params, $offset));
		$results = $dispatcher->trigger('onContentAfterTitle', array('com_content.article', &$article, &$params, $offset));
		$article->event = new stdClass;
		$article->event->afterDisplayTitle = trim(implode("\n", $results));

		$results = $dispatcher->trigger('onContentBeforeDisplay', array('com_content.article', &$article, &$params, $offset));
		$article->event->beforeDisplayContent = trim(implode("\n", $results));

		$results = $dispatcher->trigger('onContentAfterDisplay', array('com_content.article', &$article, &$params, $offset));
		$article->event->afterDisplayContent = trim(implode("\n", $results));
		
		// Increment the hit counter of the article.
		if (!$params->get('intro_only') && $offset == 0) {
			$model->hit();
		}
					
		$print = JFactory::getApplication()->input->get('print');
		if ($print) {
			$document->setMetaData('robots', 'noindex, nofollow');
		}
		
		$data = new stdClass();
		$data->article = $article;
		$data->params = $params;
		$data->user = $user;
		$data->print = $print;
		$data->access = $access;
	
		return $data;	
	}
}
