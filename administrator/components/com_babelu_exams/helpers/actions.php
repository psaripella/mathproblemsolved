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

class Babelu_examsHelperActions
{
	public static function canCreate($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.create', $assetName);
	}

	public static function canEdit($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.edit', $assetName);
	}

	public static function canEditOwn($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.edit.own', $assetName);
	}

	public static function canEditState($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.edit.state', $assetName);
	}

	public static function canDelete($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.delete', $assetName);
	}

	public static function canManage($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.manage', $assetName);
	}

	public static function canAdministor($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('core.admin', $assetName);
	}
	
	public static function canComment($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('bue.comment', $assetName);
	}
	
	public static function canGrade($assetName)
	{
		$user	= JFactory::getUser();
		return $user->authorise('bue.grade', $assetName);
	}
	
	
}