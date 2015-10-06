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

class Babelu_examsRepositorySection extends Babelu_examsRepositoryBase
{
	/**
	 * Method to get an array of section entities by exam id
	 * @param int $exam_id
	 * @return array $sections
	 */
	public function getSections($exam_id)
	{
		$mapper = $this->getMapper('Section');	
		$sectionList = $mapper->getSections($exam_id);
		
		$sections = array();
		foreach ($sectionList AS $section)
		{
			$sections[] = new Babelu_examsEntitySection($section);
		}

		return $sections;
	}
}