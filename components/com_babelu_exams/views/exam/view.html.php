<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.view');

class Babelu_examsViewExam extends JViewLegacy
{
	/**
	 * Exam entity
	 * @var Babelu_examsEntityExam
	 */
	protected $exam;

	function display($tpl = null)
	{
		$model = $this->getModel();
		$exam = $model->getExam();
		$model->attachProblems();
		
		$this->exam = $exam;
		
		if ($exam->getSetting('display_option', 'default') != 'default')
		{
			$this->setLayout($exam->getSetting('display_option'));
		}
		
		$app		= JFactory::getApplication();
		$params		= $app->getParams();
		$this->assignRef('params',$params);

		$document  = JFactory::getDocument();
		$document->title = $this->exam->getSetting('title');
		parent::display($tpl); 
	}
	
}