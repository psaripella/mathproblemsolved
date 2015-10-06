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
?>
<div class="babelu_exams_sub_navi">
	<ul>
	<?php if(!is_null($this->exam->getSetting('id')) && $this->exam->isPublished()):?>
	<li>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getNewExamLink($this->exam->getSetting('id')));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_TAKE_EXAM');?></a>
	</li>
	<?php endif;?>
	<?php if(!is_null($this->exam->getSetting('id')) && $this->exam->isSavable() && !is_null($this->exam->getSetting('save_id')) && $this->exam->isPublished()):?>
	<li>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getResumeExamLink($this->exam->getSetting('id')));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_RESUME');?></a>
	</li>
	<?php endif;?>
	</ul>
</div>