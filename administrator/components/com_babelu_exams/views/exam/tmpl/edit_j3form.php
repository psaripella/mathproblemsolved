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
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('pass_per'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('pass_per'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('time_limit'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('time_limit'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('grading_option'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('grading_option'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('display_option'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('display_option'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('notification_id'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('notification_id'); ?></div>
			</div>
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('show_chart'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('show_chart'); ?></div>
			</div>
			
			<div class="control-group">
				<div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
				<div class="controls"><?php echo $this->form->getInput('description'); ?></div>
			</div>
				
            </fieldset>
            
    		<fieldset class="adminform">
				<legend><?php echo JText::_('COM_BABELU_EXAMS_EXAM_LEGEND_ACCESS_CONTROL'); ?></legend>
				
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('access'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('access'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('results_access'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('results_access'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('state'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('state'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('retake_limit'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('retake_limit'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('retake_delay'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('retake_delay'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('can_take_from'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('can_take_from'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('can_take_until'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('can_take_until'); ?></div>
				</div>				
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('savable'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('savable'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('multisave'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('multisave'); ?></div>
				</div>				
			</fieldset>
			
			<fieldset class="adminform">
    			<legend><?php echo JText::_('COM_BABELU_EXAMS_EXAM_LEGEND_PROBLEM_FILTERING'); ?></legend>
    			<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('level'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('level'); ?></div>
				</div>
				<div class="control-group">
					<div class="control-label"><?php echo $this->form->getLabel('level_filter_type'); ?></div>
					<div class="controls"><?php echo $this->form->getInput('level_filter_type'); ?></div>
				</div>
    		</fieldset>
    		<!-- begin ACL definition-->
    		  <div class="clr"></div>
 
   			 <?php if (Babelu_examsHelperActions::canAdministor('com_babelu_exams')): ?>
     
           		<fieldset class="adminform">
           		<legend><?php echo JText::_('COM_BABELU_EXAMS_FIELDSET_RULES');?></legend>
            	 <?php echo $this->form->getInput('rules'); ?>
           		</fieldset>
  			<?php endif; ?>
 
   			<!-- end ACL definition-->
    	</div>
        
    </div>