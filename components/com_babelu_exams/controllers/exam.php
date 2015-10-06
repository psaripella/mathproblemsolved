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

class Babelu_examsControllerExam extends Babelu_examsControllerBase
{
	protected $view;
	protected $spec;
	
	public function __construct($config)
	{
		$config['default_view'] = 'exam';
		parent::__construct($config);
		
		$specFactory = new Babelu_examsSpecificationFactory();
		$spec = $specFactory->getSpecification(array('access', 'published','limit','cooldown','open','closed','sections'));
		
		//allows plug-ins to add specifications around the standard specifications 
		$dispatcher = JDispatcher::getInstance();
		$results = $dispatcher->trigger('OnBeforeSetSpecification', array($spec));
		
		$this->spec = $spec;
	}
	
	/**
	 * Method to start a new exam
	 */
	public function start()
	{
		$document = JFactory::getDocument();
		$viewType = $document->getType();
		
		$this->view = $this->getView('Exam', $viewType, ucfirst($this->name).'View', $this->getViewConfig());
		$model = $this->getModel('ExamNew', ucfirst($this->name).'Model');
		$exam = $model->getExam();
		
		if ($exam->hasSave())
		{
			$model->clearSave($exam->getSetting('save_id'));
			$exam->setSetting('time_spent', 0);
		}
		
		//check the specification
		if(!$this->spec->satisfiedBy($exam))
		{
			$this->abortExam($exam->getMsg());
		}
		else 
		{
			$model->updateState();
			$this->view->setModel($model, true);
			$this->display();
		}
		
	}
	
	/**
	 * Method to resume a paused exam
	 */
	public function resume()
	{
		$document = JFactory::getDocument();
		$viewType = $document->getType();
	
		$this->view = $this->getView('Exam', $viewType, ucfirst($this->name).'View', $this->getViewConfig());
		$model = $this->getModel('ExamResume', ucfirst($this->name).'Model');
		$exam = $model->getExam();
		$model->attachProblems();
	
	
		if ($exam->hasSave() && !$exam->allowMultiSave())
		{
			$model->clearSave($exam->getSetting('save_id'));
		}
	
		if (!$exam->allowMultiSave())
		{
			$exam->setSetting('savable', 0);
		}
	
		$exam->state->subtractAttempt();
		if(!$this->spec->satisfiedBy($exam))
		{
			$this->abortExam($exam->getMsg());
		}
		else
		{
			$this->view->setModel($model, true);
			$this->display();
		}
	
	}

	/**
	 * Method to pause the exam
	 */
	public function pause()
	{
		$this->validateSession();
		$this->refreshToken();
		
		$model = $this->getModel('ExamPause', 'Babelu_examsModel');
		
		$exam = $model->getExam();
		
		if (!$exam->isSavable())
		{
			$msg = JText::_('COM_BABELU_EXAMS_ERROR_SAVE_PROHIBITED');
			$this->abortExam($msg);
		}
		
		if ($exam->hasSave())
		{
			$resumeModel = $this->getModel('ExamResume', 'Babelu_examsModel');
			$resumeModel->clearSave($exam->getSetting('save_id'));
		}
		
		if ($model->pause())
		{
			$msg = JText::_('COM_BABELU_EXAM_PAUSE_EXAM_SUCCESS');
			$id = JFactory::getApplication()->input->get('id',null,'INT');
			$this->setRedirect(JRoute::_('index.php?option=com_babelu_exams&view=detail&id='.$id),$msg);
		}
		else
		{
			$msg = JText::_('COM_BABELU_EXAMS_ERROR_SAVE_FAILED');
			$this->abortExam($msg);
		}
	}
	

	/**
	 * Method to submit the exam
	 */
	public function submit()
	{
		$this->validateSession();
		$this->refreshToken();
		
		$model = $this->getModel('ExamSubmit', 'Babelu_examsModel');
		
		$exam = $model->getExam();
		$msg = null;
		if ($model->submit())
		{
			if ($exam->hasSave())
			{
				$resumeModel = $this->getModel('ExamResume', 'Babelu_examsModel');
				$resumeModel->clearSave($exam->getSetting('save_id'));
			}

			$this->setRedirect(JRoute::_(Babelu_examsHelperBabelu_exams::getGradeLink($exam->getSetting('result_id'))));
		}
		else
		{
			$msg = 'COM_BABELU_EXAMS_ERROR_RESULT_SAVE_FAILED';
			$this->abortExam($msg);
		}
	}
	
	/**
	 * Method to abort an exam attempt.
	 * msg is translated using JText
	 * @param string $msg JText constant key
	 * @example $msg = COM_BABELU_EXAMS_SOME_MESSAGE_KEY
	 */
	private function abortExam($msg)
	{
		$this->task = null;
		$app = JFactory::getApplication();
		$id = $app->input->get('id',0,'int');
		if($id == 0)
		{ 
			$this->setRedirect(JRoute::_('index.php'), JText::_($msg), 'error');
		}
		else
		{
			$this->setRedirect(JRoute::_('index.php?option=com_babelu_exams&view=detail&id='.(int)$id),JText::_($msg),'error');
		}
		$this->redirect();
	}
	
}