<?php
/**
 * Abivia Super Table Pro Plugin.
 *
 * @package AbiviaSuperTablePro
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCall.php');require_once('AstCellData.php');class AstCallQueryText
extends AstCall{static protected $_multiValued=array('query');public $queries=array();protected function _define(&$dictionary
,$symbol,$value){if(in_array($symbol,self::$_multiValued)){if(!isset($dictionary[$symbol])){$dictionary[$symbol]=array();
}$dictionary[$symbol][]=$value;}else{parent::_define($dictionary,$symbol,$value);}}function execute(){if(isset($this->dictionary
['query'])){foreach($this->dictionary['query']as $source){if(!isset($source['name'])){continue;}$name=strtolower(trim($source
['name']));$this->queries[$name]=$source['text'];}}}}
