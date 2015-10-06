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

$formUrl = 'index.php?option=com_babelu_exams&view=levels';

if (Babelu_examsHelperIntegration::isJ3())
{
	JHtml::_('bootstrap.tooltip');
	JHtml::_('formbehavior.chosen', 'select');
}
else
{
	JHtml::_('behavior.tooltip');
	JHTML::_('stylesheet', 'administrator/components/com_babelu_exams/assets/css/babelu_exams.css');
}

JHtml::_('behavior.multiselect');

?>
<form action="<?php echo JRoute::_($formUrl); ?>" method="post" name="adminForm" id="adminForm">
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar->render();?>
</div>
<div id="j-main-container" class="span10">
	<div id="filter-bar" class="btn-toolbar">
<!-- SOF SEARCH CONTROLS -->
		<?php echo $this->loadTemplate('search');?>
<!-- EOF SEARCH CONTROLS -->
	</div>
	<div class="clearfix clr"> </div>
	<div>
<!-- SOF SEARCH CONTROLS -->
	<?php if (Babelu_examsHelperIntegration::isJ3()):?>
		<?php echo $this->loadTemplate('j3table');?>
	<?php else : ?>
		<?php echo $this->loadTemplate('table');?>
	<?php endif;?>
<!-- EOF SEARCH CONTROLS -->
	</div>
	
</div>
</form>