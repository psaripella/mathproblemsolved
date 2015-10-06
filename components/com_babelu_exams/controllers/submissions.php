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

class Babelu_examsControllerSubmissions extends JControllerLegacy
{
	public function __construct($config = array())
	{
		if (!Babelu_examsHelperActions::canGrade('com_babelu_exams'))
		{
			$input = JFactory::getApplication()->input;
			$input->set('task', null);
			$input->set('view', null);
			
			$url = 'index.php?option=com_babelu_exams&view=categories';
			$msg = JText::_('COM_BABELU_EXAMS_ERROR_GRADING_NOT_ALLOWED');
			$this->setRedirect(JRoute::_($url, false),$msg,'error');
			$this->redirect();
		}
		
		$config['default_view'] = 'submissions';
		parent::__construct($config);
	}
}