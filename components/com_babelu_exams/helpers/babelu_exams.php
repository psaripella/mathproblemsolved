<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.helper');
jimport('joomla.utilities.date');

abstract class Babelu_examsHelperBabelu_exams
{
	public static function formatTime($time_spent)
	{
		if ($time_spent == 0){$time = JText::_('COM_BABELU_EXAMS_UNLIMITED');	}	
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
	
			if ($hour <= 0){$hour = '00';}
			elseif ($hour <= 9 ){$hour = '0'.$hour;}
	
			if ($min <= 0){$min = '00';}
			elseif ($min <= 9 ){$min = '0'.$min;}
			
			if ($second == 0){$second = '00';}
			elseif ($second <= 9 ){$second = '0'.$second;}
			
			$time = $hour.':'.$min.':'.$second;
		}
		return $time;
	}

	public static function formatDelay($delay)
	{
		if ($delay == 0)
		{ $delay_text = JText::_('COM_BABELU_EXAMS_INSTANT');}
		else
		{ 
			$delay_in_seconds = ($delay * 60);
			$months = 0;
			$days = 0;
			$hours = 0;
			$min = 0;
	
			$months = floor($delay_in_seconds/2592000);
			$delay_in_seconds = $delay_in_seconds%2592000;
	
			$days = floor($delay_in_seconds/86400);
			$delay_in_seconds = $delay_in_seconds%86400;
	
			$hours = floor($delay_in_seconds/3600);
			$delay_in_seconds = $delay_in_seconds%3600;
	
			$min = floor($delay_in_seconds/60);
			$delay_in_seconds = $delay_in_seconds%60;
			$delay_text = '';
			
			if ($months >= 1){$delay_text .= $months.' '.JText::_('COM_BABELU_EXAMS_MONTH');}
			if ($months > 1){$delay_text .= JText::_('COM_BABELU_EXAMS_S').' ';}
			else{$delay_text .= ' ';}
			
			if ($days >= 1){$delay_text .= $days.' '.JText::_('COM_BABELU_EXAMS_DAY');}
			if ($days > 1){$delay_text .= JText::_('COM_BABELU_EXAMS_S').' ';}
			else{$delay_text .= ' ';}
			
			if ($hours >= 1){$delay_text .= $hours.' '.JText::_('COM_BABELU_EXAMS_HOUR');}
			if ($hours > 1){$delay_text .= JText::_('COM_BABELU_EXAMS_S').' ';}
			else{$delay_text .= ' ';}
			
			if ($min >= 1){$delay_text .= $min.' '.JText::_('COM_BABELU_EXAMS_MIN');}
			if ($min > 1) {$delay_text .= JText::_('COM_BABELU_EXAMS_S').' ';}
			else{$delay_text .= ' ';}
		}
		return $delay_text;
	}
	
	public static function getCategoryLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=category&id='.(int)$id;
	}
	
	public static function getDetailsLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=detail&id='.(int)$id;
	}
	
	public static function getResumeExamLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=exam&task=resume&id='.(int)$id;
	}
		
	public static function getNewExamLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=exam&task=start&id='.(int)$id;
	}
	
	public static function getResultsLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=results&id='.(int)$id;
	}
	
	public static function getResultLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=result&id='.(int)$id;
	}
	
	public static function getSubmissionsLink()
	{
		return 'index.php?option=com_babelu_exams&view=submissions';
	}
	
	public static function getSubmissionLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=submission&task=edit&id='.(int)$id;
	}
	
	public static function getGradeLink($id)
	{
		return 'index.php?option=com_babelu_exams&view=grade&id='.(int)$id;
	}
}