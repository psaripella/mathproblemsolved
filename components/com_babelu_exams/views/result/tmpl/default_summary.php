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
<div class="babelu_exams_summary_wrapper">
	<div class="babelu_exams_text_summary">
		<ul>
		<li><?php echo JText::_('COM_BABELU_EXAMS_TIME_SPENT');?>:<?php echo $this->exam->getTimeSpent();?></li>
		<li><?php echo JText::_('COM_BABELU_EXAMS_GRADE');?>:<?php echo $this->exam->getSetting('percentage_grade').'%';?></li>
		</ul>
	</div>
	
	<div class="babelu_exams_status">
		<div class="outer_ring">
			<div class="status_text">
					<?php switch ($this->exam->getSetting('status'))
					{
						case 1: // failed
							echo JText::_('COM_BABELU_EXAMS_STATUS_FAIL');
							break;
						case 2: // passed
							echo JText::_('COM_BABELU_EXAMS_STATUS_PASS');
							break;
						case 3: // exam timed out
							echo JText::_('COM_BABELU_EXAMS_STATUS_TIMED_OUT');
							break;
						default: // pending
							echo JText::_('COM_BABELU_EXAMS_STATUS_PENDING');
							break;		
					}
					?>
			</div>
		</div>
	</div>
</div>