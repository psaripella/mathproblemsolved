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

class JFormFieldPickcolor extends JFormField
{

	protected $type = 'Pickcolor';

	protected function getInput()
	{
		$size = $this->element['size'] ? ' size="' . (int) $this->element['size'] . '"' : '';
		$classes = (string) $this->element['class'];
		$disabled = ((string) $this->element['disabled'] == 'true') ? ' disabled="disabled"' : '';
		
		if ($classes == null) { $classes = ' input-colorpicker'; }
		
		if (!$disabled)
		{
			JHtml::_('behavior.framework', true);			
			JHtml::_('stylesheet', 'system/mooRainbow.css', array('media' => 'all'), true);
			JHtml::_('script', 'system/mooRainbow.js', false, true);
			
			JFactory::getDocument()->addScriptDeclaration(
			"window.addEvent('domready', function()
			{
				var elems = $$('.".$classes."');
				elems.each(function(item){
						new MooRainbow(".$this->id.",
						{
							id:'".$this->id."picker',
							imgPath: '" . JURI::root(true)
							. "/media/system/images/mooRainbow/',
							onComplete: function(color) {
							this.element.value = color.hex;
						},
						startColor: [0,0,0]});	
				});
			});
			");
			
		}

		if (empty($this->value)) { $this->value = '#000000'; }

		$onchange = $this->element['onchange'] ? ' onchange="' . (string) $this->element['onchange'] . '"' : '';

		$class = $classes ? ' class="' . trim($classes) . '"' : '';

		return '<input type="text" name="' . $this->name . '" id="' . $this->id . '"' . ' value="'
			. htmlspecialchars($this->value, ENT_COMPAT, 'UTF-8') . '"' . $class . $size . $disabled . $onchange . '/>';
	}
}