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

class Babelu_examsEntityProblem extends Babelu_examsEntityBase
{	
	public function __construct(stdClass $settings = null)
	{
		
		if (isset($settings->answers))
		{
			$settings->answers = $this->decode('|', $settings->answers);
		}
		
		if (isset($settings->options))
		{
			$settings->options = $this->decode('|', $settings->options);
		}
		
		if(isset($settings->user_response))
		{
			$settings->user_response = $this->decode('|', $settings->user_response);
		}
		
		parent::__construct($settings);
	}
	
	/**
	 * Method to decode a dilimited string
	 * @param string $delimiter
	 * @param string $encoded
	 * @return array $decoded
	 */
	public function decode($delimiter = '|', $encoded)
	{
		if (is_array($encoded))
		{
			return $this->stripEmptyValues($encoded);
		}
	
		$decoded = (array)explode($delimiter,$encoded);
		return $this->stripEmptyValues($decoded);
	}
	
	/**
	 * Method to strip empty values from an array
	 * @param array $array
	 * @return array $result
	 */
	protected function stripEmptyValues($array)
	{
		$result = array();
		foreach ($array AS $key => $value)
		{
			$tmpValue = trim($value);
			if (!is_null($tmpValue))
			{
				$result[$key] = trim($tmpValue);
			}
		}
		
		return $result;
	}
	
	
	/**
	 * Method to check if a value is in the answers array
	 * @param string $value to check
	 * @return boolean
	 */
	public function isInAnswers($value, $caseSensitive = true)
	{
		if ($caseSensitive)
		{
			strtolower($value);
		}
		
		if (in_array($value, $this->settings->answers))
		{
			return true;
		}
		
		return false;
	}
	
	
	/**
	 * Method to get the problem point value
	 * Setting it to the default if the value is 0
	 * @param int $default
	 * @return int
	 */
	public function getPointValue($default)
	{
		if ($this->settings->point_value == 0)
		{
			$this->settings->point_value = (int)$default;
		}
		
		return $this->settings->point_value;
	}
	
	/**
	 * Method to set the points_earned setting and update the status
	 * @param int $pointsEarned
	 */
	public function setPointsEarned($pointsEarned)
	{
		$this->settings->points_earned = $pointsEarned;
		$this->setStatus();
	}
	
	
	/**
	 * Method to set the status setting.
	 */
	private function setStatus()
	{
		if ($this->settings->points_earned <= 0)
		{
			$this->settings->status = 1; //incorrect
		}
		elseif ($this->settings->points_earned == $this->settings->point_value)
		{
			$this->settings->status = 3; //correct
		}
		else
		{
			$this->settings->status = 2; //partial
		}
	}

//---------------------------SOF Methods to get the display options------------------//

	/**
	 * Method to count the number of possible answers
	 * @return number
	 */
	public function countAnswers()
	{
		$answerCount = count($this->settings->answers);
		return $answerCount;
	}
	
	/**
	 * Method to count the number of possible incorrect options
	 * @return number
	 */
	public function countOptions()
	{
		$optionCount = count($this->settings->options);
		return $optionCount;
	}
	
	/**
	 * Method to get a limited list of correct answer
	 * @param int $limit limit
	 * @param booleen $isRandom
	 * @return array 
	 */
	public function getAnswersList($limit = 0, $isRandom = false)
	{
		$source = $this->settings->answers;
		$list = $this->getList($source, $limit, $isRandom);
		
		$answers = $this->validateList($list, $source);
		return $answers;
	}
	
	/**
	 * Method to get a limited list of incorrect options
	 * @param int $limit limit
	 * @param booleen $isRandom
	 * @return array
	 */
	public function getOptionsList($limit = 0, $isRandom = false)
	{
		$source = $this->settings->options;
		$list = $this->getList($source, $limit, $isRandom);
		
		$options = $this->validateList($list, $source);
		return $options;
	}
	
	/**
	 * Generic method to select a limited number of items from an array
	 * @param array $array to select from
	 * @param int $limit number of options to return
	 * @param booleen $isRandom should it be randomized or not
	 * @return array
	 */
	private function getList($source, $limit, $isRandom)
	{
		$count = count($source);
		
		if ($limit === 0 || $limit > $count)
		{
			$limit = $count;
		}
		
		if ($isRandom)
		{
			$list = $this->getRandomList($source, $limit);
			shuffle($list);
		}
		else
		{
			$list = array_slice($source, 0, $limit);
		}
		
		return $list;
	}
	
	/**
	 * Method to return a list of random list
	 * @param array $array to select from
	 * @param int $limit number of options to return
	 * @return array
	 */
	private function getRandomList($source, $limit)
	{
		$randomKeys = array_rand($source, $limit);
		
		$randomList = array();
		foreach ((array)$randomKeys AS $key)
		{
			$randomList[] = $source[$key];
		}
		
		return $randomList;
	}
	
	/**
	 * Method to make sure that the user responses get included in generated lists
	 * @param array $list of options taken from a source
	 * @param array $source that the list was selected from. Either answers or options array
	 * @return array 
	 */
	private function validateList($list, $source)
	{
		$i = 0;
		$userResponses = $this->getSetting('user_response', array());
		foreach ($userResponses AS $response)
		{
			$inSource = (in_array($response, $source));
			$notInList = (!in_array($response, $list));
			
			if ($inSource && $notInList)
			{
				$list[$i] = $response;
			}
			$i++;
		}
		return $list;
	}
}