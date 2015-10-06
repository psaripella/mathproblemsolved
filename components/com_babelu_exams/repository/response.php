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

class Babelu_examsRepositoryResponse extends Babelu_examsRepositoryBase
{
	public $error = 0;
	
	/**
	 * Method to save response record to the s_response table
	 * @param Babelu_examsEntityResponse $response
	 */
	public function savePausedResponse(Babelu_examsEntityResponse $response)
	{	
		$parent_id = $response->getSetting('parent_id');
		$section_id = $response->getSetting('section_id');
		$problem_id = $response->getSetting('problem_id');
		$user_response = $response->getUserResponse();
		$marked = $response->getSetting('marked', false);

		$mapper = $this->getMapper('response');
		
		if (!$mapper->savePausedResponse($parent_id, $section_id, $problem_id, $user_response, $marked))
		{
			$this->error++;
		}
	}
	
	/**
	 * Method to save response record to r_response table
	 * @param Babelu_examsEntityResponse $response
	 */
	public function saveResultResponse(Babelu_examsEntityResponse $response)
	{
		$parent_id = $response->getSetting('parent_id');
		$section_id = $response->getSetting('section_id');
		$problem_id = $response->getSetting('problem_id');
		$user_response = $response->getUserResponse();
		$status = $response->getSetting('status', 0);
		$marked = $response->getSetting('marked', false);
		
		$mapper = $this->getMapper('response');
	
		if (!$mapper->saveResultResponse($parent_id, $section_id, $problem_id, $user_response, $status, $marked))
		{
			$this->error++;
		}
	}
	
	public function updateResultResponse(Babelu_examsEntityProblem $problem)
	{
		$response_id = $problem->getSetting('response_id');
		$status = $problem->getSetting('status', 0);
		$comment = $problem->getSetting('comment', '');
		
		$mapper = $this->getMapper('response');
		
		$mapper->updateResultResponse($response_id, $status, $comment);
	}
}