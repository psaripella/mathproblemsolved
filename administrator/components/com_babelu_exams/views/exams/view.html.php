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

class Babelu_examsViewExams extends JViewLegacy
{
	// standard properties
	protected $items;
	protected $pagination;
	protected $state;
	
	//custom properties
	protected $sidebar;
	protected $viewLevels;
	protected $categoryList;

	public function display($tpl = null)
	{
		// load standard properties
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		
		$this->viewLevels = $this->get('ViewLevels');
		$this->categoryList = $this->get('CategoryList');
		
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();
		$this->sidebar = Babelu_examsHelperSidebar::getSideBar('exams');
		$this->addFilters();
		
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_EXAMS'), 'babelu_exams');

		Babelu_examsHelperToolbar::addLogoStyle();
		Babelu_examsHelperToolbar::addNew('exam');
		Babelu_examsHelperToolbar::editList('exam');
		Babelu_examsHelperToolbar::publishUnpublish('exams');
		Babelu_examsHelperToolbar::archiveList('exams');
		Babelu_examsHelperToolbar::checkIn('exams');
		
		$filteredState	= $this->state->get('filter.state');
		if ($filteredState == -2)
		{
			Babelu_examsHelperToolbar::deleteList('exams');
		}
		else 
		{
			Babelu_examsHelperToolbar::trash('exams');
		}
        
		Babelu_examsHelperToolbar::preferences();
	}
	
	protected function addFilters()
	{
		$this->sidebar->setAction('index.php?option=com_babelu_exams&view=exams');

		$gradingOptions = array();
		$computerized = new stdClass();
		$computerized->value = 0;
		$computerized->text = JText::_('COM_BABELU_EXAMS_COMPUTERIZED');
		$gradingOptions[] = $computerized;
		$manual = new stdClass();
		$manual->value = 1;
		$manual->text = JText::_('COM_BABELU_EXAMS_MANUAL');
		$gradingOptions[] = $manual;
		
		$this->sidebar->addFilter(
		JText::_('COM_BABELU_EXAMS_SELECT_GRADING_OPTION'),
		'filter_grading_option',
		JHtml::_('select.options', $gradingOptions, "value", "text", $this->state->get('filter.grading.option'), true)
		);
		
		$this->sidebar->addFilter(
		JText::_("JOPTION_SELECT_CATEGORY"),
		'filter_category_list',
		JHtml::_('select.options', $this->categoryList, "id", "title", $this->state->get('filter.category'), true)
		);
		
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
		'a.title' => JText::_('COM_BABELU_EXAMS_EXAMS_TITLE'),
		'a.time_limit' => JText::_('COM_BABELU_EXAMS_EXAMS_TIME_LIMIT'),
		'a.level' => JText::_('COM_BABELU_EXAMS_EXAMS_LEVEL'),		
		'a.pass_per' => JText::_('COM_BABELU_EXAMS_EXAMS_PASS_PER'),
		'a.savable' => JText::_('COM_BABELU_EXAMS_EXAMS_SAVABLE'),
		'a.grading_option' => JText::_('COM_BABELU_EXAMS_EXAMS_GRADING_OPTION'),
		'a.catid' => JText::_('COM_BABELU_EXAMS_EXAMS_CATID'),
		'a.access' => JText::_('COM_BABELU_EXAMS_EXAMS_ACCESS'),
		'a.state' => JText::_('JPUBLISHED'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}