<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
$function	= JFactory::getApplication()->input->getCmd('function', 'jSelectArticle');
$listOrder	= $this->state->get('list.ordering');
$listDirn	= $this->state->get('list.direction');

$document = JFactory::getDocument();
$document->addStyleDeclaration('body{padding-top:10px; padding-left:10px; padding-right:10px;}');
?>
<form action="<?php echo JRoute::_('index.php?option=com_babelu_exams&view=levels&layout=modal&tmpl=component&function='.$function);?>" method="post" name="adminForm" id="adminForm">
<div id="j-main-container">
<div id="filter-bar" class="btn-toolbar">
		<div class="btn-group pull-right hidden-phone fltrt">
			<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
			<?php echo $this->pagination->getLimitBox(); ?>
		</div>
		<div class="filter-search btn-group pull-left">
			<label class="element-invisible" for="filter_search" style="display:none;"><?php echo JText::_('JSEARCH_FILTER_LABEL'); ?></label>
			<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" title="<?php echo JText::_('JSEARCH_FILTER'); ?>" />
		</div>
		<div class="btn-group pull-left">
			<button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i> <?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?> </button>
			<button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i> <?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?> </button>
		</div>
</div>
<div class="clearfix clr"> </div>

<table class="table table-striped adminlist" id="levelList">
		<thead>
			<tr>
				<th class='left'>
				<?php echo JHtml::_('grid.sort',  'COM_BABELU_EXAMS_LEVEL_TITLE', 'a.title', $listDirn, $listOrder); ?>
				</th>
                <?php if (isset($this->items[0]->id)) { ?>
                <th width="1%" class="nowrap">
                    <?php echo JHtml::_('grid.sort',  'JGRID_HEADING_ID', 'a.id', $listDirn, $listOrder); ?>
                </th>
                <?php } ?>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="2">
				<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php foreach ($this->items as $i => $item) :
			?>
			<tr class="row<?php echo $i % 2; ?>">

				<td>
				<a class="pointer" onclick="if (window.parent) window.parent.<?php echo $this->escape($function);?>('<?php echo $item->id; ?>', '<?php echo $this->escape(addslashes($item->title.' : '.$item->ordering)); ?>');">
					<?php echo $this->escape($item->title); ?> : <?php echo $this->escape($item->ordering);?></a>
				</td>
                <?php if (isset($this->items[0]->id)) { ?>
				<td class="center">
					<?php echo (int) $item->id; ?>
				</td>
                <?php } ?>
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
</div>
</form>