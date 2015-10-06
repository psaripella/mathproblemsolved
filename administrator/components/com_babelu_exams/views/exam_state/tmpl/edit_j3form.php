<?php
/**
 * @version     1.8.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

?>

<div style="clear:both;"></div>
<form action="<?php echo JRoute::_('index.php?option=com_babelu_exams&layout=edit&id='.(int) $this->item->id); ?>" method="post" name="adminForm" id="exam-state-form" class="form-validate">
	<div class="row-fluid">

		<fieldset class="adminform span5">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_EXAM_STATE_EXAMINEE'); ?></legend>
				<div class="control-group">
					<div class="control-label"><label><strong><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_NAME');?>:</strong> <?php echo $this->userData->name;?></label></div>
				</div>
				<div class="control-group">
					<div class="control-label"><label><strong><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_EMAIL');?></strong></label></div>
					<div class="controls"><a id="mailto_link" href="mailto:<?php echo $this->userData->email;?>"><?php echo $this->userData->email;?></a></div>
				</div>
		</fieldset>
		<fieldset class="adminform span5">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_EXAM_STATE_EXAME_PERFORMANCE'); ?></legend>
				<div class="control-group">
					<div class="control-label"><label><strong><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_EXAM_ID');?>:</strong> <?php echo $this->examDetails->id;?></label></div>
				</div>
				<div class="control-group">
					<div class="control-label"><label><strong><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_EXAM_TITLE');?>:</strong> <?php echo $this->examDetails->title;?></label></div>
				</div>
				<div class="control-group">
					<div class="control-label"><label><strong><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_AVG_PER');?>:</strong> <?php echo round($this->results->avg_per,4);?>%</label></div>
				</div>								
				<div class="control-group">
					<div class="control-label"><label><strong><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_AVG_POINT');?>:</strong> <?php echo round($this->results->avg_point,4);?></label></div>
				</div>
		</fieldset>
		<fieldset class="adminform span10">
		<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_EXAM_STATE_FORM'); ?></legend>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('attempts'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('attempts'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('retakable_date'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('retakable_date'); ?></div>
				</div>
				<div class="control-group">
					<div class="controls"><input type="submit"/></div>
				</div>						
		</fieldset>
	</div>
				
	<?php echo $this->form->getInput('id'); ?>
	<input type="hidden" name="task" value="exam_state.save" />
	<?php echo JHtml::_('form.token'); ?>
</form>
<div style="clear:both;"></div>

