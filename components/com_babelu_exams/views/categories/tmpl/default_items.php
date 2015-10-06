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

<?php foreach ($this->category_list as $category):?>
<?php $user_access_levels = JFactory::getUser()->getAuthorisedViewLevels();?>
<?php if (in_array($category->access, $user_access_levels)):?>
<div class="babelu_exams_inner_wrapper">
	<h3>
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getCategoryLink($category->id));?>" rel="nofollow"><?php echo $category->title?></a>
	</h3>
	<div>
		<?php $clean_text = JHtml::_('string.truncate', strip_tags($category->description),400);?>
		<?php echo $clean_text;?>
		
	</div>
	<div>
		<p><?php echo JText::_('COM_BABELU_EXAMS_NUMBER_OF_EXAMS');?>: <?php echo $category->exam_count;?></p>
	</div>
	<div class="babelu_exams_sub_navi">
		<a href="<?php echo JRoute::_(Babelu_examsHelperBabelu_exams::getCategoryLink($category->id));?>" class="button" rel="nofollow"><?php echo JText::_('COM_BABELU_EXAMS_READ_MORE');?></a>
	</div>
</div>
<?php endif;?>
<?php endforeach;?>