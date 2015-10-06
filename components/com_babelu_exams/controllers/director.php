<?php
/**
 * @version     1.9.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;
class Babelu_examsControllerDirector extends JControllerLegacy
{
	/**
	 * Method to get a singleton controller instance.
	 *
	 * @param   string  $prefix  The prefix for the controller.
	 * @param   array   $config  An array of optional constructor options.
	 *
	 * @return  JControllerLegacy
	 *
	 * @since   12.2
	 * @throws  Exception if the controller cannot be loaded.
	 */
	public static function getInstance($prefix, $config = array())
	{
		if (is_object(self::$instance))
		{
			return self::$instance;
		}
	
		$input = JFactory::getApplication()->input;
	
		// Get the environment configuration.
		$basePath = array_key_exists('base_path', $config) ? $config['base_path'] : JPATH_COMPONENT;
		$format   = $input->getWord('format');
		$command  = $input->get('task', 'display');
	
		// Check for array format.
		$filter = JFilterInput::getInstance();
	
		if (is_array($command))
		{
			$command = $filter->clean(array_pop(array_keys($command)), 'cmd');
		}
		else
		{
			$command = $filter->clean($command, 'cmd');
		}
	
		// Check for a controller.task command.
		if (strpos($command, '.') !== false)
		{
			// Explode the controller.task command.
			list ($type, $task) = explode('.', $command);
	
			// Define the controller filename and path.
			$file = self::createFileName('controller', array('name' => $type, 'format' => $format));
			$path = $basePath . '/controllers/' . $file;
			$backuppath = $basePath . '/controller/' . $file;
	
			// Reset the task without the controller context.
			$input->set('task', $task);
		}
		else
		{
			// Base controller.
			$type = $input->get('view', $config['default_view']);
	
			// Define the controller filename and path.
			$file       = self::createFileName('controller', array('name' => 'controller', 'format' => $format));
			$path       = $basePath . '/' . $file;
			$backupfile = self::createFileName('controller', array('name' => 'controller'));
			$backuppath = $basePath . '/' . $backupfile;
		}
	
		// Get the controller class name.
		$class = ucfirst($prefix) . 'Controller' . ucfirst($type);
	
		// Include the class if not present.
		if (!class_exists($class))
		{
			// If the controller file path exists, include it.
			if (file_exists($path))
			{
				require_once $path;
			}
			elseif (isset($backuppath) && file_exists($backuppath))
			{
				require_once $backuppath;
			}
			else
			{
				throw new InvalidArgumentException(JText::sprintf('JLIB_APPLICATION_ERROR_INVALID_CONTROLLER', $type, $format));
			}
		}
	
		// Instantiate the class.
		if (class_exists($class))
		{
			self::$instance = new $class($config);
		}
		else
		{
			throw new InvalidArgumentException(JText::sprintf('JLIB_APPLICATION_ERROR_INVALID_CONTROLLER_CLASS', $class));
		}
	
		return self::$instance;
	}
}