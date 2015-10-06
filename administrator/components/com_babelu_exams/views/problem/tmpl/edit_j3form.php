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
		<div class="span10 form-horizontal">
            <fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_STANDARD'); ?></legend>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('id'); ?></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('standard'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('standard'); ?></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('group_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('group_id'); ?></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('problem_text'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('problem_text'); ?></div>
			</div>	
			</fieldset>				

			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_PROBLEM_ANSWERS_AND_OPTIONS'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_DESC_PROBLEM_ANSWERS_AND_OPTIONS'); ?></p>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('answers'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('answers'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('options'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('options'); ?></div>
			</div>
			</fieldset>
			
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_PROBLEM_OPTIONAL'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('level'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('level'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('point_value'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('point_value'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('default_input_type'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('default_input_type'); ?></div>
			</div>
			</fieldset>
			
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_RESULT_TEXT'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_PROBLEM_RESULT_TEXT'); ?></p>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('result_text'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('result_text'); ?></div>
			</div>
            </fieldset>
    	</div>     
    </div>
