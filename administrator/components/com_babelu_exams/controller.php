<?php
/**
 * @version     1.10.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsController extends JControllerLegacy
{
	public function display($cachable = false, $urlparams = false)
	{		
		$view = JFactory::getApplication()->input->getCmd('view', 'exams');
        $input = JFactory::getApplication()->input;
        $input->set('view', $view);
        
        
        if ($view == 'grades' && !(Babelu_examsHelperActions::canGrade('com_babelu_exams')))
        {
        	$url = 'index.php?option=com_babelu_exams&view=results';
        	$msg = JText::_('COM_BABELU_EXAMS_ERROR_GRADING_NOT_ALLOWED');
        	$this->setRedirect(JRoute::_($url),$msg, 'warning');
        	$this->redirect();
        }
        
		parent::display($cachable, $urlparams);
		return $this;
	}
}
