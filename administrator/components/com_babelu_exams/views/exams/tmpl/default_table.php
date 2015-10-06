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

$context = 'exams';
$editUrl = 'index.php?option=com_babelu_exams&task=exam.edit&id=';

// array used for savable & tracking fields
$ynArray = array(JText::_('JNO'),JText::_('JYES'));

//grading options array
$grade_opt = array(JText::_('COM_BABELU_EXAMS_COMPUTERIZED'),
		JText::_('COM_BABELU_EXAMS_MANUAL'));

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

				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_HEADER_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_TIME_LIMIT', 'a.time_limit', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_LEVEL', 'a.level', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_PASS_PER', 'a.pass_per', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_SAVABLE', 'a.savable', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_GRADING_OPTION', 'a.grading_option', $listDirn, $listOrder); ?>
				</th>
				<th class='left'>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_CATID', 'a.catid', $listDirn, $listOrder); ?>
				</th>
				<th>
					<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_ACCESS', 'a.access', $listDirn, $listOrder); ?>
				</th>
                <?php if (isset($this->items[0]->state)): ?>
					<th width="5%">
						<?php echo JHtml::_('grid.sort',  'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
					</th>
                <?php endif; ?>
                
                <?php if (isset($this->items[0]->ordering)) : ?>
					<th width="10%">
						<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ORDERING', 'a.ordering', $listDirn, $listOrder); ?>
						<?php if ($canOrder && $saveOrder) :?>
							<?php echo JHtml::_('grid.order',  $this->items, 'filesave.png', 'exams.saveorder'); ?>
						<?php endif; ?>
					</th>
                <?php endif; ?>
                <?php if (isset($this->items[0]->id)): ?>
                	<th width="1%" class="nowrap">
                    	<?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                	</th>
                <?php endif; ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="12">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php foreach ($this->items as $i => $item) : ?>
				<?php	$ordering	= ($listOrder == 'a.ordering'); ?>
				<?php	$canCreate	= Babelu_examsHelperActions::canCreate('com_babelu_exams'); ?>
				<?php	$canEdit	= Babelu_examsHelperActions::canEdit('com_babelu_exams'); ?>
				<?php	$canCheckin	= Babelu_examsHelperActions::canManage('com_babelu_exams'); ?>
				<?php	$canChange	= Babelu_examsHelperActions::canEditState('com_babelu_exams'); ?>
			<tr class="row<?php echo $i % 2; ?>">
				<td class="center">
					<?php echo JHtml::_('grid.id', $i, $item->id); ?>
				</td>

				<td>
					<?php if (isset($item->checked_out) && $item->checked_out) : ?>
						<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'exams.', $canCheckin); ?>
					<?php endif; ?>
					<?php if ($canEdit) : ?>
						<a href="<?php echo JRoute::_($editUrl.(int) $item->id); ?>">
						<?php echo $this->escape($item->title); ?></a>
					<?php else : ?>
						<?php echo $this->escape($item->title); ?>
					<?php endif; ?>
				</td>
				<td>
					<?php echo $item->time_limit.' '.JText::_('COM_BABELU_EXAMS_MIN'); ?>
				</td>
				<td>
					<?php if ($item->level_title):?>
						<?php echo $item->level_title.' : '.$item->level_ordering; ?>
					<?php else:?>
						<?php echo JText::_('COM_BABELU_EXAMS_NO_LEVEL').' : 0';?>
					<?php endif;?>
				</td>
				<td>
					<?php echo $item->pass_per.'%'; ?>
				</td>
				<td>
					<?php echo $ynArray[$item->savable]; ?>
				</td>
				<td>
					<?php echo $grade_opt[$item->grading_option]; ?>
				</td>
				<td>
					<?php 
					
					if (!is_null($item->catid))
					{
						echo $item->cat_title; 
					}
					else 
					{
						echo JText::_('COM_BABELU_EXAMS_EXAMS_NO_CATID');
					}
					?>
				</td>
				<td>
					<?php echo $item->access;?>
				</td>

                <?php if (isset($this->items[0]->state)) : ?>
				    <td class="center">
					    <?php echo JHtml::_('jgrid.published', $item->state, $i, 'exams.', $canChange, 'cb'); ?>
				    </td>
                <?php endif; ?>
                
                <?php if (isset($this->items[0]->ordering)) : ?>
				    <td class="order">
					    <?php if ($canChange) : ?>
						    <?php if ($saveOrder) :?>
							    <?php if ($listDirn == 'asc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, 'exams.orderup', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'exams.orderdown', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php elseif ($listDirn == 'desc') : ?>
								    <span><?php echo $this->pagination->orderUpIcon($i, true, 'exams.orderdown', 'JLIB_HTML_MOVE_UP', $ordering); ?></span>
								    <span><?php echo $this->pagination->orderDownIcon($i, $this->pagination->total, true, 'exams.orderup', 'JLIB_HTML_MOVE_DOWN', $ordering); ?></span>
							    <?php endif; ?>
						    <?php endif; ?>
						    
						    <?php $disabled = $saveOrder ?  '' : 'disabled="disabled"'; ?>
						    <input type="text" name="order[]" size="5" value="<?php echo $item->ordering;?>" <?php echo $disabled ?> class="text-area-order" />
					    <?php else : ?>
						    <?php echo $item->ordering; ?>
					    <?php endif; ?>
				    </td>
                <?php endif; ?>
                
                <?php if (isset($this->items[0]->id)): ?>
				<td class="center">
					<?php echo (int) $item->id; ?>
				</td>
                <?php endif; ?>
                
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<div>
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>

