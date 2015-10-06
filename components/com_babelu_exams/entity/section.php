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

class Babelu_examsEntitySection extends Babelu_examsEntityBase
{	
	public $correct = 0;
	
	public $incorrect = 0;
	
	public $partial = 0;
	
	/**
	 * Array of problem entities
	 * @var array
	 */
	protected $problems = array();
	
	/**
	 * Method to attach problem entity array to section
	 * @param array $problems
	 * @return $this to allow chaining
	 */
	public function attachProblems($problems)
	{
		foreach ($problems AS $problem)
		{
			if ($problem instanceof Babelu_examsEntityProblem)
			{
				$answerCount = $problem->countAnswers();
				$optionCount = $problem->countOptions();
				

				$input_type = $this->getInputType($problem->getSetting('default_input_type', 0));
				
				$limits = $this->getOptionLimits($answerCount, $optionCount, $input_type);
				
				$isRandom = ($this->settings->randomize == 1);
				$problemAnswers = $problem->getAnswersList($limits['maxAnswers'], $isRandom);
				$problemOptions = $problem->getOptionsList($limits['maxOptions'], $isRandom);
				
				$displayOptions = array_merge($problemAnswers,$problemOptions);
				shuffle($displayOptions);
				
				$problem->setSetting('displayOptions', $displayOptions);
				
				$pid = 's'.$this->getSetting('id').'_pid_'.$problem->getSetting('id');
				$problem->setSetting('pid', $pid);
				 
				$this->countStatus($problem);
				
				$this->problems[] = $problem;
			}
		}
		
		return $this;
	}
	
	/**
	 * Method to count problem status.
	 * Counts the number of correct, incorrect and partial correct in the section
	 * @param Babelu_examsEntityProblem $problem
	 */
	protected function countStatus($problem)
	{
		$status = $problem->getSetting('status', 0);
		switch ($status)
		{
			case 1: 
				$this->incorrect++; 
				break;
			case 2: 
				$this->partial++; 
				break;
			case 3: 
				$this->correct++; 
				break;
		}
	}
	
	/**
	 * Method to get the problems array
	 * @return multitype: Babelu_examsEntityProblem
	 */
	public function getProblems()
	{
		return $this->problems;
	}
	
