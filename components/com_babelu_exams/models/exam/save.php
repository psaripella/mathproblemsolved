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
class Babelu_examsModelExamSave extends JModelLegacy
{
	/**
	 * Exam entity
	 * @var Babelu_examsEntityExam
	 */
	protected $exam;
	
	/**
	 * Method to get an exam entity
	 * @return Babelu_examsEntityExam
	 */
	public function getExam()
	{
		if (!isset($this->exam))
		{
			$input = JFactory::getApplication()->input;
			$exam_id =$input->get('id', 0, 'int');
			$user_id = JFactory::getUser()->id;
			$examRepository = new Babelu_examsRepositoryExam('joomla');
			$exam = $examRepository->getExamwithSave($exam_id, $user_id);
	
			if (!$exam->hasSettings())
			{
				$exam->setSetting('id', $exam_id);
			}

			$this->exam = $exam;
		}
	
		return $this->exam;
	}
	
	protected function getTimeSpent()
	{
		$app = JFactory::getApplication();
		$input = $app->input;
		$examStart = new JDate($input->get('exart', 0,'int'));
		$submissionStart = new JDate();
		$time_spent = ($submissionStart->toUnix() - $examStart->toUnix());
		return $time_spent;
	}
}