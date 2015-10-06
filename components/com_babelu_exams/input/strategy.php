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

class Babelu_examsInputStrategy
{
	/**
	 * Static method to get a input type renderer
	 * @param unknown_type $section
	 * @return Ambigous <NULL, Babelu_examsShortEssayType>
	 */
	static public function getExamInputType($settings)
	{
		$renderer = null;
		switch ($settings->input_type)
		{
			case 0: $renderer = new Babelu_examsInputMultipleChoice($settings); break;
			case 1: $renderer = new Babelu_examsInputMultipleAnswer($settings); break;
			case 2: $renderer = new Babelu_examsInputShortAnswer($settings); break;
			case 3: $renderer = new Babelu_examsInputShortEssay($settings); break;
		}
		return $renderer;
	}
}
