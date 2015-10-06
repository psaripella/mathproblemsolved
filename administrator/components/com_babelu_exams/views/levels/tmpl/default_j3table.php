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

$context = 'levels';
$editUrl = 'index.php?option=com_babelu_exams&task=level.edit&id=';


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
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_LEVEL_TITLE', 'a.title', $listDirn, $listOrder); ?>
			</th>              
            <th class='left' width="5%">
				<?php echo JText::_('COM_BABELU_EXAMS_LEVEL_PROBLEM_COUNT'); ?>
			</th>
			<th width="1%" class="nowrap center hidden-phone">
				<?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
			</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="5">
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
		<?php $canChange	= Babelu_examsHelperActions::canEditState('com_babelu_exams');?>
		<tr class="row<?php echo $i % 2; ?>">                     
      	  <td class="order nowrap center hidden-phone">
			<?php if ($canChange) : ?>
				<?php $disableClassName = '';?>
				<?php $disabledLabel	  = '';?>
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
					<?php echo JHtml::_('jgrid.checkedout', $i, $item->editor, $item->checked_out_time, 'levels.', $canCheckin); ?>
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
				<?php echo $item->problem_count;?>
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
        

		
