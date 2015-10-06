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

class Babelu_examsUtilitySubmenu
{
	protected $entries = array();
	
	/**
	 * Method to add a menu item to submenu.
	 *
	 * @param   string  $name    Name of the menu item.
	 * @param   string  $link    URL of the menu item.
	 * @param   bool    $active  True if the item is active, false otherwise.
	 *
	 */
	public function addEntry($name, $link = '', $isActive = false)
	{
		$active = '';
		if ($isActive)
		{
			$active = ' class="active"';
		}
		
		array_push($this->entries, array($name,$link,$active));
	}
	
	public function render()
	{
		$html ='<ul id="submenu" class="nav nav-list">';

		foreach ($this->entries AS $entry)
		{
			$html .= $this->getEntryHtml($entry);
		}
		
		$html .='</ul>';
		$html .='<hr/>';
		return $html;
	}
	
	private function getEntryHtml($entry)
	{
		$html = '<li'.$entry[2].'>';
		$html .= '<a href="'.$this->ampReplace($entry[1]).'"';
		$html .= '>'.$entry[0].'</a>';
		$html .='</li>';
		return $html; 
	}
	
	/**
	 * Replaces &amp; with & for XHTML compliance
	 *
	 * @param   string  $text  Text to process
	 *
	 * @return  string  Processed string.
	 *
	 * @since   11.1
	 *
	 * @todo There must be a better way???
	 */
	protected function ampReplace($text)
	{
		$text = str_replace('&&', '*--*', $text);
		$text = str_replace('&#', '*-*', $text);
		$text = str_replace('&amp;', '&', $text);
		$text = preg_replace('|&(?![\w]+;)|', '&amp;', $text);
		$text = str_replace('*-*', '&#', $text);
		$text = str_replace('*--*', '&&', $text);
	
		return $text;
	}
}