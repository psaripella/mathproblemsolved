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

$this->boxCount = $this->exam->getSectionCount() + 1;
$this->isReviewBox = false;
$this->isFirst = true;
?>

<div class="babelu_exams_wrapper">
	
	<!-- SOF HEADER -->
	<div id="babelu_exams_header" class="page-header">
		<h2 class="componentheading"><?php echo $this->exam->getSetting('title');?></h2>
	</div>
	<!-- EOF HEADER -->	

	<!-- SOF PROGRESS BAR -->
	<div class="progress_bar_wrapper">
		<?php echo $this->loadTemplate('progress_bar');?>
	</div>
	<!-- EOF PROGRESS BAR -->
	
		<!-- SOF TIMER -->
	<div style="clear:both;"></div>
		<?php echo $this->loadTemplate('timer');?>
	<div style="clear:both;"></div>
	<!-- EOF TIMER -->
	

<!-- SOF EXAM FORM -->
	
	<form action="<?php echo JRoute::_('index.php');?>" method="post" name="babelu_examForm" id="babelu_examForm">

		<!-- SOF SECTIONS -->	
		<?php $prevSectionEnd = 0; ?>
		<?php $this->isFirst = true;?>
		<?php foreach ($this->exam->getSections() as $section):?>
		<?php $this->section = $section;?>
		<?php $boxId = 'js-box'.$boxNumber;?>
		<div id="<?php echo('js-box'.$boxNumber); ?>" class="open">

			<!-- SOF TOP SECTION NAVI -->
			<div class="babelu_exams_section_navi">
				<?php echo $this->loadTemplate('navi');?>
			</div>
			<div style="clear:both;"></div>
			<!-- EOF TOP SECTION NAVI -->
			
			<!-- SOF SECTION HEADER -->
			<h3 id="section<?php echo $boxNumber; $boxNumber++;?>" class="babelu_exams_section_head">
				<?php echo $this->escape($section->getSetting('title'));?>
			</h3>
			<div style="clear:both;"></div>
			<!-- EOF SECTION HEADER -->

			
			<!-- SOF SECTION DESCRIPTION -->
			<div class="babelu_exams_section_desc">
				<?php echo $section->getDescription($prevSectionEnd);?>
				<?php $prevSectionEnd = $section->getEndOfSection($prevSectionEnd);?>
			</div>
			<div style="clear:both;"></div>
			<!-- SOF SECTION DESCRIPTION --> 
		
			<!-- SOF PROBLEMS -->
			<?php if ($section->getProblemCount() == 0): ?>
				<h3><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_HEADER');?></h3>
				<p><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_PARA_ONE');?></p>
				<ol>
					<li><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_ONE');?></li>
					<li><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_TWO');?></li>
					<li><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_THREE');?></li>
				</ol>
				<p><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_FOUR');?></p>
				<?php $this->exam->setSetting('hasError', 1);?>
			<?php else:?>
				<?php foreach ($section->getProblems() as $problem):?>
					<?php $this->problem = $problem; ?>

					<?php if ($savecode == ''):?>
						<?php $savecode = $problem->getSetting('pid');?>
					<?php else:?>
						<?php $savecode .= '|'.$problem->getSetting('pid');?>
					<?php endif;?>
					
					<?php echo $this->loadTemplate('problem');?>
					
				<?php endforeach;?>				
			<?php endif;?>
			<!-- EOF PROBLEMS -->	
		</div>
		<?php endforeach;?>
		<!-- EOF SECTIONS -->
		
		
		
		<!-- SOF REVIEW BOX -->
		<div id="<?php echo 'js-box'.$this->boxCount;?>" class="open">
			<!-- SOF TOP SECTION NAVI -->
			<div class="babelu_exams_section_navi">
				<?php echo $this->loadTemplate('navi');?>
			</div>
			<div style="clear:both;"></div>
			<!-- EOF TOP SECTION NAVI -->
				
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
		<div style="clear:both;"></div>
		<!-- EOF SAVE CONTROL -->
		
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

<!-- SOF PROGRESS ADJUSTMENT -->

<!-- EOF PROGRESS ADJUSTMENT -->

<script type="text/javascript">
<!--
function initialise()
{
	// attach answer and marker behavior to inputs
	 babelu_utility.addEventByClass("problem", 'change', babelu_marker.updateAnswered);
	 babelu_utility.addEventByClass("js-marker", 'change', babelu_marker.toggleMarker);

	 //reveal the review feilds
	 //used for progressive enhancement
	 document.getElementById('js-reviewBox').style.display = "block";
	 
	 var i;
	 
	// attach event listeners to form inputs
	 var p = babelu_utility.addEventByClass("problem", 'change', babelu_progress.checkProgress);
	 var pcount = p.length;
	 for(i = 0; i < pcount; i++)
	 { 
		 // increment progress as needed.
		 if(p[i].type == "checkbox" || p[i].type == "radio")
		 {
			 if(p[i].checked)
			 {
				 // forge event
				 var e = {target: p[i], srcElement: p[i]};

				 babelu_progress.checkProgress(e);
			 }	 
		 }

		  // check to see if this is a text area attach clear default text
		  //and increment progress as needed
		 if(p[i].type == "textarea" || p[i].type == "text" )
		 {
			 if(p[i].value != babelu_form.default_text)
			 {
				 // forge event
				 var e = {target: p[i], srcElement: p[i]};

				 babelu_progress.checkProgress(e);
			 }
		 }
	 }

	 var sectionCount = <?php echo count($this->exam->getSections());?>;

	 if(sectionCount > 1)
	 {
		//hid all sections except the first.
	 	babelu_navi.showHide();

	 	//attach navigation events
		babelu_utility.addEventByClass("js-prev", 'click', babelu_navi.goToPrev);
		babelu_utility.addEventByClass("js-next", 'click', babelu_navi.goToNext);
		babelu_utility.addEventByClass("js-pnavi", 'click', babelu_navi.updateCurrentBox);

		babelu_navi.setToTop(<?php echo $this->params->get('scrollToTop', false);?>);
	 }
	 
	 var js_nav = babelu_utility.getElementsByClassName(document,"js-nav");
	 for(i = 0; i < js_nav.length; i++)
	 { 
		 js_nav[i].style.display = "inline";
	 }

	 var comfirmation_text = "<?php echo JText::_('COM_BABELU_EXAMS_COMFIRMATION_MSG');?>";
	 babelu_form.setConfirmationMsg(comfirmation_text);
	
	 //attach event listeners to form buttons
	 babelu_utility.addEvent(babelu_utility.$('babelu_save'), 'click', babelu_form.setTask);
	 babelu_utility.addEvent(babelu_utility.$('babelu_examForm'), 'submit', babelu_form.confirmSubmit);

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
