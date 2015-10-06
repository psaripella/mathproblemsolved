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

jimport('joomla.application.component.view');

class Babelu_examsViewSubmission extends JViewLegacy
{
	protected $exam;
	
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$this->params = $app->getParams();
	
		$this->exam = $this->get('Exam');
	
		parent::display($tpl);
	}
}