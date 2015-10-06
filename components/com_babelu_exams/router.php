<?php
/**
 * @version     1.9.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Method to build the route segments array.
 * Presented order is option, view, id, task 
 * @param array $query
 * @return multitype:mixed
 */
function Babelu_examsBuildRoute(&$query)
{
	$segments = array();
	
	if (isset($query['view']))
	{
		$segments[] = $query['view'];
		unset($query['view']);
	}
	
	if (isset($query['task']))
	{
		$segments[] = $query['task'];
		unset($query['task']);
	}
	
	if (isset($query['id']))
	{
		$segments[] = $query['id'];
		unset($query['id']);
	}
	return $segments;
}


function Babelu_examsParseRoute($segments)
{
	$query = array();
	$view = array_shift($segments);
	$query['view'] = $view;
	
	$count = count($segments);
	
	if ($count)
	{
		$count--;
		$segment = array_shift($segments);
		
		if (is_numeric($segment))
		{ 
			$query['id'] = $segment; 
		} 
		else
		{ 
			$query['task'] = $segment; 
		}
	}
	
	if ($count)
	{
		$count--;
		$segment = array_shift($segments) ;
		if (is_numeric($segment)) 
		{ 
			$query['id'] = $segment; 
		}
	}
	return $query;
}