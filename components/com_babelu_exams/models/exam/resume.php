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


class Babelu_examsModelExamResume extends Babelu_examsModelExamBase
{

	/**
	 * Method to attach problems to each section
	 */
	public function attachProblems()
	{
		$problemRepository = new Babelu_examsRepositoryProblem('joomla');
		$parent_id = $this->exam->getSetting('save_id');
		
		foreach ($this->exam->getSections() AS $section)
		{
			if (!$section->hasProblems())
			{
				$section->attachProblems($problemRepository->getProblemsWithResponses('save', $parent_id, $section->getSetting('id')));
			}
		}
	}

}