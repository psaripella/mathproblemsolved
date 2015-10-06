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

abstract class Babelu_examsTableBase extends JTable
{
	public function bind($array, $ignore = '')
	{
		if (isset($array['params']) && is_array($array['params'])) 
		{
			$registry = new JRegistry();
			$registry->loadArray($array['params']);
			$array['params'] = (string)$registry;
		}

		if (isset($array['metadata']) && is_array($array['metadata'])) 
		{
			$registry = new JRegistry();
			$registry->loadArray($array['metadata']);
			$array['metadata'] = (string)$registry;
		}

		//TODO figure out how to implement rules without JRules
		
		if (isset($array['rules']) && is_array($array['rules']))
		{
			$rules = new JAccessRules($array['rules']);
			$this->setRules($rules);
		}
		
		return parent::bind($array, $ignore);
	}
	
	public function publish($pks = null, $state = 1, $userId = 0)
	{
		$k = $this->_tbl_key;
	
		JArrayHelper::toInteger($pks);
		$userId = (int) $userId;
		$state  = (int) $state;
	
		if (empty($pks))
		{
			if ($this->$k) { $pks = array($this->$k); }
			else
			{
				$this->setError(JText::_('JLIB_DATABASE_ERROR_NO_ROWS_SELECTED'));
				return false;
			}
		}
	
		$where = $k.'='.implode(' OR '.$k.'=', $pks);
	
		if (!property_exists($this, 'checked_out') || !property_exists($this, 'checked_out_time'))
		{
			$checkin = '';
		}
		else
		{
			$checkin = ' AND (checked_out = 0 OR checked_out = '.(int) $userId.')';
		}
		$this->_db->setQuery( 'UPDATE `'.$this->_tbl.'`'.' SET `state` = '.(int)$state.' WHERE ('.$where.')'.$checkin);
		$this->_db->query();
	
		if ($this->_db->getErrorNum())
		{
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
	
		if ($checkin && (count($pks) == $this->_db->getAffectedRows()))
		{
			foreach($pks as $pk) { $this->checkin($pk); }
		}
	
		if (in_array($this->$k, $pks)) { $this->state = $state;}
		$this->setError('');
		return true;
	}
}