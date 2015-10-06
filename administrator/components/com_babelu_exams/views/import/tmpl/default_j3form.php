<?php
/**
 * @version     1.0.0
 * @package
 * @copyright   Copyright (C) 2012. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com
 */

// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

$form_name = 'import-form';
$form_link = 'index.php?option=com_babelu_exams';
?>

<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'import.cancel' || document.formvalidator.isValid(document.id('<?php echo $form_name;?>'))) 
		{
			Joomla.submitform(task, document.getElementById('<?php echo $form_name;?>'));
		}
		else 
		{
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php echo JRoute::_($form_link); ?>" 
	method="post"
	name="adminForm" id="<?php echo $form_name;?>" 
	class="form-validate" 
	enctype="multipart/form-data">

	<div class="span6 form-horizontal">
	<h2><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_TITLE');?></h2>
	<p><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_PARAGRAPH');?></p>
	<ol>
		<li><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_RULE_ONE');?></li>
		<li><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_RULE_TWO');?></li>
		<li><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_RULE_THREE');?></li>
		<li><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_RULE_FOUR');?></li>
		<li><?php echo JText::_('COM_BABELU_EXAMS_IMPORT_ABOUT_RULE_FIVE');?></li>
	</ol>
		<fieldset class="adminform">
<!-- SOF CUSTOM FIELDS -->
			<div class="control-group">
				<div class="control-label"> <?php echo $this->form->getLabel('group_id');?></div>
				<div class="controls"><?php  echo $this->form->getInput('group_id');?></div>
			</div>
			<div class="control-group">
				<div class="control-label"> <?php echo $this->form->getLabel('importFile');?></div>
				<div class="controls"><?php  echo $this->form->getInput('importFile');?></div>
			</div>
<!-- EOF CUSTOM FIELDS -->
		</fieldset>
		
	</div>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
	<div class="clr"></div>

</form>
