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

class Babelu_examsInputMultipleAnswer extends Babelu_examsInputMultipleBase
{
	protected function setMaximums()
	{
		//set defaults
		$this->max_answers = count($this->answers);
		$this->max_options = count($this->options);
	
		if ($this->section->max_options != 0)// then adjust the maximums
		{
			if ($this->section->max_options % 2) // if there is a remained when divided by 2 then its an odd number
			{
				$this->max_answers = ($this->section->max_options - 1) / 2;
				$this->max_options = ($this->max_answers + 1);
			}
			else // its and even number so divide by two
			{
				$this->max_answers = ($this->section->max_options /2);
				$this->max_options = $this->max_answers;
			}
				
			//count all the answers for this problem
			$answer_count = count($this->answers);
				
			if ($this->max_answers != 0 && $this->max_answers > $answer_count)// then get the remainder
			{
				// get the remainder
				$answer_remainder = $this->max_answers - $answer_count;
					
				//adjust the maximum
				$this->max_answers = $answer_count;
					
				//add the remainder to the option max
				$this->max_options += $answer_remainder;
			}
				
			//count all the possible incorrect options
			$options_count = count($this->options);
				
			if ($this->max_options != 0 && $this->max_options > $options_count)
			{
				//get the remainder
				$option_remainder = $this->max_options - $options_count;
					
				// if the  answer count is equal or grater than max_answers + remainder
				if ($answer_count >= ($this->max_answers + $option_remainder)) // adjust max answers
				{
					$this->max_answers += $option_remainder;
				}
				//adjust max options
				$this->max_options = $options_count;
			}
		}
	} // our work here is done
	
	protected function buildFormHTML()
	{
		$pid = 's'.$this->section->id.'_pid_'.$this->problem->getSetting('id').'[]';
	
		$class = ' class="multipleanswer problem"';
	
		$html = '<ul class="babelu_exams_problem_ul">';
	
		foreach ($this->display_options as $value)
		{
			$checked = '';
			if (!is_null($this->problem->getSetting('user_response')))
			{
				if (in_array($value, $this->responses))
				{
					$checked = ' checked="checked"';
				}
			}
	
			$html .='<li>';
			$html .='<input type="checkbox"';
			$html .=' name="'.$pid.'"';
			$html .=' value="'.$value.'"';
			$html .=$checked.$class.' />';
			$html .=' <label for="'.$pid.'">';
			$html .=$value;
			$html .='</label>';
			$html .='</li>';
	
		} // end loop
	
		$html .= '</ul>';
	
		$this->html = $html;
	}	
}