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

class Babelu_examsModelGrade extends Babelu_examsModelBaseAdmin
{
	public function getTable($type = 'Result', $prefix = 'Babelu_examsTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}
	
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk))
		{
			$item->exam_details = $this->loadExamDetails($item->exam_id);
			$item->sections = $this->loadSections($item->exam_id);
				
			if (!is_null($item->sections))
			{
				foreach ($item->sections AS $sec)
				{
					$sec->problems = $this->loadProblems($sec->id,$item->id);
						
					if (!is_null($sec->problems))
					{
						foreach ($sec->problems AS $problem)
						{
							$problem->answers = Babelu_examsHelperBase::buildCorrectAnswersArray($problem->answers);
							$problem->user_response = Babelu_examsHelperBase::buildUserResponsesArray($problem->user_response);
	
							$search = '<img src="images/';
							$replace = '<img src="../images/';
							$problem->problem_text = str_replace($search, $replace, $problem->problem_text);
						}
					}
				}
			}
		}
		return $item;
	}
	
	protected function loadProblems($section_id,$result_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
	
		$query->select('r.*');
		$query->from('#__babelu_exams_r_response AS r');
	
		$query->select('p.problem_text, p.answers, p.point_value, p.default_input_type');
		$query->join('LEFT', '#__babelu_exams_problems AS p ON p.id = r.problem_id');
	
		$query->where('r.section_id = '.(int)$section_id.' AND r.parent_id = '.(int)$result_id);
		$query->order('r.id');
	
		$db->setQuery($query);
		$problems = $db->loadObjectList('id');
	
		if (!is_null($problems)) { return $problems; }
		else { return false; }
	}
	
	protected function loadSections($exam_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
	
		$query->select('*');
		$query->from('#__babelu_exams_sections');
		$query->where('exam_id = '.$exam_id);
		$query->order('ordering');
	
		$db->setQuery($query);
		$sections = $db->loadObjectList();
		return $sections;
	}
	
	protected function loadExamDetails($exam_id)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
	
		$query->select('*');
		$query->from('#__babelu_exams_exams');
		$query->where('id = '.(int)$exam_id);
	
		$db->setQuery($query);
		$result = $db->loadObject();
		return $result;
	}
	
	public function saveGrade($data = array())
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
	
		$query->update('#__babelu_exams_results');
		$query->set('point_grade = '.$data['score']);
		$query->set('percentage_grade = '.$data['percentage']);
		$query->set('status = '.$db->quote($data['status']));
		$query->where('id = '.(int)$data['id']);
	
		$db->setQuery($query);
		$db->execute();
	}
	
	public function getExamId($pk)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('exam_id');
		$query->from('#__babelu_exams_results');
		$query->where('id = '.(int)$pk);
		
		$db->setQuery($query);
		return $db->loadResult();
		
	}
}