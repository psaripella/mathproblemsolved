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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');

$user = JFactory::getUser();

if ($user->authorise('bue.comment', 'com_babelu_exams') 
	|| $user->authorise('bue.comment', 'com_babelu_exams.exam.'.$this->item->exam_id))
{
	$this->canComment = true;
}
else
{
	$this->canComment = false;
}

if ($user->authorise('bue.grade', 'com_babelu_exams')
	|| $user->authorise('bue.grade', 'com_babelu_exams.exam.'.$this->item->exam_id))
{
	$this->canGrade = true;
}
else
{
	$this->canGrade = false;
}

//disable grading for now
$this->canGrade = false;

if (Babelu_examsHelperIntegration::isJ3())
{
	JHtml::_('formbehavior.chosen', 'select');
}


$formUrl = 'index.php?option=com_babelu_exams&layout=edit&id=';

//singulare controller name
$context = 'result'
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == '<?php echo $context;?>.cancel' || document.formvalidator.isValid(document.id('admin-form'))) 
		{
			Joomla.submitform(task, document.getElementById('admin-form'));
		}
		else 
		{
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_($formUrl.(int) $this->item->id); ?>" 
	method="post" name="adminForm" id="admin-form" class="form-validate">

<div class="width-100 span-12">
	<h1><?php echo $this->item->exam_details->title;?></h1>
	<?php if ($this->canComment):?>
		<label style="display:inline-block; clear:none; margin-left:5px;">
			<input type="checkbox" id="notify_user_comment" name="jform[notify_user_comment]" value="1" style="margin-top:0px;"/>
			<?php echo JText::_('COM_BABELU_EXAMS_NOTIFY_USER_COMMENT');?>
		</label>
	<?php endif;?>
		
	<?php if ($this->canGrade):?>
		<label style="display:inline-block; clear:none; margin-left:5px;">
			<input type="checkbox" id="notify_user_grade" name="jform[notify_user_grade]" value="1" style="margin-top:0px;"/>
			<?php echo JText::_('COM_BABELU_EXAMS_NOTIFY_USER_GRADE');?>
		</label>
	<?php endif;?>
</div>

<div class="clr"></div>

<!-- SOF TOP SECTION NAVI -->
<div id="babelu_exams_navi_top" class="babelu_exams_section_navi">
	<?php echo $this->loadTemplate('section_navi');?>
</div>
<div class="clr"></div>
<!-- EOF TOP SECTION NAVI -->

	<?php if (Babelu_examsHelperIntegration::isJ3()):?>
		<?php echo $this->loadTemplate('j3form');?>
	<?php else : ?>
		<?php echo $this->loadTemplate('form');?>
	<?php endif;?>

<input type="hidden" id="jform_points_possible" name="jform[points_possible]" value="<?php echo $this->points_possible;?>" />
<input type="hidden" id="jform_user_id" name="jform[student_id]" value="<?php echo $this->item->user_id;?>" />
<input type="hidden" id="jform_pass_per" name="jform[pass_per]" value="<?php echo $this->item->exam_details->pass_per;?>" />
<input type="hidden" id="jform_id" name="jform[id]" value="<?php echo $this->item->id;?>" />
<input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
<div class="clr"></div>
</form>
