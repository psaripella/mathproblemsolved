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

JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_core.css');
JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_exam.css');
JHTML::_('script','components/com_babelu_exams/assets/js/babelu_utility.js');
JHTML::_('script','components/com_babelu_exams/assets/js/babelu_exams.js');

$this->totalProblems = $this->exam->getActualProblemCount();

$examStatus = array(
		JText::_('COM_BABELU_EXAMS_STATUS_PENDING'),
		JText::_('COM_BABELU_EXAMS_STATUS_FAIL'),
		JText::_('COM_BABELU_EXAMS_STATUS_PASS'),
		JText::_('COM_BABELU_EXAMS_STATUS_TIMED_OUT')
		);

$statusArray = array();
$statusArray[1] = 'incorrect';
$statusArray[2] = 'partial';
$statusArray[3] = 'correct';

?>

<div class="babelu_exams_wrapper">
	
	<!-- SOF HEADER -->
	<div id="babelu_exams_header" class="page-header">
		<h2 class="componentheading"><?php echo $this->exam->getSetting('title');?> <span id="exam_results"><?php echo JText::_('COM_BABELU_EXAMS_RESULT');?>&nbsp;:&nbsp;<span class="red"><?php echo $examStatus[$this->exam->getSetting('status')];?></span></span></h2>
	</div>
	<!-- EOF HEADER -->
	<p>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResultsLink($this->exam->getSetting('id')));?>" rel="nofollow">
			<?php echo JText::_('COM_BABELU_EXAMS_VIEW_PERFORMANCE_HISTORY');?>
		</a>
	</p>
	<?php $showSummaryTable = $this->params->get('showSummaryTable', 1);?>
	<?php if ($showSummaryTable == 1):?>
	<div class="summary">
		<table style="width:100%;">
			<thead>
				<tr>
					<th class="bu-left" colspan="2"><?php echo JText::_('COM_BABELU_EXAMS_SUBMITTED_ON');?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_TIME_SPENT');?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_POINT_GRADE');?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_PERCENTAGE_GRADE');?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_PROBLEM_TOTAL');?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td class="bu-left" colspan="2"><?php echo JHtml::_('date', $this->exam->getSetting('creation_date'));?></td>
					<td class="bu-center"><?php echo $this->exam->getTimeSpent();?></td>
					<td class="bu-center"><?php echo $this->exam->getSetting('point_grade');?></td>
					<td class="bu-center"><?php echo $this->exam->getSetting('percentage_grade').'%';?></td>
					<td class="bu-center"><?php echo $this->totalProblems;?></td>
				</tr>
				<tr>
					<td colspan="6"><h4><?php echo JText::_('COM_BABELU_EXAMS_RESULTS_SECTIONS_SUMMARY');?></h4></td>
				</tr>
				<tr>
					<th><?php echo JText::_('COM_BABELU_EXAMS_NUM');?></th>
					<th class="bu-left"><?php echo JText::_('COM_BABELU_EXAMS_SECTION');?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_PROBLEM_TOTAL');?></th>
					<th class="bu-center" ><?php echo JText::_('COM_BABELU_EXAMS_CORRECT_FILTER'); ?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_INCORRECT_FILTER');?></th>
					<th class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_PARTIAL_FILTER');?></th>
				</tr>
			<?php $secInc = 1;?>
			<?php foreach($this->exam->getSections() AS $section):?>
				<tr>
					<td class="bu-center"><?php echo $secInc; $secInc++?></td>
					<td class="bu-left"><?php echo $this->escape($section->getSetting('title'));?></td>
					<td class="bu-center"><?php echo $section->getProblemCount();?></td>
					<td class="bu-center"><?php echo $section->correct;?></td>
					<td class="bu-center"><?php echo $section->incorrect;?></td>
					<td class="bu-center"><?php echo $section->partial;?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
	<?php endif;?>
	
	<div id="problem_review">
		<h3>
			<?php echo JText::_('COM_BABELU_EXAMS_RESPONSE_REVIEW');?>
		</h3>
	
		<!-- SOF GO TO PERFORMANCE -->
		<?php $hasCorrect = $this->exam->hasCorrect(); ?>
		<?php $hasIncorrect = $this->exam->hasIncorrect();?>
		<?php $hasPartial = $this->exam->hasPartial();?>
		<?php if (($hasCorrect && $hasIncorrect) || ($hasCorrect && $hasPartial)):?>
			<?php $showFilter = true;?>
		<?php elseif ($hasIncorrect && $hasPartial):?>
			<?php $showFilter = true;?>
		<?php else:?>
			<?php $showFilter = false;?>
		<?php endif;?>
		
		<?php if ($showFilter):?>
		<div class="bu_control">
			<script type="text/javascript">
			 document.write('<span><?php echo JText::_('COM_BABELU_EXAMS_SHOW_FILTER')?></span>');
			 document.write('<button class="bu_control" id="bu_show_all" onclick="babelu_navi.clearProblemFilters();" disabled><?php echo JText::_('COM_BABELU_EXAMS_CLEAR_FILTER');?></button>');
			<?php if ($hasCorrect):?>
			 document.write('<button class="bu_control" id="bu_show_correct" onclick="babelu_navi.showCorrect();"><?php echo JText::_('COM_BABELU_EXAMS_CORRECT_FILTER');?></button>');
			<?php endif;?>

			<?php if ($hasIncorrect):?>
			 document.write('<button class="bu_control" id= "bu_show_incorrect" onclick="babelu_navi.showIncorrect();" ><?php echo JText::_('COM_BABELU_EXAMS_INCORRECT_FILTER');?></button>');
			<?php endif;?>

			<?php if ($hasPartial):?>
			 document.write('<button class="bu_control" id="bu_show_partial" onclick="babelu_navi.showPartial();"><?php echo JText::_('COM_BABELU_EXAMS_PARTIAL_FILTER');?></button>'); 
			<?php endif;?>
			</script>
		</div>
		<?php endif;?>
	<!-- EOF GO TO PERFORMANCE -->

		
		<?php $prevSectionEnd = 0;?>
		<?php $pInc = 1;?>
		<?php foreach ($this->exam->getSections() as $section):?>
		<div>			
			<?php if ($section->getProblemCount() == 0): ?>
				<!-- SOF SECTION HEADER -->
				<h3 class="babelu_exams_section_head">
					<?php echo $this->escape($section->getSetting('title'));?>
				</h3>
				<div style="clear:both;"></div>
				<!-- EOF SECTION HEADER -->
				<p>
					<?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_HEADER');?>
				</p>
				<p>
						<?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_PARA_ONE');?>
				</p>
				<ol>
					<li><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_ONE');?></li>
					<li><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_TWO');?></li>
					<li><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_THREE');?></li>
				</ol>
				<p>
					<?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_FOUND_FOUR');?>
				</p>
				<?php $this->exam->setSetting('hasError', 1);?>
			<?php else:?>
				
				<?php $showSectionTitleInReview = $this->params->get('showSectionTitleInReview', 1);?>
				<?php if($showSectionTitleInReview == 1):?>
					<!-- SOF SECTION HEADER -->
					<h3 class="babelu_exams_section_head">
						<?php echo $this->escape($section->getSetting('title'));?>
					</h3>
					<div style="clear:both;"></div>
					<!-- EOF SECTION HEADER -->
					
					<!-- SOF SECTION RESULT TEXT -->
					<?php if ($section->getSetting('result_text') != null):?>
						<div style="clear:both;"></div>
						<div class="babelu_exams_section_result_text">
							<?php echo $section->getSetting('result_text');?>
						</div>	
						<div style="clear:both;"></div>
					<?php endif;?>
					<!-- EOF SECTION RESULT TEXT -->
					
					<?php $showSectionDescriptionInReview = $this->params->get('showSectionDescriptionInReview', 1);?>
					<?php if ($showSectionDescriptionInReview == 1):?>
					<!-- SOF SECTION DESCRIPTION -->
						<div class="babelu_exams_section_desc">
							<?php echo $section->getDescription($prevSectionEnd);?>
							<?php $prevSectionEnd = $section->getEndOfSection($prevSectionEnd);?>
						</div>
						<div style="clear:both;"></div>
						<!-- SOF SECTION DESCRIPTION -->
					<?php endif;?>
				<?php endif;?>
				
				
				<?php foreach ($section->getProblems() AS $problem):?>
					<?php $input_type = $section->getInputType($problem->getSetting('default_input_type')); ?>
					<fieldset id="problem<?php echo $pInc;?>" class="js-<?php echo $statusArray[$problem->getSetting('status')];?>">
						<legend><?php echo $pInc; $pInc++;?></legend>
						
						<!-- SOF MARK CONTROLS -->
						<div class="bu-right">
							<label>
								<?php echo JText::_('COM_BABELU_EXAMS_PROBLEM_MARKED');?>
								<?php if ($problem->getSetting('marked') == 1):?>
									<?php $marked = 'checked="checked"';?>
								<?php else:?>
									<?php $marked = '';?>
								<?php endif;?>
								<input type="checkbox" <?php echo $marked;?> disabled="disabled" />
							</label>
						</div>
						<!-- EOF MARK CONTROLS -->
						
						<!-- SOF PROBLEM TEXT -->
						<div class="babelu_exams_problem_text">
							<?php echo $problem->getSetting('problem_text');?>
						</div>
						<div style="clear:both;"></div>
						<!-- EOF PROBLEM TEXT -->
						
						<!-- SOF CORRECT ANSWERS -->
						<?php $showAnswers = $this->params->get('showAnswers');?>
						<?php $isTimedOut = ($this->exam->getSetting('status') == 3);?>
						<?php if ($input_type != 3):?>
							<?php if ($showAnswers && !$isTimedOut):?>
								<div class="babelu_exams_problems_correct_answers">
									<h4>
										<?php echo JText::_('COM_BABELU_EXAMS_CORRECT_ANSWERS');?>
									</h4>
									<?php if ($input_type != 3):?>
										<ul>
										<?php foreach ($problem->getSetting('answers') AS $answer):?>
											<li><?php echo $answer;?></li>
										<?php endforeach;?>
										</ul>
									<?php else:?>
										<?php foreach ($problem->getSetting('answers') AS $answer):?>
											<p><?php echo $answer;?></p>
										<?php endforeach;?>
									<?php endif;?>
								</div>
							<?php endif;?>
						<?php endif;?>
						<!-- EOF CORRECT ANSWERS -->
						
						<!-- SOF USER RESPONSE -->
						<div class="babelu_exams_problems_user_response">
							<h4>
								<?php echo JText::_('COM_BABELU_EXAMS_USER_RESPONSE');?>
							</h4>
							<?php if ($input_type != 3):?>
								<ul>
								<?php foreach ($problem->getSetting('user_response') AS $response):?>
									<li><?php echo $response;?></li>
								<?php endforeach;?>
								</ul>
							<?php else:?>
								<?php foreach ($problem->getSetting('user_response') AS $response):?>
									<p><?php echo $response;?></p>
								<?php endforeach;?>
							<?php endif;?>
						</div>
						<div style="clear:both;"></div>
						<!-- EOF USER RESPONSE -->
						
						<!-- SOF COMMENTS -->
						<?php if ($problem->getSetting('comment', '') != ''):?>
							<div class="babelu_exams_problems_comments" >
								<h4>
									<?php echo JText::_('COM_BABELU_EXAMS_INSTRUCTORS_COMMENTS');?>
								</h4>
								<div>
								<p><?php echo $problem->getSetting('comment');?></p>
								</div>
							</div>
							<div style="clear:both;"></div>
						<?php endif;?>
						<!-- EOF COMMENTS -->
						
						<!-- SOF RESULT TEXT -->
						<?php if ($problem->getSetting('result_text', null) != null):?>
							<div class="babelu_exams_problems_additional_info">
								<h4>
									<?php echo JText::_('COM_BABELU_EXAMS_ADDITIONAL_INFORMATION');?>
								</h4>
								<div>
									<?php echo $problem->getSetting('result_text');?>
								</div>
							</div>
							<div style="clear:both;"></div>
						<?php endif;?>
						<!-- EOF RESULT TEXT -->
						
					</fieldset>
				<?php endforeach;?>
			<?php endif;?>
		</div>
	<?php endforeach;?>
	</div>
</div>
