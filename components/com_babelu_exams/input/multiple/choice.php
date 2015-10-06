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

class Babelu_examsInputMultipleChoice extends Babelu_examsInputMultipleBase
{
	protected function setMaximums()
	{
		//multiple choice can only have one correct answer
		$this->max_answers = 1;
	
		//set the default max_options to the total number of options in the array
		$this->max_options = count($this->options);
	
		//check the section max_options value
	
		// then make sure there are more problem options than the section max_options - 1
		if ((int)$this->section->max_options != 0 && $this->max_options > ((int)$this->section->max_options - 1))
		{
			// override the max_options
			$this->max_options = (int)$this->section->max_options - 1;
		}
	}
	
	protected function buildFormHtml()
	{
		$pid = 's'.$this->section->id.'_pid_'.$this->problem->getSetting('id');
	
		$class = ' class="multiplechoice problem"';
	
		$html= '<ul class="babelu_exams_problem_ul">';
	
		foreach ($this->display_options as $value)
		{
			//if this is value = the user response make the input checked
			$checked = '';
			if (!is_null($this->problem->getSetting('user_response')))
			{
				if (in_array($value, $this->responses))
				{
					$checked = ' checked="checked"';
				}
			}
	
			$html .='<li>';
			$html .='<input type="radio"';
			$html .=' name="'.$pid.'"';
			$html .=' value="'.$value.'"';
			$html .=$checked.$class.'/>';
			$html .=' <label for="'.$pid.'">';
			$html .=$value;
			$html .='</label>';
			$html .='</li>';
	
		} //end loop
	
		$html .= '</ul>';
	
		$this->html = $html;
	}	
}