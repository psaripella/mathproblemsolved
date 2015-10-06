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
$multipleSections = (count($this->exam->getSections()) > 1);
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
	<?php if ($multipleSections):?>
		<?php foreach ($this->exam->getSections() as $section):?>
			<li>
				<a href="<?php echo '#section'.$boxNumber;?>" class="<?php echo 'js-box'.$boxNumber;?> js-pnavi" ><?php echo $boxNumber; $boxNumber++;?></a>
			</li>
		<?php endforeach;?>
	<?php endif;?>
	
	<li>
		<a href="<?php echo '#review'.$this->boxCount;?>" class="js-box<?php echo $this->boxCount;?> js-pnavi">
			<?php echo JText::_('COM_BABELU_EXAMS_REVIEW_MARKED');?>
		</a>
	</li>
	<li>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResultsLink($this->exam->getSetting('id')));?>" rel="nofollow">
			<?php echo JText::_('COM_BABELU_EXAMS_VIEW_PERFORMANCE_HISTORY');?>
		</a>
	</li>
	
</ul>