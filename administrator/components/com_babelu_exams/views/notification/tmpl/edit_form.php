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
<div class="width-60 fltlft">
	<fieldset class="adminform">
	<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_STANDARD'); ?></legend>
	<ul class="adminformlist">
		<li>
			<?php echo $this->form->getLabel('id'); ?>
			<?php echo $this->form->getInput('id'); ?>
		</li>
		<li>
			<?php echo $this->form->getLabel('title');?>
			<?php echo $this->form->getInput('title');?>
		</li>
	</ul>
	</fieldset>	
	<fieldset class="adminform">
	<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_NOTIFICATION_ADMIN'); ?></legend>
	<ul class="adminformlist">
		<li>
			<?php echo $this->form->getLabel('admin_to_notify');?>
			<?php echo $this->form->getInput('admin_to_notify');?>
		</li>
		<li>
			<?php echo $this->form->getLabel('admin_msg_id');?>
			<?php echo $this->form->getInput('admin_msg_id');?>
		</li>
		<li>
			<?php echo $this->form->getLabel('notify_admin_manual');?>
			<?php echo $this->form->getInput('notify_admin_manual');?>
		</li>
		<li>
			<?php echo $this->form->getLabel('notify_admin_automatic');?>
			<?php echo $this->form->getInput('notify_admin_automatic');?>
		</li>
	</ul>
	</fieldset>
	<fieldset class="adminform">
	<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_NOTIFICATION_USER'); ?></legend>
	<ul class="adminformlist">
		<li>
			<?php echo $this->form->getLabel('user_msg_id');?>
			<?php echo $this->form->getInput('user_msg_id');?>
		</li>
		<li>
			<?php echo $this->form->getLabel('comment_msg_id');?>
			<?php echo $this->form->getInput('comment_msg_id');?>
		</li>
		<li>
			<?php echo $this->form->getLabel('notify_user_automatic');?>
			<?php echo $this->form->getInput('notify_user_automatic');?>
		</li>
	</ul>
	</fieldset>
</div>