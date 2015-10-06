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

class Babelu_examsUtilityFilter
{
	/**
	 * Value for the action attribute of the form.
	 * @var    string
	 */
	protected $action = '';
	
	/**
	 * Filters
	 * @var    array
	 */
	protected $filters = array();
	
	/**
	 * Method to set the form action
	 * @param string $action
	 */
	public function setAction($action)
	{
		$this->action = $action;
	}
	
	/**
	 * Method to add a filter
	 * @param   string  $label      Label for the menu item.
	 * @param   string  $name       Name for the filter. Also used as id.
	 * @param   string  $options    Options for the select field.
	 * @param   bool    $noDefault  Don't the label as the empty option
	 */
	public function addFilter($label, $name, $options, $noDefault = false)
	{
		array_push($this->filters, array('label' => $label, 'name' => $name, 'options' => $options, 'noDefault' => $noDefault));
	}
	
	/**
	 * Method to return HTML string of filter objects
	 * @return string
	 */
	public function render()
	{
		$html = '';
		
		if (!empty($this->filters))
		{
			$html = '<div class="filter-select hidden-phone">';
			$html .= '<h4 class="page-header">'.JText::_('JSEARCH_FILTER_LABEL').'</h4>';
			foreach ($this->filters AS $filter)
			{
				$html .= $this->getFilterHtml($filter);
			}
		
			$html .= '</div>';
		}
		
		return $html;
	}
	
	private function getFilterHtml($filter)
	{
		$html = '<label for="'.$filter['name'].'"';
		$html .= ' class="element-invisible"></label>';
		$html .= '<select name="'.$filter['name'].'" id="'.$filter['name'].'" class="span12 small" onchange="this.form.submit()">';
		
		if (!$filter['noDefault'])
		{
			$html .= '<option value="">'.$filter['label'].'</option>';
		}
		
		$html .= $filter['options'];
		$html .= '</select>';
		$html .= '<hr class="hr-condensed" />';
	
		return $html; 
	}
	
}
