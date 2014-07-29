<?php
# copyright (c) plustheme.com  all rights reserved                        
# license - php - css - js and files are copyrighted material                           
# website: http://www.plustheme.com  
defined('_JEXEC') or die;

$tpl_w				= $this->params->get("tpl_w", "940");
$left_w				= $this->params->get("left_w", "235");
$right_w			= $this->params->get("right_w", "235");
$color_style       	= $this->params->get('colorStyle');

$left_w = ($this->countModules('left')>0) ? $left_w : 0;
$right_w = ($this->countModules('right')>0) ? $right_w : 0;

$column_inst = "splusplus";
if ($left_w==0 and $right_w>0) $column_inst = "xplusplus";
if ($left_w>0 and $right_w==0) $column_inst = "splusplux";
if ($left_w==0 and $right_w==0) $column_inst = "xplusplux";

$tpl_w = 'margin: 0 auto; width: ' . $tpl_w . 'px;';

$mastermod3_c = ($this->countModules('bottom1')>0) + ($this->countModules('bottom2')>0) + ($this->countModules('bottom3')>0);
$mastermod3_w = $mastermod3_c > 0 ? ' w' . floor(99 / $mastermod3_c) : '';

$div_automation = "
#wrapper { ".$tpl_w."padding:0;}
.splusplus #clmiddle { left:".$left_w."px;}
.splusplus #clright { margin-left:-".($left_w + $right_w)."px;}
.splusplus #cl1pader { margin-left:".($left_w + $right_w)."px;}
.splusplus #cl2 { left:".$right_w."px;width:".$left_w."px;}
.splusplus #cl3 { width:".$right_w."px;}

.splusplux #clright { left:".$left_w."px;}
.splusplux #cl1wrapper { right:".$left_w."px;}
.splusplux #cl1 { margin-left:".$left_w."px;}
.splusplux #cl2 { right:".$left_w."px;width:".$left_w."px;}

.xplusplus #clright { margin-left:-".$right_w."px;}
.xplusplus #cl1 { margin-left:".$right_w."px;}
.xplusplus #cl3 { left:".$right_w."px;width:".$right_w."px;}";
$this->addStyleDeclaration($div_automation);


// LOGO FILE OR SITE TITLE PARAM
$logo_width         							= $this->params->get("logo_width", "324");
$logo_height        							= $this->params->get("logo_height", "120");

if ($this->params->get('logoFile'))
{
$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}
elseif ($this->params->get('sitetitle'))
{
$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
$logo = '<span class="site-title" title="'. $sitename .'">'. $sitename .'</span>';
}

// SLIDESHOW
$slideshow_use									= ($this->params->get("slideshow_use", 1)  == 0)?"false":"true";

?>