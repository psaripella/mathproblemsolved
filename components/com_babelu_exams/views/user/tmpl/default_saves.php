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
<table>
	<thead>
		<tr>
			<th class="align-center"><?php echo JText::_('COM_BABELU_EXAMS_NUM');?></th>
			<th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_USER_TABLE_TITLE');?></th>
			<th class="align-left"><?php echo JText::_('COM_BABELU_EXAMS_USER_TABLE_SAVE_DATE');?></th>
		</tr>
	</thead>
	<tbody>
		<?php $inc= 1;?>
		<?php foreach ($this->saves_list AS $save):?>
		<tr>
			<td class="align-center"><?php echo $inc; $inc++;?></td>
			<td class="align-left"><a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResumeExamLink($save->id));?>" rel="nofollow"><?php echo $save->title;?></a></td>
			<td class="align-left"><?php echo JHtml::_('date', $save->creation_date);?></td>
		</tr>	
		<?php endforeach;?>		
	</tbody>
</table>
</div>