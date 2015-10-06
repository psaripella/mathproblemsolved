<?php
/**
 * @version     1.2.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

class Babelu_examsControllerResult extends Babelu_examsControllerBase
{
	public function __construct($config = array())
	{
		parent::__construct($config);
		
		$app = JFactory::getApplication();
		$params	= $app->getParams();
		$model = $this->getModel('ExamResult', 'Babelu_examsModel');
		$exam = $model->getExam();
		
		if ($params->get('showReviews') == 0)
		{
			$url = Babelu_examsHelperBabelu_exams::getDetailsLink($exam->getSetting('id'));
			$msg = JText::_('COM_BABELU_EXAMS_ERROR_REVIEWS_DISABLED');
			$this->setRedirect(JRoute::_($url),$msg, 'warning');
			$this->redirect();
		}
		
		$vFormat = JFactory::getDocument()->getType();
		$view = $this->getView('Result',$vFormat);
		$model = $this->getModel('ExamResult','Babelu_examsModel');
		$view->setModel($model, true);
		$this->view = $view;
	}
}