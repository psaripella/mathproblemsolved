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
	<?php if (isset($this->exam)):?>
	<h2>
		<?php echo $this->exam->getSetting('title');?>
	</h2>
	<?php endif;?>
<?php endif;?>
<?php endif; ?>
</div>
<!-- EOF HEADER -->

<!-- SOF CHART -->
<?php if (!is_null($this->exam->getSetting('id'))):?>
<?php if ($this->exam->getSetting('show_chart')): ?>
	<?php echo $this->loadTemplate('chart');?>
<?php endif;?>
<?php endif;?>
<!-- EOF CHART -->

<!-- SOF NAVIGATION -->
	<?php echo $this->loadTemplate('navigation');?>
<!-- EOF NAVIGATION -->

<!-- SOF RESULTS TABLE -->
<?php if (count($this->results) != 0):?>
	<?php echo $this->loadTemplate('items');?>
<?php else:?>
<div class="babelu_exams_no_records">
<h2><?php echo JText::_('COM_BABELU_EXAMS_NO_RECORDS_FOUND');?></h2>
</div>
<?php endif;?>
<!-- EOF RESULTS TABLE -->

</div>
<?php
//echo '<pre>';
//print_r($this);
//echo '</pre>';
?>