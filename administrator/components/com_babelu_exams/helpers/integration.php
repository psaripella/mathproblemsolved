<?php
/**
 * @version     1.10.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsHelperIntegration
{
	public static function isJ3()
	{
		$jversion = new JVersion();
		$version = (int)$jversion->RELEASE;
		if ($version >= 3 AND $version < 4) 
		{ 
			return true; 
		}
		else 
		{ 
			return false; 
		}
	}
}