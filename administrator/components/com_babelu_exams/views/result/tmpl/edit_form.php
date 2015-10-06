<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// no direct access
defined('_JEXEC') or die;

JHTML::_('stylesheet','babelu_exams_core.css','components/com_babelu_exams/assets/css/');
JHTML::_('stylesheet','babelu_exams_exam.css','components/com_babelu_exams/assets/css/');
JHTML::_('script','babelu_exams_navi.js','components/com_babelu_exams/assets/js/');

$boxNumber = 1; 
$inc = 1; 
$points_possible = 0;
?>
<div class="clr"></div>

<!-- SOF SECTION -->
<?php foreach ($this->item->sections as $section):?>
	<div id="<?php echo('js-box'.$boxNumber);?>" class="<?php if ($boxNumber == 1){ echo 'open';} else {echo 'closed';} $boxNumber++;?>">
		<div class="babelu_exams_section_head">
			<h2><?php echo $this->escape($section->title);?></h2>
		</div>
		<div class="babelu_exams_section_desc">
			<?php echo $section->description;?>
		</div>
		
		<?php if ($section->result_text != null):?>
			<div class="babelu_exams_section_result_text">
				<?php echo $section->result_text;?>
			</div>	
		<?php endif;?>
		<div class="clr"></div>
		
<!-- SOF PROBLEMS -->
		<div class="babelu_exams_problems_wrapper">
			<?php foreach ($section->problems as $problem):?>
				<div class="width-100">
					<fieldset class="adminform">
					<legend><?php echo $inc;?></legend>
					<ul class="adminformlist">
						<li>
							<?php echo $problem->problem_text;?>
						</li>
						<li>
							<h3><?php echo JText::_('COM_BABELU_EXAMS_CORRECT_ANSWERS');?></h3>
							<ul>
							<?php foreach ($problem->answers as $answer):?>
								<li><p><?php echo $answer;?></p></li>
							<?php endforeach;?>
							</ul>
						</li>
					
						<li>
							<h3><?php echo JText::_('COM_BABELU_EXAMS_USER_RESPONSE');?></h3>
							<ul>
							<?php foreach ($problem->user_response as $response):?>
								<li><p><?php echo $response;?></p></li>
							<?php endforeach;?>
							</ul>
						</li>
					
						<?php if ($this->canComment):?>
							<li>
								<h3><?php echo JText::_('COM_BABELU_EXAMS_COMMENT');?></h3>
			 					<textarea rows="10" name="jform[comment_<?php echo $problem->id;?>]" id="jform_<?php echo $problem->id;?>" class="text_area">
			 						<?php if (!is_null($problem->comment) && $problem->comment != ''):?>
			 							<?php echo $problem->comment;?>
			 						<?php endif;?>
			 					</textarea>
							</li>
						<?php endif;?>
				
						<?php if ($problem->point_value == 0):?>
						<?php $problem->point_value = $section->default_point_value;?>
						<?php endif;?>
						<?php $points_possible += $problem->point_value;?>
					
						<?php if ($this->canGrade):?>
							<li>
							<div class="clr"></div>
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
							</li>
						<?php endif;?>
						</ul>
					</fieldset>
				</div>
				<?php endforeach;?>
			</div>
<!-- EOF PROBLEMS -->
		</div>
		<?php endforeach;?>
<!-- EOF SECTION -->
		<?php $this->points_possible = $points_possible; ?>


