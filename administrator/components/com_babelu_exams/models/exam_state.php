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

class Babelu_examsModelExam_state extends Babelu_examsModelBaseAdmin
{
	public function getUserResults($userId, $examId)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		
		$query->select('AVG(percentage_grade) AS avg_per, AVG(point_grade) AS avg_point');
		$query->from('#__babelu_exams_results');
		$query->where('exam_id = '.(int)$examId);
		$query->where('user_id = '.(int)$userId);
		
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	public function getExam($examId)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);

		$query->select('id, title');
		$query->from('#__babelu_exams_exams');
		$query->where('id = '.(int)$examId);
		
		$db->setQuery($query);
		return $db->loadObject();
	}
}