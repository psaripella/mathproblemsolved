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

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_babelu_exams')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

require_once JPATH_COMPONENT.'/autoloader.php';

jimport('joomla.application.component.controller');
jimport('joomla.application.component.view');

// Execute the task.
$input = JFactory::getApplication()->input;
$controller	= JControllerLegacy::getInstance('Babelu_exams');
$controller->execute($input->get('task'));
$controller->redirect();
 