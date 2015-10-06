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
<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_MESSAGE_VARIABLE_KEY'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY')?></p>
			<dl>
				<dt><strong>{exam_title}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_EXAM_TITLE')?></p>
				</dd>
				<dt><strong>{examinee_name}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_EXAMINEE_NAME')?></p>
				</dd>
				<dt><strong>{examinee_email}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_EXAMINEE_EMAIL')?></p>
				</dd>
				<dt><strong>{pass_line}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_PASS_LINE')?></p>
				</dd>
				<dt><strong>{percentage_grade}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_PERCENTAGE_GRADE')?></p>
				</dd>
				<dt><strong>{exam_point_grade}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_POINT_GRADE')?></p>
				</dd>
				<dt><strong>{exam_result}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_RESULT')?></p>
				</dd>
				<dt><strong>{time_spent}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_TIME_SPENT')?></p>
				</dd>
				<dt><strong>{submission_date}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_SUBMISSION_DATE')?></p>
				</dd>
				<dt><strong>{result_link}</strong></dt>
				<dd>
					<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_MESSAGE_VARIABLE_KEY_RESULT_LINK')?></p>
				</dd>
				</dl>
</fieldset>