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

class Babelu_examsTableExam extends Babelu_examsTableBase
{
	public function __construct($db)
	{
		parent::__construct('#__babelu_exams_exams', 'id', $db);
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
    		$this->$k = $pk;
    		$name = $this->_getAssetName();
    		$asset = JTable::getInstance('Asset');
    
    		if ($asset->loadByName($name))
    		{
    			if (!$asset->delete())
    			{
    				$this->setError($asset->getError());
    				return false;
    			}
    		}
    		else
    		{
    			$this->setError($asset->getError());
    			return false;
    		}
    	}
    
    	$query = $this->_db->getQuery(true);
    	$query->delete();
    	$query->from($this->_tbl);
    	$query->where($this->_tbl_key . ' = ' . $this->_db->quote($pk));
    	$this->_db->setQuery($query);

    	if (!$this->_db->query())
    	{
    		$e = new JException(JText::sprintf('JLIB_DATABASE_ERROR_DELETE_FAILED', get_class($this), $this->_db->getErrorMsg()));
    		$this->setError($e);
    		return false;
    	}
    
    	// Now get a list of all the results records associated with the exam
    	$query = $this->_db->getQuery(true);
    	$query->select('id');
    	$query->from('#__babelu_exams_results');
    	$query->where('exam_id = '. $this->_db->quote($pk));
    	$this->_db->setQuery($query);
    	
    	$rid_list = $this->_db->loadObjectList();
    	
    	// if the list is an array then process the array
    	if(is_array($rid_list))
    	{
   			foreach ($rid_list as $r_id)
   			{
   				// delete all response records
   				$query = $this->_db->getQuery(true);
   				$query->delete();
   				$query->from('#__babelu_exams_r_response');
   				$query->where('result_id = '.$r_id->id);
   				$this->_db->setQuery($query);
   				
   				//TODO add some error checking
   				$this->_db->query();
   				
   				// delete all results records
   				$query = $this->_db->getQuery(true);
   				$query->delete();
   				$query->from('#__babelu_exams_results');
   				$query->where('id = '.$r_id->id);
   				$this->_db->setQuery($query);
   				
   				//TODO add some error checking
   				$this->_db->query();
   			}
   				
    	}   	
    	// Now get a list of all the saves records associated with the exam
    	$query = $this->_db->getQuery(true);
    	$query->select('id');
    	$query->from('#__babelu_exams_saves');
    	$query->where('exam_id = '. $this->_db->quote($pk));
    	$this->_db->setQuery($query);
    	
    	$sid_list = $this->_db->loadObjectList();
    	
    	// if the list is an array then process the array
    	if(is_array($sid_list))
    	{
    		foreach ($sid_list as $s_id)
    		{
    			// delete all save respones
    			$query = $this->_db->getQuery(true);
    			$query->delete();
    			$query->from('#__babelu_exams_s_response');
    			$query->where('save_id = '.$s_id->id);
    			$this->_db->setQuery($query);
    	
    			//TODO add some error checking
    			$this->_db->query();
    	
    			//delete all save records
    			$query = $this->_db->getQuery(true);
    			$query->delete();
    			$query->from('#__babelu_exams_saves');
    			$query->where('id = '.$s_id->id);
    			$this->_db->setQuery($query);
    	
    			//TODO add some error checking
    			$this->_db->query();
    		}
    	}
    	return true;
    }

    /**
     * Method to compute the default name of the asset.
     * The default name is in the form `table_name.id`
     * where id is the value of the primary key of the table.
     *
     * @return      string
     * @since       2.5
     */
    protected function _getAssetName()
    {
    	$k = $this->_tbl_key;
    	return 'com_babelu_exams.exam.'.(int) $this->$k;
    }
    
    /**
     * Method to get the asset-parent-id of the item
     *
     * @return      int
     */
    protected function _getAssetParentId(JTable $table = NULL, $id = NULL)
    {
    	// We will retrieve the parent-asset from the Asset-table
    	$assetParent = JTable::getInstance('Asset');
    	// Default: if no asset-parent can be found we take the global asset
    	$assetParentId = $assetParent->getRootId();

    	// The item has the component as asset-parent
    	$assetParent->loadByName('com_babelu_exams');

    
    	// Return the found asset-parent-id
    	if ($assetParent->id)
    	{
    		$assetParentId=$assetParent->id;
    	}
    	return $assetParentId;
    }
}
