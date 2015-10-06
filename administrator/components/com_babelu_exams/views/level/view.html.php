<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;


class Babelu_examsViewLevel extends JViewLegacy
{
	protected $state;
	protected $item;
	protected $form;

	public function display($tpl = null)
	{
		$this->state	= $this->get('State');
		$this->item		= $this->get('Item');
		$this->form		= $this->get('Form');

		if (count($errors = $this->get('Errors'))) 
		{
            throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		JFactory::getApplication()->input->set('hidemainmenu', true);
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_LEVEL'), 'babelu_exams');

		Babelu_examsHelperToolbar::addLogoStyle();
				
		$editorId = $this->item->checked_out;
		$currentUserId = JFactory::getUser()->id;
		
		if ($editorId == 0 OR $editorId == $currentUserId)
		{ 
			$locked = false; 
		}
		else { $locked = true; }
		
		if (!$locked)
		{
			Babelu_examsHelperToolbar::apply('level');
			Babelu_examsHelperToolbar::save('level');
			Babelu_examsHelperToolbar::saveToNew('level');
		}

		if ($this->item->id != 0 ) { Babelu_examsHelperToolbar::saveToCopy('level'); }
		
		if (empty($this->item->id)) { $type = 'CANCEL'; }
		else { $type = 'CLOSE'; }
		
		Babelu_examsHelperToolbar::cancel('level', $type);
	}
}