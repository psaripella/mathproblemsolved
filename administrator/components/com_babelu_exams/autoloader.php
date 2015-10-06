<?php
/**
 * @version     1.8.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;

function babeluAutoload($class)
{
	$flags = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE;
	$directoryArray = preg_split('/(?=[A-Z])/', $class, null, $flags);
	$fileName = $directoryArray[(count($directoryArray) - 1)];
	array_shift($directoryArray);
	
	$path_to_file = DIRECTORY_SEPARATOR;
	foreach ($directoryArray AS $dir)
	{
		if ($dir != $fileName)
		{
			switch ($dir)
			{
				case 'Asset':
				case 'Controller':
				case 'Helper':
				case 'Model':
				case 'Table':
				case 'View':
					$dir = $dir.'s';
				break;
				default: // does nothing
					break;
			}
			
			$path_to_file .= strtolower($dir).DIRECTORY_SEPARATOR;
		}
	}
	
	$fileName = strtolower($fileName);
	
	$app = JFactory::getApplication();
	
	
	$includePath = JPATH_COMPONENT.$path_to_file.$fileName.'.php';
	
	if ($app->isSite())
	{
		$secondaryInclude = JPATH_COMPONENT_ADMINISTRATOR.$path_to_file.$fileName.'.php';
	}
	else 
	{
		$secondaryInclude = JPATH_COMPONENT_SITE.$path_to_file.$fileName.'.php';
	}
	
	if (file_exists($includePath))
	{
		require_once ($includePath);
	}
	elseif (file_exists($secondaryInclude)) 
	{
		require_once $secondaryInclude;
	}

	return true;
}


class Babelu_examsAutoloader
{
	public static function autoload($class)
	{
		babeluAutoload($class);
	}
}

spl_autoload_register(array('babelu_examsautoloader','autoload'));