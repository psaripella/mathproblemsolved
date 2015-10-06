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
		<?php echo $this->category->title;?>
	</h2>
<?php endif;?>
<?php endif; ?>
</div>
<!-- EOF HEADER -->

<div style="clear:both;"></div>
<!-- SOF CATEGORY DESCRIPTION -->
<div class="babelu_exams_main_description">
	<?php echo $this->category->description;?>
</div>
<!-- EOF CATEGORY DESCRIPTION -->
<div style="clear:both;"></div>

<!-- SOF EXAM_LIST -->
<?php if($this->exam_list != null):?>
	<?php echo $this->loadTemplate('items');?>
<?php else:?>
	<div><?php echo JText::_('COM_BABELU_EXAMS_NO_RECORDS_FOUND');?></div>
<?php endif;?>
<!-- EOF EXAM_LIST -->
	
</div>
<?php
//echo '<pre>';
//print_r($this);
//echo '</pre>';
?>