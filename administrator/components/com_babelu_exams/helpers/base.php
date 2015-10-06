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

class Babelu_examsHelperBase
{
	public static function addSubmenu($vName = '')
	{
		JSubMenuHelper::addEntry(JText::_('COM_BABELU_EXAMS_CATEGORIES_MENU'),
		'index.php?option=com_babelu_exams&view=categories',
		$vName == 'categories'
		);
		
		JSubMenuHelper::addEntry(
		JText::_('COM_BABELU_EXAMS_LEVELS_MENU'),
		'index.php?option=com_babelu_exams&view=levels',
		$vName == 'levels'
				);
		
		JSubMenuHelper::addEntry(
				JText::_('COM_BABELU_EXAMS_EXAMS_MENU'),
				'index.php?option=com_babelu_exams&view=exams',
				$vName == 'exams'
		);
		
		JSubMenuHelper::addEntry(
			JText::_('COM_BABELU_EXAMS_GROUPS_MENU'),
			'index.php?option=com_babelu_exams&view=groups',
			$vName == 'groups'
		);	

		JSubMenuHelper::addEntry(
			JText::_('COM_BABELU_EXAMS_SECTIONS_MENU'),
			'index.php?option=com_babelu_exams&view=sections',
			$vName == 'sections'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_BABELU_EXAMS_PROBLEMS_MENU'),
			'index.php?option=com_babelu_exams&view=problems',
			$vName == 'problems'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_MENU'),
			'index.php?option=com_babelu_exams&view=notifications',
			$vName == 'notifications'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_BABELU_EXAMS_MESSAGES_MENU'),
			'index.php?option=com_babelu_exams&view=messages',
			$vName == 'messages'
		);		
			
		JSubMenuHelper::addEntry(
				JText::_('COM_BABELU_EXAMS_RESULTS_MENU'),
				'index.php?option=com_babelu_exams&view=results',
				$vName == 'results'
		);
		JSubMenuHelper::addEntry(
				JText::_('COM_BABELU_EXAMS_GRADING_MENU'),
				'index.php?option=com_babelu_exams&view=grades',
				$vName == 'grades'
		);
	}

	public static function getMenuList($viewName)
	{
		$menuList = array();
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_CATEGORIES_MENU'),
				'index.php?option=com_babelu_exams&view=categories',
				 ($viewName == 'categories'));
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_LEVELS_MENU'),
				'index.php?option=com_babelu_exams&view=levels',
				($viewName == 'levels'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_EXAMS_MENU'),
				'index.php?option=com_babelu_exams&view=exams',
				($viewName == 'exams'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_GROUPS_MENU'),
				'index.php?option=com_babelu_exams&view=groups',
				($viewName == 'groups'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_SECTIONS_MENU'),
				'index.php?option=com_babelu_exams&view=sections',
				($viewName == 'sections'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_PROBLEMS_MENU'),
				'index.php?option=com_babelu_exams&view=problems',
				($viewName == 'problems'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_MENU'),
				'index.php?option=com_babelu_exams&view=notifications',
				($viewName == 'notifications'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_MESSAGES_MENU'),
				'index.php?option=com_babelu_exams&view=messages',
				($viewName == 'messages'));
		
		$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_RESULTS_MENU'),
				'index.php?option=com_babelu_exams&view=results',
				($viewName == 'results'));
		
		if (Babelu_examsHelperActions::canGrade('com_babelu_exams'))
		{
			$menuList[] = array(
				JText::_('COM_BABELU_EXAMS_GRADING_MENU'),
				'index.php?option=com_babelu_exams&view=grades',
				($viewName == 'grades'));
		}
		
		return $menuList;
	}
	
	public static function renderMenuList($viewName)
	{
		$menuList = self::getMenuList($viewName);
		
		$html = '<ul>';
		foreach ($menuList AS $menuItem)
		{
			if ($menuItem[2] == 1)
			{
				$class = 'class="active"';
			}
			else
			{
				$class = '';
			}
			
			$html .= '<li '.$class.'>';
			$html .= '<a href="'.JRoute::_($menuItem[1]).'" />';
			$html .= $menuItem[0].'</a>';
			$html .= '</li>';
		}
		$html .='</ul>';
		
		return $html;
	}
	
	public static function isJ3()
	{
		$jversion = new JVersion();
		$version = (int)$jversion->RELEASE;
		if ($version >= 3 AND $version < 4) { return true; }
		else { return false; }
	}
	
	public static function formatTime($time_spent)
	{
		if ($time_spent == 0)
		{
			$time = JText::_('COM_BABELU_EXAMS_UNLIMITED');
		}
		else
		{
			$hour = 0;
			$min = 0;
			$second = 0;
	
			$hour = floor($time_spent/3600);
			$time_spent = $time_spent%3600;
			$min = floor($time_spent/60);
			$time_spent = $time_spent%60;
			$second = floor($time_spent);
	
			if ($hour <= 0) { $hour = '00'; }
			elseif ($hour <= 9 ) { $hour = '0'.$hour; }
	
			if ($min <= 0) { $min = '00'; }
			elseif ($min <= 9 ) { $min = '0'.$min; }
	
			if ($second == 0) { $second = '00'; }
			elseif ($second <= 9 ) { $second = '0'.$second; }
			
			$time = $hour.':'.$min.':'.$second;	
		}
		return $time;
	}

	public static function buildCorrectAnswersArray($answer_string)
	{
		$answers = explode('|', $answer_string);
		if (!is_array($answers)) { $answers[0] = $answer_string; }
		
		$i = 0;
		foreach ($answers as $answer) 
		{
			$answers[$i] = trim($answer); 
			$i++;
		}
		return $answers;
	}

	public static function buildUserResponsesArray($user_response)
	{
		$responses = explode('|', $user_response);
		if (!is_array($responses))
		{
			$responses[0] = $user_response;
		}

		$i = 0;
		foreach ($responses as $response)
		{
			$responses[$i] = trim($response);
			$i++;
		}
		return $responses;
	}
}
