<?php
/**
 * IceCarosuel Extension for Joomla 3.0 By IceTheme
 * 
 * 
 * @copyright	Copyright (C) 2008 - 2012 IceTheme.com. All rights reserved.
 * @license		GNU General Public License version 2
 * 
 * @Website 	http://www.icetheme.com/Joomla-Extensions/icecarosuel.html
 * @Support 	http://www.icetheme.com/Forums/IceCarosuel/
 *
 */

/* no direct access*/
defined('_JEXEC') or die;
if(!defined("DS")){
	define("DS", DIRECTORY_SEPARATOR);
}
if( !defined('PhpThumbFactoryLoaded') ) {
  require_once dirname(__FILE__).DS.'libs'.DS.'phpthumb'.DS.'ThumbLib.inc.php';
  define('PhpThumbFactoryLoaded',1);
}

// Include the syndicate functions only once
require_once dirname(__FILE__).DS.'helper.php';

$list = modIceCarousel::getList( $params );

$tmp 		 	= $params->get( 'module_height', 'auto' );
$moduleHeight   =  ( $tmp=='auto' ) ? 'auto' : (int)$tmp.'px';
$tmp 			= $params->get( 'module_width', 'auto' );
$moduleWidth    =  ( $tmp=='auto') ? 'auto': (int)$tmp.'px';
$themeClass 	= $params->get( 'theme' , '');
$openTarget 	= $params->get( 'open_target', 'parent' );
$class 			= !$params->get( 'navigator_pos', 0 ) ? '':'ice-'.$params->get( 'navigator_pos', 0 );
$theme		    =  $params->get( 'theme', '' );
$target = 'target="'.$params->get('open_target','_parent').'"';

$style           								= $params->get('style', 'default');

$isThumb       	= $params->get( 'auto_renderthumb',1);
$itemContent		= $isThumb==1?'desc-image':'introtext';

$icecarosuel_activecolor   					= $params->get('icecarosuel_activecolor', '222');
$icecarosuel_inactivecolor   				= $params->get('icecarosuel_inactivecolor', '888');
/*Paging*/

$maxPages = (int)$params->get( 'max_items_per_page', 3 );
$pages = array_chunk( $list, $maxPages  );
$totalPages = count($pages);
// calculate width of each row.
$itemWidth = 100/$maxPages -0.1;
$isAjax = $params->get('enable_ajax', 0 );
$item_heading = $params->get('item_heading',"3");
$tmp = $params->get( 'module_height', 'auto' );
$moduleHeight   =  ( $tmp=='auto' ) ? 'auto' : (int)$tmp.'px';
$tmp = $params->get( 'module_width', 'auto' );
$moduleWidth    =  ( $tmp=='auto') ? 'auto': (int)$tmp.'px';
$auto_start = $params->get("auto_start", 1);
$effect = $params->get("effect", "");


$item_layout = "_items";

/*End Paging*/
$itemLayoutPath = modIceCarousel::getLayoutByTheme($module, $theme, $item_layout);
	// load custom theme
	if( $theme && $theme != -1 ) {
		require( modIceCarousel::getLayoutByTheme($module, $theme) );
	} else {
		require( JModuleHelper::getLayoutPath($module->module) );
	}
	modIceCarousel::loadMediaFiles( $params, $module, $theme );
	?>
<script type="text/javascript">
		 jQuery(document).ready(function(){
			jQuery('#icecarousel<?php echo $module->id;?>').carousel(<?php if($auto_start): ?>{
			  interval: <?php echo (int)$params->get("interval",2000);?>
			}<?php endif;?>);
		  });
</script>
