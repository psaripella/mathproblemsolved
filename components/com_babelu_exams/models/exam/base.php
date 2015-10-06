<?php
/**
 * @version     1.8.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

abstract class Babelu_examsModelExamBase extends JModelLegacy
{
	/**
	 * Exam entity
	 * @var Babelu_examsEntityExam
	 */
	protected $exam;
	
	public function __construct($config)
	{
		parent::__construct($config);
	}
	
	/**
	 * Method to get an exam entity from the database
	 * Also loads the State and Sections for the exam
	 * @return Babelu_examsEntityExam
	 */
	public function getExam()
	{
		if (!isset($this->exam))
		{
			$exam_id = JFactory::getApplication()->input->get('id');
			$user_id = JFactory::getUser()->id;
			
			$examRepository = new Babelu_examsRepositoryExam('joomla');
			$this->exam = $examRepository->getExamWithSave($exam_id, $user_id);
		
			$this->prepareExam();
		}
		
		return $this->exam;
	}
	
	/**
	 * Method to prepare the exam depending on where it's being used
	 */
	protected function prepareExam()
	{
		$exam_id = $this->exam->getSetting('id');
		$user_id = JFactory::getUser()->id;
		
		$stateRepository = new Babelu_examsRepositoryState('joomla');
		$this->exam->state = $stateRepository->getState($exam_id, $user_id);
			
		$sectionRepository = new Babelu_examsRepositorySection('joomla');
		$sections = $sectionRepository->getSections($exam_id);
			
		$this->exam->attachSections($sections);
	}
	
	/**
	 * Method to delete a save record
	 * @param int $save_id primary key
	 */
	public function clearSave($save_id)
	{
		$saveRepository = new Babelu_examsRepositorySave('joomla');
		$saveRepository->deleteSavedExam($save_id);
	}
	
	/**
	 * Method to attach problems to each section
	 */
	abstract public function attachProblems();

}