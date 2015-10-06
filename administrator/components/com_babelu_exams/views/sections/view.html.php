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

class Babelu_examsViewSections extends JViewLegacy
{
	// standard properties
	protected $items;
	protected $pagination;
	protected $state;
	 
	//custom properties
	protected $exam_list;
	protected $group_list;
	protected $level_list;
	protected $sidebar;

	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');

		$this->exam_list = $this->get('ExamList');
		$this->group_list = $this->get('GroupList');
		$this->level_list = $this->get('LevelList');
		
		if (count($errors = $this->get('Errors'))) 
		{
			throw new Exception(implode("\n", $errors));
		}

		$this->addToolbar();	
		$this->sidebar = Babelu_examsHelperSidebar::getSideBar('sections');
		$this->addFilters();
		
		parent::display($tpl);
	}
	
	protected function addToolbar()
	{	
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_SECTIONS'), 'babelu_exams');

		Babelu_examsHelperToolbar::addLogoStyle();
		Babelu_examsHelperToolbar::addNew('section');
		Babelu_examsHelperToolbar::editList('section');
		Babelu_examsHelperToolbar::checkIn('sections');
		Babelu_examsHelperToolbar::deleteList('sections');
		Babelu_examsHelperToolbar::preferences();
	}
    
	protected function addFilters()
	{
		$this->sidebar->setAction('index.php?option=com_babelu_exams&view=sections');
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_EXAM'),
		'filter_exam',
		JHtml::_('select.options',$this->exam_list, 'id', 'title', $this->state->get('filter.exam'), false)
		);
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_GROUP'),
				'filter_group',
				JHtml::_('select.options',$this->group_list, 'id', 'title', $this->state->get('filter.group'), false)
		);
		
		$input_list = array();
		$mcq = new stdClass();
		$mcq->title = JText::_('COM_BABELU_EXAMS_PROBLEM_TYPE_RADIO_BUTTON');
		$mcq->id = 0;
		$input_list[] = $mcq;
		
		$maq = new stdClass();
		$maq->title = JText::_('COM_BABELU_EXAMS_PROBLEM_TYPE_CHECK_BOX');
		$maq->id = 1;
		$input_list[] = $maq;
		
		$saq = new stdClass();
		$saq->title = JText::_('COM_BABELU_EXAMS_PROBLEM_TYPE_TEXT_INPUT');
		$saq->id = 2;
		$input_list[] = $saq;
		
		$seq = new stdClass();
		$seq->title = JText::_('COM_BABELU_EXAMS_PROBLEM_TYPE_TEXT_AREA');
		$seq->id = 3;
		$input_list[] = $seq;
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_INPUT_TYPE'),
				'filter_input',
				JHtml::_('select.options',$input_list, 'id', 'title', $this->state->get('filter.input'), false)
		);
		
		$this->prepLevelList();
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_LEVEL'),
				'filter_level',
				JHtml::_('select.options',$this->level_list, 'id', 'title', $this->state->get('filter.level'), false)
		);
	}
	
	protected function prepLevelList()
	{
		foreach ($this->level_list AS $level)
		{
			$title = $level->title.' : '.$level->ordering;
			$level->title = $title;
			unset($level->ordering);
		}
		
		$noLevel = new stdClass();
		$noLevel->title = JText::_('COM_BABELU_EXAMS_NO_LEVEL').' : 0';
		$noLevel->id = 0;
		
		array_unshift($this->level_list, $noLevel);
	}
	
	protected function getSortFields()
	{
		return array(
		'a.id' => JText::_('JGRID_HEADING_ID'),
		'a.ordering' => JText::_('JGRID_HEADING_ORDERING'),
		'a.title' => JText::_('COM_BABELU_EXAMS_SECTIONS_TITLE'),
		'a.exam_id' => JText::_('COM_BABELU_EXAMS_SECTIONS_EXAM_ID'),
		'a.group_id' => JText::_('COM_BABELU_EXAMS_SECTIONS_GROUP_ID'),
		'a.input_type' => JText::_('COM_BABELU_EXAMS_SECTIONS_INPUT_TYPE'),
		'a.problem_count' => JText::_('COM_BABELU_EXAMS_SECTIONS_PROBLEM_COUNT'),
		'a.default_point_value' => JText::_('COM_BABELU_EXAMS_SECTIONS_DEFAULT_POINT_VALUE'),
		);
	}
  
}