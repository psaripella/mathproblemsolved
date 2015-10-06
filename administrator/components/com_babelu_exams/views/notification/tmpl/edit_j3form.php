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
<div class="row-fluid">
	<div class="span6 form-horizontal">
	
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_STANDARD'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
			</div>
		</fieldset>
		
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_NOTIFICATION_ADMIN'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('admin_to_notify'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('admin_to_notify'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('admin_msg_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('admin_msg_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('notify_admin_manual'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('notify_admin_manual'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('notify_admin_automatic'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('notify_admin_automatic'); ?></div>
			</div>
		</fieldset>
		
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_NOTIFICATION_USER'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('user_msg_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('user_msg_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('comment_msg_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('comment_msg_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('notify_user_automatic'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('notify_user_automatic'); ?></div>
			</div>
		</fieldset>
	</div>
</div>