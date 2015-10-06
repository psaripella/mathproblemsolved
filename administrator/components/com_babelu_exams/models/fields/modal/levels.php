<?php
/**
 * @version     1.4.0
 * @package     Babel-U-Exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */
// No direct access
defined('_JEXEC') or die;

jimport('joomla.form.formfield');

class JFormFieldModal_Levels extends JFormField
{
	protected $type = 'Modal_levels';

	protected function getInput()
	{
		JHtml::_('behavior.modal', 'a.modal');

		$script = array();
		$script[] = '	function jSelectArticle_'.$this->id.'(id, title, catid, object) {';
		$script[] = '		document.id("'.$this->id.'_id").value = id;';
		$script[] = '		document.id("'.$this->id.'_name").value = title;';
		$script[] = '		SqueezeBox.close();';
		$script[] = '	}';

		JFactory::getDocument()->addScriptDeclaration(implode("\n", $script));

		$html	= array();
		$link	= 'index.php?option=com_babelu_exams&amp;view=levels&amp;layout=modal&amp;tmpl=component&amp;function=jSelectArticle_'.$this->id;

		$db	= JFactory::getDBO();
		$db->setQuery('SELECT title, ordering FROM #__babelu_exams_levels WHERE id = '.(int) $this->value );
		$result = $db->loadObject();

		if (is_object($result))
		{
			$title = $result->title;
			$ordering = $result->ordering;
		}
		else 
		{
			$title = JText::_('COM_BABELU_EXAMS_NO_LEVEL');
			$ordering = 0;
		}
		
		if ($error = $db->getErrorMsg()) 
		{
			JError::raiseWarning(500, $error);
		}

		$title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');

		$html[] = '<div class="fltlft">';
		$html[] = '  <input type="text" id="'.$this->id.'_name" value="'.$title.' : '.$ordering.'" disabled="disabled" size="35" />';
		$html[] = '</div>';
		$html[] = '<div class="button2-left">';
		$html[] = '  <div class="blank">';
		$html[] = '	<a class="modal" title="'.JText::_('COM_BABELU_EXAMS_SELECT_A_LEVEL').'"  href="'.$link.'" rel="{handler: \'iframe\', size: {x: 800, y: 450}}">';
		$html[] = JText::_('COM_BABELU_EXAMS_CHANGE_LEVEL_BUTTON');
		$html[] = '</a>';
		$html[] = '  </div>';
		$html[] = '</div>';

		if (0 == (int)$this->value) { $value = ''; } 
		else { $value = (int)$this->value; }

		$class = '';
		if ($this->required) { $class = ' class="required modal-value"'; }

		$html[] = '<input type="hidden" id="'.$this->id.'_id"'.$class.' name="'.$this->name.'" value="'.$value.'" />';

		return implode("\n", $html);
	}
}