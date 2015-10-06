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

class Babelu_examsControllerSubmission extends JControllerLegacy
{
	public function __construct($config = array())
	{
		$input = JFactory::getApplication()->input;
		
		if (!Babelu_examsHelperActions::canGrade('com_babelu_exams.exam.'.$input->get('id',0,'int')))
		{
			$input = JFactory::getApplication()->input;
			$input->set('task', '');
			$input->set('view', '');
				
			$url = 'index.php?option=com_babelu_exams&view=categories';
			$msg = JText::_('COM_BABELU_EXAMS_ERROR_GRADING_NOT_ALLOWED');
			$this->setRedirect(JRoute::_($url, false),$msg,'error');
			$this->redirect();
		}
		
		$config['default_view'] = 'submission';
		parent::__construct($config);
	}
}