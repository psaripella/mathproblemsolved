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
				<?php echo $this->form->getLabel('pass_per'); ?>
				<?php echo $this->form->getInput('pass_per'); ?>
			</li>

			<li>
				<?php echo $this->form->getLabel('time_limit'); ?>
				<?php echo $this->form->getInput('time_limit'); ?>
			</li>
			
			<li>
				<?php echo $this->form->getLabel('grading_option'); ?>
				<?php echo $this->form->getInput('grading_option'); ?>
			</li>

			<li>
				<?php echo $this->form->getLabel('display_option'); ?>
				<?php echo $this->form->getInput('display_option'); ?>
			</li>
			
			<li>
				<?php echo $this->form->getLabel('catid'); ?>
				<?php echo $this->form->getInput('catid'); ?>
			</li>
			
			<li>
				<?php echo $this->form->getLabel('notification_id'); ?>
				<?php echo $this->form->getInput('notification_id'); ?>
			</li> 	 

			<li>
				<?php echo $this->form->getLabel('show_chart'); ?>
				<?php echo $this->form->getInput('show_chart'); ?>
			</li>						        
           
           <li>
           		<?php echo $this->form->getLabel('checked_out'); ?>
           		<?php echo $this->form->getInput('checked_out'); ?>
           	</li>
           
           <li>
           		<?php echo $this->form->getLabel('checked_out_time'); ?>
           		<?php echo $this->form->getInput('checked_out_time'); ?>
           	</li>
            
			<li>
				<div style="clear:left;"></div>
				<?php echo $this->form->getLabel('description'); ?>
				<div style="clear:left;"></div>
				<?php echo $this->form->getInput('description'); ?>
			</li>
			
            </ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_EXAM_LEGEND_ACCESS_CONTROL'); ?></legend>
			<ul class="adminformlist">
			<li>
				<?php echo $this->form->getLabel('access'); ?>
            	<?php echo $this->form->getInput('access'); ?>
            </li>  
            
            <li>
            	<?php echo $this->form->getLabel('results_access'); ?>
            	<?php echo $this->form->getInput('results_access'); ?>
            </li> 
            
            <li>
            	<?php echo $this->form->getLabel('state'); ?>
            	<?php echo $this->form->getInput('state'); ?>
            </li>           
			
			<li>
				<?php echo $this->form->getLabel('retake_limit'); ?>
				<?php echo $this->form->getInput('retake_limit'); ?>
			</li>
            
			<li>
				<?php echo $this->form->getLabel('retake_delay'); ?>
				<?php echo $this->form->getInput('retake_delay'); ?>
			</li>
			
			<li>
				<?php echo $this->form->getLabel('can_take_from'); ?>
				<?php echo $this->form->getInput('can_take_from'); ?>
			</li>

			<li>
				<?php echo $this->form->getLabel('can_take_until'); ?>
				<?php echo $this->form->getInput('can_take_until'); ?>
			</li>
			
			<li>
				<?php echo $this->form->getLabel('savable'); ?>
				<?php echo $this->form->getInput('savable'); ?>
			</li>
			
			<li>
				<?php echo $this->form->getLabel('multisave'); ?>
				<?php echo $this->form->getInput('multisave'); ?>
			</li>
			</ul>
		</fieldset>
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_BABELU_EXAMS_EXAM_LEGEND_PROBLEM_FILTERING'); ?></legend>
			<ul class="adminformlist">
				<li>
					<?php echo $this->form->getLabel('level'); ?>
					<?php echo $this->form->getInput('level'); ?>
				</li>
            
				<li>
					<?php echo $this->form->getLabel('level_filter_type'); ?>
					<?php echo $this->form->getInput('level_filter_type'); ?>
				</li>
			</ul>
		</fieldset>
	</div>
	<!-- begin ACL definition-->
 
   <div class="clr"></div>
 
   <?php if (Babelu_examsHelperActions::canAdministor('com_babelu_exams')): ?>
      <div class="width-100 fltlft">
         <?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
 
            <?php echo JHtml::_('sliders.panel', JText::_('COM_BABELU_EXAMS_FIELDSET_RULES'), 'access-rules'); ?>
            <fieldset class="panelform">
               <?php echo $this->form->getLabel('rules'); ?>
               <?php echo $this->form->getInput('rules'); ?>
            </fieldset>
 
         <?php echo JHtml::_('sliders.end'); ?>
      </div>
   <?php endif; ?>
 
   <!-- end ACL definition-->	

	<div class="clr"></div>