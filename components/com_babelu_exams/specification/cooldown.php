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

class Babelu_examsSpecificationCooldown extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_ERROR_RETAKE_DELAY';

	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		$retake_delay = $exam->getSetting('retake_delay', 0);
		if ($retake_delay == 0)
		{
			return true; // no cooldown
		}
		
		$retakable = new JDate($exam->state->getSetting('retakable_date', '0000-00-00 00:00:00'));
		$today = new JDate();

		if ($retakable->toUnix() < $today->toUnix())
		{
			return true; // cooldown expired
		}
		
		return false; // in cooldown
	}
}