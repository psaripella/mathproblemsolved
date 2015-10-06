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

/**
 * Decorator pattern used for advanced access control
 */
abstract class Babelu_examsSpecificationBase
{
	protected $spec;
	protected $msg;
	
	public function __construct(Babelu_examsSpecificationBase $spec = null)
	{
		$this->spec = $spec;
	}
	
	/**
	 * Method to check if the current exam meets the specification
	 * @param Babelu_examsEntityExam $exam
	 * @return boolean
	 */
	public function satisfiedBy(Babelu_examsEntityExam $exam)
	{
		if (isset($this->spec))
		{
			if (!$this->spec->satisfiedBy($exam))
			{
				return false;
			}
		}
		
		if (!$this->checkSpec($exam))
		{
			$exam->setMsg($this->msg);
			return false;
		}
		
		return true;
	}
	
	/**
	 * Method to check against a specific condition
	 * @param Babelu_examsEntityExam $exam
	 * @return boolean
	 */
	abstract protected function checkSpec(Babelu_examsEntityExam $exam);
}