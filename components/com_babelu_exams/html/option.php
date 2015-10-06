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

class Babelu_examsHtmlOption extends Babelu_examsHtmlBase
{
	public function renderHtml()
	{
		$html = '<option';
		$html .=' '. $this->getClasses();
		$html .= $this->getProperties();
		$html .='>'.$this->escape($this->innerHtml).'</option>';
		return $html;
	}
}