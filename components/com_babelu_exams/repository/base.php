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

class Babelu_examsRepositoryBase
{	
	/**
	 * Database Mapper Context
	 * @var string
	 */
	protected $context;
	
	/**
	 * Repository constructor
	 * 
	 * Format <'Babelu_examsMapper'.$context.$name>
	 * $context = 'joomla' & $name = 'exam' would produce $className = Babelu_examMapperJoomlaExam 
	 * @param string $context used to initialize mapper 
	 */
	public function __construct($context)
	{
		$this->context = $context;
	}
	
	/**
	 * Method to get a Babelu_examsMapper class
	 * 
	 * Format <'Babelu_examsMapper'.$context.$name>
	 * $context = 'joomla' & $name = 'exam' would produce $className = Babelu_examMapperJoomlaExam
	 * @param string $name
	 * @return mixed
	 */
	protected function getMapper($name)
	{
		$mapper = 'Babelu_examsMapper'.ucfirst($this->context).ucfirst($name);
		return new $mapper();
	}
}