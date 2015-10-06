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

$saveOrder	= ($listOrder == 'a.ordering');
$canOrder = Babelu_examsHelperActions::canEditState('com_babelu_exams');
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_babelu_exams&task='.$context.'.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'adminList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
?>
<script type="text/javascript">
	Joomla.orderTable = function() {
		table = document.getElementById("sortTable");
		direction = document.getElementById("directionTable");
		order = table.options[table.selectedIndex].value;
		if (order != '<?php echo $this->state->get('list.ordering'); ?>') 
		{
			dirn = 'asc';
		} else 
		{
			dirn = direction.options[direction.selectedIndex].value;
		}
		Joomla.tableOrdering(order, dirn, '');
	}
</script>
<table class="table table-striped" id="adminList">
	<thead>
		<tr>
			<th width="1%" class="nowrap center hidden-phone">
				<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
			</th>
			<th width="1%" class="hidden-phone">
				<input type="checkbox" name="checkall-toggle" value="" title="<?php echo JText::_('JGLOBAL_CHECK_ALL'); ?>" onclick="Joomla.checkAll(this)" />
			</th>      
			<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_TITLE', 'a.title', $listDirn, $listOrder); ?>
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
			<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_EXAMS_ACCESS', 'a.access', $listDirn, $listOrder); ?>
			</th>
			<th width="1%" class="nowrap center">
				<?php echo JHtml::_('grid.sort', 'JPUBLISHED', 'a.state', $listDirn, $listOrder); ?>
			</th>                   
			<th width="1%" class="nowrap center hidden-phone">
				<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="13">
				<?php echo $this->pagination->getListFooter(); ?>
			</td>
		</tr>
	</tfoot>
<tbody>
	<?php foreach ($this->items as $i => $item) :?>
		<?php $ordering	= ($listOrder == 'a.ordering');?>
		<?php $canCreate = Babelu_examsHelperActions::canCreate('com_babelu_exams');?>
		<?php $canEdit	= Babelu_examsHelperActions::canEdit('com_babelu_exams');?>
		<?php $canCheckin = Babelu_examsHelperActions::canManage('com_babelu_exams');?>
		<?php $canChange = Babelu_examsHelperActions::canEditState('com_babelu_exams');?>
		<tr class="row<?php echo $i % 2; ?>">
			<td class="order nowrap center hidden-phone">
				<?php if ($canChange) : ?>
				<?php $disableClassName = '';?>
				<?php $disabledLabel = '';?>
					<?php if (!$saveOrder) :?>
						<?php $disabledLabel    = JText::_('JORDERINGDISABLED');?>
					<?php $disableClassName = 'inactive tip-top';?>
					<?php endif; ?>
					<span class="sortable-handler hasTooltip <?php echo $disableClassName?>" title="<?php echo $disabledLabel?>">
						<i class="icon-menu"></i>
					</span>
					<input type="text" style="display:none" name="order[]" size="5" value="<?php echo $item->ordering;?>" class="width-20 text-area-order " />
				<?php else : ?>
					<span class="sortable-handler inactive" >
						<i class="icon-menu"></i>
					</span>
				<?php endif; ?>
			</td>
				<td class="center hidden-phone">
				<?php echo JHtml::_('grid.id', $i, $item->id); ?>
			</td>
                    
			<td>
				<?php if (isset($item->checked_out) && $item->checked_out) : ?>
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'exams.', $canCheckin); ?>
				<?php endif; ?>
				<?php if ($canEdit) : ?>
					<a href="<?php echo JRoute::_($editUrl.(int) $item->id); ?>">
						<?php echo $this->escape($item->title); ?>
					</a>
				<?php else : ?>
					<?php echo $this->escape($item->title); ?>
				<?php endif; ?>
			</td>
			<td>
				<?php if ($item->time_limit == 0):?>
					<?php echo JText::_('COM_BABELU_EXAMS_UNLIMITED');?>
				<?php else:?>
					<?php echo $item->time_limit.' '.JText::_('COM_BABELU_EXAMS_MIN'); ?>
				<?php endif;?>
			</td>
			<td>
				<?php if ($item->level_title):?>
					<?php echo $item->level_title.' : '.$item->level_ordering; ?>
				<?php else:?>
					<?php echo JText::_('COM_BABELU_EXAMS_NO_LEVEL').' : 0';?>
				<?php endif;?>
			</td>
			<td>
				<?php echo $item->pass_per; ?>%
			</td>
			<td>
				<?php echo $ynArray[$item->savable]; ?>
			</td>				
			<td>
				<?php echo $grade_opt[$item->grading_option]; ?>
			</td>
			<td>
				<?php if (!is_null($item->catid)):?>
					<?php echo $item->cat_title; ?>
				<?php else:?>
					<?php echo JText::_('COM_BABELU_EXAMS_EXAMS_NO_CATID');?>
				<?php endif;?>
			</td>
			<td>
				<?php echo $item->access; ?>
			</td>
			<td class="center">
				<?php echo JHtml::_('jgrid.published', $item->state, $i, $context.'.', $canChange, 'cb'); ?>
			</td>
			<td class="center hidden-phone">
				<?php echo (int) $item->id; ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
 
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
<input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
<?php echo JHtml::_('form.token'); ?> 