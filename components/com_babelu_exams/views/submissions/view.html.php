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

class Babelu_examsViewSubmissions extends JViewLegacy
{
	protected $results;
	
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$this->params = $app->getParams();
	
		$this->results = $this->get('PendingResults');
	
		parent::display($tpl);
	}
}