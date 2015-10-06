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

class Babelu_examsSpecificationOpen extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_ERROR_EXAM_PERIOD_NOT_OPEN';

	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		$nullDate = JFactory::getDBO()->getNullDate();
		$canTakeFrom = $exam->getSetting('can_take_from', $nullDate);
		
		if ($canTakeFrom == $nullDate)
		{
			return true; //not scheduled
		}
		
		$openingDate = new JDate($canTakeFrom);
		$today = new JDate();
		
		if ($openingDate->toUnix() < $today->toUnix())
		{
			return true; // is open
		}

		return false; // is not open
	}
}