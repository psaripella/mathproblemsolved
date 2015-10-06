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

$reviewInc = 1;
$boxNumber = 1;
?>

<fieldset id="js-reviewBox">
	<legend>
		<?php echo JText::_('COM_BABELU_EXAMS_ANSWERED_RESULT_SUMMARY');?>
	</legend>

	<table id="babelu_exams_review_table">
	<thead>
		<tr>
			<th width="1%" class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_NUM');?></th>
			<th width="10%" class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_PROBLEM_ANSWERED');?></th>
			<th width="10%" class="bu-center"><?php echo JText::_('COM_BABELU_EXAMS_PROBLEM_MARKED');?></th>
			<td class="bu-left"></td>
		</tr>
	</thead>
	<?php foreach ($this->exam->getSections() AS $section):?>
	<?php $hasProblems = ($section->getProblemCount() != 0);?>
		<!-- 
		<tr>
			<td class="left" colspan="4"><?php echo JText::_('COM_BABELU_EXAMS_SECTION').' : '.$this->escape($section->getSetting('title'));?></td>
		</tr>
		 -->
	<?php if (!$hasProblems):?>
		<tr>
			<td colspan="4">
				<h4><?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_ASSIGNED_TO_SECTION');?></h4>
			</td>
		</tr>
	<?php else:?>
			<tbody>
		<?php foreach ($section->getProblems() AS $problem):?>
			<tr>
				<td class="bu-center"><?php echo $reviewInc;?></td>
				<?php $user_response = $problem->getSetting('user_response');?>
				<?php if (isset($user_response[0]) && $user_response[0] != JText::_('COM_BABELU_EXAMS_NO_RESPONSE')):?>
					<?php $isAnswered = 'checked="checked"';?>
				<?php else:?>
					<?php $isAnswered = '';?>
				<?php endif;?>
				<td class="bu-center"><input type="checkbox" id="answer_<?php echo $problem->getSetting('pid');?>" <?php echo $isAnswered;?> class="js-answered" readonly="readonly" /></td>
				<?php if ($problem->getSetting('marked') == 1):?>
					<?php $marked = 'checked="checked"';?>
				<?php else:?>
					<?php $marked = '';?>
				<?php endif;?>
				<td class="bu-center"><input type="checkbox" id="marked_<?php echo $problem->getSetting('pid');?>" name="marked_<?php echo $problem->getSetting('pid');?>" <?php echo $marked;?> class="js-marked" value="1" readonly="readonly" /></td>
				<td class="bu-left"><a href="<?php echo '#problem'.$reviewInc;?>" class="js-box<?php echo $boxNumber;?> js-pnavi"><?php echo JText::_('COM_BABELU_EXAMS_GO_TO_QUESTION')?></a></td>
			</tr>
			<?php $reviewInc++;?>
		<?php endforeach;?>
			</tbody>
	<?php endif;?>
<?php $boxNumber++;?>	
<?php endforeach;?>
</table>
</fieldset>