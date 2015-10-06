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
            		<?php echo $this->form->getLabel('standard'); ?>
					<?php echo $this->form->getInput('standard'); ?>
				</li>
           		<li>
           			<?php echo $this->form->getLabel('group_id'); ?>
					<?php echo $this->form->getInput('group_id'); ?>
				</li>
				<li>
					<div style="clear:left;"></div>
					<?php echo $this->form->getLabel('problem_text'); ?>
					<div style="clear:left;"></div>
					<?php echo $this->form->getInput('problem_text'); ?>
					<div style="clear:left;"></div>
				</li>
            </ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_PROBLEM_ANSWERS_AND_OPTIONS'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_PROBLEM_ANSWERS_AND_OPTIONS'); ?></p>
			<ul class="adminformlist">
				<li>
					<?php echo $this->form->getLabel('answers'); ?>
					<?php echo $this->form->getInput('answers'); ?>
				</li>
				<li>
					<?php echo $this->form->getLabel('options'); ?>
					<?php echo $this->form->getInput('options'); ?>
				</li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_PROBLEM_OPTIONAL'); ?></legend>
			<ul class="adminformlist">
				<li>
					<?php echo $this->form->getLabel('level'); ?>
					<?php echo $this->form->getInput('level'); ?>
				</li>
				<li>
					<?php echo $this->form->getLabel('point_value'); ?>
					<?php echo $this->form->getInput('point_value'); ?>
				</li>
				<li>
					<?php echo $this->form->getLabel('default_input_type'); ?>
					<?php echo $this->form->getInput('default_input_type'); ?>
				</li>				
				<li>
					<?php echo $this->form->getLabel('state'); ?>
					<?php echo $this->form->getInput('state'); ?>
				</li>
           		<li>
           			<?php echo $this->form->getLabel('checked_out'); ?>
           			<?php echo $this->form->getInput('checked_out'); ?>
           		</li>
          		<li>
          			<?php echo $this->form->getLabel('checked_out_time'); ?>
          			<?php echo $this->form->getInput('checked_out_time'); ?>
          		</li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_RESULT_TEXT'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_PROBLEM_RESULT_TEXT'); ?></p>
			<ul class="adminformlist">
				<li>
					<div style="clear:left;"></div>
					<?php echo $this->form->getInput('result_text'); ?>
				</li>
			</ul>
		</fieldset>
	</div>