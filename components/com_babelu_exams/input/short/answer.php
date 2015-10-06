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

class Babelu_examsInputShortAnswer extends Babelu_examsInputBase
{
	protected function buildFormHtml()
	{
		$pid = 's'.$this->section->id.'_pid_'.$this->problem->getSetting('id');
	
		$value = ' value="'.JText::_('COM_BABELU_EXAMS_TYPE_YOUR RESPONSE_HERE').'"';
		$class = 'class="shortanswer problem';
	
		if (!is_null($this->problem->getSetting('user_response', null)) && $this->responses[0] != JText::_('COM_BABELU_EXAMS_NO_RESPONSE'))
		{
			$value = ' value="'.$this->responses[0].'"';
			$class .= ' has_text';
		}
		$class .='"';
	
		$html = '<input type="text"';
		$html .=' name="'.$pid.'"';
		$html .=' id="'.$pid.'"';
		$html .=' size="50"';
		$html .=' autocomplete="off"';
		$html .= $class;
		$html .= $value.' />';
	
		$this->html = $html;
	}	
	
	protected function PrintObject($object)
	{
		echo '<pre>';
		print_r($object);
		echo '</pre>';
		exit();
	}
}