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

class Babelu_examsHtmlInput extends Babelu_examsHtmlBase
{
	/**
	 * Input label
	 * @var Babelu_libHtmlLabel
	 */
	protected $label;
	
	/**
	 * Position of the label
	 * @var string default "left" can be changed to right using addLabel()
	 */
	protected $labelPosition = 'left';
	
	/**
	 * 
	 * @param Babelu_libHtmlLabel $label
	 * @param Booleen $togglePosition
	 * @return Babelu_libHtmlInput $this to allow chaining
	 */
	public function addLabel(Babelu_examsHtmlLabel $label, $togglePosition = false)
	{
		if ($togglePosition)
		{
			$this->togglePosition();
		}
		$label->addClass('position'.ucfirst($this->labelPosition));
		$this->label = $label;
		return $this;
	}

	/**
	 * Method to toggle label position from left to right
	 */
	protected function togglePosition()
	{
		$position = $this->labelPosition;
		if ($position === 'left')
		{
			$this->labelPosition = 'right';
		}
		else
		{
			$this->labelPosition = 'left';
		}
	}
	
	public function renderHtml()
	{
		$html = '';
		$html .= '<input';
		$html .= $this->getProperties();
		$html .=' '.$this->getClasses();
		$html .= '/>';
		
		if (($this->label instanceof Babelu_examsHtmlLabel))
		{
			$html = $this->wrapLabel($html);
		}
		
		return $html;
	}
	
	protected function wrapLabel($html)
	{
		if ($this->labelPosition === 'right')
		{
			$this->label->addInnerHtml($html, true);
		}
		else 
		{
			$this->label->addInnerHtml($html, false);
		}
		return $this->label->renderHtml();
	}
}