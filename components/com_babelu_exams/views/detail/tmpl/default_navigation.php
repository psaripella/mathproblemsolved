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
jimport('joomla.utilities.utility');

$exam_id = $this->exam->getSetting('id');
$result_id = $this->exam->getSetting('result_id');
$save_id = $this->exam->getSetting('save_id');
?>
<div class="babelu_exams_sub_navi">
	<ul>
	<?php if($this->exam->getSetting('state') == 1):?>
	<li>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getNewExamLink($exam_id));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_TAKE_EXAM');?></a>
	</li>
	<?php endif;?>
	<?php if (!is_null($result_id)):?>
	<li>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResultsLink($exam_id));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_REVIEW');?></a>
	</li>
	<?php endif;?>
	<?php if($this->exam->isSavable() && !is_null($save_id) && $this->exam->getSetting('state') == 1):?>
	<li>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResumeExamLink($exam_id));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_RESUME');?></a>
	</li>
	<?php endif;?>
	</ul>
</div>