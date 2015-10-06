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

class Babelu_examsRepositoryResult extends Babelu_examsRepositoryBase
{
	/**
	 * Method to get a result entity
	 * @param int $result_id primary key
	 * @return Babelu_examsEntityResult
	 */
	public function getResult($result_id)
	{
		$mapper = $this->getMapper('Result');
		$result = new Babelu_examsEntityResult($mapper->getResult($result_id));
		return  $result;
	}
	
	/**
	 * Method to create a results record for the exam
	 * @param Babelu_examsEntityExam $exam
	 * @return boolean
	 */
	public function createResult(Babelu_examsEntityExam $exam)
	{
		$exam_id = $exam->getSetting('id');
		$user_id = $exam->getSetting('user_id');
		$time_spent = $exam->getSetting('time_spent', 0);
		$creation_date = $exam->getSetting('creation_date');
		$point_grade = $exam->getSetting('point_grade', 0);
		$percentage_grade = $exam->getSetting('percentage_grade', 0);
		$status = $exam->getSetting('status', 0);
	
		$mapper = $this->getMapper('Result');
		$insert_id = $mapper->createResult($exam_id, $user_id, $creation_date, $time_spent, $point_grade, $percentage_grade, $status);
	
		if ($insert_id)
		{
			$exam->setSetting('result_id', $insert_id);
			return true;
		}
		return false;
	}
	
	public function updateResult(Babelu_examsEntityExam $exam)
	{
		$result_id = $exam->getSetting('result_id');
		$point_grade = $exam->getSetting('point_grade', 0);
		$percentage_grade = $exam->getSetting('percentage_grade', 0);
		$status = $exam->getSetting('status', 0);
		
		$mapper = $this->getMapper('Result');
		$mapper->updateResult($result_id, $point_grade, $percentage_grade, $status);
	}
	
	/**
	 * Method to get the most recent result
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @return Babelu_examsEntityResult
	 */
	public function getMostRecentResult($exam_id, $user_id)
	{
		$mapper = $this->getMapper('Result');
		$result = new Babelu_examsEntityResult($mapper->getMostRecentResult($exam_id, $user_id));
		return $result;
	}
	
	/**
	 * Method to delete older results if the maximum has been exceeded
	 * @param int $exam_id foreign key
	 * @param int $user_id foreign key
	 * @param int $max max allowable records
	 */
	public function adjustMaxResults($exam_id, $user_id, $max)
	{
		$mapper = $this->getMapper('Result');
		$resultCount = $mapper->getResultCount($exam_id, $user_id);
		
		if ($max != 0 && $resultCount > $max)
		{
			$count = $resultCount - $max;
			$mapper->deleteOldestResult($exam_id, $user_id, $count);
		}
	}
}