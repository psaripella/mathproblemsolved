<?php
/**
 * @version     
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

class com_babelu_examsInstallerScript
{
	function postflight($type, $parents)
	{
		jimport( 'joomla.filesystem.file' );
		jimport( 'joomla.filesystem.folder' );
	
		// ADMIN CELANUP
		$adminAssetsPath = JPATH_ADMINISTRATOR.'/components/com_babelu_exams/assets';
		$this->deleteFile($adminAssetsPath.'/widgets/strapped_exam_section_navi.php');
		
		$adminControllerPath = JPATH_ADMINISTRATOR.'/components/com_babelu_exams/controllers';
		$this->deleteFile($adminControllerPath.'/grades.php');
		
		$adminModelPath = JPATH_ADMINISTRATOR.'/components/com_babelu_exams/models';
		$this->deleteFile($adminModelPath.'/grades.php');
		
		$adminViewsPath = JPATH_ADMINISTRATOR.'/components/com_babelu_exams/views';
		$this->deleteFile($adminViewsPath.'/categories/tmpl/default_statefilter.php');
		$this->deleteFile($adminViewsPath.'/categories/tmpl/default_tbody.php');
		$this->deleteFile($adminViewsPath.'/categories/tmpl/default_theader.php');
		$this->deleteFile($adminViewsPath.'/categories/tmpl/default_tfooter.php');
		$this->deleteFile($adminViewsPath.'/categories/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/category/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/exam/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/exams/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/exam_state/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/grade/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/grade/tmpl/strapped_section_navi.php');
		$this->deleteFolder($adminViewsPath.'/grades');
		
		$this->deleteFile($adminViewsPath.'/group/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/groups/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/import/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/level/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/levels/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/message/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/messages/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/notification/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/notifications/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/problem/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/problems/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/result/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/result/tmpl/strapped_section_navi.php');
		$this->deleteFile($adminViewsPath.'/results/tmpl/strapped.php');
		
		$this->deleteFile($adminViewsPath.'/section/tmpl/strapped.php');
		$this->deleteFile($adminViewsPath.'/sections/tmpl/strapped.php');
		
		// SITE CLEAN UP
		$modelsPath = JPATH_SITE.'/components/com_babelu_exams/models';
		$this->deleteFile($modelsPath.'/babelu_exams.php');
		$this->deleteFile($modelsPath.'/grading.php');
		$this->deleteFile($modelsPath.'/newexam.php');
		$this->deleteFile($modelsPath.'/resumeexam.php');
		$this->deleteFile($modelsPath.'/resume.php');
		$this->deleteFile($modelsPath.'/new.php');
		$this->deleteFile($modelsPath.'/notifier.php');
		$this->deleteFile($modelsPath.'/save.php');
		$this->deleteFile($modelsPath.'/saveincomplete.php');
		$this->deleteFile($modelsPath.'/saveresult.php');
		$this->deleteFile($modelsPath.'/result.php');
		
		$this->deleteFolder($modelsPath.'/repository');
		$this->deleteFolder($modelsPath.'/factory');
		$this->deleteFolder($modelsPath.'/problems');
		$this->deleteFolder($modelsPath.'/utility');
		
		$viewsPath = JPATH_SITE.'/components/com_babelu_exams/views';
		$this->deleteFolder($viewsPath.'/babelu_exams');
		$this->deleteFile($viewsPath.'/exam/default_section_navi.php');
		$this->deleteFile($viewsPath.'/exam/single_review.php');
		$this->deleteFile($viewsPath.'/result/default_summary.php');
		$this->deleteFile($viewsPath.'/result/default_section_navi.php');
		$this->deleteFile($viewsPath.'/result/default_review.php');
		
		$helperPath = JPATH_SITE.'/components/com_babelu_exams/helpers';
		$this->deleteFile($helperPath.'/problems.php');
		$this->deleteFile($helperPath.'/response.php');
		
		$assetsPath = JPATH_SITE.'/components/com_babelu_exams/assets';
		$this->deleteFile($assetsPath.'/js/babelu_exams_forms.js');
		$this->deleteFile($assetsPath.'/js/babelu_exams_progress_bar.js');
		$this->deleteFile($assetsPath.'/js/babelu_exams_timer.js');
		
		$controllerPath = JPATH_SITE.'/components/com_babelu_exams/controllers';
		$this->deleteFile($controllerPath.'/resume.php');
		$this->deleteFile($controllerPath.'/new.php');
		
		// DB CLEANUP
		$this->updateLevels();
		$this->removeSubmenus();
		
		return true;
	}
	
	protected function deleteFile($pathtofile)
	{
		jimport( 'joomla.filesystem.file' );
		jimport( 'joomla.filesystem.folder' );
		
		if (file_exists($pathtofile))
		{
			JFile::delete($pathtofile);
		}
	}
	
	protected function deleteFolder($pathtofolder)
	{
		jimport( 'joomla.filesystem.file' );
		jimport( 'joomla.filesystem.folder' );
		
		if (file_exists($pathtofolder))
		{
			JFolder::delete($pathtofolder);
		}
	}
	
	protected function updateLevels()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('level');
		$query->from('#__babelu_exams_exams');
		$query->order('level');
		$db->setQuery($query);
		$results = $db->loadObjectList();

		$processedLevels =$this->processLevels($results);
		
		$query = $db->getQuery(true);
		$query->select('level');
		$query->from('#__babelu_exams_problems');
		$db->setQuery($query);
		$results = $db->loadObjectList();

		$processedLevels = $this->processLevels($results, $processedLevels);
		
	}
	
	protected function levelExists($levelId)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__babelu_exams_levels');
		$query->where('id = '.(int)$levelId);
		$db->setQuery($query);
		$result = $db->loadObject();
		
		if (!is_null($result))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	protected function processLevels($results, $processedLevels = array())
	{
		if (!in_array(0, $processedLevels))
		{
			$processedLevels[] = 0;
		}
		
		foreach ($results AS $result)
		{	
			if (!in_array($result->level, $processedLevels) && !$this->levelExists($result->level))
			{
				if ($this->addLevel($result->level))
				{
					$processedLevels[] = $result->level;
				}
			}
		}
		
		return $processedLevels;
	}
	
	protected function addLevel($level)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->insert('#__babelu_exams_levels');
		$query->set('id = '.(int)$level);
		$query->set('title = '.$db->quote('Autogenerated level '.(int)$level));
		$query->set('ordering = '.(int)$level);
		$db->setQuery($query);
		
		if ($db->execute()) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	protected function removeSubmenus()
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('extension_id');
		$query->from('#__extensions');
		$query->where('name = '.$db->quote('com_babelu_exams'));
		$db->setQuery($query);
		$extension_id = $db->loadResult();
		
		if (is_int($extension_id) && $extension_id != 0)
		{
			$query->clear();
			$query->delete('#__menu');
			$query->where('menutype = '.$db->quote('menu'));
			$query->where('component_id = '. $extension_id);
			$query->where('level = 2');
			$db->setQuery($query);
			$db->execute();
		}
	}
	
}