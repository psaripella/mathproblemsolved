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

JHtml::_('behavior.keepalive');

JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_core.css');
JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_exam.css');

JHTML::_('script','components/com_babelu_exams/assets/js/babelu_utility.js');
JHTML::_('script','components/com_babelu_exams/assets/js/babelu_exams.js');

$now = new JDate();

$boxNumber = 1;
$this->pInc = 1;
$savecode = '';

$this->totalProblems = $this->exam->getActualProblemCount();

$this->boxCount = $this->totalProblems + 1;

$this->isFirst = true;
$this->isLast = false;
?>

<div class="babelu_exams_wrapper">

<!-- SOF HEADER -->
	<div id="babelu_exams_header" class="page-header">
		<h2 class="componentheading"><?php echo $this->exam->getSetting('title');?></h2>
	</div>
<!-- EOF HEADER -->	
	
<!-- SOF TIMER -->
	<div style="clear:both;"></div>
	<?php echo $this->loadTemplate('timer');?>
	<div style="clear:both;"></div>
<!-- EOF TIMER -->
	
	<form action="<?php echo JRoute::_('index.php');?>" method="post" name="babelu_examForm" id="babelu_examForm">

<!-- SOF PROBLEM BOXES -->
	<?php foreach ($this->exam->getSections() AS $section):?>
		<?php $this->section = $section;?>
		<?php foreach ($section->getProblems() AS $problem):?>
		<?php $boxId = 'js-box'.$boxNumber;?>
		<?php $this->problem = $problem; ?>

		<?php if ($savecode == ''):?>
			<?php $savecode = $problem->getSetting('pid');?>
		<?php else:?>
			<?php $savecode .= '|'.$problem->getSetting('pid');?>
		<?php endif;?>
	
		<div id="<?php echo $boxId; $boxNumber++;?>" class="open">
			<!-- SOF NAVIGATION -->
			<div class="babelu_exams_section_navi">
				<?php echo $this->loadTemplate('navi');?>
			</div>
			<!-- SOF NAVIGATION -->
			<?php echo $this->loadTemplate('problem');?>
			
		</div>
		<?php endforeach;?>
	<?php endforeach;?>
<!-- EOF PROBLEM BOXES -->

<!-- SOF REVIEW BOX -->
	<div id="<?php echo 'js-box'.$this->boxCount;?>" class="open">
		<?php $this->isLast = true;?>
		<!-- SOF NAVIGATION -->
		<div class="babelu_exams_section_navi">
			<?php echo $this->loadTemplate('navi');?>
		</div>
		<!-- SOF NAVIGATION -->
		
		<?php echo $this->loadTemplate('review');?>
		<div style="clear:both;"></div>
		
		<div style="float:right;">
			<input type="submit" id="babelu_submit" value="<?php echo JText::_("COM_BABELU_EXAMS_BUTTONS_SUBMIT");?>" />
		</div>
	</div>
<!-- EOF REVIEW BOX -->

<!-- SOF SAVE CONTROL -->
		<?php if ($this->exam->isSavable()):?>
		<?php $user = JFactory::getUser();?>
		<div style="float:right;">
			<?php if (!$user->guest):?>
			<script type="text/javascript">
			<!--
				document.write ('<input type=\"button\" id=\"babelu_save\" value=\"<?php echo JText::_("COM_BABELU_EXAMS_BUTTONS_PAUSE");?>\" />');
			//-->
			</script>
				
			<?php endif;?>
		</div>	
		<?php endif;?>
<!-- EOF SAVE CONTROL -->
		<div style="clear:both;"></div>
<!--  SOF HIDDEN FIELDS -->
		<input type="hidden" name="task" id='form_task' value="exam.submit" />
		<input type="hidden" name="savecode" id="savecode" value="<?php echo $savecode;?>"/>
		<input type="hidden" name="time_spent" id="time_spent" value="no-js" />
		<input type="hidden" name="id" id="id" value="<?php echo $this->exam->getSetting('id');?>" />
		<input type="hidden" name="exam_title"  id="exam_title" value="<?php echo $this->exam->getSetting('title');?>" />
		<input type="hidden" name="exart" id="exart"  value="<?php echo ($now->toUnix() - $this->exam->getSetting('time_spent', 0));?>" />
		<input type="hidden" name="haser" id="haser" value="<?php echo $this->exam->getSetting('hasError', 0);?>" />
	<?php echo JHTML::_( 'form.token' ); ?>
<!--  EOF HIDDEN FIELDS -->
	</form>
</div>
 
<script type="text/javascript">
<!--
function initialise()
{
	// attach answer and marker behavior to inputs
	 babelu_utility.addEventByClass("problem", 'change', babelu_marker.updateAnswered);
	 babelu_utility.addEventByClass("js-marker", 'change', babelu_marker.toggleMarker);

	 
	 //hid all sections except the first.
	 babelu_navi.showHide();

	 //reveal the review feilds
	 //used for progressive enhancement
	 document.getElementById('js-reviewBox').style.display = "block";

	 var i;
	 var js_nav = babelu_utility.getElementsByClassName(document,"js-nav");
	 for(i = 0; i < js_nav.length; i++)
	 { 
		 js_nav[i].style.display = "inline";
	 }

	 //attach navigation events
	 babelu_utility.addEventByClass("js-prev", 'click', babelu_navi.goToPrev);
	 babelu_utility.addEventByClass("js-next", 'click', babelu_navi.goToNext);
	 babelu_utility.addEventByClass("js-pnavi", 'click', babelu_navi.updateCurrentBox);

	//attach event listeners to form buttons
	 babelu_utility.addEvent(babelu_utility.$('babelu_save'), 'click', babelu_form.setTask);
	 babelu_utility.addEvent(babelu_utility.$('babelu_examForm'), 'submit', babelu_form.confirmSubmit);
	 
	 var comfirmation_text = "<?php echo JText::_('COM_BABELU_EXAMS_COMFIRMATION_MSG');?>";
	 babelu_form.setConfirmationMsg(comfirmation_text);
	 

	 var time_limit = <?php echo $this->exam->getTimeRemaining();?>;
	 babelu_timer.setMaxTime(time_limit);

	 var time_out_msg ="<?php echo JText::_('COM_BABELU_EXAMS_TIME_OUT_MSG');?>";
	 	babelu_timer.setTimeOutMsg(time_out_msg);

	 var time_spent = <?php echo $this->exam->getSetting('time_spent', 0);?>;
	 document.getElementById('time_spent').value = time_spent;

	//start the timer
	 babeluCallBack();
}

function babeluCallBack()
{
	 var count_down = <?php echo $this->exam->getSetting('time_limit', 0);?>;

	 if(count_down != 0)
	 {
		babelu_timer.countDown();
	 }
	 else
	 {
		babelu_timer.countUp();
	 }

}

babelu_utility.addEvent(window, 'load', initialise);

//-->
</script>

