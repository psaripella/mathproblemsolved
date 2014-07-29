<?php defined('_JEXEC') or die;
# copyright (c) atict.com  all rights reserved   
# license -  licensed under  gnu/gpl v2                        
# website: http://www.plustheme.com  
jimport('joomla.filesystem.file');
include 'includes/header_include.php';
?>

<body class="body_bg">
<div class="bg_top"></div>
<div id="main">
<div id="wrapper" class="ict-fgr">

<!-- HEADER -->
<div id="header">
<jdoc:include type="modules" name="top" style="standard" />
<a class="site-title" href="<?php echo $this->baseurl; ?>">
<?php echo $logo;?>
<?php if ($this->params->get('sitedescription'))
{
echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>';
}
?>
</a>
</div>
<!-- //HEADER -->

<!-- SEARCH -->
<?php if ($this->countModules('search')) : ?>
<div id="search">        
<jdoc:include type="modules" name="search" style="none" />
</div>
<?php endif; ?> 
<div class="clr"></div>  
<!-- //SEARCH -->

<!-- HORIZONTAL MENU -->
<div id="hor_nav">
<jdoc:include type="modules" name="nav" style="none" />
</div>
<!-- //HORIZONTAL MENU -->

<!-- MESSAGE -->
<div id="message">
<jdoc:include type="message" />
</div>
<div class="clr"></div>  
<!-- //MESSAGE -->

<!-- SLIDESHOW -->
<div id="slideshow" class="hundredpro">
<div class="bg_top"></div>
<div class="ict-fgr">
<?php
if ($menu->getActive() == $menu->getDefault()) 
{
include 'includes/slideshow.php';
}
?>
</div>
</div>
<div class="clr"></div> 
<!-- //SLIDESHOW -->

<!-- MAIN CONTENT -->
<div id="main-content" class="<?php echo $column_inst; ?>">
<div id="clmsk" class="cplukplukl-color2">
<div id="clmiddle" class="cpludpludr-color1">
<div id="clright" class="cplutplutr-color1">

<div id="cl1wrapper">
<div id="cl1pader">
<div id="cl1">

<!-- COMPONENT -->
<div class="component-pad">
<jdoc:include type="component" />
</div>
<!-- //COMPONENT -->

</div>
</div>
</div>

<!-- LEFT COLUMN -->
<?php if ($left_w != 0) : ?>
<div id="cl2" class="color2">
<jdoc:include type="modules" name="left" style="standard" />
</div>
<?php endif; ?>
<!-- //LEFT COLUMN -->

<!-- RIGHT COLUMN -->
<?php if ($right_w != 0) : ?>
<div id="cl3" class="color1">
<jdoc:include type="modules" name="right" style="standard" />
</div>
<?php endif; ?>
<!-- //RIGHT COLUMN -->

</div>
</div>
</div>
</div>
<!-- //MAIN CONTENT -->

<!-- BOTTOM1, BOTTOM2, BOTTOM3 -->
<?php if ($this->countModules('bottom1 or bottom2 or bottom3')) : ?>
<div id="mastermods3" class="spacer<?php echo $mastermod3_w; ?>">
<jdoc:include type="modules" name="bottom1" style="standard" />
<jdoc:include type="modules" name="bottom2" style="standard" />
<jdoc:include type="modules" name="bottom3" style="standard" />
</div>
<?php endif; ?>
<div class="clr"></div>
<!-- //BOTTOM1, BOTTOM2, BOTTOM3  -->

<!-- BREADCRUMB  -->
<?php if ($this->countModules('pathway')) : ?>
<div class="breadcrumbs-pad">
<jdoc:include type="modules" name="pathway" />
</div>
<?php endif; ?>
<div class="clr"></div> 
<!-- //BREADCRUMB  -->

<!-- FOOTER -->
<div id="footer">
<div class="footer-dst">
<jdoc:include type="modules" name="footer" style="none" />
Designed by <a href="http://www.plustheme.com">plustheme.com</a>
</div>
</div>
<!-- //FOOTER -->

<jdoc:include type="modules" name="debug" style="none" />

</div>
</div>

</body>
</html>