<?php
/**
 * Abivia Super Table Pro Plugin.
 *
 * @package AbiviaSuperTablePro
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCall.php');require_once('AstCallQueryText.php');require_once
('AstCallSource.php');require_once('AstCellData.php');abstract class AstCallDataset extends AstCall{protected $_lookups=array
();static protected $_multiValued=array('cell','data','data.url','index','lookup','static','tbody','thead');static protected
$_namedQueries;static protected $_namedSources;public $transpose=false;protected function _define(&$dictionary,$symbol,$value
){if(in_array($symbol,self::$_multiValued)){if(!isset($dictionary[$symbol])){$dictionary[$symbol]=array();}if($symbol=='data.url'
){$dictionary['data'][]=urldecode($value);}else{$dictionary[$symbol][]=$value;}}else{parent::_define($dictionary,$symbol,
$value);}}abstract protected function _loadDataset();protected function _parseArgs($args){$args=trim($args);$refs=explode
(' ',$args);foreach($refs as $tid){if($tid==''){continue;}if($tid=='transpose'){$this->transpose=true;}}}protected function
_parseStart($text){return $text;}function execute(){$this->dataset=array();$dbData=$this->_loadDataset();if($dbData===false
){return;}if(isset($this->dictionary['static'])){foreach($this->dictionary['static']as $key=>&$staticData1){$colName=trim
($staticData1['.args']);if($colName==''){$colName='static'.$key;}$staticData1['.args']=$colName;}foreach($dbData as $row=>
&$addSource){foreach($this->dictionary['static']as $key=>$staticData){if(isset($staticData['data'][$row])){$addSource[$staticData
['.args']]=$staticData['data'][$row];}else{$addSource[$staticData['.args']]=null;}}}}if(isset($this->dictionary['lookup']
)){foreach($this->dictionary['lookup']as $lookupDef){$name=trim($lookupDef['.args']);$lookup=array();foreach($lookupDef['index'
]as $map){$mapName=trim($map['.args']);$lookup[$mapName]=$map['text'];}$this->_lookups[$name]=array('map'=>$lookup);if(isset
($lookupDef['other'])){$this->_lookups[$name]['other']=$lookupDef['other']['text'];}}}else{$this->_lookups=array();}$cols
=0;$sectionList=array('thead','tbody');foreach($sectionList as $section){if(!isset($this->dictionary[$section])){$this->dictionary
[$section]=array();}foreach($this->dictionary[$section]as $rowDef){if(isset($rowDef['cell'])){$cols=max($cols,count($rowDef
['cell']));}}}foreach($this->dictionary['thead']as $rowDef){$rowData=array();for($col=0;$col<$cols;++$col){$cell=new AstCellData
($this->trigger);$cell->setLookups($this->_lookups);$cell->dictionary=array();if(isset($rowDef['cell'][$col])){if(is_array
($rowDef['cell'][$col])){$cell->dictionary=$rowDef['cell'][$col];}else{$cell->dictionary['text']=$rowDef['cell'][$col];}}
else{$cell->dictionary['text']='';}$cell->resolve($dbData[0]);$rowData[]=$cell;}$this->dataset[]=$rowData;}$tbodyCount=count
($this->dictionary['tbody']);if(!$tbodyCount){return;}foreach($dbData as $source){for($tbodyIndex=0;$tbodyIndex<$tbodyCount
;++$tbodyIndex){$rowDef=$this->dictionary['tbody'][$tbodyIndex];$rowData=array();for($col=0;$col<$cols;++$col){$cell=new
AstCellData($this->trigger);$cell->setLookups($this->_lookups);if(isset($rowDef['cell'][$col])){$cell->dictionary=$rowDef
['cell'][$col];}else{$cell->dictionary['text']='';}$cell->resolve($source);$rowData[]=$cell;}$this->dataset[]=$rowData;}}
if(!$this->transpose){$rowset=array();foreach($this->dataset as $row=>$rowData){foreach($rowData as $col=>$cell){if(!isset
($rowset[$col])){$rowset[$col]=array();}$rowset[$col][$row]=$cell;}}$this->dataset=$rowset;}}function executeSpecial($type
){$parts=explode('.',$type);$command=strtolower(substr($parts[0],1));switch($command){case 'dummy':case 'names':{if(!isset
($parts[1])||((int)$parts[1])<=0){$parts[1]=5;}else{$parts[1]=(int)$parts[1];}$this->dataset=array();$cols=0;$sectionList
=array('thead','tbody');foreach($sectionList as $section){if(!isset($this->dictionary[$section])){$this->dictionary[$section
]=array();}foreach($this->dictionary[$section]as $rowDef){if(isset($rowDef['cell'])){$cols=max($cols,count($rowDef['cell'
]));}}}foreach($this->dictionary['thead']as $rowDef){$rowData=array();for($col=0;$col<$cols;++$col){$cell=new AstCellData
($this->trigger);$cell->dummyData=$command=='dummy';$cell->showColumn=$command=='names';if(isset($rowDef['cell'][$col])){
$cell->dictionary=$rowDef['cell'][$col];}else{$cell->dictionary['text']='';}$cell->resolve();$rowData[]=$cell;}$this->dataset
[]=$rowData;}$tbodyCount=count($this->dictionary['tbody']);if(!$tbodyCount){return;}for($dummy=0;$dummy<$parts[1];++$dummy
){for($tbodyIndex=0;$tbodyIndex<$tbodyCount;++$tbodyIndex){$rowDef=$this->dictionary['tbody'][$tbodyIndex];$rowData=array
();for($col=0;$col<$cols;++$col){$cell=new AstCellData($this->trigger);$cell->dummyData=$command=='dummy';$cell->showColumn
=$command=='names';if(isset($rowDef['cell'][$col])){$cell->dictionary=$rowDef['cell'][$col];}else{$cell->dictionary['text'
]='';}$cell->resolve();$rowData[]=$cell;}$this->dataset[]=$rowData;}}if(!$this->transpose){$rowset=array();foreach($this->
dataset as $row=>$rowData){foreach($rowData as $col=>$cell){if(!isset($rowset[$col])){$rowset[$col]=array();}$rowset[$col
][$row]=$cell;}}$this->dataset=$rowset;}}break;}}}
