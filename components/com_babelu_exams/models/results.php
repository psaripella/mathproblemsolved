<?php
/**
 * @version     1.2.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.model');
jimport('joomla.application.component.helper');

class Babelu_examsModelResults extends JModelLegacy
{
	protected $exam;
	protected $results;
	
	public function __construct($config)
	{
		parent::__construct($config);		
		
		$this->loadResults();
	}

	public function getResults()
	{
		return $this->results;
	}
	
	/**
	 * Method to load the exam entity
	 * @return Babelu_examsEntityExam
	 */
	public function getExam()
	{
		if (!($this->exam instanceof Babelu_examsEntityExam))
		{
			$exam_id = JFactory::getApplication()->input->get('id',0,'int');
			$user_id = JFactory::getUser()->id;
		
			$examRepository = new Babelu_examsRepositoryExam('joomla');
			$this->exam = $examRepository->getExamWithSave($exam_id, $user_id);
		}
		
		return $this->exam;
	}
	
	private function loadResults()
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
	
		$query->select('*');
		$query->from('#__babelu_exams_results');
		
		$exam_id = JFactory::getApplication()->input->get('id',0,'int');
		$query->where('exam_id = '.(int)$exam_id);

		$user = JFactory::getUser();
		$query->where('user_id = '.(int)$user->id);

		$query->order('creation_date DESC');
	
		$db->setQuery($query);
		
		$this->results = $db->loadObjectList();
		
		if (!is_null($this->results)) 
		{ 
			return true; 
		}
		else 
		{
			return false; 
		}
	}
}