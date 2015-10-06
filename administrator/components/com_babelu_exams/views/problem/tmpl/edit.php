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

if (Babelu_examsHelperIntegration::isJ3())
{
	JHtml::_('formbehavior.chosen', 'select');
}

$formUrl = 'index.php?option=com_babelu_exams&layout=edit&id=';

//singulare controller name
$context = 'problem'
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
	
	<?php if (Babelu_examsHelperIntegration::isJ3()):?>
		<?php echo $this->loadTemplate('j3form');?>
	<?php else : ?>
		<?php echo $this->loadTemplate('form');?>
	<?php endif;?>
	
<input type="hidden" name="task" value="" />
<?php echo JHtml::_('form.token'); ?>
<div class="clr"></div>
</form>