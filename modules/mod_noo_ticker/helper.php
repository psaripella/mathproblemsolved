<?php
/**
 * @version		$Id$
 * @author		NooTheme
 * @package		Joomla.Site
 * @subpackage	mod_noo_ticker
 * @copyright	Copyright (C) 2013 NooTheme. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

require_once JPATH_SITE . '/components/com_content/helpers/route.php';

JModelLegacy::addIncludePath(JPATH_SITE . '/components/com_content/models', 'ContentModel');

abstract class modNooTickerHelper {
	
	public static function getList(&$params){
		$data = array();
		$display_form = strtolower($params->get('display_form','joomla_content'));
		if ($display_form == 'joomla_content'){
			 if ($params->get('enable_cache')) {
			 	$cache = JFactory::getCache();
                $cache->setCaching(true);
                $cache->setLifeTime($params->get('cache_time', 30) * 60);
                $rows = $cache->get(array((new modNooTickerHelper()), 'getListArticles'), array($params));
			 	
			 }else{
			 	$data = self::getListArticles($params);
			 }
		
		}else if ($display_form == 'k2'){
			 if ($params->get('enable_cache')) {
			 	$cache = JFactory::getCache();
                $cache->setCaching(true);
                $cache->setLifeTime($params->get('cache_time', 30) * 60);
                $rows = $cache->get(array((new modNooTickerHelper()), 'getK2Items'), array($params));
			 	
			 }else{
			 	$data = self::getK2Items($params);
			 }
		}else if ($display_form == 'rss_link') {
			$data = self::getRssLink($params);
		}else if ($display_form == 'external_link') {
			$data = self::getExternalsLink($params->get("external_links",""),$params);
		}
		return $data;
	}
	/** 
	 * Method get list rss links
	 * @param array $params
	 * 
	 * @return array
	 */
	public static function getRssLink(&$params){
		
		$data = array();
        if (trim($params->get('rss_link')) == '') {
            return $data;
        }
        $rssUrl = $params->get('rss_link');

        //  get RSS parsed object
        $options = array();
        $options['rssUrl'] = $rssUrl;
        if ($params->get('enable_cache')) {
            $options['cache_time'] = $params->get('cache_time', '30');
            $options['cache_time'] *= 60;
        } else {
            $options['cache_time'] = null;
        }

		$rssDoc = JFactory::getFeedParser($rssUrl,$options['cache_time']);

        if ($rssDoc != false) {
            $items = $rssDoc->get_items();
            if ($items != null) {
                $tmp = array();
                foreach ($items as $item) {
                    $obj = new stdClass();
                    $obj->title = $item->get_title();
                    $obj->link = $item->get_link();
                    $obj->introtext = $item->get_description();
                    $tmp[] = $obj;
                }
                $data = $tmp;
            }
        }
        return $data;
	}
	
	/** 
	 * Method get list external links
	 * @param array $params
	 * 
	 *  @return array
	 */
	public static function getExternalsLink($content,&$params){
		
		$regex = '#\[link ([^\]]*)\]([^\[]*)\[/link\]#m';
        preg_match_all($regex, $content, $matches,PREG_SET_ORDER);
        $maxItems = $params->get('max_items', 5);
        $linkArray = array();
        if (!empty($matches)) {
            $i = 0;
            foreach ($matches as $match) {
                $linkParams = modNooTickerHelper::parseExternalsLink($match[1]);
                if (is_array($linkParams)) {
                    if ($maxItems > 0 && $i == $maxItems)
                        break;
                    $url = isset($linkParams['url']) ? trim($linkParams['url']) : '';
                    $title = isset($linkParams['title']) ? trim($linkParams['title']) : '';
                    $obj = new stdClass();
                    $obj->title = $title;
                    $obj->link = $url;
                    $obj->introtext = str_replace("\n", "<br />", trim($match[2]));
                    $linkArray[] = $obj;
                    $i++;
                }
            }
        }
        return $linkArray;
	}
	
	/**
     * Method get list k2 items follow setting configuration.
     *
     * @param JParameter $param
     * @return array
     */
	public static function getK2Items(&$params){
		if (class_exists('K2Model')){
			if (file_exists(JPATH_SITE.'/components/com_k2/helpers/route.php')){
				require_once (JPATH_SITE.'/components/com_k2/helpers/route.php');
			}
			
			$app = JFactory::getApplication();
			
			$user = JFactory::getUser();
			$db = JFactory::getDbo();
			
			$jnow = JFactory::getDate();
			$now = $jnow->toSql();
			$nullDate = $db->getNullDate();
			
			$query = $db->getQuery(true);
			
			
			$cids = $params->get('k2catid',array());
			
			JArrayHelper::toInteger($cids);
			
			if (count($cids) > 0){
				foreach ($cids as $k=>$cid){
					if (!$cid)
						unset($cids[$k]);
				}
			}
			
			$query->select('i.*,CASE WHEN i.modified = 0 THEN i.created ELSE i.modified END as lastChanged,c.alias AS categoryalias')
				->from('#__k2_items AS i')
				->leftJoin('#__k2_categories AS c ON c.id = i.catid')
				->where('i.published = 1 AND i.trash = 0 AND c.published = 1 AND c.trash = 0 ')
				->where("i.access IN(".implode(',', $user->getAuthorisedViewLevels()).") AND c.access IN(".implode(',', $user->getAuthorisedViewLevels()).")");
			
			if ($app->getLanguageFilter())
			{
				$languageTag = JFactory::getLanguage()->getTag();
				$query->where("c.language IN (".$db->Quote($languageTag).", ".$db->Quote('*').") AND i.language IN (".$db->Quote($languageTag).", ".$db->Quote('*').")");
			}
			
			if (count($cids)){
				$query->where('i.catid IN ('.implode(',',$cids).')');
			}
			
			
			$query->where("( i.publish_up = ".$db->Quote($nullDate)." OR i.publish_up <= ".$db->Quote($now).")")
				->where("(i.publish_down = ".$db->Quote($nullDate)." OR i.publish_down >= ".$db->Quote($now)." )");
			
			
			$ordering = $params->get('sort_order_field', 'id');
//			$dir = $params->get('sort_order', 'DESC');
//			$query->order('i.' . $ordering . ' ' . $dir);
			switch ($ordering)
			{

				case 'date' :
					$orderby = 'i.created ASC';
					break;

				case 'rdate' :
					$orderby = 'i.created DESC';
					break;

				case 'alpha' :
					$orderby = 'i.title';
					break;

				case 'ralpha' :
					$orderby = 'i.title DESC';
					break;

				case 'order' :
					$orderby = 'i.ordering ASC';
					break;

				case 'rorder' :
					$orderby = 'i.ordering DESC';
					break;

				case 'hits' :
					$orderby = 'i.hits DESC';
					break;

				case 'rand' :
					$orderby = 'RAND()';
					break;
					
				case 'modified' :
					$orderby = 'lastChanged DESC';
					break;

				case 'publish_up' :
					$orderby = 'i.publish_up DESC';
					break;
					
				case 'id':
				default :
					$orderby = 'i.id DESC';
				break;
			}
			$query->order($orderby);

			$db->setQuery($query,0,$params->get('count', 5));
			$items = $db->loadObjectList();
			
			foreach ($items as $item){
				$item->link = urldecode(JRoute::_(K2HelperRoute::getItemRoute($item->id.':'.urlencode($item->alias), $item->catid.':'.urlencode($item->categoryalias))));
			}
			
			return $items;
		}
		return array();
	}
	
	/**
	 * Method get list articles
	 * @param array $params
	 * 
	 * @return array $items
	 */
	public static function getListArticles(&$params){
		// Get the dbo
		$db = JFactory::getDbo();

		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$app = JFactory::getApplication();
		$appParams = $app->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', 0);
		$model->setState('list.limit', (int) $params->get('count', 5));
		$model->setState('filter.published', 1);

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// Filter by language
		$model->setState('filter.language', $app->getLanguageFilter());
		
		$ordering = $params->get('sort_order_field', 'created');
		//$dir = $params->get('sort_order', 'DESC');
		switch ($ordering)
		{

			case 'date' :
				$orderby = 'a.created';
				$dir = 'ASC';
				break;

			case 'rdate' :
				$orderby = 'a.created';
				$dir = 'DESC';
				break;

			case 'alpha' :
				$orderby = 'a.title';
				$dir = 'ASC';
				break;

			case 'ralpha' :
				$orderby = 'a.title';
				$dir = 'DESC';
				break;

			case 'order' :
				$orderby = 'a.ordering';
				$dir = 'ASC';
				break;

			case 'rorder' :
				$orderby = 'a.ordering';
				$dir = 'DESC';
				break;

			case 'hits' :
				$orderby = 'a.hits';
				$dir = 'DESC';
				break;

			case 'rand' :
				$orderby = 'RAND()';
				$dir = '';
				break;
				
			case 'modified' :
				$orderby = 'modified';
				$dir = 'DESC';
				break;

			case 'publish_up' :
				$orderby = 'a.publish_up';
				$dir = 'DESC';
				break;
				
			case 'id':
			default :
				$orderby = 'a.id';
				$dir = 'DESC';
			break;
		}
			
		$model->setState('list.ordering',$orderby);
		$model->setState('list.direction', $dir);

		$items = $model->getItems();

		foreach ($items as &$item)
		{
			$item->slug = $item->id . ':' . $item->alias;
			$item->catslug = $item->catid . ':' . $item->category_alias;

			if ($access || in_array($item->access, $authorised))
			{
				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catslug));
			}
			else
			{
				$item->link = JRoute::_('index.php?option=com_users&view=login');
			}
		}

		return $items;
	}
	/**
	 * Method trim string with max specify
	 * @param string $string
	 * @param int $maxChar
	 * 
	 * @return string
	 */
	public static function trimChar($string,$maxChar = 50){
		
		if (strlen($string) > $maxChar)
			return JString::substr($string,0,$maxChar).' ...';
			
		return $string;
	}
 	/**
     * get parameters from configuration string.
     *
     * @param string $string;
     * @return array.
     */
    public static function parseExternalsLink($string)
    {
        $string = html_entity_decode($string, ENT_QUOTES);
        $regex = "/\s*([^=\s]+)\s*=\s*('([^']*)'|\"([^\"]*)\"|([^\s]*))/";
        $linkParams = null;
        if (preg_match_all($regex, $string, $matches)) {
            for ($i = 0; $i < count($matches[1]); $i++) {
                $key = $matches[1][$i];
                $value = $matches[3][$i] ? $matches[3][$i] : ($matches[4][$i] ? $matches[4][$i] : $matches[5][$i]);
                $linkParams[$key] = $value;
            }
        }
        return $linkParams;
    }
}