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

JHTML::_('stylesheet','components/com_babelu_exams/assets/css/babelu_exams_core.css');

?>
<div class="babelu_exams_wrapper">

<!-- SOF HEADER -->
<div id="babelu_exams_header">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<?php if (!is_null($this->params->get('page_heading'))):?>
		<h2>
			<?php echo $this->escape($this->params->get('page_heading')); ?>
		</h2>
	<?php else:?>
		<h2>
			<?php echo JText::_('COM_BABELU_EXAMS_GRADES_VIEW_DEFAULT_HEADER');?>
		</h2>
	<?php endif;?>
<?php endif; ?>
</div>
<!-- EOF HEADER -->

<div class="babelu_exams_table_wrapper">
	<table>
		<tr>
			<th class="align-center"><?php echo JText::_('COM_BABELU_EXAMS_ID');?></th>
			<th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_EXAM_TITLE');?></th>
			<th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_EXAMINEE');?></th>
  	 	 	<th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_SUBMITTED_ON');?></th>
  	 	 	<th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_STATUS');?></th>
		
		</tr>
	<?php foreach ($this->results AS $item):?>
	<?php if (Babelu_examsHelperActions::canGrade('com_babelu_exams.exam.'.(int)$item->id)):?>
		<tr>
			<td class="align-center"><?php echo (int)$item->id; ?></td>
			<td class="align-left">
				<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getSubmissionLink((int)$item->id), false);?>">
					<?php echo $item->exam_title;?>
				</a>
		
			</td>
			<td class="align-left">
			<?php if (!empty($item->user_name)):?>
				<?php echo $item->user_name;?>
			<?php else:?>
				<?php echo JText::_('COM_BABELU_EXAMS_GUEST');?>
			<?php endif;?>
			</td>
			<td class="align-left"><?php echo JHtml::_('date', $item->creation_date);?></td>
			<td class="align-left">			
  	  		<?php switch ($item->status)
			{
				case 1: // failed
					echo JText::_('COM_BABELU_EXAMS_STATUS_FAIL');
				break;
				case 2: // passed
					echo JText::_('COM_BABELU_EXAMS_STATUS_PASS');
				break;
				case 3: // exam timed out
					echo JText::_('COM_BABELU_EXAMS_STATUS_TIMED_OUT');
				break;
				default: // pending
					echo JText::_('COM_BABELU_EXAMS_STATUS_PENDING');
				break;		
			}
			?>
	 	 </td>
		</tr>
	<?php endif;?>
	<?php endforeach;?>
	</table>
</div>

</div>