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

class Babelu_examsUtilityUserInput
{
	/**
	 * Input object
	 * @var JInput
	 */
	protected $input;
	
	/**
	 * Filter
	 * @param JFilterInput $filter
	 */
	protected $filter;
	
	public function __construct(JInput $input)
	{
		$this->input = $input;
		$this->filter = JFilterInput::getInstance();
	}
	
	/**
	 * Method to build a response entity from the post input
	 * @param string $pid save code string
	 * @return Babelu_examsEntityResponse
	 * @example $pid = 's_'.$section_id.'_pid_'.$problem_id
	 */
	public function getResponse($pid)
	{
		$response = new Babelu_examsEntityResponse();
		$response->setSetting('problem_id', $this->getProblemId($pid));
		$response->setSetting('section_id', $this->getSectionIdFrom($pid));
		$response->setSetting('user_response', $this->getFormInput($pid));
		$response->setSetting('marked', $this->getMarker($pid));
		
		return $response;
	}
	
	/**
	 * Method to get section id from save code string
	 * @param string $pid
	 * @return number
	 * @example $pid = 's_'.$section_id.'_pid_'.$problem_id
	 */
	private function getSectionIdFrom($pid)
	{
		$temp_ids = explode('_pid_', $pid);
	
		$section_id = substr($temp_ids[0], 1);
	
		return (int)$section_id;
	}
	
	/**
	 * Method to get problem id from pid string
	 * @param string $pid
	 * @return number
	 * @example $pid = 's_'.$section_id.'_pid_'.$problem_id
	 */
	private function getProblemId($pid)
	{
		$temp_ids = explode('_pid_', $pid);
	
		$problem_id = $temp_ids[1];
	
		return (int)$problem_id;
	}
	
	/**
	 * Method to get the response by PID
	 * @param string $pid input id <$sectionId + _pid_ $problemId>
	 * @return array
	 */
	private function getFormInput($pid)
	{
		$input = $this->input;
		$problemInput = $input->get('problems',array(),'array');
		
		if (!is_array($problemInput[$pid]['user_response']))
		{
			return $this->getCleanString($problemInput[$pid]['user_response']);
		}
		else 
		{
			return $this->getCleanArray($problemInput[$pid]['user_response']);
		}
	}
	
	/**
	 * Method to get a filtered string response as array
	 * @param string $pid input id <$sectionId + _pid_ $problemId>
	 * @return array
	 */
	private function getCleanString($response)
	{
		$response = $this->filter->clean($response,'STRING');
		
		if(empty($response))
		{
			$response = JText::_('COM_BABELU_EXAMS_NO_RESPONSE');
		}
		
		return (array)$response;
	}
	
	/**
	 * Method to get a filtered array of responses
	 * @param string $pid input id <$sectionId + _pid_ $problemId>
	 * @return array
	 */
	private function getCleanArray($response)
	{
		foreach ($response AS $i => $source)
		{
			$response[$i] = $this->filter->clean($source, 'STRING');
		}
		return $response;

	}
	
	private function getMarker($pid)
	{
		$input = $this->input;
		$problems = $input->get('problems',array(),'array');
		$marker = $this->filter->clean($problems[$pid]['marker'], 'int');
		return $marker;
	}
}
