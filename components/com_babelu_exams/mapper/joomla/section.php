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
class Babelu_examsMapperJoomlaSection extends Babelu_examsMapperJoomlaBase 
{
	/**
	 * Method to get a list of sections by exam id
	 * @param int $exam_id
	 * @return mixed array of stdClass or null if query failed.
	 */
	public function getSections($exam_id)
	{
		$db = $this->getDbo();
		$query = $db->getQuery(true);
		$query->select('a.*');
		$query->from('#__babelu_exams_sections AS a');
		
		$query->select('level.title AS level_title, level.ordering AS level_order, level.description AS level_desc');
		$query->join('LEFT','#__babelu_exams_levels AS level ON level.id = a.level');
		
		$query->where('a.exam_id = '.$exam_id);
		$query->order('ordering');
		$db->setQuery($query);
		return $db->loadObjectList();
	}
}