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
				<div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('title'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('exam_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('exam_id'); ?></div>
			</div>
			</fieldset>
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_SECTION_PROBLEM_SETTINGS'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('group_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('group_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('use_problem_types'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('use_problem_types'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('input_type'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('input_type'); ?></div>
			</div>
    		<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('level'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('level'); ?></div>
				</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('level_filter_type'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('level_filter_type'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('randomize'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('randomize'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('problem_count'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('problem_count'); ?></div>
			</div>			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('max_options'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('max_options'); ?></div>
			</div>
			</fieldset>
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_SECTION_GRADING'); ?></legend>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('default_point_value'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('default_point_value'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('case_sensitivity'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('case_sensitivity'); ?></div>
			</div>
			</fieldset>
			
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_EXAM_LEGEND_DESCRIPTION'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_SECTION_DESCRIPTION'); ?> </p>
			<dl>
				<dt><strong>{section_start}</strong></dt>
				<dd><p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_SECTION_SECTION_START');?></p></dd>
				<dt><strong>{section_end}</strong></dt>
				<dd><p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_SECTION_SECTION_END');?></p></dd>
			</dl>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('description'); ?></div>
			</div>
			</fieldset>
			
			<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_RESULT_TEXT'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_SECTION_RESULT_TEXT');?></p>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('result_text'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('result_text'); ?></div>
			</div>
			
            </fieldset>
    	</div>      
    </div>