	/**
	 * Method to check if the section has problems loaded
	 * @return boolean
	 */
	public function hasProblems()
	{
		if (count($this->problems) != 0)
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Short cut to get the default_point_value from the settings
	 * @return int;
	 */
	public function getDefaultPointValue()
	{
		return $this->settings->default_point_value;
	}
	
	/**
	 * Method to get the description and replace the special tags
	 * {section_start} and {section_end} with starting and ending problem numbers
	 * @param int $prevSectionEnd
	 * @return string
	 */
	public function getDescription($prevSectionEnd)
	{
		$start = (int)$prevSectionEnd + 1;
		$end = (int)$prevSectionEnd + count($this->problems);
		
		$search = array('{section_start}','{section_end}');
		$replace = array($start, $end);
		return str_replace($search, $replace, $this->settings->description);
	}
	
	/**
	 * Method to get the end of section problem count
	 * @param int $prevSectionEnd
	 * @return number
	 */
	public function getEndOfSection($prevSectionEnd)
	{
		return (int)$prevSectionEnd + count($this->problems);
	}
	
	/**
	 * Method to count the number of problems in the section
	 * @return number
	 */
	public function getProblemCount()
	{
		return count($this->problems);
	}
	
	/**
	 * Method to check if the section should be randomized
	 * @return boolean
	 */
	public function isRandom()
	{
		if ($this->settings->randomize == 1)
		{
			return true;
		}
		return false;
	}
	
	/**
	 * Method to get the level from the section or the default
	 * @param int $default exam level setting
	 * @return int Section setting else Exam setting
	 */
	public function getLevel($default)
	{
		if ($this->settings->level == 0 || !isset($this->settings->level_order))
		{
			return $default;
		}
		
		return $this->settings->level_order;
	}
	
	/**
	 * Method to get level filter type from the section if the level is set
	 * @param int $default exam level filter type 
	 * @return int section setting else exam setting
	 */
	public function getLevelFilterType($default)
	{
		if ($this->settings->level == 0)
		{
			return $default;
		}
		
		return $this->settings->level_filter_type;
	}
	
	/**
	 * Method to check if this section is case sensitive
	 * @return boolean
	 */
	public function isCaseSensitive()
	{
		if ($this->settings->case_sensitivity == 1)
		{
			true;
		}
		return false;
	}
	
	/**
	 * Method to get the problem input type
	 * @param int $problemDefault from the problem record
	 * @return int
	 */
	public function getInputType($problemDefault)
	{
		if ($this->getSetting('use_problem_types') == 1)
		{
			return $problemDefault;
		}
		return $this->getSetting('input_type');
	}
	
	/**
	 * Method to get the max limits for answers and options
	 * @param array $answers from the problem
	 * @param array $options from the problem
	 * @return array $optionLimits associative array with 'maxAnswers' and 'maxOptions' keys
	 */
	public function getOptionLimits($answerCount, $optionCount, $input_type)
	{
		$maxOptions = $this->settings->max_options;
		$isMultipleChoice = ($input_type == 0);
		$isMultipleAnswer = ($input_type == 1);
	
		$optionLimits = array();
	
		if ($isMultipleChoice && $maxOptions != 0)
		{	
			$optionLimits['maxAnswers'] = 1;
			$optionLimits['maxOptions'] = $maxOptions - 1;
	
			if ($optionLimits['maxOptions'] > $optionCount)
			{
				$optionLimits['maxOptions'] = $optionCount;
			}
		}
		elseif ($isMultipleChoice &&  $maxOptions == 0)
		{
			$optionLimits['maxAnswers'] = 1;
			$optionLimits['maxOptions'] = $optionCount;
		}
		elseif ($isMultipleAnswer && $maxOptions != 0)
		{
			$ansMax = $maxOptions / 2;
			$optMax = $ansMax;
	
			if ($maxOptions % 2) // odd number
			{
				$ansMax = round($ansMax, 0, PHP_ROUND_HALF_DOWN);
				$optMax = round($optMax, 0, PHP_ROUND_HALF_UP);
			}
	
			if ($ansMax > $answerCount)
			{
				$remainder = $ansMax - $answerCount;
				$ansMax = $answerCount;
				$optMax += $remainder;
			}
	
			if ($optMax > $optionCount)
			{
				$remainder = $optMax - $optionCount;
				$optMax = $optionCount;
	
				if (($ansMax + $remainder) <= $answerCount)
				{
					$ansMax += $remainder;
				}
			}
	
			$optionLimits['maxAnswers'] = $ansMax;
			$optionLimits['maxOptions'] = $optMax;
		}
		else
		{
			$optionLimits['maxAnswers'] = $answerCount;
			$optionLimits['maxOptions'] = $optionCount;
		}
	
		return $optionLimits;
	}
	
	
	
	//-----------------------------TEMPORARY SOLUTIONS UNTIL REDO INPUT TYPES -------------------
	
	/**
	 * input renderer
	 * @var Babelu_examsInputBase subclass
	 * @deprecated will be replaced with new solution by ver 2.0
	 */
	public $renderer;
	
	/**
	 * Method to render the problem
	 * TEMPORARY SOLUTION UNTIL REDO PROBLEM INPUTS
	 * @param Babelu_examsEntityProblem $problem
	 * @return string HTML form output
	 */
	public function render(Babelu_examsEntityProblem $problem)
	{
		if (!isset($this->renderer))
		{
			$this->renderer = Babelu_examsInputStrategy::getExamInputType($this->settings);
		}
		
		return $this->renderer->getFormHtml($problem);
	}
	
	public function getUList($items)
	{
		if (!isset($this->renderer))
		{
			$this->renderer = Babelu_examsInputStrategy::getExamInputType($this->settings);
		}
		
		return $this->renderer->getUList($items);
	}
	
	public function getParagraphs($items)
	{
		if (!isset($this->renderer))
		{
			$this->renderer = Babelu_examsInputStrategy::getExamInputType($this->settings);
		}
	
		return $this->renderer->getParagraphs($items);
	}
}
