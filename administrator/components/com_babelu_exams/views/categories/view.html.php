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

class Babelu_examsViewCategories extends JViewLegacy
{
	// standard properties
	protected $items;
	protected $pagination;
	protected $state;
	 
	//custom properties
	protected $sidebar;
	
	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');

		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors)); 
		}
		
		$this->addToolbar();	
		$this->sidebar = Babelu_examsHelperSidebar::getSideBar('categories');
		$this->addFilters();
		
		parent::display($tpl);

	}

	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_CATEGORIES'),'babelu_exams');
		
		Babelu_examsHelperToolbar::addLogoStyle();
		Babelu_examsHelperToolbar::addNew('category');
		Babelu_examsHelperToolbar::editList('category');
		Babelu_examsHelperToolbar::publishUnpublish('categories');
		Babelu_examsHelperToolbar::archiveList('categories');
		Babelu_examsHelperToolbar::checkIn('categories');
		
		$filteredState	= $this->state->get('filter.state');
		if ($filteredState == -2)
		{
			Babelu_examsHelperToolbar::deleteList('categories');
		}
		else
		{
			Babelu_examsHelperToolbar::trash('categories');
		}
		
		Babelu_examsHelperToolbar::preferences();
	}
	
	protected function addFilters()
	{
		$this->sidebar->setAction('index.php?option=com_babelu_exams&view=categories');
		
		$this->sidebar->addFilter(
		JText::_("JOPTION_SELECT_ACCESS"),
		'filter_access',
		JHtml::_('select.options', JHtml::_("access.assetgroups", true, true), "value", "text", $this->state->get('filter.access'), true)
		);
		
		$this->sidebar->addFilter(
		JText::_('JOPTION_SELECT_PUBLISHED'),
		'filter_published',
		JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)
		);
	}
    
	protected function getSortFields()
	{
		return array(
		'a.title' => JText::_('COM_BABELU_EXAMS_CATEGORIES_HEADER_TITLE'),
		'a.access' => JText::_('COM_BABELU_EXAMS_CATEGORIES_HEADER_ACCESS'),
		'a.state' => JText::_('JSTATUS'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.id' => JText::_('JGRID_HEADING_ID'),
		);
	}
}