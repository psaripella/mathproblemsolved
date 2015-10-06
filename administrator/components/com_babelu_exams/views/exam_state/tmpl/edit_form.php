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
	<div class="width-100 fltlft">

		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_EXAM_STATE_EXAMINEE'); ?></legend>
				<ul class="adminformlist">
				<li style=" display: block; overflow: auto; font-size:1.1em">
					<label><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_NAME');?></label> <p style=" margin-top: 5px; margin-bottom: 5px; "><?php echo $this->userData->name;?></p>
				</li>
				
				<li style=" display: block; overflow: auto; font-size:1.1em">
					<label><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_EMAIL');?></label><p style=" margin-top: 5px; margin-bottom: 5px; "><a id="mailto_link" href="mailto:<?php echo $this->userData->email;?>"><?php echo $this->userData->email;?></a></p>
				</li>
				</ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_EXAM_STATE_EXAME_PERFORMANCE'); ?></legend>
				<ul class="adminformlist">
				<li style=" display: block; overflow: auto; font-size:1.1em">
					<label><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_EXAM_ID');?></label> <p style=" margin-top: 5px; margin-bottom: 5px; "><?php echo $this->examDetails->id;?></p>
				</li>
				<li style=" display: block; overflow: auto; font-size:1.1em">
					<label><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_EXAM_TITLE');?></label> <p style=" margin-top: 5px; margin-bottom: 5px; "><?php echo $this->examDetails->title;?></p>
				</li>
				<li style=" display: block; overflow: auto; font-size:1.1em">
					<label><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_AVG_PER');?></label> <p style=" margin-top: 5px; margin-bottom: 5px; "><?php echo round($this->results->avg_per,4);?>%</p>
				</li>
				
				<li style="display: block; overflow: auto; font-size:1.1em">
					<label><?php echo JText::_('COM_BABELU_EXAMS_EXAM_STATE_AVG_POINT');?></label> <p style=" margin-top: 5px; margin-bottom: 5px; "><?php echo round($this->results->avg_point,4);?></p>
				</li>
				</ul>
		</fieldset>
		<fieldset class="adminform">
		<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_EXAM_STATE_FORM'); ?></legend>
				<ul class="adminformlist">
				<li style=" display: block; overflow: auto;"><?php echo $this->form->getLabel('attempts'); ?>
				<?php echo $this->form->getInput('attempts'); ?></li>

				<li style=" display: block; overflow: auto;"><?php echo $this->form->getLabel('retakable_date'); ?>
				<?php echo $this->form->getInput('retakable_date'); ?></li>
				
				<li style="display: block; overflow: auto;clear:both;">
					<input type="submit"/>
				</li>
				</ul>			
		</fieldset>
	</div>
				
	<?php echo $this->form->getInput('id'); ?>
	<input type="hidden" name="task" value="exam_state.save" />
	<?php echo JHtml::_('form.token'); ?>
</form>
<div style="clear:both;"></div>

