<?php
/**
 * @version     1.2.0
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

 // No direct access
defined('_JEXEC') or die;
?>
<?php if (count($this->exam->getSections()) > 1):?>

<script type="text/javascript">
<!--
//SOF NAVI VARS
 if(babelu_navi.box_count == 0)
 { 
	var box_count = <?php echo count($this->exam->getSections());?>;
	babelu_navi.setBoxCount(box_count);
 }
//EOF NAVI VARS
//-->
</script>

<?php  $section_num = 1;?>
<ul>
<script type="text/javascript">
<!--
var prev = "<?php echo JText::_('COM_BABELU_EXAMS_PREV');?>";
document.write('<li class="js-nav">');
document.write('<a class="js-prev">'+prev+'</a>');
document.write('</li>');
//-->
</script>
<?php foreach ($this->exam->getSections() as $section):?>
<li>
<a href="<?php echo '#section'.$section_num;?>" class="<?php echo 'js-box'.$section_num;?> section_navi" ><?php echo $section_num; $section_num++;?></a>
</li>
<?php endforeach;?>
<script type="text/javascript">
<!--
var next = "<?php echo JText::_('COM_BABELU_EXAMS_NEXT');?>";
document.write('<li class="js-nav">');
document.write('<a class="js-next">'+next+'</a>');
document.write('</li>');
//-->
</script>
</ul>
<?php endif;?>