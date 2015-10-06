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

class Babelu_examsSpecificationClosed extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_ERROR_EXAM_PERIOD_CLOSED';

	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		$nullDate = JFactory::getDBO()->getNullDate();
		$canTakeUntil = $exam->getSetting('can_take_until', $nullDate);

		if ($canTakeUntil == $nullDate)
		{
			return true; //not scheduled
		}

		$closingDate = new JDate($canTakeUntil);
		$today = new JDate();

		if ($closingDate->toUnix() > $today->toUnix())
		{
			return true; // is open
		}

		return false; // is closed
	}
}