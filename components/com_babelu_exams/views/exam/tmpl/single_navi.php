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

$boxNumber = 1;
?>

<script type="text/javascript">
<!--
//SOF NAVI VARS
 if(babelu_navi.box_count == 0)
 { 
	var box_count = <?php echo $this->boxCount;?>;
	babelu_navi.setBoxCount(box_count);
 }
//EOF NAVI VARS
//-->
</script>

<ul>
	<?php if (!$this->isFirst): ?>
	<li class="js-nav">
		<a class="js-prev"><?php echo JText::_('COM_BABELU_EXAMS_PREV');?></a>
	</li>
	<?php else: ?>
		<li class="js-nav">
			<?php echo JText::_('COM_BABELU_EXAMS_PREV');?>
		</li>
	<?php endif;?>
	<?php $this->isFirst = false;?>
	<li>
		<a href="#js-reviewBox" class="js-box<?php echo $this->boxCount;?> js-pnavi">
			<?php echo JText::_('COM_BABELU_EXAMS_REVIEW_MARKED');?>
		</a>
	</li>
	
	<?php if(!$this->isLast):?>
	<li class="js-nav">
		<a class="js-next"><?php echo JText::_('COM_BABELU_EXAMS_NEXT');?></a>
	</li>
	<?php else:?>
	<li class="js-nav">
		<?php echo JText::_('COM_BABELU_EXAMS_NEXT');?>
	</li>
	<?php endif;?>
</ul>