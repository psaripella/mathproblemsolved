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

class Babelu_examsModelExamResult extends Babelu_examsModelExamBase
{
	/**
	 * Method to get an exam entity from the database
	 * Also loads the State and Sections for the exam
	 * @return Babelu_examsEntityExam
	 */
	public function getExam()
	{
		if (!isset($this->exam))
		{
			$result_id = JFactory::getApplication()->input->get('id');
			$user_id = JFactory::getUser()->id;
				
			$examRepository = new Babelu_examsRepositoryExam('joomla');
			$this->exam = $examRepository->getExamWithResult($result_id);
	
			$this->prepareExam();
		}
	
		return $this->exam;
	}
	
	/**
	 * Method to attach problems to each section
	 */
	public function attachProblems()
	{
		$problemRepository = new Babelu_examsRepositoryProblem('joomla');
		$parent_id = $this->exam->getSetting('result_id');
	
		foreach ($this->exam->getSections() AS $section)
		{
			if (!$section->hasProblems())
			{
				$section->attachProblems($problemRepository->getProblemsWithResponses('result', $parent_id, $section->getSetting('id')));
			}
		}
	}
}
