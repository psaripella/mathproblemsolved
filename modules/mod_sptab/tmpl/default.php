<?php 
/*---------------------------------------------------------------
# SP Tab - Next generation tab module for joomla
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2014 JoomShaper.com. All Rights Reserved.
# license - GNU/GPL V2 OR LATER
# Websites: http://www.joomshaper.com
-----------------------------------------------------------------*/
// no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript">
window.addEvent('load',function(){
var spTab<?php echo $uniqid ?> = new sptabs($('sptab<?php echo $uniqid ?>'), {
	animation : <?php echo "'" . $animation . "'" ?>,
	btnPos: <?php echo "'" . $btnPos . "'" ?>,
	activator: <?php echo "'" . $activator . "'" ?>,
	transition: <?php echo 'Fx.Transitions.' . $transition ?>,
	fxduration: <?php echo $fxspeed ?>,
	autoHeight : <?php echo $body_height ?>,
	fixedHeight: <?php echo $fixed_height ?>
	});
});
</script>
<div class="<?php echo $color ?>" id="sptab<?php echo $uniqid ?>">
<?php foreach ($list as $item) : ?>
	<div style="display:none">
		<div class="tab-padding">
			<h2 style="display:none" class="title"><span id="<?php echo (preg_replace('/\s+/', '_',strtolower($item['title']))); ?>" class="sptab-title<?php echo ($item['sfx']) ? ' sptab_sfx' . $item['sfx'] : ''; ?>"><?php echo $item['title']; ?></span></h2>
			<?php echo $item['content']; ?>
			<div style="clear:both"></div>
		</div>
	</div>
<?php endforeach; ?>
</div>