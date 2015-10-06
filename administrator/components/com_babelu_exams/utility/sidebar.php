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

class Babelu_examsUtilitySidebar
{
	/**
	 * Array of classes to be added to the sidebar container
	 * @var array
	 */
	protected $classes = array();
	
	/**
	 * @var Babelu_coursesUtilitySubmenu
	 */
	protected $submenu;
	
	/**
	 * @var Babelu_coursesUtilityFilter
	 */
	protected $filters;
	
	public function __construct()
	{
		$this->submenu = new Babelu_examsUtilitySubmenu();
		$this->filters = new Babelu_examsUtilityFilter();
	}
	
	/**
	 * Method to add classes to the sidebar container
	 * @param string $class
	 */
	public function addClass($class)
	{
		array_push($this->classes, JFilterOutput::cleanText($class));
	}
	
	/**
	 * Method to add a menu item to sidebar.
	 *
	 * @param   string  $name    Name of the menu item.
	 * @param   string  $link    URL of the menu item.
	 * @param   bool    $active  True if the item is active, false otherwise.
	 * @see Babelu_coursesUtilitySubmenu
	 *
	 */
	public function addEntry($name, $link = '', $isActive = false)
	{
		$this->submenu->addEntry($name, $link, $isActive);
	}
	
	/**
	 * Method to set the form action
	 * @param string $action
	 */
	public function setAction($action)
	{
		$this->filters->setAction($action);
	}
	
	/**
	 * Method to add a filter to the sidebar
	 * @param   string  $label      Label for the menu item.
	 * @param   string  $name       Name for the filter. Also used as id.
	 * @param   string  $options    Options for the select field.
	 * @param   bool    $noDefault  Don't the label as the empty option
	 * @see Babelu_coursesUtilityFilter
	 */
	public function addFilter($label, $name, $options, $noDefault = false)
	{
		$this->filters->addFilter($label, $name, $options, $noDefault);
	}
	
	public function render()
	{
		$html = '<div id="sidebar">';
		$html .= '<div class="';
		foreach ($this->classes AS $class)
		{
			$html .=' '.$class;
		}
		$html .='">';
		$html .= $this->submenu->render();
		$html .= $this->filters->render();
		$html .='</div></div>';
		return $html; 
	}
}