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

class Babelu_examsSpecificationPublished extends Babelu_examsSpecificationBase
{
	protected $msg = 'COM_BABELU_EXAMS_ERROR_EXAM_HAS_BEEN_UNPUBLISHED';
	
	protected function checkSpec(Babelu_examsEntityExam $exam)
	{
		if($exam->isPublished())
		{
			return true; // is published
		}
	
		return false; // is not published
	}
}