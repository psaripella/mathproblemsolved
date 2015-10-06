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

class Babelu_examsSpecificationAccess extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_ERROR_ATTEMPTING_TO_ACCESS_RESTRICTED_CONTENT';
	
	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		$user = JFactory::getUser();
		
		if ($user->guest) 
		{
			$this->msg .= '_LOGIN_REQUIRED';
		}
		
		if (in_array($exam->getSetting('access'), $user->getAuthorisedViewLevels()))
		{
			return true; // does have access
		}
		
		return false; // does not have access
	}
}