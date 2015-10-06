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

class Babelu_examsViewResult extends JViewLegacy
{
	protected $exam;
	protected $result;
	
	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$params		= $app->getParams();
		$this->assignRef('params',$params);
		
		$model = $this->getModel();
		$this->exam = $model->getExam();
		$model->attachProblems();
		
		
		
		$document = JFactory::getDocument();	
		$document->title = $this->exam->getSetting('title').':'.JText::_('COM_BABELU_EXAMS_RESULTS');
		
        parent::display($tpl);
	}
}