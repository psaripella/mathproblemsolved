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

class Babelu_examsControllerGrade extends Babelu_examsControllerBase
{
	/**
	 * Grade model
	 * @var Babelu_examsModelGrade
	 */
	protected $model;
	
	public function __construct($config)
	{
		$config['default_view'] = 'results';
		$config['default_task'] = 'grade';
		parent::__construct($config);
	}
	
	/**
	 * Method to grade the exam, notify any users and redirect to results
	 */
	public function grade()
	{
		$this->model = $this->getModel('ExamGrader', 'Babelu_examsModel');
		
		$exam = $this->model->getExam();
		
		if ($exam->isAutoGraded())
		{
			$this->model->grade();
			$dispatcher = JDispatcher::getInstance();
			$results = $dispatcher->trigger('OnAfterComputerizedGrading', array($exam));
		}
		
		if ($exam->shouldNotify())
		{
			$this->doNotify();
		}
		
		$msg = JText::_('COM_BABELU_EXAMS_EXAM_SUBMITTED_SUCCESSFULLY');
		$this->setRedirect(JRoute::_(Babelu_examsHelperBabelu_exams::getResultsLink($exam->getSetting('id'))),$msg);
		
	}

	
	/**
	 * Method to send notifications
	 */
	private function doNotify()
	{
		$notifyModel = $this->getModel('Notify', 'Babelu_ExamsModel');
		$exam = $this->model->getExam();
		$notifyModel->notify($exam);
	}
	
	public function save()
	{
		$this->validateSession();
		
		$this->model = $this->getModel('ExamGrader', 'Babelu_examsModel');
		$this->model->manualGrade();
		
		$exam = $this->model->getExam();
		$dispatcher = JDispatcher::getInstance();
		$results = $dispatcher->trigger('OnAfterManualGrading', array($exam));
		
		$input = JFactory::getApplication()->input;
		$notifyGrade = $input->get('notify_user_grade', 0, 'int');
		$notifyComment = $input->get('notify_user_comment', 0, 'int');
	
		$notifyModel = $this->getModel('Notify', 'Babelu_ExamsModel');
		$result_id = $input->get('id', null, 'int');
		
		$notifyModel->notifyExaminee($result_id, $notifyGrade, $notifyComment);
		
		$msg = JText::_('COM_BABELU_EXAMS_EXAM_GRADED_SUCCESSFULLY');
		$url = Babelu_examsHelperBabelu_exams::getSubmissionsLink();
		$this->setRedirect(JRoute::_($url),$msg);
	}
}