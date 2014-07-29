<?php /**  * @copyright	Copyright (C) 2013 JoomlaTemplates.me - All Rights Reserved. **/ defined( '_JEXEC' ) or die( 'Restricted access' );
$jquery			= $this->params->get('jquery');
$scrolltop		= $this->params->get('scrolltop');
$logo			= $this->params->get('logo');
$logotype		= $this->params->get('logotype');
$sitetitle		= $this->params->get('sitetitle');
$sitedesc		= $this->params->get('sitedesc');
$menuid			= $this->params->get('menuid');
$animation		= $this->params->get('animation');
$app			= JFactory::getApplication();
$doc			= JFactory::getDocument();
$templateparams	= $app->getTemplate(true)->params;
$menu = $app->getMenu();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<jdoc:include type="head" />
<?php if ( version_compare( JVERSION, '3.0.0', '<' ) == 1) { ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<?php } else { JHtml::_('bootstrap.framework');JHtml::_('bootstrap.loadCss', false, $this->direction);}?>
<?php include "functions.php"; ?>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/styles.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/bootstrap.min.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.min.css" type="text/css" />
<!--[if IE 7]><link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome-ie7.min.css" type="text/css" /><![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->
<link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Armata' rel='stylesheet' type='text/css'>
<?php if ($scrolltop == 'yes' ) : ?>
	<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/scroll.js"></script>
<?php endif; ?>
</head>
<body class="background  pageid-<?php echo $menu->getActive()->id ?>">
<div id="header-wrap" class="clr">
    	<div id="header"> 
			<div  class="container row clr">
            <div id="logo" class="col span_4">
				<?php if ($logotype == 'image' ) : ?>
                <?php if ($logo != null ) : ?>
            <a href="<?php echo $this->baseurl ?>"><img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($logo); ?>" alt="<?php echo htmlspecialchars($templateparams->get('sitetitle'));?>" /></a>
                <?php else : ?>
            <a href="<?php echo $this->baseurl ?>/"><img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/images/logo.png" border="0"></a>
                <?php endif; ?><?php endif; ?> 
                <?php if ($logotype == 'text' ) : ?>
            <a href="<?php echo $this->baseurl ?>"><?php echo htmlspecialchars($sitetitle);?></a>
                <?php endif; ?>
                <?php if ($sitedesc !== '' ) : ?>
                <div id="site-description"><?php echo htmlspecialchars($sitedesc);?></div>
                <?php endif; ?>  
            </div><!-- /logo -->
			
			
        	<?php if ($this->countModules('user4')) : ?>
            <div id="user4" class="col span_tn">
				<jdoc:include type="modules" name="user4" style="none" />
			</div>
        	<?php endif; ?>  

			<?php if ($this->countModules('top')) : ?>
            <div id="top" class="col span_8">
				<div class="snkfinder">
					<jdoc:include type="modules" name="top" style="none" />
				</div>
			</div>
        	<?php endif; ?> 
			
			<?php if ($this->countModules('user5')) : ?>
            <div id="user5" class="col span_tn">
				<jdoc:include type="modules" name="user5" style="none" />
			</div>
        	<?php endif; ?>			
           
			</div>
    	</div>
			<?php if ($this->countModules('menu')) : ?>
            <div id="navbar-wrap" >
				<div class="container row clr">
                <nav id="navbar">
                    <div id="navigation"> 
                        <jdoc:include type="modules" name="menu" style="menu" />
                     </div>            
                </nav>
				</div>
            </div>
            <?php endif; ?> 

			
<?php if (is_array($menuid) && !is_null($menu->getActive()) && in_array($menu->getActive()->id, $menuid, false)) { ?>
            <div id="slide-wrap" class="container row clr">
                    <?php include "slideshow.php"; ?>
            </div>
<?php } ?>
</div>
		
<div style="clear:both;"></div>

<!-- inner banners -->
		<?php if ($this->countModules('user8')) : ?>
            <div id="user8" class="container row clr">
				<jdoc:include type="modules" name="user8" style="none" />
			</div>
        <?php endif; ?>
<!-- end inner banners -->

