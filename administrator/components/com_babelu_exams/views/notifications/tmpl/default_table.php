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

$context = 'notifications';
$editUrl = 'index.php?option=com_babelu_exams&task=notification.edit&id=';

$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
?>
<table class="adminlist">
	<thead>
		<tr>
			<th width="1%">
				<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
			</th>
			<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_NOTIFICATIONS_TITLE', 'a.title', $listDirn, $listOrder); ?>	
			</th>
			<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_NOTIFICATIONS_ADMIN_TO_NOTIFY', 'a.admin_to_notify', $listDirn, $listOrder); ?>	
			</th>
			<th>
				<?php echo JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_ADMIN_MSG');?>
			</th>
			<th>
				<?php echo JText::_('COM_BABELU_EXAMS_NOTIFICATIONS_USER_MSG');?>
			</th>
			<th width="1%" class="nowrap">
				<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="6">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
	<?php foreach ($this->items AS $i => $item): ?>
		<?php $ordering	= ($listOrder == 'a.ordering'); ?>
		<?php $canCreate	= Babelu_examsHelperActions::canCreate('com_babelu_exams'); ?>
		<?php $canEdit	= Babelu_examsHelperActions::canEdit('com_babelu_exams'); ?>
		<?php $canCheckin	= Babelu_examsHelperActions::canManage('com_babelu_exams'); ?>
		<?php $canChange	= Babelu_examsHelperActions::canEditState('com_babelu_exams'); ?>
		<tr class="row<?php echo $i % 2; ?>">
			<td class="center">
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
			<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, $context.'.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_($editUrl.(int) $item->id); ?>">
					<?php echo $this->escape($item->title); ?></a>
				<?php else : ?>
					<?php echo $this->escape($item->title); ?>
				<?php endif; ?>
			</td>
			<td>
				<?php if ($item->admin_to_notify_name == ''): ?>
					<?php echo JText::_('COM_BABELU_EXAMS_RESULTS_NONE_ASSIGNED');?>
				<?php else:?>
					<?php echo $item->admin_to_notify_name;?>
				<?php endif;?>
			</td>
			<td>
				<?php echo $item->admin_msg_title;?>
			</td>
			<td>
				<?php echo $item->user_msg_title;?>
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
