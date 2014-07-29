<?php
/**
 * Abivia Super Table Pro Plugin.
 *
 * @package AbiviaSuperTablePro
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCallDataset.php');class AstCallQuery extends AstCallDataset
{protected function _loadDataset(){try{$options=array();if(isset($this->dictionary['source'])){if(is_array($this->dictionary
['source'])){$subDictionary=$this->dictionary['source'];if(isset($subDictionary['.args'])&&$subDictionary['.args']&&$subDictionary
['.args'][0]==self::OPERATOR_SPECIAL){$this->executeSpecial($subDictionary['.args']);return false;}$options=AstCallSource
::getOptions($subDictionary);}else{if(!self::$_namedSources){self::$_namedSources=new AstCallSource($this->trigger,$this->
command,$this->_params);self::$_namedSources->parse('',$this->_params->get('sources'));self::$_namedSources->execute();}$source
=strtolower(trim($this->dictionary['source']));if($source&&$source[0]==self::OPERATOR_SPECIAL){$this->executeSpecial($source
);return false;}if(!isset(self::$_namedSources->sources[$source])){return false;}$options=self::$_namedSources->sources[$source
];}$this->_log(AstCall::DEBUG_BASIC,'dbname: '.$options['name']);foreach($options as $key=>&$option){if($key=='password')
{continue;}$option=$this->_trimHtml($option);}$clean=$options;unset($clean['password']);$this->_log(AstCall::DEBUG_VERBOSE
,'DB options: '.AstCall::dump($clean));$db=JDatabase::getInstance($options);}else{$this->_log(AstCall::DEBUG_BASIC,'Using core DB'
);$db=JFactory::getDbo();}if($db instanceof JException){$this->_log(AstCall::DEBUG_ERROR,'DB error '.$db->toString());return
false;}if($db->getErrorNum()){$this->_log(AstCall::DEBUG_ERROR,'DB error '.$db->getErrorNum().': '.$db->getErrorMsg());return
;}if(!isset($this->dictionary['query'])){$this->_log(AstCall::DEBUG_BASIC,'Query is empty.');return false;}if(is_array($this
->dictionary['query'])){$query=htmlspecialchars_decode($this->dictionary['query']['text']);}else{if(!self::$_namedQueries
){self::$_namedQueries=new AstCallQueryText($this->trigger,$this->command,$this->_params);self::$_namedQueries->parse('',
$this->_params->get('queries'));self::$_namedQueries->execute();}$name=strtolower(trim($this->dictionary['query']));if(!isset
(self::$_namedQueries->queries[$name])){return false;}$query=self::$_namedQueries->queries[$name];}$query=$this->_trimHtml
($query);if(isset($this->dictionary['userid'])){$uidReplace=AstArticleBase::isTrue($this->dictionary['userid']);}else{$uidReplace
=true;}if($uidReplace){$query=str_replace('{$userid}',AstHost::getUserId(),$query);}$this->_log(AstCall::DEBUG_VERBOSE,'Query: '
.$query);$db->setQuery($query);$dbData=$db->loadAssocList();if(empty($dbData)){$this->_log(AstCall::DEBUG_VERBOSE,'Query: Empty result set.'
);return false;}$this->_log(AstCall::DEBUG_BASIC,'Result set size '.count($dbData));$this->_log(AstCall::DEBUG_VERBOSE,'Result columns '
.implode(', ',array_keys($dbData[0])));}catch(JDatabaseException $dbErr){$this->_log(AstCall::DEBUG_BASIC,'Query error '.
$dbErr->getCode().': '.$dbErr->getMessage());return false;}catch(Exception $dbErr){$this->_log(AstCall::DEBUG_BASIC,'Query error, code '
.$dbErr->getCode().'.');return false;}return $dbData;}}
