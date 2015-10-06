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
<?php foreach ($this->exam_list as $exam):?>
<div class="babelu_exams_inner_wrapper">
	<h3>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getDetailsLink($exam->id));?>" rel="nofollow"><?php echo $exam->title?></a>
	</h3>
	<div>
		<?php $clean_text = JHtml::_('string.truncate', strip_tags($exam->description),400);?>
		<?php echo $clean_text;?>
	</div>
	<div class="babelu_exams_sub_navi">
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getDetailsLink($exam->id));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_READ_MORE');?></a>
	</div>
</div>
<?php endforeach;?>