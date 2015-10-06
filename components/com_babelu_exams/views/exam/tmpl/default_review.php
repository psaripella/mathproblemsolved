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

$problemCounter = 1;
$sectionCounter = 1;

?>

<fieldset id="js-reviewBox" style="display:none;">
	<legend>
		<?php echo JText::_('COM_BABELU_EXAMS_REVIEW');?>
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
		<?php if (!$hasProblems):?>
			<tr>
				<td colspan="4">
					<h4><?php echo JText::_('COM_BABELU_EXAMS_SECTION').' : '.$this->escape($section->getSetting('title'));?> <?php echo JText::_('COM_BABELU_EXAMS_ERROR_NO_PROBLEMS_ASSIGNED_TO_SECTION');?></h4>
				</td>
			</tr>
		<?php else:?>
			<tbody>
			<?php foreach ($section->getProblems() AS $problem):?>
				<tr>
					<td class="bu-center">
						<?php echo $problemCounter;?>
					</td>
					<td class="bu-center">
						<?php $user_response = $problem->getSetting('user_response');?>
						<?php if (isset($user_response[0]) && $user_response[0] != JText::_('COM_BABELU_EXAMS_NO_RESPONSE')):?>
							<?php $isAnswered = 'checked="checked"';?>
						<?php else:?>
							<?php $isAnswered = '';?>
						<?php endif;?>
						<input type="checkbox" id="js-a<?php echo $problem->getSetting('pid');?>" <?php echo $isAnswered;?> class="js-answered" readonly="readonly" disabled="disabled" />
					</td>
					<td>
						<?php if ($problem->getSetting('marked') == 1):?>
							<?php $marked = 'checked="checked"';?>
						<?php else:?>
							<?php $marked = '';?>
						<?php endif;?>
						<input type="checkbox" id="js-m<?php echo $problem->getSetting('pid');?>" <?php echo $marked;?> class="js-marked" readonly="readonly" disabled="disabled" />
					</td>
					<td>
						<?php if ($this->exam->getSetting('display_option') == 'single'):?>
							<?php $boxIdPrefix = 'problem';?>
							<?php $boxClassNumber = $problemCounter;?>
						<?php else:?>
							<?php $boxIdPrefix = 'section';?>
							<?php $boxClassNumber = $sectionCounter;?>
						<?php endif;?>
						<a href="<?php echo '#'.$boxIdPrefix.$problemCounter;?>" class="js-box<?php echo $boxClassNumber;?> js-pnavi"><?php echo JText::_('COM_BABELU_EXAMS_GO_TO_QUESTION')?></a>
					</td>
				</tr>
				<?php $problemCounter++;?>
			<?php endforeach;?>
			</tbody>
		<?php endif;?>
	<?php $sectionCounter++;?>
	<?php endforeach;?>		
	</table>
</fieldset>