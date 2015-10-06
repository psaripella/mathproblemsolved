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

class Babelu_examsModelDetail extends JModelLegacy
{
	protected $exam;
		
	public function __construct($config)
	{
		parent::__construct($config);
	}
	
	public function getExam()
	{
		if (!($this->exam instanceof Babelu_examsEntityExam))
		{
			$exam_id = JFactory::getApplication()->input->get('id',0,'int');
			$user_id = JFactory::getUser()->id;
			
			$examRepository = new Babelu_examsRepositoryExam('joomla');
			$this->exam = $examRepository->getExamWithSave($exam_id, $user_id);
			
			$this->exam->setSetting('result_id', $this->attachResultId($exam_id, $user_id));
		}
		
		return $this->exam;
	}
	
	private function attachResultId($exam_id, $user_id)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('id');
		$query->from('#__babelu_exams_results');
		$query->where('exam_id = '.(int)$exam_id);
		$query->where('user_id = '.(int)$user_id);
		// order newest to oldest
		$query->order('creation_date DESC');
		$db->setQuery($query, 0, 1);
		return $db->loadResult();
	}
	
}