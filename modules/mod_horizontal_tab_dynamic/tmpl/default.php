<?php
/*------------------------------------------------------------------------
# "horizonal tab dynamic joomla" Joomla module
# Copyright (C) 2013 Templates81. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: Templates81.com
# Website: http://www.Templates81.com
-------------------------------------------------------------------------*/
defined('_JEXEC') or die('Restricted access'); // no direct access 

?>
<link rel="stylesheet" type="text/css" href="<?php echo $mosConfig_live_site; ?>/modules/mod_horizontal_tab_dynamic/tmpl/demo.css" />
<?php
// get the document object
$doc = & JFactory::getDocument();

// add your stylesheet
$doc->addStyleSheet( 'modules/mod_horizontal_tab_dynamic/tmpl/style.css' );

// style declaration

$doc->addStyleDeclaration( '

.tabs {
    position: relative;
	margin: 30px auto;
	width: '.$TabWidth.'px;
}

.tabs input:checked + label {
    background: #A0D5F4;
	background: -moz-linear-gradient(top, #A0D5F4 0%, '.$colorContent.' 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#A0D5F4), color-stop(100%,'.$colorContent.'));
	background: -webkit-linear-gradient(top, #A0D5F4 0%,'.$colorContent.' 100%);
	background: -o-linear-gradient(top, #A0D5F4 0%,'.$colorContent.' 100%);
	background: -ms-linear-gradient(top, #A0D5F4 0%,'.$colorContent.' 100%);
	background: linear-gradient(top, #A0D5F4 0%,'.$colorContent.' 100%);
	font-weight: normal;
	color: #020C3F;
	font-family: Arial;
	z-index: 6;
}

.content-tab-verticle {
	


    background: '.$colorContent.';	
	position: relative;
    width: 100%;
	/* min-height: '.$TabHeight.'px; */
	clear:both;
	z-index: 5;
   /*  box-shadow: 0 -2px 3px -2px rgba(0,0,0,0.2), 0 2px 2px rgba(0,0,0,0.1);
    border-radius: 0 3px 3px 3px; */
}


.tabs label {
	background: '.$colorTab.';
	background: -moz-linear-gradient(top, '.$colorTab.' 0%, #020D41 100%);
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$colorTab.'), color-stop(100%,#020D41));
	background: -webkit-linear-gradient(top, '.$colorTab.' 0%,#020D41 100%);
	background: -o-linear-gradient(top, '.$colorTab.' 0%,#020D41 100%);
	background: -ms-linear-gradient(top, '.$colorTab.' 0%,#020D41 100%);
	background: linear-gradient(top, '.$colorTab.' 0%,#020D41 100%);
	font-family: Arial;
	font-size: 14px;
	line-height: 18px;
	height: 40px;
	position: relative;
	padding: 10px 20px;
    float: left;
	display: block;
	width: 100px;
	color: #ffffff;
	text-transform: uppercase;
	font-weight: normal;
	text-align: center;
	float:right;
	cursor:pointer;
	margin-left:2px;
	/* text-shadow: 1px 1px 1px rgba(255,255,255,0.3);
    border-radius: 3px 3px 0 0;
    box-shadow: 2px 0 2px rgba(0,0,0,0.1), -2px 0 2px rgba(0,0,0,0.1); */
}

	' );
?>



<script type="text/javascript" src="<?php echo $mosConfig_live_site; ?>/modules/mod_horizontal_tab_dynamic/js/modernizr.custom.04022.js"></script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css'>
		
<!--[if lt IE 9]>
	<style>
		.content-tab-verticle{
			height: auto;
			margin: 0;
		}
		.content-tab-verticle div {
			position: relative;
		}
	</style>
<![endif]-->


<div class="container-tab-verticle">
	<section class="tabs">
	<input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked" />
		        <label for="tab-1" class="tab-label-1"><?php echo $title[1]; ?></label>
				
	<?php for ($loop = 2; $loop <= $tabNumber; $loop += 1) { ?>
		<input id="tab-<?php echo $loop; ?>" type="radio" name="radio-set" class="tab-selector-<?php echo $loop; ?>" />
		<label for="tab-<?php echo $loop; ?>" class="tab-label-<?php echo $loop; ?>"><?php echo $title[$loop]; ?></label>
	<?php } ?>
		<div class="clear-shadow"></div>
		
		<div class="content-tab-verticle">
		<?php for ($loop = 1; $loop <= $tabNumber; $loop += 1) { ?>
			<div class="content-tab-verticle-<?php echo $loop; ?>">
				<h2><?php echo $title[$loop]; ?></h2>
				<?php echo $TabContent[$loop]; ?>
			
			</div>
			
		<?php } ?>
		</div>
		
	</section>
	
</div>
       
