<?php
/**
 * Abivia Super Table Pro Plugin.
 *
 * @package AbiviaSuperTablePro
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCall.php');class AstCellData extends AstCell{protected $_lookups
=array();public $dummyData=false;public $showColumn=false;function resolve($rowData=array()){$mappable=array_keys(AstArticleBase
::getDataCommands());foreach($mappable as $element){$dataElement=$element.'.data';if(isset($this->dictionary[$dataElement
])){$spec=$this->dictionary[$dataElement];$subFormat='';if(($fmtPosn=strpos($spec,' '))!==false){$format=ltrim(substr($spec
,$fmtPosn+1));$spec=substr($spec,0,$fmtPosn);if(($fmtPosn=strpos($format,'.'))!==false){$subFormat=substr($format,$fmtPosn
+1);$format=substr($format,0,$fmtPosn);}}else{$format='';}if($this->showColumn){$this->dictionary[$element]=$spec;continue
;}if(!$this->dummyData&&!array_key_exists($spec,$rowData)){$this->dictionary[$element]='?'.$spec.'?';continue;}if(substr(
$format,0,5)=='jdate'&&!method_exists('JDate','format')){$format='date';}switch($format){case 'date':{if($subFormat==''){
$subFormat='Y-m-d H:i:s';}$dateTime=new JDate($this->dummyData ? '2005-05-31':$rowData[$spec]);$data=date($subFormat,$dateTime
->toUnix());}break;case 'jdate':{if($subFormat==''){$subFormat='Y-m-d H:i:s';}$dateTime=new JDate($this->dummyData ? '2005-05-31'
:$rowData[$spec]);$data=$dateTime->format($subFormat,true);}break;case 'jdateutc':{if($subFormat==''){$subFormat='Y-m-d H:i:s'
;}$dateTime=new JDate($this->dummyData ? '2005-05-31':$rowData[$spec]);$data=$dateTime->format($subFormat,false);}break;case
'lookup':{$data=$this->dummyData ? 'lookup':$rowData[$spec];if(isset($this->_lookups[$subFormat])){$table=&$this->_lookups
[$subFormat];if($this->dummyData){$data=reset($table['map']);}elseif(isset($table['map'][$data])){$data=$table['map'][$data
];}elseif(isset($table['other'])){$data=$table['other'];}}}break;case 'lcase':{$data=$this->dummyData ? 'lowercase':strtolower
($rowData[$spec]);}break;case 'money':{if($subFormat==''){$subFormat='%i';}$data=$this->dummyData ? 12.34567:$rowData[$spec
];if(is_numeric($rowData[$spec])){$data=money_format($subFormat,$data);}}break;case 'nprintf':{$data=$this->dummyData ? 12.34567
:$rowData[$spec];if(is_numeric($data)){$data=sprintf($subFormat,$data);}}break;case 'printf':case 'sprintf':{$data=sprintf
($subFormat,$this->dummyData ? 12.34:$rowData[$spec]);}break;case 'ucase':{$data=$this->dummyData ? 'UPPERCASE':strtoupper
($rowData[$spec]);}break;case 'ucfirst':{$data=$this->dummyData ? 'Uc first':ucfirst($rowData[$spec]);}break;case 'ucwords'
:{$data=$this->dummyData ? 'Uc Words':ucwords($rowData[$spec]);}break;default:{$data=$this->dummyData ? 'unformatted':$rowData
[$spec];}break;}$this->dictionary[$element]=$data;}}$this->_clean();}function setLookups($lookups){$this->_lookups=$lookups
;}}
