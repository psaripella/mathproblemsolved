<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

class Babelu_examsTableResult extends Babelu_examsTableBase
{

	public function __construct($db)
	{
		parent::__construct('#__babelu_exams_results', 'id', $db);
	}

	public function check() 
	{
		if (property_exists($this, 'ordering') && $this->id == 0)
		{
			$this->ordering = self::getNextOrder();
		}
		return parent::check();
	}

    public function delete($pk = null)
    {
    	$k = $this->_tbl_key;
    	$pk = (is_null($pk)) ? $this->$k : $pk;
    
    	if ($pk === null) 
    	{
    		$e = new JException(JText::_('JLIB_DATABASE_ERROR_NULL_PRIMARY_KEY'));
    		$this->setError($e);
    		return false;
    	}

    	if ($this->_trackAssets) 
    	{
			if (!$this->deleteAssests($pk))
			{
				return false;
			}
    	}
    	
    	$resultRecord = $this->loadResultRecord($pk);
    	$exam_state = $this->loadExamState($resultRecord->exam_id, $resultRecord->user_id);
    	
    	if (!$this->adjustExamState($exam_state))
    	{
    		return false;
    	}
    	
    	if (!$this->deleteResponses($pk))
    	{
   			return false;
    	}
    	
    	if (!$this->deleteResult($pk))
    	{
    		return false;
    	}
    	
    	return true;
    }
    
    private function deleteAssests($pk)
    {
    	$this->$k	= $pk;
    	$name		= $this->_getAssetName();
    	$asset		= JTable::getInstance('Asset');
    	
    	if ($asset->loadByName($name)) 
    	{
    	    if (!$asset->delete()) 
    		{
    			return false;
    		}
    	}
    	else 
    	{
    		return false;
    	}
    	return true;
    }
    
    private function deleteResponses($pk)
    {
    	$query = $this->_db->getQuery(true);
    	$query->delete();
    	$query->from('#__babelu_exams_r_response');
    	$query->where('parent_id = '.$this->_db->quote($pk));
    	$this->_db->setQuery($query);
    	 
    	// Check for a database error.
    	if (!$this->_db->execute())
    	{
    		$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_DELETE_FAILED', get_class($this), $this->_db->getErrorMsg()));
    		$this->setError($e);
    		return false;
    	}
    	return true;
    }
    
    private function loadResultRecord($pk)
    {
    	$query = $this->_db->getQuery(true);
    	$query->select('*');
    	$query->from($this->_tbl);
    	$query->where($this->_tbl_key.' = '.$this->_db->quote($pk));
    	$this->_db->setQuery($query);
    	return $this->_db->loadObject();
    }
    
    private function loadExamState($exam_id, $user_id)
    {
    	$query = $this->_db->getQuery(true);
    	$query->select('*');
    	$query->from('#__babelu_exams_exam_states');
    	$query->where('exam_id = '.$this->_db->quote($exam_id));
    	$query->where('user_id = '.$this->_db->quote($user_id));
    	$this->_db->setQuery($query);
    	return $this->_db->loadObject();
    }
    
    private function adjustExamState($exam_state)
    {
    	$attempts = $exam_state->attempts;
    	if ($attempts >= 1)
    	{
    		$attempts = $attempts - 1;
    	}
    	
    	return $this->updateExamState($exam_state->id, $attempts);
    }
    
    private function updateExamState($exam_state_id, $attempts)
    {
    	$query = $this->_db->getQuery(true);
    	$query->update('#__babelu_exams_exam_states');
    	$query->set('attempts = '.(int)$attempts);
    	$query->where('id = '.$this->_db->quote($exam_state_id));
    	$this->_db->setQuery($query);
    	return $this->_db->execute();
    }
    
    private function deleteResult($pk)
    {
    	// Delete the row by primary key.
    	$query = $this->_db->getQuery(true);
    	$query->delete();
    	$query->from($this->_tbl);
    	$query->where($this->_tbl_key.' = '.$this->_db->quote($pk));
    	$this->_db->setQuery($query);
    	
    	// Check for a database error.
    	if (!$this->_db->execute())
    	{
    		$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_DELETE_FAILED', get_class($this), $this->_db->getErrorMsg()));
    		$this->setError($e);
    		return false;
    	}
    	return true;
    }
}
