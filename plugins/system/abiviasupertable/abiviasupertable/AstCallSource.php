<?php
/**
 * Abivia Super Table Pro Plugin.
 *
 * @package AbiviaSuperTablePro
 * @copyright (C)  by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCall.php');require_once('AstCellData.php');class AstCallSource
extends AstCall{static protected $_multiValued=array('source');public $sources=array();protected function _define(&$dictionary
,$symbol,$value){if(in_array($symbol,self::$_multiValued)){if(!isset($dictionary[$symbol])){$dictionary[$symbol]=array();
}$dictionary[$symbol][]=$value;}else{parent::_define($dictionary,$symbol,$value);}}function execute(){if(isset($this->dictionary
['source'])){foreach($this->dictionary['source']as $source){$options=self::getOptions($source);$name=strtolower(trim($options
['name']));$this->sources[$name]=self::getOptions($source);}}}static function getOptions($source){$options=array();foreach
($source as $option=>$value){if($option[0]=='.'){continue;}switch($option){case 'password.url':{$options['password']=urldecode
(trim($value));}break;default:{$options[$option]=trim($value);}break;}}if(!isset($options['name'])){$options['name']='';}
return $options;}}
