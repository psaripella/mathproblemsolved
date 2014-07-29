<?php
/**
 * Abivia Super Table Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');class AstCompat{static function _($cName){return JText::_(constant('PLG_ABIVIASUPERTABLE_'
.strtoupper($cName)));}static function editorExtract($buffer){return $buffer;}static function editorInject($buffer){return
$buffer;}static function inject($plugin,$params){if($params->get('jsLoad',1)){JHtml::_('jquery.framework');}}static function
setup($params){}}
