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

$context = 'categories';
$editUrl = 'index.php?option=com_babelu_exams&task=category.edit&id=';

$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');
$canOrder	= Babelu_examsHelperActions::canEditState('com_babelu_exams');
$saveOrder	= $listOrder == 'a.ordering';
?>

<table class="adminlist">
	<thead>
		<tr>
			<th width="1%">
				<input type="checkbox" name="checkall-toggle" value="" onclick="checkAll(this)" />
			</th>
		
			<th class="left">
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_CATEGORIES_HEADER_TITLE', 'a.title' , $this->state->get('list.direction'), $this->state->get('list.ordering')); ?>
			</th>
			<th class="left">
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_CATEGORIES_HEADER_ACCESS', 'a.access' , $this->state->get('list.direction'), $this->state->get('list.ordering')); ?>
			</th>

			<th width="5%">
				<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?>
			</th>

			<th width="10%">
				<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?>
				<?php if ($canOrder && $saveOrder) :?> 
					<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'categories.saveorder'); ?>
				<?php endif; ?>
			</th>
			<th width="1%" class="nowrap">
				<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?>
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
			<td class="left">
				<?php if (isset($item->checked_out) && $item->checked_out):?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, $context.'.', $canCheckin); ?>
				<?php endif;?>
				<?php if (Babelu_examsHelperActions::canEdit('com_babelu_exams')):?> 
					<a href="<?php echo JRoute::_($editUrl.(int) $item->id);?>"><?php echo $this->escape($item->title);?></a> 
				<?php else:?> 
					<?php echo $this->escape($item->title);?>
				<?php endif;?>  				
			</td>
			<td class="left">
				<?php echo $this->escape($item->access);?>
			</td>
			<td class="center">
				<?php echo JHtml::_('jgrid.published', $item->state, $i, $context.'.', $canChange, 'cb'); ?>
			</td>

			<td class="order">
				<?php if ($canChange) : ?>
					<?php if ($saveOrder) :?>
						<?php if ($listDirn == 'asc') : ?>
							<span><?php echo $this->pagination->orderUpIcon($i, true, $context.'.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
							<span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, $context.'.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
						<?php elseif ($listDirn == 'desc') : ?>
							<span><?php echo $this->pagination->orderUpIcon($i, true, $context.'.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
							<span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, $context.'.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
						<?php endif; ?>
					<?php endif; ?>
					<?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
					<input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" />
				<?php else : ?>
					<?php echo $item->ordering; ?>
				<?php endif; ?>
			</td>
			<td class="center">
				<?php echo (int) $item->id; ?>
			</td>
		</tr>
	<?php endforeach;?>
	</tbody>
</table>
	
<div>
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
	<?php echo JHtml::_('form.token'); ?>
</div>