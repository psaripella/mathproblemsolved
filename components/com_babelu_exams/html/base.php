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

abstract class Babelu_examsHtmlBase
{	
	/**
	 * Associate array of properties
	 * @var array
	 */
	protected $properties = array();
	
	/**
	 * Associate array of classNames
	 * @var array
	 */
	protected $classes = array();
	
	/**
	 * Element innerHtml
	 * @var string
	 */
	protected $innerHtml = '';

	public function __construct($properties = array(), $classes = array())
	{
		foreach ($properties AS $name => $value)
		{
			if (!is_numeric($name))
			{
				$this->addProperty($name, $value);
			}
		}
		
		foreach($classes AS $className)
		{
			$this->addClass($className);
		}
	}
	
	/**
	 * Method to escape HTML special characters.
	 * Also trims whitespace from the string
	 * @param string $string to escape
	 * @return string
	 */
	protected function escape($string)
	{
		$value = htmlspecialchars(trim($string), ENT_COMPAT, 'UTF-8', false);
		return $value;
	}
		
	/**
	 * Method to add properties to the element.
	 * Note class will be ignored please use addClass() instead
	 * @param string $name
	 * @param mixed string or value $value
	 * @return $this to allow chaining
	 */
	public function addProperty($name, $value)
	{
		if ($name != 'class')
		{
			$this->properties[$this->escape($name)] = $this->escape($value);
		}
		
		return $this;
	}
	
	/**
	 * Method to remove properties
	 * @param string $name
	 */
	public function removeProperty($name)
	{
		unset($this->properties[$name]);
	}
	
	/**
	 * Method to get the properties in $name="$value" formate
	 * @return string
	 */
	protected function getProperties()
	{
		$properties ='';
		foreach ($this->properties AS $name => $value)
		{
			$properties .=' '.$name.'="'.$value.'"';
		}
		return $properties;
	}
	
	/**
	 * Method to add css classes to the input
	 * @param string $className
	 * @return $this to allow for chaining
	 */
	public function addClass($className)
	{
		$this->classes[$className] = $this->escape($className);
		return $this;
	}
	
	/**
	 * Method to remove css classes from the input
	 * @param string $className
	 */
	public function removeClass($className)
	{
		unset($this->classes[$className]);
	}
	
	/**
	 * Method to get the classes as an HTML class attribute
	 * @return NULL|string
	 */
	protected function getClasses()
	{
		//no classes return nothing
		if (count($this->classes) == 0)
		{
			return null;
		}
	
		$classes = 'class="';
		foreach ($this->classes AS $className)
		{
				
			$classes .=' '.$className;
		}
		$classes .='"';
		return $classes;
	}
	
	/**
	 * Method to set the innerHtml for an element
	 * @param string $innerHtml
	 */
	public function setInnerHtml($innerHtml)
	{
		$this->innerHtml = $innerHtml;
	}
	
	/**
	 * Method to get the innerHtml of an element
	 * @return string
	 */
	public function getInnerHtml()
	{
		return $this->innerHtml;
	}
	
	/**
	 * Method to add to the innerHtml
	 * @param string $innerHtml
	 * @param booleen $before
	 * @return Babelu_libHtmlBase $this to allow chaining
	 */
	public function addInnerHtml($innerHtml, $before = false)
	{
		if ($before)
		{
			$this->innerHtml = $innerHtml.' '.$this->innerHtml;
		}
		else
		{
			$this->innerHtml .=' '.$innerHtml;
		}
		return $this;
	}
	
	/**
	 * Method to return an HTML form element
	 * @return string HTML element
	 */
	abstract public function renderHtml();
}