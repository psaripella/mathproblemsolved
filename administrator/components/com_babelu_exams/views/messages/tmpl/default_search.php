<?php
/**
 * @version     0.0.1
 * @package     Babel-U-Courses
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author     Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

$currentSearch = $this->escape($this->state->get('filter.search'));
?>
<div class="filter-search btn-group pull-left">
<label for="filter_search" class="element-invisible"><?php echo JText::_('JSEARCH_FILTER');?></label>
<input type="text" name="filter_search" id="filter_search" placeholder="<?php echo JText::_('JSEARCH_FILTER'); ?>" value="<?php echo $currentSearch; ?>" title="<?php echo JText::_('JSEARCH_FILTER'); ?>" />
</div>
<div class="btn-group pull-left">
<button class="btn hasTooltip" type="submit" title="<?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?>"><i class="icon-search"></i></button>
<button class="btn hasTooltip" type="button" title="<?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?>" onclick="document.id('filter_search').value='';this.form.submit();"><i class="icon-remove"></i></button>
</div>

<?php if (Babelu_examsHelperIntegration::isJ3()):?>
<div class="btn-group pull-right hidden-phone">
	<label for="limit" class="element-invisible"><?php echo JText::_('JFIELD_PLG_SEARCH_SEARCHLIMIT_DESC');?></label>
	<?php echo $this->pagination->getLimitBox(); ?>
</div>

<?php $listDirn	= $this->state->get('list.direction');?>
<div class="btn-group pull-right hidden-phone">
<label for="directionTable" class="element-invisible"><?php echo JText::_('JFIELD_ORDERING_DESC');?></label>
	<select name="directionTable" id="directionTable" class="input-medium" onchange="Joomla.orderTable()">
		<option value=""><?php echo JText::_('JFIELD_ORDERING_DESC');?></option>
		<option value="asc" <?php if ($listDirn == 'asc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_ASCENDING');?></option>
		<option value="desc" <?php if ($listDirn == 'desc') echo 'selected="selected"'; ?>><?php echo JText::_('JGLOBAL_ORDER_DESCENDING');?></option>
	</select>
</div>
<?php $sortFields = $this->getSortFields();?>
<div class="btn-group pull-right">
<label for="sortTable" class="element-invisible"><?php echo JText::_('JGLOBAL_SORT_BY');?></label>
	<select name="sortTable" id="sortTable" class="input-medium" onchange="Joomla.orderTable()">
		<option value=""><?php echo JText::_('JGLOBAL_SORT_BY');?></option>
		<?php echo JHtml::_('select.options', $sortFields, 'value', 'text', $this->state->get('list.ordering'));?>
	</select>
</div>
<?php endif;?>