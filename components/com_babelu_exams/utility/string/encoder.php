<?php
/**
 * @version     1.2.0
 * @package    com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

defined('_JEXEC') or die;

class Babelu_examsUtilityStringEncoder
{
	private $delimiter;
	
	public function __construct($delimiter = '|')
	{
		$this->delimiter = (string)$delimiter;
	}
	
	public function decode($encodedString)
	{
		$explodedValues = explode($this->delimiter, $encodedString);
		//Make sure we return an array
		$valuesCastAsArray = (array)$explodedValues;
		return $valuesCastAsArray;
	}
	
	public function encodeArrayToString($arrayToEncode)
	{
		if (!is_array($arrayToEncode)){/* then just return to sender */ return $arrayToEncode;}
		$encodedString = '';
		foreach ($arrayToEncode AS $value)
		{
			if ($encodedString == ''){ $encodedString = $value;}
			else { $encodedString .= $this->delimiter.$value;}
		}	
		return $encodedString;
	}
}
