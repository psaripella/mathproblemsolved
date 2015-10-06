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
?>
<div class="babelu_exams_details">
<ul>
	<li class="<?php echo $this->params->get('showLevel');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_LEVEL');?></strong> : <?php echo $this->exam->getSetting('level');?>
	</li>
	<li class="<?php echo $this->params->get('showTimeLimit');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_TIME_LIMIT_LABEL');?></strong> : <?php echo $this->exam->getTimeLimit();?>
	</li>
	<li class="<?php echo $this->params->get('showRetakeLimit');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_RETAKE_LIMIT_LABEL');?></strong> : 
		<?php 
			$retakeLimit = $this->exam->getSetting('retake_limit');
			if ($retakeLimit == 0)
			{
				$retakeLimit = JText::_('COM_BABELU_EXAMS_UNLIMITED');
			}
			
			echo $retakeLimit;
		?>
	</li>
	<li class="<?php echo $this->params->get('showRetakeDelay');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_RETAKE_DELAY_LABEL');?></strong> : <?php $delay_text = Babelu_examsHelperBabelu_exams::formatDelay($this->exam->getSetting('retake_delay')); echo $delay_text;?>
	</li>
		<li class="<?php echo $this->params->get('showPassLine');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_PASS_LINE_LABEL');?></strong> : <?php echo ($this->exam->getSetting('pass_per').'%');?>
	</li>
	<li class="<?php echo $this->params->get('showGradingOption');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_GRADING_OPTION_LABEL');?></strong> :
		<?php 
		$gradingOption = $this->exam->getSetting('grading_option');
		
		switch ($gradingOption)
		{
			case 0:
				echo JText::_('COM_BABELU_EXAMS_DETAILS_GRADING_OPTION_COMPUTERIZED');
				break;
			case 1:
				echo JText::_('COM_BABELU_EXAMS_DETAILS_GRADING_OPTION_MANUAL');
				break;
			default:
				break;
		}
		?>
	</li>
		<li class="<?php echo $this->params->get('showSavable');?>">
		<strong><?php echo JText::_('COM_BABELU_EXAMS_DETAIL_SAVEABLE_LABEL');?></strong> : <?php if($this->exam->getSetting('savable')){ echo JText::_('JYES');} else{ echo JText::_('JNO');}?>
	</li>
</ul>
</div>