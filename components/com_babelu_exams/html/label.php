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

class Babelu_examsHtmlLabel extends Babelu_examsHtmlBase
{
	public function renderHtml()
	{
		$html = '<label';
		$html .= $this->getProperties();
		$html .=' '.$this->getClasses();
		$html .= '>'.$this->innerHtml.'</label>';
		return $html;
	}
}
