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

abstract class Babelu_examsInputMultipleBase extends Babelu_examsInputBase
{
	protected $max_answers;
	
	protected $max_options;
	
	protected $display_options;
	
	public function __construct($section)
	{
		parent::__construct($section);
	
	}
	
	/**
	 * Method to set the max answers and max options values
	 */
	abstract protected function setMaximums();
	
	protected function selectOptions($array, $maximum)
	{
		//get random keys equal to the maximum
		$rkeys = array_rand($array,$maximum);
	
		if (!is_array($rkeys))// then make it an array
		{
			$temp = $rkeys;
			$rkeys = array($temp);
		}
	
		// initialize temp_array
		$temp_array = array();
	
		//go through the array and bind to the temp_array
		foreach ($rkeys as $key)
		{
			$temp_array[] = $array[$key];
		}
	
		return $temp_array;
	}
	
	protected function checkTempOptions($options_array, $temp_array)
	{
		$i = 0;
		foreach ($this->responses as $user_response)
		{
			if (in_array($user_response, $options_array) && !in_array($user_response, $temp_array))
			{
				$temp_array[$i] = $user_response;
			}
			$i++;
		}
	
		return $temp_array;
	}
	
	protected function prepareDisplayOptions()
	{
		//set the maximums
		$this->setMaximums();
	
		//get random array of answers
		$tempAnswers = $this->selectOptions($this->answers, $this->max_answers);
	
		//get random array of incorrect options
		$tempIncorrect = $this->selectOptions($this->options, $this->max_options);
	
		$problemResponses = $this->problem->getSetting('user_response', array());
		//if there is a user response make sure we add them to the possible choices
		if (count($problemResponses) != 0)
		{
			$tempAnswers = $this->checkTempOptions($this->answers,$tempAnswers);
			$tempIncorrect = $this->checkTempOptions($this->options,$tempIncorrect);
		}
	
		//$this->printObject($tempIncorrect);
	
		//merge both temp arrays
		$this->display_options = array_merge($tempAnswers,$tempIncorrect);
	
		// randomize their order
		shuffle($this->display_options);
	
	}
	
	public function getFormHTML($problem)
	{
		$this->problem = $problem;
		$this->prepareProblem();
		$this->prepareDisplayOptions();
		$this->buildFormHTML();
		return $this->html;
	}
	
	protected function printObject($obj)
	{
		echo '<pre>';
		print_r($obj);
		echo '</pre>';
	}
	
}
