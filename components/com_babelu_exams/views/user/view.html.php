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

class Babelu_examsViewUser extends JViewLegacy
{
	protected $results_list;
	protected $saves_list;

	function display($tpl = null)
	{
		$app		= JFactory::getApplication();
		$params		= $app->getParams();
		$this->assignRef('params',$params);
		
		$this->results_list = $this->get('ResultsList');
		$this->saves_list = $this->get('SavesList');
		
		parent::display($tpl);
	}
}