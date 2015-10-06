<?php
/**
 * @version     1.3.0
 * @package     joomla 2.x
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning - http://mathewlenning.com/
 */

defined('_JEXEC') or die;
?>
<script type="text/javascript">
<!--
//SOF NAVI VARS
if(babelu_exams_box_count == 0)
{
	var box_count = <?php echo count($this->item->sections);?>;
	setBabeluExamsBoxCount(box_count);
 }
//EOF NAVI VARS
//-->
</script>
<?php if (count($this->item->sections) > 1):?>
<?php  $section_num = 1;?>
	<ul>
		<li>
		<a onclick="babeluExamsGoPrev();"><?php echo JText::_('COM_BABELU_EXAMS_PREV');?></a>
		</li>
		<?php foreach ($this->item->sections as $section):?>
		<li>
			<a onclick="babeluExamsShowHide('<?php echo ('js-box'.$section_num);?>');" ><?php echo $section_num; $section_num++;?></a>
		</li>
		<?php endforeach;?>
		<li>
			<a onclick="babeluExamsGoNext();"><?php echo JText::_('COM_BABELU_EXAMS_NEXT');?></a>
		</li>	
	</ul>
<?php endif;?>
