<?php
/**
 * @version     1.2.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

class Babelu_examsModelSubmission extends Babelu_examsModelExamResult
{	
	/**
	 * Method to prepare the exam depending on where it's being used
	 */
	protected function prepareExam()
	{
		parent::prepareExam();
		
		// attach the problems
		$this->attachProblems();
	}
}