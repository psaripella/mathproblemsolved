<?php
/**
 * @version     1.10.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

?>

<?php

$user_response = $this->problem->getSetting('user_response', array());

if (!isset($user_response[0]) || $user_response[0] == JText::_('COM_BABELU_EXAMS_NO_RESPONSE'))
{
	$user_response[0] = '';
}

$name = 'problems['.$this->problem->getSetting('pid').'][user_response]';

$input = new Babelu_examsHtmlInput(array('type'=>'text','name' => $name, 'value' => $user_response[0], 'placeholder' => JText::_('COM_BABELU_EXAMS_PLACEHOLDER')), array('problem', 'short_answer'));


?>

<?php echo $input->renderHtml();?>
