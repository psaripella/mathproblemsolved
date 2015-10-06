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

class Babelu_examsSpecificationLimit extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_ERROR_RETAKE_LIMIT_REACHED';

	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		$attempts = $exam->state->getSetting('attempts', 0);
		if ($attempts ==  0)
		{
			return true; // never attempted
		}
		
		$retake_limit = $exam->getSetting('retake_limit', 0);
		if ($retake_limit == 0)
		{
			return true; // unlimited retakes
		}
		
		if($retake_limit > $attempts)
		{
			return true; //  has not exceeded limit
		}

		return false; // has exceeded limit
	}
}