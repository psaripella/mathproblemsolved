<?php
/**
 * @version		$Id$
 * @author		NooTheme
 * @package		Joomla.Site
 * @subpackage	mod_noo_ticker
 * @copyright	Copyright (C) 2013 NooTheme. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 

require_once __DIR__ . '/helper.php';

//include css
JHtml::stylesheet('modules/' . $module->module . '/assets/css/style.css');
//Include js
if (!defined("NOO_JS_EASING")){
	JHTML::script('modules/' . $module->module . '/assets/js/jquery.easing.1.3.js',true);
	define("NOO_JS_EASING",true);
}

JHTML::script('modules/' . $module->module . '/assets/js/script.js',true);

$buttons = 'null';
if ($params->get('show_buttons_control',1)):
	$buttons = "{next: '#noo_ticker_prev".$module->id."', previous: '#noo_ticker_next".$module->id."'}";
endif;

$jsObject = "
	jQuery(document).ready(function($){
		$('#noo-ticker".$module->id."').nooticker({
			interval:".$params->get('animation_interval','5000').",
			mode    :'".$params->get('animation_type','horizontal_left')."',
			buttons : ".$buttons.",
			anOptions: {
				duration: ".$params->get('animation_speed',1000).",
				easing: '".$params->get('animation_transition','linear')."',
				queue:false
			}
		});
	});
";
JFactory::getDocument()->addScriptDeclaration($jsObject);

$lists = modNooTickerHelper::getList($params);
require (JModuleHelper::getLayoutPath('mod_noo_ticker',$params->get('layout', 'default')));

