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

class Babelu_examsViewProblems extends JViewLegacy
{
	// standard properties
	protected $items;
	protected $pagination;
	protected $state;
	
	//custom properties
	protected $groups;
	protected $levels;
	protected $sidebar;
	
	public function display($tpl = null)
	{
		
		$this->items		= $this->get('Items');
		$this->state		= $this->get('State');
		$this->pagination	= $this->get('Pagination');		
		
		$this->groups       = $this->get('GroupsList');
		$this->levels       = $this->get('LevelList');
		

		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
		}
		
		$this->addToolbar();	
		$this->sidebar = Babelu_examsHelperSidebar::getSideBar('problems');
		$this->addFilters();
		
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_PROBLEMS'), 'babelu_exams');

		Babelu_examsHelperToolbar::addLogoStyle();		
		Babelu_examsHelperToolbar::addNew('problem');
		Babelu_examsHelperToolbar::editList('problem');
		Babelu_examsHelperToolbar::publishUnpublish('problems');
		
		$user = JFactory::getUser();
		$canImport = $user->authorise('bue.import.problems', 'com_babelu_exams');
		$canExport = $user->authorise('bue.export.problems', 'com_babelu_exams');
		
		if ($canImport || $canExport)
		{
			JToolBarHelper::divider();
		}
		
		$bar = JToolBar::getInstance('toolbar');
		
		if ($canImport)
		{
			$bar->appendButton('Link','upload','COM_BABELU_EXAMS_IMPORT_MENU','index.php?option=com_babelu_exams&view=import');
		}
		
		if ($canExport)
		{
			$bar->appendButton('Link','export', 'COM_BABELU_EXAMS_CSVEXPORT','index.php?option=com_babelu_exams&task=problems.csvexport');
		}
		
		Babelu_examsHelperToolbar::archiveList('problems');
		Babelu_examsHelperToolbar::checkIn('problems');

		$filteredState	= $this->state->get('filter.state');
		if ($filteredState == -2)
		{
			Babelu_examsHelperToolbar::deleteList('problems');
		}
		else 
		{
			Babelu_examsHelperToolbar::trash('problems');
		}
        
		Babelu_examsHelperToolbar::preferences();
	}
    
	protected function addFilters()
	{
		$this->sidebar->setAction('index.php?option=com_babelu_exams&view=problems');
		
		$this->sidebar->addFilter(
		JText::_('JOPTION_SELECT_PUBLISHED'),
		'filter_published',
		JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), "value", "text", $this->state->get('filter.state'), true)
		);
		
		$noLevel = new stdClass();
		$noLevel->id = 0;
		$noLevel->title = JText::_('COM_BABELU_EXAMS_NO_LEVEL');
		$noLevel->ordering = 0;
		
		array_unshift($this->levels, $noLevel);
		
		foreach ($this->levels AS $level)
		{
			$level->title = $level->title.' : '.$level->ordering;
		}
		
		$this->sidebar->addFilter(
		JText::_('COM_BABELU_EXAMS_SELECT_A_LEVEL'),
		'filter_level',
		JHtml::_('select.options', $this->levels, 'id', 'title', $this->state->get('filter.level'),false)
		);
		
		$this->sidebar->addFilter(
		JText::_('COM_BABELU_EXAMS_SELECT_A_GROUP'),
		'filter_group',
		JHtml::_('select.options', $this->groups, 'id', 'title', $this->state->get('filter.group'),false)
		);
		
	}
	
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.state' => JText::_('JSTATUS'),
		'a.problem_text' => JText::_('COM_BABELU_EXAMS_PROBLEMS_PROBLEM_TEXT'),
		'a.standard' => JText::_('COM_BABELU_EXAMS_PROBLEMS_STANDARD'),
		'a.group_id' => JText::_('COM_BABELU_EXAMS_PROBLEMS_GROUP_ID'),
		'a.level' => JText::_('COM_BABELU_EXAMS_PROBLEMS_LEVEL'),
		'a.point_value' => JText::_('COM_BABELU_EXAMS_PROBLEMS_POINT_VALUE'),
		);
	} 
}