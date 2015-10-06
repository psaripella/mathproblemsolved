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

class Babelu_examsEntityBase
{
	/**
	 * entity settings
	 * @var stdClass
	 */
	protected $settings;

	public function __construct(stdClass $settings = null)
	{
		if (is_null($settings))
		{
			$settings = new stdClass();
		}
		
		$this->settings = $settings;
	}
	
	/**
	 * Method to get a setting or default value.
	 * if the property doesn't exist, this method creates it using the default value
	 * @param string $key name of the setting
	 * @param mixed $default 
	 * @return mixed $setting->$key or default value
	 */
	public function getSetting($key, $default = null)
	{
		if (!isset($this->settings->$key))
		{
			$this->settings->$key = $default;
		}
	
		return $this->settings->$key;
	}
	
	public function getSettings()
	{
		return $this->settings;
	}
	
	/**
	 * Method to set or overwrite a setting
	 * @param string $key
	 * @param mixed $value
	 * @return $this to allow chaining
	 */
	public function setSetting($key, $value)
	{
		$this->settings->$key = $value;
		return $this;
	}
	
	public function mergeSettings($toMerge)
	{
		$merged = (object)array_merge((array)$toMerge,(array)$this->settings);
		$this->settings = $merged;
	}
	
	/**
	 * Method to check if this entity has settings data
	 * @return boolean
	 */
	public function hasSettings()
	{
		if (count((array)$this->settings))
		{
			return true;
		}
		return false;
	}
}