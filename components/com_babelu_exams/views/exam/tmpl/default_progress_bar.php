<?php
/**
 * @version     
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */
 
 // No direct access
defined('_JEXEC') or die;
?>

<!-- SOF JS VARIABLE ASSIGNMENT -->
<script type="text/javascript">
<!--

//SOF PROGRESS BAR VARS
	var progress_completed_text = "<?php echo JText::_('COM_BABELU_EXAMS_PROGRESS_COMPLETED_TEXT');?>";
		babelu_progress.setCompletedText(progress_completed_text);

	var p_count = <?php echo $this->exam->getActualProblemCount();?>;
		babelu_progress.setProblemCount(p_count);
	
//EOF PROGRESS BAR VARS

//SOF PROGRESS BAR WRITE

document.write('<div class="progress_bar_outer">');
document.write('<div id="progress_bar_box" class="progress_bar_box">');
document.write('<div id="progress_bar_completed" class="progress_bar_completed"></div>');
document.write('<div id="progress_bar_text" class="progress_bar_text">0%</div>');
document.write('</div>');
document.write('</div>');
//-->
</script>