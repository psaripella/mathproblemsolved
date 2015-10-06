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

?>

<?php

$options = $this->problem->getSetting('displayOptions');
$user_response = $this->problem->getSetting('user_response');
$name = 'problems['.$this->problem->getSetting('pid').'][user_response]';

$inputs = array();

foreach ($options AS $option)
{
	$input = new Babelu_examsHtmlInput(array('type'=>'radio','name' => $name, 'value' => $option), array('problem', 'multiple_choice'));
	$label = new Babelu_examsHtmlLabel();
	$label->setInnerHtml($option);
	
	$input->addLabel($label, true);
	
	
	if (in_array($option, $user_response))
	{
		$input->addProperty('checked', 'checked');
	}
	
	$inputs[] = $input;
}
?>
<ul>
<?php foreach ($inputs AS $input):?>
<li><?php echo $input->renderHtml();?></li>
<?php endforeach;?>
</ul>