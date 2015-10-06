<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

JPluginHelper::importPlugin('content');

require_once JPATH_COMPONENT_ADMINISTRATOR.'/autoloader.php';


// Execute the task.
$input = JFactory::getApplication()->input;

$controller	= Babelu_examsControllerDirector::getInstance('Babelu_exams', array('default_view' => null));
$controller->execute($input->get('task'));
$controller->redirect();