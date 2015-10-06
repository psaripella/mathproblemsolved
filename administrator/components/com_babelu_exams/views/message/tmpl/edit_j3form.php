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
		<div class="span8 form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_MESSAGE_TEMPLATE'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('msg_subject'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('msg_subject'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('msg_body'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('msg_body'); ?></div>
			</div>
		</fieldset>
		</div>
		<div class="span4">
		<?php echo $this->loadTemplate('varkeys');?>
		</div>
</div>