<div style="clear:both;"></div> 

		<?php if ($this->countModules('user3')) : ?>
           <div id="user3-wrap"><div id="user3" class="container row clr"><div id="user3-inner">
            	<jdoc:include type="modules" name="user3" style="usergrid" grid="<?php echo $user3_width; ?>" />
            </div></div></div>			
        <?php endif; ?>
		
		<div style="clear:both;"></div>
		
		<div style="clear:both;"></div>

		<!-- add this -->
		<?php if ($this->countModules('user9')) : ?>
            <div id="user9" class="container row clr">
				<div class="addthisuser9">
				<jdoc:include type="modules" name="user9" style="none" />
				</div>
			</div>
        <?php endif; ?>
		<!-- add this -->
		
		<?php if ($this->countModules('user1')) : ?>
            <div id="user1-wrap"><div id="user1" class="container row clr"><div id="user1-inner">
            	<jdoc:include type="modules" name="user1" style="usergrid" grid="<?php echo $user1_width; ?>" />
				
	
            </div></div></div>
			
        <?php endif; ?>
<div id="wrapper">                    
<div id="box-wrap" class="container row clr">
        <?php if ($this->countModules('breadcrumbs')) : ?>
        	<jdoc:include type="modules" name="breadcrumbs"  style="none"/>
        <?php endif; ?>
	<div id="main-content" class="row span_12">  
							<?php if ($this->countModules('left')) : ?>
                            <div id="leftbar-w" class="col span_3 clr">
                            	<div id="sidebar">
                                	<jdoc:include type="modules" name="left" style="grid" />
                            	</div>
                            </div>
                            <?php endif; ?>
                                <div id="post" class="col span_<?php echo $compwidth ?> clr">
                                    <div id="comp-wrap">
                                    	<?php include "html/template.php"; ?>
                                        <jdoc:include type="message" />
                                        <jdoc:include type="component" />
                                    </div>
                                </div>
								
							<?php if ($this->countModules('right')||$this->countModules('user10')||$this->countModules('user11')) : ?>
							
								<?php/*  if ($this->countModules('right')) : */ ?>
								<div id="rightbar-w" class="col span_3 clr">
								<div class="rightbox">
									<div id="sidebar">
										<jdoc:include type="modules" name="right" style="grid" />
									</div>									
								
								<?php /* endif; */ ?>
								
								<!-- login -->
								<?php /* if ($this->countModules('user10')) : */ ?>
									<div id="user10" class="container row clr">
										<jdoc:include type="modules" name="user10" style="grid" />
									</div>
								</div>
								<div class="rightthumbs">
									<div id="user11" class="container row clr">
										<jdoc:include type="modules" name="user11" style="grid" />
									</div>
								</div>
								</div>
								<?php /* endif; */ ?>
								<!-- end login -->
								
							<?php endif; ?>
	</div>
</div>

</div>

		<?php if ($this->countModules('user2')) : ?>		
            <div id="user2-wrap"><div id="user2" class="container row clr"><div id="user2-inner">
            	<jdoc:include type="modules" name="user2" style="usergrid" grid="<?php echo $user2_width; ?>" />
            </div></div></div>
        <?php endif; ?>       
<div id="footer-wrap" >
	<div class="container row clr" >
		<div class="ftr1">
		<?php if ($this->countModules('user6')) : ?>
            <div id="user6" class="span_f1">
				<jdoc:include type="modules" name="user6" style="none" />
			</div>
        <?php endif; ?>
		<div style="clear:both;"></div>
		<?php if ($this->countModules('user7')) : ?>
            <div id="user7" class="span_f2">
				<jdoc:include type="modules" name="user7" style="none" />
			</div>
        <?php endif; ?>
         <div style="clear:both;"></div>              
        <?php if ($this->countModules('copyright')) : ?>
            <div class="copyright">
                <jdoc:include type="modules" name="copyright"/>
            </div>
        <?php endif; ?>
		</div>
		
		<div class="ftr2">		
		<div class="socialbtns"> <?php include "social.php"; ?> </div>
		
		<?php if ($this->countModules('footer-menu')) : ?>			
            <div id="footer-nav">           
				<jdoc:include type="modules" name="footer-menu" style="none" />
            </div>
        <?php endif; ?> 
        </div>
	</div>
</div>
</body>
</html>