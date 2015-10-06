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

<div class="babelu_exams_table_wrapper">
<table style="width:100%;">
 <thead>
  	<tr>
  	  <th class="align-center"><?php echo JText::_('COM_BABELU_EXAMS_NUM');?></th>
  	  <th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_SUBMITTED_ON');?></th>
  	  <th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_TIME_SPENT');?></th>
  	  <th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_STATUS');?></th>
  	  <th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_GRADE');?></th>
  	  <?php	if ($this->params->get('showReviews') == 1):?>
  	  <th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_REVIEW_RESULTS');?></th>
  	  <?php	endif;?>
 	 </tr>
 </thead>
 <tbody>
 	<?php $inc = 1;?>
  	<?php foreach($this->results as $result):?>
  	<tr>
  	  <td class="align-center"><?php echo $inc; $inc++;?></td>
  	  <td class="align-left"><?php echo JHtml::_('date', $result->creation_date);?></td>
  	  <td class="align-left"><?php $time = Babelu_examsHelperBabelu_exams::formatTime(($result->time_spent)); echo $time;?></td>
  	  <td class="align-left">			
  	  	<?php switch ($result->status)
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
	  </td>
  	  <td class="align-left">
  	  	<?php if ($result->status == 0):?>
 	 	  	<?php echo JText::_('COM_BABELU_EXAMS_STATUS_PENDING');?>
  	  	<?php else:?>
  		  	<?php echo ($result->percentage_grade.'%');?>
  		<?php endif;?>
  	  </td>
  	  <?php	if ($this->params->get('showReviews') == 1):?>
  	  <td class="align-left">
  	  	<?php if ($result->status == 0):?>
  	  		<?php echo JText::_('COM_BABELU_EXAMS_STATUS_PENDING');?>
  	  	<?php else: ?>
  	  		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResultLink($result->id));?>"><?php echo JText::_('COM_BABELU_EXAMS_REVIEW');?></a>
  	  	<?php endif; ?>
  	  </td>
  	  <?php endif;?>
  	</tr>
  	<?php endforeach;?>
  </tbody>
</table>
</div>