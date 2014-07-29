<?php
/**
* @package   FaceBook Slider
* @license   http://www.gnu.org/licenses/lgpl.html GNU/LGPL, see LICENSE.php
* 
**/
defined('_JEXEC') or die('Restricted access'); 
$doc =& JFactory::getDocument();
$width=$params->get('width',350);
$height=$params->get('height',400);
//$position=$params->get('position','left');
$click=$params->get('click');
$button=$params->get('button');
$buttont=$params->get('buttont');
$cont_background=$params->get('cont_background');
$border_color=$params->get('border_color');
$show_jquery=$params->get('show_jquery');
$moduleclass_sfx = $params->get('moduleclass_sfx');
$profileid = $params->get('profileid',34572893685);
$stream = $params->get('stream');
$connections = $params->get('connections');
$show_faces = $params->get('show_faces',true);
$color_scheme = $params->get('color_scheme','dark');
$apikey = $params->get('apikey', 118979788166438);
$baseurl = $params->get('baseurl','null');
?>
<div class="joomla_sharethis<?php echo $moduleclass_sfx?>">
<iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo $baseurl;?>&amp;width=<?php echo $width;?>px&amp;height=<?php echo $height;?>px&amp;show_faces=<?php echo $show_faces;?>&amp;colorscheme=<?php echo $color_scheme;?>&amp;stream=<?php echo $stream;?>&amp;show_border=true&amp;header=true&amp;appId=<?php echo $apikey;?>" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:<?php echo $width;?>px; height:<?php echo $height;?>px;" allowTransparency="true"></iframe>
</div>