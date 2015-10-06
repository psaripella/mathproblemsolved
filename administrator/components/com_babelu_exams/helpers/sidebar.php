<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsHelperSidebar
{
	public static function addSideBar($vName = '')
	{
		JHtmlSidebar::addEntry(JText::_('COM_BABELU_EXAMS_CATEGORIES_MENU'),
		'index.php?option=com_babelu_exams&view=categories',
		$vName == 'categories');
		
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_LEVELS_MENU'),
		'index.php?option=com_babelu_exams&view=levels',
		$vName == 'levels');	
		
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_EXAMS_MENU'),
		'index.php?option=com_babelu_exams&view=exams',
		$vName == 'exams');
		
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_GROUPS_MENU'),
		'index.php?option=com_babelu_exams&view=groups',
		$vName == 'groups');
	
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_SECTIONS_MENU'),
		'index.php?option=com_babelu_exams&view=sections',
		$vName == 'sections');
	
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_PROBLEMS_MENU'),
		'index.php?option=com_babelu_exams&view=problems',
		$vName == 'problems');
		
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_MENU'),
		'index.php?option=com_babelu_exams&view=notifications',
		$vName == 'notifications');

		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_MESSAGES_MENU'),
		'index.php?option=com_babelu_exams&view=messages',
		$vName == 'messages');
		
		JHtmlSidebar::addEntry(
		JText::_('COM_BABELU_EXAMS_RESULTS_MENU'),
		'index.php?option=com_babelu_exams&view=results',
		$vName == 'results');
	
		if (Babelu_examsHelperActions::canGrade('com_babelu_exams'))
		{
			JHtmlSidebar::addEntry(
			JText::_('COM_BABELU_EXAMS_GRADING_MENU'),
			'index.php?option=com_babelu_exams&view=grades',
			$vName == 'grades');
		}
	}
	
	public static function getSideBar($vName = '')
	{
		$sidebar = new Babelu_examsUtilitySidebar();
		$user = JFactory::getUser();
		
		if ($user->authorise('bue.manage.categories', 'com_babelu_exams'))
		{
			$sidebar->addEntry(JText::_('COM_BABELU_EXAMS_CATEGORIES_MENU'),
			'index.php?option=com_babelu_exams&view=categories',
			$vName == 'categories');
		}
		
		if ($user->authorise('bue.manage.levels', 'com_babelu_exams'))
		{
			$sidebar->addEntry(
			JText::_('COM_BABELU_EXAMS_LEVELS_MENU'),
			'index.php?option=com_babelu_exams&view=levels',
			$vName == 'levels');
		}
		
		$sidebar->addEntry(
		JText::_('COM_BABELU_EXAMS_EXAMS_MENU'),
		'index.php?option=com_babelu_exams&view=exams',
		$vName == 'exams');
		
		$sidebar->addEntry(
		JText::_('COM_BABELU_EXAMS_GROUPS_MENU'),
		'index.php?option=com_babelu_exams&view=groups',
		$vName == 'groups');
		
		$sidebar->addEntry(
		JText::_('COM_BABELU_EXAMS_SECTIONS_MENU'),
		'index.php?option=com_babelu_exams&view=sections',
		$vName == 'sections');
		
		if ($user->authorise('bue.manage.problems', 'com_babelu_exams'))
		{
			$sidebar->addEntry(
			JText::_('COM_BABELU_EXAMS_PROBLEMS_MENU'),
			'index.php?option=com_babelu_exams&view=problems',
			$vName == 'problems');
		}
		
		if ($user->authorise('bue.manage.notifications', 'com_babelu_exams'))
		{
			$sidebar->addEntry(
			JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_MENU'),
			'index.php?option=com_babelu_exams&view=notifications',
			$vName == 'notifications');
		
			$sidebar->addEntry(
			JText::_('COM_BABELU_EXAMS_MESSAGES_MENU'),
			'index.php?option=com_babelu_exams&view=messages',
			$vName == 'messages');
		}
		
		
		$sidebar->addEntry(
		JText::_('COM_BABELU_EXAMS_RESULTS_MENU'),
		'index.php?option=com_babelu_exams&view=results',
		$vName == 'results');
		
		return $sidebar;
	}
}
