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

<?php if (!$this->exam->hasSettings()):?>
<?php echo $this->loadTemplate('error');?>
<?php else:?>
<!-- SOF HEADER -->
<div id="babelu_exams_header">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<?php if (!is_null($this->params->get('page_heading'))):?>
	<h2>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h2>
<?php else:?>
	<h2>
		<?php echo $this->exam->getSetting('title');?>
	</h2>
<?php endif;?>
<?php endif; ?>
</div>
<!-- EOF HEADER -->
 
<!-- SOF DETAILS -->
<?php if($this->params->get('showDetails')):?>
	<?php echo $this->loadTemplate('details');?>
<?php endif;?>
<!-- EOF DETAILS -->

<!-- SOF EXAM DESCRIPTION -->
<div class="babelu_exams_main_description">
	<?php echo $this->exam->getSetting('description');?>
</div>
<!-- EOF EXAM DESCRIPTION -->

<!-- SOF NAVIGATION -->
<?php echo $this->loadTemplate('navigation');?>
<!-- EOF NAVIGATION -->

<!-- clear fix -->
<div class="babelu_exams_clearfix"></div>

<?php endif;?>
</div>