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

class Babelu_examsUtilityExamState
{
	protected $user;
	protected $exam_state;
	protected $msg;
	
	public function __construct()
	{
		$app = JFactory::getApplication();
		$exam_id = $app->input->get('id', 0,'int');
		$this->user = JFactory::getUser();
		$this->exam_state = $this->loadExamState($exam_id);
	}
	
	private function loadExamState($exam_id)
	{
		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('a.state,a.retake_limit, a.retake_delay, a.access,a.results_access, a.can_take_from, a.can_take_until');
		$query->from('#__babelu_exams_exams AS a');
		$query->select('b.attempts, b.retakable_date');
		$query->join('LEFT', '#__babelu_exams_exam_states AS b ON b.exam_id = a.id AND b.user_id = '.(int)$this->user->id);
		$query->where('a.id = '.$exam_id);
		$db->setQuery($query);
		return $db->loadObject();
		
	}
	
	public function canTakeExam()
	{
		if (!$this->hasData())
		{
			return false; // no data
		}
	
		if (!$this->hasAccess())
		{
			return false; // no access
		}
	
		if (!$this->isPublished())
		{
			return false; // cannot take unpublished / archived exams
		}
	
		if ($this->hasTaken())
		{
			if ($this->limitReached())
			{
				return false; // retake limit exceeded
			}
	
			if ($this->InCooldown())
			{
				return false; // in cooldown period
			}
		}
		
		//check the examination periods
		if ($this->canTakeFromIsSet())
		{
			If($this->isNotOpenYet())
			{
				return false;
			}
		}
		
		
		if ($this->canTakeUntilIsSet())
		{
			if ($this->isClosed())
			{
				return false;
			}
		}
		
		
		return true; // all clear.
	}

	public function getMsg()
	{
		return $this->msg;
	}
	
	public function hasData()
	{
		if (isset($this->exam_state) && $this->exam_state != null)
		{return true;} // has exam data
		$this->msg = JText::_('COM_BABELU_EXAMS_EXAM_NOT_FOUND');
		return false; // no data
	}
	
	public function canViewResults()
	{
		if (in_array($this->exam_state->results_access, $this->user->getAuthorisedViewLevels()))
		{ 
			return true; 
		} // has access
		
		$this->msg = JText::_('COM_BABELU_EXAMS_ERROR_ATTEMPTING_TO_ACCESS_RESTRICTED_RESULTS');
		
		if ($this->user->guest)  //Append login message
		{ 
			$this->msg .= ' '.JText::_('COM_BABELU_EXAMS_ERROR_LOGIN_REQUIRED'); 
		}
		
		return false; //doesn't have access
	}
	
	protected function hasAccess()
	{
		if (in_array($this->exam_state->access, $this->user->getAuthorisedViewLevels()))
		{ return true; }// has access
		$this->msg = JText::_('COM_BABELU_EXAMS_ERROR_ATTEMPTING_TO_ACCESS_RESTRICTED_CONTENT');
		if ($this->user->guest)  //Append login message
		{ $this->msg .= ' '.JText::_('COM_BABELU_EXAMS_ERROR_LOGIN_REQUIRED'); }
		return false; //doesn't have access
	}
	
	protected function hasTaken()
	{
		if (!isset($this->exam_state->attempts) 
				|| $this->exam_state->attempts == null 
				|| $this->exam_state->attempts == ''
				|| $this->exam_state->attempts == 0)
		{ return false; }// has not taken the exam before
		return true; // has taken the exam before
	}
	
	protected function limitReached()
	{
		if ($this->exam_state->retake_limit == 0 
				|| $this->exam_state->retake_limit > $this->exam_state->attempts)
		{ return false; } // Limit not reached
		$this->msg = JText::_('COM_BABELU_EXAMS_ERROR_RETAKE_LIMIT_REACHED');
		return true; // Limit reached
	}
	
	protected function InCooldown()
	{
		$retakable = new JDate($this->exam_state->retakable_date);
		$today = new JDate();
	
		if ($this->exam_state->retake_delay == 0 
				|| $retakable->toUnix() < $today->toUnix())
		{ return false; } // Not in Cooldown
		$this->msg = JText::_('COM_BABELU_EXAMS_ERROR_RETAKE_DELAY');
		$this->msg .=' '.JText::_('COM_BABELU_EXAMS_ERROR_RETAKE_ON');
		$this->msg .=' '.$this->getRetakableDate();
		return true; // in cooldown
	}
	
	protected function getRetakableDate()
	{
		$retakable = new JDate($this->exam_state->retakable_date);
		return $retakable->format('M-d-Y H:i:s T');
	}
	
	protected function isPublished()
	{
		if ($this->exam_state->state == 1)
		{ return true; } // Is published
		$this->msg= JText::_('COM_BABELU_EXAMS_ERROR_EXAM_HAS_BEEN_UNPUBLISHED');
		return false; // Isn't published
	}
	
	protected function canTakeFromIsSet()
	{
		if ($this->exam_state->can_take_from != "0000-00-00 00:00:00")
		{
			return true;
		}
		return false;
	}
	
	protected function isNotOpenYet()
	{
		$now = new JDate();
		$can_take_from_date = new JDate($this->exam_state->can_take_from);

		if ($now->toUnix() < $can_take_from_date->toUnix())
		{
			$this->msg= JText::_('COM_BABELU_EXAMS_ERROR_EXAM_PERIOD_NOT_OPEN').' '.$can_take_from_date->format('Y-m-d H:i:s');
			return true;
		}
		return false;
	}
	
	protected function canTakeUntilIsSet()
	{
		if ($this->exam_state->can_take_until != "0000-00-00 00:00:00")
		{
			return true;
		}
		return false;
	}
	
	protected function isClosed()
	{
		$now = new JDate();
		$can_take_until_date = new JDate($this->exam_state->can_take_until);
		
		if ($now->toUnix() >= $can_take_until_date->toUnix())
		{
			$this->msg = JText::_('COM_BABELU_EXAMS_ERROR_EXAM_PERIOD_CLOSED').' '.$can_take_until_date->format('Y-m-d H:i:s');
			return true;
		}
		
		return false;
	}
}
