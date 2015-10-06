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

class Babelu_examsRepositoryExam extends Babelu_examsRepositoryBase
{	
	/**
	 * Method to get an exam entity
	 * @param int $exam_id primary key
	 * @return Babelu_examsEntityExam
	 */
	public function getExam($exam_id)
	{
		$mapper = $this->getMapper('Exam');
		$exam = new Babelu_examsEntityExam($mapper->getExam($exam_id));
		return $exam;
	}
	
	/**
	 * Method to get the exam with associated result data
	 * @param int $result_id foreign key
	 * @return Babelu_examsEntityExam
	 */
	public function getExamWithResult($result_id)
	{
		$mapper = $this->getMapper('Exam');
		$exam = new Babelu_examsEntityExam($mapper->getExamWithResult($result_id));
		return $exam;
	}
	
	/**
	 * Method to get an exam with saved data
	 * @param int $exam_id primary key
	 * @param int $user_id foreign key
	 * @return Babelu_examsEntityExam
	 */
	public function getExamWithSave($exam_id, $user_id)
	{
		$mapper = $this->getMapper('Exam');
		$exam = new Babelu_examsEntityExam($mapper->getExamWithSave($exam_id, $user_id));
		return $exam;
	}
}