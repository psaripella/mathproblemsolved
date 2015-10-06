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

class Babelu_examsSpecificationData extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_EXAM_NOT_FOUND';
	
	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		if($exam->hasSettings())
		{
			return true; // does have data
		} 
		
		return false; // does not have data
	}
}