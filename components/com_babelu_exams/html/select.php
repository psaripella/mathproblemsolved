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

class Babelu_examsHtmlSelect extends Babelu_examsHtmlBase
{
	protected $options = array();
	
	public function addOption(Babelu_examsHtmlOption $option)
	{
		$this->options[] = $option;
		return $this;
	}
	
	protected function getOptions()
	{
		$options = '';
		foreach ($this->options AS $option)
		{
			$options .= $option->renderHtml().PHP_EOL; 
		}
		return $options;
	}
	
	public function renderHtml()
	{
		$html = '<select';
		$html .=' '. $this->getClasses();
		$html .= $this->getProperties();
		$html .='>'.$this->getOptions().'</select>';
		return $html;
	}
}