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

class Babelu_examsRepositorySave extends Babelu_examsRepositoryBase
{
	/**
	 * Method to delete a save record and dependant s_responses 
	 * @param int $save_id primary key
	 * @return boolean
	 * @throws ErrorException
	 */
	public function deleteSavedExam($save_id)
	{
		$mapper = $this->getMapper('Save');
		return $mapper->deleteSavedExam($save_id);
	}
	
	/**
	 * Method to create a save record for the exam
	 * @param Babelu_examsEntityExam $exam
	 * @return boolean
	 */
	public function createSave(Babelu_examsEntityExam $exam)
	{
		$exam_id = $exam->getSetting('id');
		$user_id = $exam->getSetting('user_id');
		$time_spent = $exam->getSetting('time_spent', 0);
		$creation_date = $exam->getSetting('creation_date'); 
		
		$mapper = $this->getMapper('Save');
		$insert_id = $mapper->createSave($exam_id, $user_id, $time_spent, $creation_date);
		
		if ($insert_id) 
		{
			$exam->setSetting('save_id', $insert_id);
			return true;
		}
		return false;
	}
}
