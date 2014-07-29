<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

function modChrome_standard($module, &$params, &$attribs)
{
$mc_sfx = $params->get('moduleclass_sfx');
if (!empty ($module->content)) : ?>
<?php if (strlen(trim($mc_sfx))>0) : ?>
<div class="module m<?php echo $mc_sfx; ?>">
<?php else: ?>
<div class="module">
<?php endif; ?>

<?php if ($module->showtitle != 0) : ?>
<h3 class="module-title"><?php echo $module->title; ?></h3>
<?php endif; ?>
<div class="module-body">
<?php echo $module->content; ?>
</div>
</div>
<?php endif;
}
?>