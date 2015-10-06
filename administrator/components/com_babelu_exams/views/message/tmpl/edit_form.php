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
<div class="width-50 fltlft">
<fieldset class="adminform">
<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_MESSAGE_TEMPLATE'); ?></legend>
	<ul class="adminformlist">
	<li>
		<?php echo $this->form->getLabel('id'); ?>
		<?php echo $this->form->getInput('id'); ?>
	</li>
	<li>
		<?php echo $this->form->getLabel('title');?>
		<?php echo $this->form->getInput('title');?>
	</li>
	<li>
		<?php echo $this->form->getLabel('msg_subject');?>
		<?php echo $this->form->getInput('msg_subject');?>
	</li>
	<li>
		<div style="clear:both;"></div>
		<?php echo $this->form->getLabel('msg_body');?>
		<div style="clear:both;"></div>
		<?php echo $this->form->getInput('msg_body');?>
		<div style="clear:both;"></div>
	</li>
	</ul>
</fieldset >
</div>
<div class="width-50 fltlft">
	<?php echo $this->loadTemplate('varkeys');?>
</div>