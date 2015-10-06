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

class Babelu_examsViewResults extends JViewLegacy
{
	protected $results;
	protected $exam;

	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$params	= $app->getParams();
		$this->assignRef('params',$params);

		$this->exam = $this->get('Exam');
		$this->results = $this->get('Results');
	
        parent::display($tpl);
	}
}