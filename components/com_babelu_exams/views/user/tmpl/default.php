<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// no direct access
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
		<?php echo JText::_('COM_BABELU_EXAMS_USER_VIEW_DEFAULT_HEADER');?>
	</h2>
<?php endif;?>
<?php endif; ?>
</div>
<!-- EOF HEADER -->
<div class="babelu_exams_clearfix"></div>

<!-- SOF RESULTS TABLE -->
<div id="js-box1">
<h2><?php echo JText::_('COM_BABELU_EXAMS_USER_RESULTS_LIST_HEADER');?></h2>
<?php if ($this->results_list != null):?>
	<?php echo $this->loadTemplate('results');?>
<?php else:?>
<h3><?php echo JText::_('COM_BABELU_EXAMS_NO_RECORDS_FOUND');?></h3>
<?php endif;?>
</div>
<!-- EOF RESULTS TABLE -->



<!-- SOF SAVES TABLE -->
<?php if ($this->saves_list != null):?>
<div id="js-box2">
<h2><?php echo JText::_('COM_BABELU_EXAMS_USER_SAVES_LIST_HEADER');?></h2>
	<?php echo $this->loadTemplate('saves');?>
</div>
<?php endif;?>
<!-- EOF SAVES TABLE -->

</div>