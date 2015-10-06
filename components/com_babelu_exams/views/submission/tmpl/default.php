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

JHtml::_('behavior.keepalive');

JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_core.css');
JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_exam.css');
JHTML::_('script','components/com_babelu_exams/assets/js/babelu_utility.js');
JHTML::_('script','components/com_babelu_exams/assets/js/babelu_exams.js');

$boxNumber = 1;
$inc = 1;

?>
<div class="babelu_exams_wrapper">
<!-- SOF HEADER -->
	<div id="babelu_exams_header">
		<h2 class="componentheading"><?php echo $this->exam->getSetting('title');?></h2>
	</div>
<!-- EOF HEADER -->

<form action="<?php echo JRoute::_('index.php');?>" method="post" name="babelu_examForm" id="babelu_examForm">
	<!-- SOF SECTIONS ---------------------------------------------------------->
<?php $prevSectionEnd = 0;?>	
<?php foreach ($this->exam->getSections() as $section):?>

		<div id="<?php echo('js-box'.$boxNumber); $boxNumber++;?>" class="open">
	 
		<!-- SOF SECTION HEADER -->
			<h3 class="babelu_exams_section_head">
			<a id="section<?php echo $boxNumber - 1;?>" class="nolink"><?php echo $this->escape($section->getSetting('title'));?></a>
			</h3>
			<div style="clear:both;"></div>
		<!-- EOF SECTION HEADER -->
		
		<!-- SOF TOP SECTION NAVI -->
		<div class="babelu_exams_section_navi">
			<?php echo $this->loadTemplate('section_navi');?>
		</div>
		<div style="clear:both;"></div>
		<!-- EOF TOP SECTION NAVI -->

			
		<!-- SOF SECTION DESCRIPTION -->
			<div class="babelu_exams_section_desc">
			<?php echo $section->getDescription($prevSectionEnd);
				$prevSectionEnd = $section->getEndOfSection($prevSectionEnd);
			?>
			</div>
			<div style="clear:both;"></div>
		<!-- SOF SECTION DESCRIPTION -->
		
		
		<?php if ($section->getSetting('result_text') != null):?>
		<div style="clear:both;"></div>
		<div class="babelu_exams_section_result_text">
			<?php echo $section->getSetting('result_text');?>
		</div>	
		<div style="clear:both;"></div>
		<?php endif;?>
		
