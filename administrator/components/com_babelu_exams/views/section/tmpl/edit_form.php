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
					<?php echo $this->form->getLabel('title'); ?>
					<?php echo $this->form->getInput('title'); ?>
				</li>
			
				<li>
					<?php echo $this->form->getLabel('exam_id'); ?>
					<?php echo $this->form->getInput('exam_id'); ?>
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
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_SECTION_PROBLEM_SETTINGS'); ?></legend>
			<ul class="adminformlist">
			
				<li>
					<?php echo $this->form->getLabel('group_id'); ?>
					<?php echo $this->form->getInput('group_id'); ?>
				</li>
				
				<li>
					<?php echo $this->form->getLabel('use_problem_types'); ?>
					<?php echo $this->form->getInput('use_problem_types'); ?>
				</li> 
				           
				<li>
					<?php echo $this->form->getLabel('input_type'); ?>
					<?php echo $this->form->getInput('input_type'); ?>
				</li>
			
				<li>
					<?php echo $this->form->getLabel('level'); ?>
					<?php echo $this->form->getInput('level'); ?>
				</li>
            
				<li>
					<?php echo $this->form->getLabel('level_filter_type'); ?>
					<?php echo $this->form->getInput('level_filter_type'); ?>
				</li>

				<li>
					<?php echo $this->form->getLabel('randomize'); ?>
					<?php echo $this->form->getInput('randomize'); ?>
				</li>			
            
				<li>
					<?php echo $this->form->getLabel('problem_count'); ?>
					<?php echo $this->form->getInput('problem_count'); ?>
				</li>
            
				<li>
					<?php echo $this->form->getLabel('max_options'); ?>
					<?php echo $this->form->getInput('max_options'); ?>
				</li>
			</ul>
		</fieldset>
		
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_SECTION_GRADING'); ?></legend>
			<ul class="adminformlist">		
				<li>
					<?php echo $this->form->getLabel('default_point_value'); ?>
					<?php echo $this->form->getInput('default_point_value'); ?>
				</li>
			
				<li>
					<?php echo $this->form->getLabel('case_sensitivity'); ?>
					<?php echo $this->form->getInput('case_sensitivity'); ?>
				</li>
			</ul>
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
			<ul class="adminformlist">
				<li>
					<div style="clear:left"></div>
					<?php echo $this->form->getInput('description'); ?>
				</li>
			</ul>
		</fieldset>
		
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_LEGEND_RESULT_TEXT'); ?></legend>
			<p><?php echo JText::_('COM_BABELU_EXAMS_FORM_DESC_SECTION_RESULT_TEXT');?></p>
			<ul class="adminformlist">
				<li>
					<div style="clear:left"></div>
					<?php echo $this->form->getInput('result_text'); ?>
				</li>
			</ul>
		</fieldset>
	</div>