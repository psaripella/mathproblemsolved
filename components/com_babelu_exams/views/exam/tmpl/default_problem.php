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

$inc = $this->pInc;
$section = $this->section;
$problem = $this->problem;

if ($problem->getSetting('marked') == 1)
{
	$marked = 'checked="checked"';
}
else
{
	$marked = '';
}

$inputTypeArray = array('mcq','maq','saq','seq');

if ($this->exam->getSetting('display_option') == 'single')
{
	$legend = JText::_('COM_BABELU_EXAMS_QUESTION').' '.$inc.' '.JText::_('COM_BABELU_EXAMS_OF').' '.$this->totalProblems;
}
else
{
	$legend = $inc;
}
?>

<fieldset id="problem<?php echo $inc;?>">
	<legend><?php echo $legend;?></legend>
	
	<!-- SOF MARK CONTROLS -->
	<div style="clear:both;"></div>
	<div style="float:right;">
		<label class="bu-markers">
			<?php echo JText::_('COM_BABELU_EXAMS_PROBLEM_MARKED');?>
			<input type="checkbox" name="problems[<?php echo $problem->getSetting('pid');?>][marker]" value="1" class="js-marker" <?php echo $marked;?> />
		</label>
	</div>
	<div style="clear:both;"></div>
	<!-- EOF MARK CONTROLS -->
						
	<!-- SOF PROBLEM TEXT -->
	<div class="babelu_exams_problem_text">
		<?php echo $problem->getSetting('problem_text');?>
	</div>
	<div style="clear:both;"></div>
	<!-- EOF PROBLEM TEXT -->
		
	<!-- SOF PROBLEM INPUT -->
	<div class="babelu_exams_problem_input">
		<?php $input_type = $section->getInputType($problem->getSetting('default_input_type')); ?>
		<?php echo $this->loadTemplate($inputTypeArray[$input_type]);?>
	</div>
	<div style="clear:both;"></div>
	<!-- SOF PROBLEM INPUT -->
						
</fieldset>
<?php $this->pInc++;?>