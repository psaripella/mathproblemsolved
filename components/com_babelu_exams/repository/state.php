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

class Babelu_examsRepositoryState extends Babelu_examsRepositoryBase
{
	/**
	 * Method to get an exam state entity.
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @param string $context mapper context string
	 * @return Babelu_examsEntityState
	 */
	public function getState($exam_id, $user_id)
	{
		$mapper = $this->getMapper('State');
		$state = new Babelu_examsEntityState($mapper->getState($exam_id, $user_id));
		
		if (!$state->hasSettings())
		{
			$state = $this->createState($exam_id, $user_id);
		}
		
		return $state;
	}
	
	/**
	 * Method to create an exam state
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @return Babelu_examsEntityState
	 * @throws ErrorException if creation failed
	 */
	public function createState($exam_id, $user_id)
	{
		$mapper = $this->getMapper('State');
		if (!$mapper->createState($exam_id, $user_id))
		{
			throw ErrorException('Unable to create exam state');
		}
		
		return new Babelu_examsEntityState($mapper->getState($exam_id, $user_id));
	}
	
	/**
	 * Method to persist the exam state
	 * @param Babelu_examsEntityState $state
	 * @return boolean
	 * @throws ErrorException if update failed 
	 */
	public function updateState(Babelu_examsEntityState $state)
	{
		
		$id = $state->getSetting('id', 0);
		$attempts =  $state->getSetting('attempts', 0);
		$retakable_date = $state->getSetting('retakable_date', '0000-00-00 00:00:00');
		
		$mapper = $this->getMapper('State');
		if(!$mapper->updateState($id, $attempts, $retakable_date))
		{
			throw ErrorException('Unable to update exam state');
			return false;
		}
		return true;
	}
}