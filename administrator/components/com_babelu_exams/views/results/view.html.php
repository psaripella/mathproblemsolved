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

class Babelu_examsViewResults extends JViewLegacy
{
	// standard properties
	protected $items;
	protected $pagination;
	protected $state;
	 
	//custom properties
	protected $admin_list;
	protected $examinee_list;
	protected $exam_list;
	protected $sidebar;

	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		
		$this->admin_list = $this->get('AdminList');
		$this->examinee_list = $this->get('ExamineesList');
		$this->exam_list = $this->get('ExamList');

		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();	
		$this->sidebar = Babelu_examsHelperSidebar::getSideBar('results');
		$this->addFilters();
		
		parent::display($tpl);
	}

	protected function addToolbar()
	{
		JToolBarHelper::title(JText::_('COM_BABELU_EXAMS_TITLE_RESULTS'), 'babelu_exams');

		Babelu_examsHelperToolbar::addLogoStyle();
		if (Babelu_examsHelperActions::canComment('com_babelu_exams')) 
		{
			JToolBarHelper::editList('result.edit','COM_BABELU_EXAMS_ADD_COMMENTS');
		}
		
		if (Babelu_examsHelperActions::canGrade('com_babelu_exams'))
		{
			JToolBarHelper::editList('grade.edit','COM_BABELU_EXAMS_GRADE');
				
		}
		
		$user = JFactory::getUser();
		if ($user->authorise('bue.export.results', 'com_babelu_exams'))
		{
			JToolBarHelper::divider();
			$bar = JToolBar::getInstance('toolbar');
			$bar->appendButton('Link','export', 'COM_BABELU_EXAMS_CSVREPORT','index.php?option=com_babelu_exams&task=results.csvreport');
		}
		
		Babelu_examsHelperToolbar::checkIn('results');
		Babelu_examsHelperToolbar::deleteList('results');
		Babelu_examsHelperToolbar::preferences();
	}
	
	protected function addFilters()
	{
		$this->sidebar->setAction('index.php?option=com_babelu_exams&view=results');	

		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_EXAM'),
		'filter_exam', 
		JHtml::_('select.options',$this->exam_list, 'id', 'title', $this->state->get('filter.exam'), false)
		);
		
		$status_list = array();
		
		$fail = new stdClass();
		$fail->name = JText::_('COM_BABELU_EXAMS_STATUS_FAIL');
		$fail->id = 1;
		$status_list[] = $fail;
		
		$pass = new stdClass();
		$pass->name = JText::_('COM_BABELU_EXAMS_STATUS_PASS');
		$pass->id = 2;
		$status_list[] = $pass;
		
		$timeOut = new stdClass();
		$timeOut->name = JText::_('COM_BABELU_EXAMS_STATUS_TIMED_OUT');
		$timeOut->id = 3;
		$status_list[] = $timeOut;
		
		$pending = new stdClass();
		$pending->name = JText::_('COM_BABELU_EXAMS_STATUS_PENDING');
		$pending->id = 0;
		$status_list[] = $pending;
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_STATUS'),
		'filter_status',
		JHtml::_('select.options',$status_list, 'id', 'name', $this->state->get('filter.status'), false)
		);
		
		$grading_options = array();
		
		$computerized = new stdClass();
		$computerized->name = JText::_('COM_BABELU_EXAMS_COMPUTERIZED');
		$computerized->id = 0;
		$grading_options[] = $computerized;
		
		$manual = new stdClass();
		$manual->name = JText::_('COM_BABELU_EXAMS_MANUAL');
		$manual->id = 1;
		$grading_options[] = $manual;
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_GRADING_OPTION'),
				'filter_grading',
				JHtml::_('select.options',$grading_options, 'id', 'name', $this->state->get('filter.grading'), false)
		);
		
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_EXAMINEE'),
		'filter_examinee', 
		JHtml::_('select.options',$this->examinee_list, 'id', 'name', $this->state->get('filter.examinee'), false)
		);
		
		if ($this->admin_list[0]->id == 0)
		{
			$this->admin_list[0]->name = JText::_('COM_BABELU_EXAMS_RESULTS_NONE_ASSIGNED');
		}
		else
		{
			$notAssigned = new stdClass();
			$notAssigned->name = JText::_('COM_BABELU_EXAMS_RESULTS_NONE_ASSIGNED');
			$notAssigned->id = 0;
			array_unshift($this->admin_list, $notAssigned);
		}
		
		$this->sidebar->addFilter(JText::_('COM_BABELU_EXAMS_FILTER_BY_ADMIN'),
		'filter_admin',
		JHtml::_('select.options', $this->admin_list, 'id', 'name', $this->state->get('filter.admin'), false)
		);
		
	}
	
	protected function getSortFields()
	{
		return array(
				'buexam.title' => JText::_('COM_BABELU_EXAMS_RESULTS_TITLE'),
				'a.creation_date' => JText::_('COM_BABELU_EXAMS_RESULTS_DATE'),
				'a.status' => JText::_('COM_BABELU_EXAMS_RESULTS_STATUS'),
				'a.percentage_grade' => JText::_('COM_BABELU_EXAMS_RESULTS_GRADE'),
				'a.user_id' => JText::_('COM_BABELU_EXAMS_RESULTS_USER'),
				'admin.name' => JText::_('COM_BABELU_EXAMS_RESULTS_ADMIN_TO_NOTIFY'),
				'a.id' => JText::_('JGRID_HEADING_ID')
		);
	}
}
