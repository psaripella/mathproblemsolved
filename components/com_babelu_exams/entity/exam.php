<?php
/**
 * @version     1.8.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsEntityExam extends Babelu_examsEntityBase
{
	/**
	 * State Entity
	 * @var Babelu_examsEntityState
	 */
	public $state;
	
	/**
	 * Specification message
	 * @var string
	 */
	protected $msg;
	
	/**
	 * Array of section entities
	 * @var array
	 */
	protected $sections = array();
	
	
	/**
	 * Method to set specification message
	 * @param string $msg
	 */
	public function setMsg($msg)
	{
		$this->msg = $msg;
	}
	
	/**
	 * Method to get specification message
	 * @return string
	 */
	public function getMsg()
	{
		return $this->msg;
	}
	
	/**
	 * Method to attach section entity array to the exam
	 * @param array $sections
	 * @return $this to allow chaining
	 */
	public function attachSections($sections)
	{
		foreach ((array)$sections AS $section)
		{ 
			if (($section instanceof Babelu_examsEntitySection) && $section->hasSettings())
			{
				$this->sections[] = $section;
			}
		}
		return $this;
	}
	
	/**
	 * Method to get the sections for the exam
	 * @return multitype: Babelu_examsEntitySection
	 */
	public function getSections()
	{
		return $this->sections;
	}

	/**
	 * Method to get the number of section in the exam
	 * @return integer
	 */
	public function getSectionCount()
	{
		return count($this->sections);
	}
	
	/**
	 * Method to get actual problem count
	 * This method counts all problems in all sections
	 * @return int
	 */
	public function getActualProblemCount()
	{
		if (!isset($this->settings->problem_count))
		{
			$p_count = 0;
			foreach ($this->sections AS $section)
			{
				$p_count += count($section->getProblems());
			}
			$this->settings->problem_count = $p_count;
		}
	
		return $this->settings->problem_count;
	}
	
	/**
	 * Method to to get the problem count from the section problem_count total.
	 * @return int
	 */
	public function getSectionProblemCountTotal()
	{
		$p_count = 0;
		foreach ($this->sections AS $section)
		{
			$p_count += $section->getSetting('problem_count');
		}
		return $p_count;
	}
	
	/**
	 * Method to get time limit
	 * @return int $time_limit in seconds
	 */
	public function getTimeLimit()
	{
		$timeLimit = ($this->settings->time_limit * 60);
		return $this->formatTime($timeLimit);
	}
	
	/**
	 * Method to get time remaining in the exam
	 * @return $time_limit - $time_spent in seconds
	 */
	public function getTimeRemaining()
	{
		$timeRemaining = ($this->settings->time_limit * 60) - $this->getSetting('time_spent', 0);
		return $timeRemaining;
	}
	
	/**
	 * Method to get a formatted time spent string
	 * @return string format is HH:MM:SS
	 */
	public function getTimeSpent()
	{
		return $this->formatTime($this->settings->time_spent);
	}
	
	private function formatTime($timeToFormat)
	{
		if ($timeToFormat == 0)
		{
			$time = JText::_('COM_BABELU_EXAMS_UNLIMITED');	
		}
		else
		{
			$hour = 0;
			$min = 0;
			$second = 0;
		
			$hour = floor($timeToFormat / 3600);
			$timeToFormat = $timeToFormat % 3600;
			$min = floor($timeToFormat / 60);
			$timeToFormat = $timeToFormat % 60;
			$second = floor($timeToFormat);
		
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
	
	public function getStatusMsg()
	{
		if ($this->settings->status == 2)
		{ 
			return 'COM_BABELU_EXAMS_STATUS_PASS';
		}
		elseif ($this->settings->status == 1) 
		{ 
			return 'COM_BABELU_EXAMS_STATUS_FAIL'; 
		}
		else 
		{ 
			return 'COM_BABELU_EXAMS_STATUS_PENDING'; 
		}
	}
	
	public function getLevel()
	{
		if ($this->settings->level == 0 || !isset($this->settings->level_order))
		{
			return $this->settings->level;
		}
		
		return $this->settings->level_order;
	}
	
	/**
	 * Method to get a SQL level filter condition string
	 * @return mixed string or null if level = 0
	 */
	public function getLevelFilter($level, $filter_type)
	{
		// if the level is set to 0 no filtering is used
		If($level == 0)
		{
			return null;
		}

		$col = 'level.ordering';
		
		return $this->getConditionals($level, $filter_type, $col);
	}
	
	/**
	 * Method to get a SQL level filter condition string
	 * @param int $level level to user
	 * @param int $level_filter_type typ of filter
	 * @param string $columnName what column to filter against default is 'a.level'
	 * @return mixed string or null if level_filter_type is unknown
	 */
	private function getConditionals($level, $level_filter_type, $columnName = 'a.level')
	{
		$db = JFactory::getDbo();
		switch ($level_filter_type)
		{
			case 0: // equals
				$filter_conditons = $columnName.' = '.(int)$level; 
				break;
			case 1: // Is greater or equal to
				$filter_conditons = $columnName.' >= '.(int)$level; 
				break;
			case 2: // is less than or equal to
				$filter_conditons = $columnName.' <= '.(int)$level; 
				break;
			default:
				$filter_conditons = null; 
				break;
		}
		
		return $filter_conditons;
	}
	
	/**
	 * Method to check if the exam is published
	 * @return boolean
	 */
	public function isPublished()
	{
		if ((int)$this->settings->state == 1)
		{
			return true;
		}
		
		return false;
	}
	
	/**
	 * Method to check if the exam can be saved/ paused
	 * @return boolean
	 */
	public function isSavable()
	{
		if ((int)$this->settings->savable == 1)
		{
			return true; // is savable
		}
		return false;
	}
	
	/**
	 * Method to check if the exam can be saved multiple times
	 * @return boolean
	 */
	public function allowMultiSave()
	{
		if ($this->settings->multisave == 1)
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Method to check if save_id is set
	 * @return boolean
	 */
	public function hasSave()
	{
		if (isset($this->settings->save_id))
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Method to check if this exam should be auto graded
	 * @return boolean
	 */
	public function isAutoGraded()
	{
		if ($this->settings->grading_option == 0)
		{
			return true;
		}
		return false;
	}
	
	public function setResult($pointsPossible, $pointsEarned)
	{
		$this->settings->point_grade = $pointsEarned;
		
		$percentageEarned = 0;
		if ($pointsEarned != 0 && $pointsPossible != 0)
		{
			$percentageEarned = round(($pointsEarned/$pointsPossible)*100);
		}
		$this->settings->percentage_grade = $percentageEarned;
		
		if ($percentageEarned >= $this->settings->pass_per)
		{
			$this->settings->status = 2; // pass
		}
		else 
		{
			$this->settings->status = 1; // fail
		}
	}
	
	
	/**
	 * Method to check if anyone should be notified
	 * @return boolean
	 */
	public function shouldNotify()
	{
		if ($this->notifyAdminAuto() || $this->notifyAdminManual() || $this->notifyUserAuto())
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Method to check if the admin should be notified for automatically graded exams.
	 * @return boolean
	 */
	public function notifyAdminAuto()
	{
		$gradingOption = $this->getSetting('grading_option', 0);
		$adminAuto = $this->getSetting('notify_admin_automatic', 0);
		
		if($gradingOption == 0 && $adminAuto == 1)
		{
			return true;
		}
		return false;
	}

	/**
	 * Method to check if the admin should be notified for manually graded exams.
	 * @return boolean
	 */
	public function notifyAdminManual()
	{
		$gradingOption = $this->getSetting('grading_option', 0);
		$adminManual = $this->getSetting('notify_admin_manual', 0);
		if($gradingOption == 1 && $adminManual == 1)
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Method to check if the user should be notified for automatically graded exams.
	 * @return boolean
	 */
	public function notifyUserAuto()
	{
		$gradingOption = $this->getSetting('grading_option', 0);
		$userAuto = $this->getSetting('notify_user_auto', 0);
		if($gradingOption == 0 && $userAuto == 1);
		{
			return true;
		}
		return false;
	}
	
	public function hasCorrect()
	{
		$correct = 0;
		foreach ($this->sections AS $section)
		{
			$correct += $section->correct;
		}
		
		if ($correct != 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function hasIncorrect()
	{
		$incorrect = 0;
		foreach ($this->sections AS $section)
		{
			$incorrect += $section->incorrect;
		}
		
		if ($incorrect != 0)
		{
			return true;
		}
		
		return false;
	}
	
	public function hasPartial()
	{
		$partial = 0;
		foreach ($this->sections AS $section)
		{
			$partial += $section->partial;
		}
		
		if ($partial != 0)
		{
			return true;
		}
		
		return false;
	}
	
}