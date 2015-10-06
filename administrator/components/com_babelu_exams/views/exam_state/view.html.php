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
class Babelu_examsViewExam_state extends JViewLegacy
{
	protected $state;
	protected $item;
	protected $form;

	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->userData = JFactory::getUser($this->item->user_id);
		
		$this->results = $this->getModel()->getUserResults($this->item->user_id, $this->item->exam_id);
		$this->examDetails = $this->getModel()->getExam($this->item->exam_id);
		$this->form		= $this->get('Form');
		
		if (count($errors = $this->get('Errors'))) 
		{
            throw new Exception(implode("\n", $errors));
		}
		
		parent::display($tpl);
	}
}
