<?php
/**
 * @version     1.3.0
 * @package     joomla 3.x
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning http://mathewlenning.com/
 */

defined('_JEXEC') or die;

JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_core.css');
JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_exam.css');
JHTML::_('script','components/com_babelu_exams/assets/js/babelu_exams_navi.js');

$boxNumber = 1;
$inc = 1;
$points_possible = 0;

?>
<div class="span12">

<!-- SOF TAB CONTENT -->
		<?php foreach ($this->item->sections as $section):?>
		<div id="<?php echo('js-box'.$boxNumber);?>" class="<?php if ($boxNumber == 1){ echo 'open';} else {echo 'closed';} $boxNumber++;?>"> 
			<div class="row-fluid">
			<div class="span10" > <h3><?php echo $this->escape($section->title);?></h3> </div>
			<div class="span10"><?php echo $section->description;?></div>
			<?php if ($section->result_text != null):?> 
				<div class="span12"><?php echo $section->result_text;?></div>	
			<?php endif;?>
			</div>
			<?php foreach ($section->problems as $problem):?>
			<fieldset class="row-fluid">
			<legend><?php echo $inc; $inc++;?></legend>
				<div class="span8">
					<div class="row-fluid"><?php echo $problem->problem_text;?></div>
					<div class="row-fluid">
						<h5><?php echo JText::_('COM_BABELU_EXAMS_CORRECT_ANSWERS');?></h5>
						<ul>
						<?php foreach ($problem->answers as $answer):?>
							<li><?php echo $answer;?></li>
						<?php endforeach;?>
						</ul>
					</div>
					<div class="row-fluid">
						<h5><?php echo JText::_('COM_BABELU_EXAMS_USER_RESPONSE');?></h5>
						<ul>
						<?php foreach ($problem->user_response as $response):?>
							<li><?php echo $response;?></li>
						<?php endforeach;?>
						</ul>
					</div>
					
					<?php if ($this->canComment):?>
					<div class="row-fluid">
						<h3><?php echo JText::_('COM_BABELU_EXAMS_COMMENT');?></h3>
						<div class="controls"> <textarea rows="5"  style="width:90%;" name="jform[comment_<?php echo $problem->id;?>]" id="jform_<?php echo $problem->id;?>" class="text_area"><?php if (!is_null($problem->comment) && $problem->comment != ''){ echo $problem->comment;}?></textarea></div>
			    	</div>
			    	<?php endif;?>
			    	
			    	<?php if ($problem->point_value == 0):?>
						<?php $problem->point_value = $section->default_point_value;?>
					<?php endif;?>
					<?php $points_possible += $problem->point_value;?>
						
			    	<?php if ($this->canGrade):?>
			    	<div class="row-fluid">
			    		<h3><?php echo JText::_('COM_BABELU_EXAMS_GRADE');?></h3>
						<?php $no_points = ''; ?>
						<?php $partial_points ='';?>
						<?php $full_points = '';?>
						<?php $status = $problem->status;?>
						<?php if ($status == 0 || $status == 1):?>
							<?php $no_points = 'checked="checked"';?>
						<?php elseif ($status == 2):?>
							<?php $partial_points = 'checked="checked"';?>
						<?php elseif ($status == 3):?>
							<?php $full_points = 'checked="checked"';?>
						<?php endif;?>
					
						<?php $input_type = $section->input_type;?>
						<?php if ($section->use_problem_types == 1):?>
							<?php $input_type = $problem->default_input_type;?>
						<?php endif;?>
					
						<?php if ($input_type == 0 AND $status == 0):?>
							<?php if (in_array($problem->user_response[0], $problem->answers)):?>
								<?php $no_points = '';?>
								<?php $full_points = 'checked="checked"';?>
							<?php endif;?>
						<?php endif;?>
					
						<?php $pid = $problem->id;?>
						 
						<label>
							<input type="radio" name="jform[grade][<?php echo $pid;?>]" <?php echo $no_points;?> value="0" />
							<?php echo JText::_('COM_BABELU_EXAMS_NO_CREDIT');?>
						</label>	
			
						<label>
							<input type="radio" name="jform[grade][<?php echo $pid;?>]" <?php echo $partial_points;?> value="<?php echo ($problem->point_value / 2);?>" />
							<?php echo JText::_('COM_BABELU_EXAMS_HALF_CREDIT');?>
						</label>			
			
						<label>
							<input type="radio" name="jform[grade][<?php echo $pid;?>]" <?php echo $full_points; ?> value="<?php echo ($problem->point_value);?>" />
							<?php echo JText::_('COM_BABELU_EXAMS_FULL_CREDIT');?>
						</label>
						<input type="hidden" name="jform[point_value][<?php echo $problem->id;?>]" value="<?php echo ($problem->point_value);?>">
			    	</div>
			    	<hr/>
			    	<?php endif;?>
			    </div>
			</fieldset>
			<?php endforeach;?>
		</div>
		<?php endforeach;?>
	</div>
<!-- SOF TAB CONTENT -->
	<?php $this->points_possible = $points_possible;?>