<!-- SOF PROBLEMS ------------------------------------------------>
		<div class="babelu_exams_problems_wrapper">
		<?php foreach ($section->getProblems() as $problem):?>
			<fieldset class="babelu_exams_fieldset">
				<legend><?php echo $inc; $inc++;?></legend>
				
				<div style="clear:both;"></div>
				
				<div class="babelu_exams_problem_text">
					<?php echo $problem->getSetting('problem_text');?>
				</div>
				
				<div style="clear:both;"></div>
				
				<div class="babelu_exams_problems_correct_answers">
				<h5><?php echo JText::_('COM_BABELU_EXAMS_CORRECT_ANSWERS');?></h5>
					<?php echo $section->getUList($problem->getSetting('answers'));?>
				</div>
				<div style="clear:both;"></div>
				
				<div class="babelu_exams_problems_user_response">
				<h5><?php echo JText::_('COM_BABELU_EXAMS_GRADE_RESPONSE');?></h5>
					<?php if ($section->getSetting('input_type') != 3):?>
					<?php echo $section->getUList($problem->getSetting('user_response'));?>
					<?php else:?>
					<?php echo $section->getParagraphs($problem->getSetting('user_response'));?>
					<?php endif;?>
				</div>
				<div style="clear:both;"></div>
				
				<?php $responseId = $problem->getSetting('response_id');?>
				<div class="babelu_exams_problems_comments" >
				<h5><?php echo JText::_('COM_BABELU_EXAMS_INSTRUCTORS_COMMENTS');?></h5>
				<div>
					<textarea id="jform_<?php echo $responseId?>" name="grade[p_<?php echo $responseId;?>][comment]"><?php if ($problem->getSetting('comment') !== ''){ echo $problem->getSetting('comment');} ?></textarea>
				</div>
				</div>
				
				<div style="clear:both;"></div>
			<?php 
			
			$no_points = '';
			$partial_points ='';
			$full_points = '';
			
			switch ($problem->getSetting('status', 0))
			{
				case 0: // not graded				
				//fall through
				case 1: // incorrect;
					$no_points = 'checked="checked"';
					break;
				case 2: // partial
					$partial_points = 'checked="checked"';
					break;
				case 3: // correct					
					$full_points = 'checked="checked"';
					break;
			}
			
			if ($section->getSetting('input_type') == 0 AND $problem->getSetting('status') == 0)
			{
				foreach ($problem->getSetting('user_response') AS $response)
				{
					if (in_array($response, $problem->getSetting('answers')))
					{
						$no_points = '';
						$full_points = 'checked="checked"';
					}
				}
			}
			
			$p_possible = $problem->getPointValue($section->getDefaultPointValue());
			$halfPoints = ($p_possible / 2); 
			?>
				<div>
				<h5><?php echo JText::_('COM_BABELU_EXAMS_GRADE');?></h5>
					<label for="jform_no_credit_<?php echo $responseId;?>" ><?php echo JText::_('COM_BABELU_EXAMS_NO_CREDIT');?></label>
					<input type="radio" name="grade[p_<?php echo $responseId;?>][pearned]" id="jform_no_credit_<?php echo $responseId;?>" <?php echo $no_points;?> value="0"/>
					
					<label for="jform_half_credit_<?php echo $responseId;?>" ><?php echo JText::_('COM_BABELU_EXAMS_HALF_CREDIT');?></label>
					<input type="radio" name="grade[p_<?php echo $responseId;?>][pearned]" id="jform_half_credit_<?php echo $responseId;?>" <?php echo $partial_points;?> value ="<?php echo $halfPoints;?>" />
					
					<label for="jform_full_credit_<?php echo $responseId;?>"><?php echo JText::_('COM_BABELU_EXAMS_FULL_CREDIT');?></label>
					<input type="radio" name="grade[p_<?php echo $responseId;?>][pearned]" id="jform_full_credit_<?php echo $responseId;?>" <?php echo $full_points; ?> value="<?php echo $p_possible;?>" />
					<input type="hidden" name="grade[p_<?php echo $responseId;?>][ppossible]" id="jform_point_value_<?php echo $responseId;?>" value="<?php echo $p_possible;?>"/>
				</div>
				<div style="clear:both;"></div>
				
				
			</fieldset>
		<?php endforeach;?>
		</div>
		<!-- EOF PROBLEMS -->
	</div>
	<?php endforeach;?>
<!-- EOF SECTION -->

<!-- SOF BOTTOM SECTION NAVI -->
	<div id="babelu_exams_navi_bottom" class="babelu_exams_section_navi">
		<?php echo $this->loadTemplate('section_navi');?>
	</div>
<!-- EOF BOTTOM SECTION NAVI -->

<!--  SOF HIDDEN FIELDS -->
	<input type="hidden" name="task" id="form_task" value="grade.save" />
	<input type="hidden" name="id" id="id" value="<?php echo $this->exam->getSetting('result_id');?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
<!--  EOF HIDDEN FIELDS -->
	<fieldset class="adminform">
		<input type="checkbox" id="notify_user_grade" name="notify_user_grade" value="1" /><label for="notify_user_grade"><?php echo JText::_('COM_BABELU_EXAMS_NOTIFY_USER_GRADE');?></label><br/>
		<input type="checkbox" id="notify_user_comment" name="notify_user_comment" value="1" /><label for="notify_user_comment"><?php echo JText::_('COM_BABELU_EXAMS_NOTIFY_USER_COMMENT');?></label>
	</fieldset>	
<div class="clr"></div>
	<input type="submit" />	
	</form>
</div>
<script type="text/javascript">
function initialise()
{
	var i;
	//hid all sections except the first.
	babelu_navi.showHide();
	var js_nav = babelu_utility.getElementsByClassName(document,"js-nav");
	 for(i = 0; i < js_nav.length; i++)
	 { 
		 js_nav[i].style.display = "inline";
	 }
	 
	 //attach event to previous buttons
	 babelu_utility.addEventByClass("js-prev", 'click', babelu_navi.goToPrev);

	 // attach event listener to next buttons
	 babelu_utility.addEventByClass("js-next", 'click', babelu_navi.goToNext);

	 //attach event to section links
	 babelu_utility.addEventByClass("section_navi", 'click', babelu_navi.updateCurrentBox);
}

babelu_utility.addEvent(window, 'load', initialise);
</script>