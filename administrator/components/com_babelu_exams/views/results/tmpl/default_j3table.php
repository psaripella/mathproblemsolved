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

$context = 'results';
$editUrl = 'index.php?option=com_babelu_exams&task=result.edit&id=';
$gradeUrl = 'index.php?option=com_babelu_exams&task=grade.edit&id=';


$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
?>

<table class="table table-striped" id="adminList">
	<thead>
		<tr>
			<th width="1%">
				<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
			</th>
			<th class="left">
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_RESULTS_TITLE', 'buexam.title', $listDirn, $listOrder); ?>
			</th>
			<th class="left">
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_RESULTS_DATE', 'a.creation_date', $listDirn, $listOrder); ?>
			</th>
			<th class="left">
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_RESULTS_STATUS', 'a.status', $listDirn, $listOrder); ?>
			</th>
			<th class="left">
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_RESULTS_GRADE', 'a.percentage_grade', $listDirn, $listOrder); ?>
			</th>
			<th class="left" >
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_RESULTS_USER', 'a.user_id', $listDirn, $listOrder); ?>
			</th>
			<th class="left" >
				<?php echo JHtml::_('grid.sort', 'COM_BABELU_EXAMS_RESULTS_ADMIN_TO_NOTIFY', 'admin.name',$listDirn, $listOrder);?>
			</th>
			<th width="1%" class="nowrap">
				<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="8">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php foreach ($this->items as $i => $item) :?>
		<?php $ordering	= ($listOrder == 'a.ordering');?>
		<?php $canCreate	= Babelu_examsHelperActions::canCreate('com_babelu_exams');?>
		<?php $canEdit	= Babelu_examsHelperActions::canEdit('com_babelu_exams');?>
		<?php $canCheckin	= Babelu_examsHelperActions::canManage('com_babelu_exams');?>
		<?php $canChange	= Babelu_examsHelperActions::canEditState('com_babelu_exams.exam.'.$item->exam_id);?>
		<?php $user = JFactory::getUser();?>
		<?php $canComment = $user->authorise('bue.comment', 'com_babelu_exams.exam.'.$item->exam_id);?>
		<?php $canCommentAll = $user->authorise('bue.comment', 'com_babelu_exams');?>
		<?php $canGrade = $user->authorise('bue.grade', 'com_babelu_exams.exam.'.$item->exam_id);?>
		<?php $canGradeAll = $user->authorise('bue.grade', 'com_babelu_exams');?>
		
		<tr class="row<?php echo $i % 2; ?>">
			<td class="center">
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php echo $this->escape($item->exam_title); ?>
				<?php if ($canCommentAll || $canComment || $canGradeAll || $canGrade):?>
				<br/>
				<?php endif;?>
				<?php if ($canCommentAll || $canComment) : ?>
					 <a href="<?php echo JRoute::_($editUrl.(int) $item->id); ?>">
						<?php echo JText::_('COM_BABELU_EXAMS_COMMENT'); ?>
					</a> -
				<?php endif; ?>
				<?php if ($canGradeAll || $canGrade) : ?>
					  <a href="<?php echo JRoute::_($gradeUrl.(int) $item->id); ?>">
						<?php echo JText::_('COM_BABELU_EXAMS_GRADE'); ?>
					</a>
				<?php endif; ?>
			</td>
			<td>
				<?php echo JHtml::_('date', $item->creation_date);?>
			</td>
			<td>
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
			<td>
				<?php echo $item->percentage_grade.'%'; ?>
			</td>
			<td>
				<?php if ($item->user_name != ''):?>
					<?php if ($canChange) : ?>
						<a href="<?php echo JRoute::_('index.php?option=com_babelu_exams&task=exam_state.edit&id='.(int) $item->exam_state_id).'&tmpl=component'; ?>" class="modal" rel="{size: {x: 518, y: 450}}">
							<?php echo $this->escape($item->user_name); ?>
						</a>
					<?php else : ?>
						<?php echo $this->escape($item->user_name); ?>
					<?php endif; ?>
				<?php else:?>
					<?php echo JText::_('COM_BABELU_EXAMS_GUEST_USER');?>
				<?php endif;?>
			</td>
			<td>
				<?php if ($item->notify_name != ''):?>
					<?php echo $this->escape($item->notify_name);?>
				<?php else: ?>
					 <?php echo JText::_('COM_BABELU_EXAMS_RESULTS_NONE_ASSIGNED');?>
				<?php endif;?>
			</td>
			<td class="center">
				<?php echo (int) $item->id; ?>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>

<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
<?php echo JHtml::_('form.token'); ?>

