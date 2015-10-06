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

class Babelu_examsHelperToolbar
{
	private static function getAssetName()
	{
		return 'com_babelu_exams';
	}
	
	public static function addLogoStyle()
	{
		$document = JFactory::getDocument();
		
		if (Babelu_examsHelperBase::isJ3())
		{
			$document->addStyleDeclaration('.icon-export {background-image:url('.JURI::root().'media/com_babelu_exams/images/icon-export.png);}');
		}
		else
		{
			$document->addStyleDeclaration('.icon-48-babelu_exams{background-image: url('.JURI::root().'media/com_babelu_exams/images/babel-u-48x48.png);}');
		}
	}
	
	public static function addNew($controllerName)
	{
		if (Babelu_examsHelperActions::canCreate(self::getAssetName()))
		{
			JToolBarHelper::addNew($controllerName.'.add','JTOOLBAR_NEW');
		}
	}
	
	public static function editList($controllerName)
	{
		if (Babelu_examsHelperActions::canEdit(self::getAssetName()))
		{
			JToolBarHelper::editList($controllerName.'.edit','JTOOLBAR_EDIT');
		}
	}
	
	public static function publishUnpublish($controllerName)
	{
		if (Babelu_examsHelperActions::canEditState(self::getAssetName()))
		{
			JToolBarHelper::divider();
			JToolBarHelper::custom($controllerName.'.publish', 'publish.png', 'publish_f2.png','JTOOLBAR_PUBLISH', true);
			JToolBarHelper::custom($controllerName.'.unpublish', 'unpublish.png', 'unpublish_f2.png', 'JTOOLBAR_UNPUBLISH', true);
		}
	}
	
	public static function archiveList($controllerName)
	{
		if (Babelu_examsHelperActions::canEditState(self::getAssetName()))
		{
			JToolBarHelper::divider();
			JToolBarHelper::archiveList($controllerName.'.archive','JTOOLBAR_ARCHIVE');
		}
	}
	
	public static function checkIn($controllerName)
	{
		if (Babelu_examsHelperActions::canEditState(self::getAssetName()))
		{
			JToolBarHelper::custom($controllerName.'.checkin', 'checkin.png', 'checkin_f2.png', 'JTOOLBAR_CHECKIN', true);
		}
	}
	
	public static function deleteList($controllerName, $msg = '')
	{
		if (Babelu_examsHelperActions::canDelete(self::getAssetName()))
		{
			JToolBarHelper::deleteList($msg, $controllerName.'.delete','JTOOLBAR_DELETE');
		}
	}
	
	public static function trash($controllerName)
	{
		if (Babelu_examsHelperActions::canEditState(self::getAssetName()))
		{
			JToolBarHelper::trash($controllerName.'.trash','JTOOLBAR_TRASH');
		}
	}
	
	public static function preferences()
	{
		if (Babelu_examsHelperActions::canAdministor(self::getAssetName()))
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences(self::getAssetName());
		}
	}
	
	public static function apply($controllerName)
	{
		$canEdit = (Babelu_examsHelperActions::canEdit(self::getAssetName()));
		$canCreate = (Babelu_examsHelperActions::canCreate(self::getAssetName()));
		
		if ($canEdit || $canCreate)
		{
			JToolBarHelper::apply($controllerName.'.apply', 'JTOOLBAR_APPLY');
		}
	}
	
	public static function upload($controllerName)
	{
		$canEdit = (Babelu_examsHelperActions::canEdit(self::getAssetName()));
		$canCreate = (Babelu_examsHelperActions::canCreate(self::getAssetName()));
	
		if ($canEdit || $canCreate)
		{
			JToolBarHelper::save($controllerName.'.save', 'JTOOLBAR_UPLOAD');
		}
	}
	
	public static function save($controllerName)
	{
		$canEdit = (Babelu_examsHelperActions::canEdit(self::getAssetName()));
		$canCreate = (Babelu_examsHelperActions::canCreate(self::getAssetName()));
	
		if ($canEdit || $canCreate)
		{
			JToolBarHelper::save($controllerName.'.save', 'JTOOLBAR_SAVE');
		}
	}
	
	public static function saveToNew($controllerName)
	{
		if (Babelu_examsHelperActions::canCreate(self::getAssetName()))
		{
			JToolBarHelper::custom($controllerName.'.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
		}
	}
	
	public static function saveToCopy($controllerName)
	{
		if (Babelu_examsHelperActions::canCreate(self::getAssetName()))
		{
			JToolBarHelper::custom($controllerName.'.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
		}
	}
	
	public static function cancel($controllerName, $type = 'CANCEL')
	{
		JToolBarHelper::cancel($controllerName.'.cancel', 'JTOOLBAR_'.$type);
	}
}