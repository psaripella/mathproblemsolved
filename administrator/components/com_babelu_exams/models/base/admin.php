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
jimport('joomla.application.component.modeladmin');

class Babelu_examsModelBaseAdmin extends JModelAdmin
{
	protected $text_prefix = 'COM_BABELU_EXAMS';
	
	public function getTable($type = '', $prefix = 'Babelu_examsTable', $config = array())
	{
		return JTable::getInstance($this->getName(), $prefix, $config);
	}
	
	public function getForm($data = array(), $loadData = true)
	{
		$app	= JFactory::getApplication();
		$form = $this->loadForm($this->option.'.'.$this->getName(), $this->getName(), array('control' => 'jform', 'load_data' => $loadData));
		if (empty($form)) { return false; }
		return $form;
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState($this->option.'.edit.'.$this->getName().'.data', array());
		if (empty($data)) 
		{ 
			$data = $this->getItem(); 
		}
		return $data;
	}
	
	public function getItem($pk = null)
	{
		if ($item = parent::getItem($pk)) 
		{ 
			
		}
		return $item;
	}
	
	protected function prepareTableFix($table)
	{
		jimport('joomla.filter.output');
		if (empty($table->id))
		{
			if (@$table->ordering === '')
			{
				$db = JFactory::getDbo();
				$db->setQuery('SELECT MAX(ordering) FROM '.$table->getTableName());
				$max = $db->loadResult();
				$table->ordering = $max+1;
			}
		}
	}
	
	/**
	 * Method to save the form data.
	 *
	 * @param   array  $data  The form data.
	 *
	 * @return  boolean  True on success, False on error.
	 *
	 * @since   11.1
	 */
	public function save($data)
	{
		// Initialise variables;
		$dispatcher = JDispatcher::getInstance();
		$table = $this->getTable();
		$key = $table->getKeyName();
		$pk = (!empty($data[$key])) ? $data[$key] : (int) $this->getState($this->getName() . '.id');
		$isNew = true;
	
		// Include the content plugins for the on save events.
		JPluginHelper::importPlugin('content');
	
		// Allow an exception to be thrown.
		try
		{
			// Load the row if saving an existing record.
			if ($pk > 0)
			{
				$table->load($pk);
				$isNew = false;
			}
	
			// Bind the data.
			if (!$table->bind($data))
			{
				$this->setError($table->getError());
				return false;
			}
	
			// Prepare the row for saving
			$this->prepareTableFix($table);
	
			// Check the data.
			if (!$table->check())
			{
				$this->setError($table->getError());
				return false;
			}
	
			// Trigger the onContentBeforeSave event.
			$result = $dispatcher->trigger($this->event_before_save, array($this->option . '.' . $this->name, &$table, $isNew));
			if (in_array(false, $result, true))
			{
				$this->setError($table->getError());
				return false;
			}
	
			// Store the data.
			if (!$table->store())
			{
				$this->setError($table->getError());
				return false;
			}
	
			// Clean the cache.
			$this->cleanCache();
	
			// Trigger the onContentAfterSave event.
			$dispatcher->trigger($this->event_after_save, array($this->option . '.' . $this->name, &$table, $isNew));
		}
		catch (Exception $e)
		{
			$this->setError($e->getMessage());
	
			return false;
		}
	
		$pkName = $table->getKeyName();
	
		if (isset($table->$pkName))
		{
			$this->setState($this->getName() . '.id', $table->$pkName);
		}
		$this->setState($this->getName() . '.new', $isNew);
	
		return true;
	}
}