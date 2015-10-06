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

abstract class Babelu_examsInputBase
{
	protected $html;
	
	protected $problem;
	
	protected $section;
	
	protected $encoder;
	
	protected $answers;
	
	protected $options;
	
	protected $responses;
	
	public function __construct($section)
	{
		// set properties
		$this->section = $section;
		$this->encoder = new Babelu_examsUtilityStringEncoder();
	}
	
	/**
	 * Method to prepare the problems answers,options, and responses
	 * @return void
	 */
	protected function prepareProblem()
	{

		$this->answers = $this->problem->getSetting('answers', array());

		$this->options = $this->problem->getSetting('options', array());
	
		$this->responses = $this->problem->getSetting('user_response', array(JText::_('COM_BABELU_EXAMS_NO_RESPONSE')));
	}
	
	/**
	 * Method to get the HTML for the problem
	 */
	public function getFormHTML($problem)
	{
		$this->problem = $problem;
		$this->prepareProblem();
	
		$this->buildFormHTML();
		return $this->html;
	}
	
	public function getUList($items)
	{
		$uList = '<ul>';
		foreach ($items AS $string)
		{ 
			$uList .= $this->getListTag($string); 
		}
		
		$uList .='</ul>';
		return $uList;
	}
	
	protected function getListTag($string)
	{
		$tag = '<li>'.$string.'</li>';
		return $tag;
	}
	
	public function getParagraphs($items)
	{
		$paragraphs = '';
		foreach ($items AS $string)
		{ 
			$paragraphs .='<p>'.$string.'</p>'; 
		}
		return $paragraphs;
	}
	/**
	 * Method to build the problem Form HTML
	 */
	abstract protected function buildFormHTML();
	
}