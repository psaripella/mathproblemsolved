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

class Babelu_examsViewMessages extends JViewLegacy
{
	// standard properties
	protected $items;
	protected $pagination;
	protected $state;
	 
	//custom properties
	protected $sidebar;

	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		if (count($errors = $this->get('Errors')))
		{
			throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();	
		$this->sidebar = Babelu_examsHelperSidebar::getSideBar('messages');
		$this->addFilters();
		
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_MESSAGES'), 'babelu_exams');
		
		Babelu_examsHelperToolbar::addLogoStyle();
		Babelu_examsHelperToolbar::addNew('message');
		Babelu_examsHelperToolbar::editList('message');
		Babelu_examsHelperToolbar::checkIn('messages');
		Babelu_examsHelperToolbar::deleteList('messages');
		Babelu_examsHelperToolbar::preferences();
	}
	
	protected function addFilters()
	{
		$this->sidebar->setAction('index.php?option=com_babelu_exams&view=messages');
	}
	
	protected function getSortFields()
	{
		return array(
				'a.msg_id' => JText::_('JGRID_HEADING_ID'),
				'a.title' => JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_TITLE'),
		);
	}	
}