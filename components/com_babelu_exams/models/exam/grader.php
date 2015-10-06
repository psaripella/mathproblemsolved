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

class Babelu_examsModelExamGrader extends Babelu_examsModelExamResult
{	
	/**
	 * Response repository
	 * @var Babelu_examsRepositoryResponse
	 */
	private $responseRepository;

	public function grade()
	{
		$exam = $this->getExam();
		
		// attach the problems
		$this->attachProblems();
		
		$pointsPossible = 0;
		$pointsEarned = 0;
		
		
		foreach ($exam->getSections() AS $section)
		{
			$this->gradeSection($section);
			
			$pointsPossible += $section->getSetting('points_possible');
			$pointsEarned += $section->getsetting('points_earned');
		}
		
		$exam->setResult($pointsPossible, $pointsEarned);
		
		$resultRepository = new Babelu_examsRepositoryResult('joomla');
		$resultRepository->updateResult($exam);
	}
	
	private function gradeSection($section)
	{
		$problems = $section->getProblems();
		foreach ($problems AS $problem)
		{
			$inputType = $section->getInputType($problem->getSetting('default_input_type'));

			switch ($inputType)
			{
				case 1: // multiple answer
					$this->gradeMultipleAnswer($section, $problem);
				break;
				default: //multiple choice, short answer, and short essay
					$this->gradeDefault($section, $problem);
				break;	
			}
		}
	}
	
	
	/**
	 * Method to grade multiple answer questions
	 * @param Babelu_examsEntitySection $section
	 */
	private function gradeMultipleAnswer($section, $problem)
	{
		$sectionPossible = $section->getSetting('points_possible', 0);
		$sectionEarned = $section->getSetting('points_earned', 0);
		
		$problemValue = $problem->getPointValue($section->getDefaultPointValue());
		$sectionPossible += $problemValue;
		$pointsEarned = 0;
			
		$correct = 0;
		$incorrect = 0;
			
		$responses = $problem->getSetting('user_response');
		foreach ($responses AS $response)
		{	
			if ($problem->isInAnswers($response, $section->isCaseSensitive()))
			{
				$correct++;
			}
			else
			{
				$incorrect++;
			}
		}
			
		$adjustedResult = $correct - $incorrect;
			
		if ($adjustedResult > 0)
		{
			$answerCount = $problem->countAnswers();
			$maxAnswers = $this->getMaxAnswers($section->getSetting('max_options'), $answerCount);
			$pointsEarned = ($problemValue / $maxAnswers) * $adjustedResult;
		}
			
		$problem->setPointsEarned($pointsEarned);
		$sectionEarned += $pointsEarned;
			
		$this->updateResponseStatus($problem);
		
		$section->setSetting('points_possible', $sectionPossible);
		$section->setSetting('points_earned', $sectionEarned);
		
	}
	
	/**
	 * Method to calculate the maximum answers that were displayed on the exam
	 * @param int $maxLimit
	 * @param int $actualCount
	 * @return int
	 */
	private function getMaxAnswers($maxLimit, $actualCount)
	{
		$maxAnswers = (int)$actualCount;
		
		if ($maxLimit != 0) 
		{
			if ($maxLimit % 2) // odd number
			{
				$maxAnswers = ((int)$maxLimit - 1) / 2;
			}
			else 
			{
				$maxAnswers = (int)$maxLimit / 2;
			}
			
			if ($maxAnswers > $actualCount)
			{
				$maxAnswers = (int)$actualCount;
			}
		}
		
		return $maxAnswers;
	}

	/**
	 * Method to grade multiple choice, short answer and short essay questions
	 * @param Babelu_examsEntitySection $section
	 */
	private function gradeDefault($section, $problem)
	{
		$sectionPossible = $section->getSetting('points_possible', 0);
		$sectionEarned = $section->getSetting('points_earned', 0);
	

		$problemValue = $problem->getPointValue($section->getDefaultPointValue());
		$sectionPossible += $problemValue;
		$pointsEarned = 0;
				
		$responses = $problem->getSetting('user_response');
				
		if ($problem->isInAnswers($responses[0], $section->isCaseSensitive()))
		{
			$pointsEarned = $problemValue;
		}
				
		$problem->setPointsEarned($pointsEarned);
		$sectionEarned += $pointsEarned;
			
		$this->updateResponseStatus($problem);
	
		$section->setSetting('points_possible', $sectionPossible);
		$section->setSetting('points_earned', $sectionEarned);
	}
	
	
	private function updateResponseStatus($problem)
	{
		if (!($this->responseRepository instanceof Babelu_examsRepositoryResponse))
		{
			$this->responseRepository = new Babelu_examsRepositoryResponse('joomla');
		}
		
		$this->responseRepository->updateResultResponse($problem);
	}
	
	/**
	 * Method to manually grade an exam
	 */
	public function manualGrade()
	{
		$exam = $this->getExam();
		$this->attachProblems();
		
		$graded = JFactory::getApplication()->input->get('grade', array(), 'array');
		$this->graded = $graded;
		$pointsPossible = 0;
		$pointsEarned = 0;
		
		foreach ($exam->getSections() AS $section)
		{
			foreach ($section->getProblems() AS $problem)
			{
				$response_id = $problem->getSetting('response_id');
				
				$pointsPossible += $problem->getPointValue($graded['p_'.$response_id]['ppossible']);
				$pointsEarned += $graded['p_'.$response_id]['pearned'];
				
				$filter = JFilterInput::getInstance();
				//set the points earned and comments on the problem
				$problem->setPointsEarned($graded['p_'.$response_id]['pearned']);
				$problem->setSetting('comment', trim($filter->clean($graded['p_'.$response_id]['comment'], 'string')));
				
				//update the response record
				$this->updateResponseStatus($problem);	
			}
		}
		
		$exam->setResult($pointsPossible, $pointsEarned);
		
		$resultRepository = new Babelu_examsRepositoryResult('joomla');
		$resultRepository->updateResult($exam);
	}
	
}