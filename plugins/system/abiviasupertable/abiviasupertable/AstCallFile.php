<?php
/**
 * Abivia Super Table Pro Plugin.
 *
 * @package AbiviaSuperTablePro
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once('AstCallDataset.php');class AstCallFile extends AstCallDataset
{protected function _curlGet($url){$req=curl_init();curl_setopt($req,CURLOPT_RETURNTRANSFER,true);curl_setopt($req,CURLOPT_URL
,$url);$html=curl_exec($req);if(curl_error($req)){$this->_log(AstCall::DEBUG_BASIC,'Curl request failed: '.curl_error($req
));return false;}curl_close($req);return $html;}protected function _loadDataset(){try{if(!isset($this->dictionary['source'
])){$this->_log(AstCall::DEBUG_ERROR,'No source specified.');return false;}$options=array();if(is_array($this->dictionary
['source'])){$subDictionary=$this->dictionary['source'];if(isset($subDictionary['.args'])&&$subDictionary['.args']&&$subDictionary
['.args'][0]==self::OPERATOR_SPECIAL){$this->executeSpecial($subDictionary['.args']);return false;}$options=AstCallSource
::getOptions($subDictionary);}else{if(!self::$_namedSources){self::$_namedSources=new AstCallSource($this->trigger,$this->
command,$this->_params);self::$_namedSources->parse('',$this->_params->get('sources'));self::$_namedSources->execute();}$source
=strtolower(trim($this->dictionary['source']));if($source&&$source[0]==self::OPERATOR_SPECIAL){$this->executeSpecial($source
);return false;}if(!isset(self::$_namedSources->sources[$source])){return false;}$options=self::$_namedSources->sources[$source
];}$this->_log(AstCall::DEBUG_BASIC,'source name: '.$options['name']);foreach($options as $key=>&$option){if($key=='password'
){continue;}$option=$this->_trimHtml($option);}$clean=$options;unset($clean['password']);$this->_log(AstCall::DEBUG_VERBOSE
,'File options: '.AstCall::dump($clean));$fileData=$this->_readSource($options);$format='_parse'.(isset($options['format'
])? ucfirst(strtolower($options['format'])):'Csv');if(method_exists($this,$format)){$dbData=$this->$format($fileData,$options
);}else{$this->_log(AstCall::DEBUG_ERROR,'Unknown file format: '.$options['format']);return false;}if(empty($dbData)){$this
->_log(AstCall::DEBUG_VERBOSE,'Query: Empty result set.');return false;}$this->_log(AstCall::DEBUG_BASIC,'Result set size '
.count($dbData));$this->_log(AstCall::DEBUG_VERBOSE,'Result columns '.implode(', ',array_keys($dbData[0])));}catch(JDatabaseException
$dbErr){$this->_log(AstCall::DEBUG_BASIC,'Query error '.$dbErr->getCode().': '.$dbErr->getMessage());return false;}return
$dbData;}function _parseCsv($fileData,$options){if(isset($this->dictionary['query'])){$colNames=explode(',',$this->dictionary
['query']);foreach($colNames as&$col){$col=trim($col);}}else{$colNames=array();}$delim=isset($options['delim'])? $options
['delim']:',';if(strtolower($delim)=='tab'){$delim="\t";}$escape=isset($options['escape'])? $options['escape']:'\\';$quote
=isset($options['quote'])? $options['quote']:'"';$labels=isset($options['labels'])? $options['labels']:0;$fileData=str_replace
("\r","\n",$fileData);$fileData=explode("\n",$fileData);$dbData=array();$lineCount=0;$maxCols=0;$shift=0;foreach($fileData
as $line){$line=trim($line);if($line==''){continue;}++$lineCount;if($lineCount<=$labels){continue;}$rawData=str_getcsv($line
,$delim,$quote,$escape);$colData=array();foreach($rawData as $indx=>$value){if(!isset($colNames[$indx])){while(isset($colNames
['col'.($indx+$shift)])){++$shift;}$colNames[$indx]='col'.($indx+$shift);}$colData[$colNames[$indx]]=$value;}$maxCols=max
($maxCols,count($colData));$dbData[]=$colData;}foreach($dbData as&$row){$rowCount=count($row);if($rowCount<$maxCols){for(
$indx=$rowCount;$indx<$maxCols;++$indx){$row[$colNames[$indx]]=null;}}}return $dbData;}function _parseJson($fileData,$options
){$doc=json_decode($fileData);if(!$doc){$this->_log(AstCall::DEBUG_ERROR,'JSON parse failed.');return false;}$dbData=array
();$colNames=array();$query=isset($this->dictionary['query'])? $this->dictionary['query']:'';$obj=$doc;if($query!==''){$query
=explode('/',$query);$done=array();foreach($query as $term){$done[]=$term;$index='';if(preg_match('!(.*)\[([0-9]+)\]!',$term
,$match)){$term=$match[1];$index=$match[2];}if(!isset($obj->$term)||is_scalar($obj->$term)){$this->_log(AstCall::DEBUG_ERROR
,'JSON query failed at '.implode('/',$done));return false;}if($index===''){$obj=$obj->$term;}else{if(!is_array($obj->$term
)){$this->_log(AstCall::DEBUG_ERROR,'Not an array; JSON query failed at '.implode('/',$done));return false;}$obj=$obj->$term
;if(!isset($obj[$index])){$this->_log(AstCall::DEBUG_ERROR,'Index not set; JSON query failed at '.implode('/',$done));return
false;}$obj=$obj[$index];}}}foreach($obj as $row){$currColNames=array();$rowData=array();foreach($row as $name=>$cell){if
(is_numeric($name)){$name='col'.$name;}if(isset($currColNames[$name])){$name.='-'.++$currColNames[$name];}else{$currColNames
[$name]=0;}$colNames[$name]=true;$rowData[$name]=$cell;}$dbData[]=$rowData;}foreach($dbData as&$row){foreach($colNames as
$name=>$dummy){if(!isset($row[$name])){$row[$name]=null;}}}return $dbData;}function _parseXlsx($fileData,$options){$query
=isset($this->dictionary['query'])? $this->dictionary['query']:'';$scan=strpos(':',$query);if($scan===false){$this->_log(
AstCall::DEBUG_ERROR,'XLSX Qurey must start with sheet:.');return false;}$sheet=substr($query,0,$scan-1);$query=substr($query
,$scan+1);$zipDoc=new ZipArchive();if($zipDoc->open('blork')!==true){throw new Exception('Unable to open target document.'
);}$doc=new DOMDocument();if(!$doc->loadXML($fileData)){$this->_log(AstCall::DEBUG_ERROR,'XML parse failed.');return false
;}$dbData=array();$colNames=array();$xpath=new DOMXPath($doc);$rows=$xpath->query($query);foreach($rows as $row){$currColNames
=array();$rowData=array();foreach($row->childNodes as $node){if(!$node instanceof DOMElement){continue;}$name=$node->nodeName
;if(isset($currColNames[$name])){$name.='-'.++$currColNames[$name];}else{$currColNames[$name]=0;}$colNames[$name]=true;$rowData
[$name]=trim($node->textContent);}$dbData[]=$rowData;}foreach($dbData as&$row){foreach($colNames as $name=>$dummy){if(!isset
($row[$name])){$row[$name]=null;}}}return $dbData;}function _parseXml($fileData,$options){$doc=new DOMDocument();if(!$doc
->loadXML($fileData)){$this->_log(AstCall::DEBUG_ERROR,'XML parse failed.');return false;}$dbData=array();$colNames=array
();$query=isset($this->dictionary['query'])? $this->dictionary['query']:'*';$xpath=new DOMXPath($doc);$rows=$xpath->query
($query);foreach($rows as $row){$currColNames=array();$rowData=array();foreach($row->childNodes as $node){if(!$node instanceof
DOMElement){continue;}$name=$node->nodeName;if(isset($currColNames[$name])){$name.='-'.++$currColNames[$name];}else{$currColNames
[$name]=0;}$colNames[$name]=true;$rowData[$name]=trim($node->textContent);}$dbData[]=$rowData;}foreach($dbData as&$row){foreach
($colNames as $name=>$dummy){if(!isset($row[$name])){$row[$name]=null;}}}return $dbData;}static function _optSelect($key,
$first,$second,$default=null){if(is_array($key)){$key1=$key[0];$key2=$key[1];}else{$key1=$key;$key2=$key;}$option=$default
;if(isset($second[$key2])){$option=$second[$key2];}if(isset($first[$key1])){$option=$first[$key1];}return $option;}protected
function _readSource($options){$useFopen=ini_get('allow_url_fopen');$name=$options['name'];$nameBits=explode('.',$name);
if(count($nameBits)>1&&$nameBits[0]=='nofopen'){array_shift($nameBits);$name=implode('.',$nameBits);$useFopen=false;}if(strpos
('//',$name)){$sourceInfo=@parse_url($name);if(!$sourceInfo){$this->_log(AstCall::DEBUG_ERROR,'Unable to parse data source '
.htmlspecialchars($options['name']));return false;}}else{$sourceInfo=array('name'=>$name);}$scheme=isset($sourceInfo['scheme'
])? $sourceInfo['scheme']:'';if($useFopen||$scheme==''){$fileData=file_get_contents($name);if($fileData!==false||$scheme==
''){return $fileData;}}switch($scheme){case 'ftp':{$host=self::_optSelect('host',$options,$sourceInfo);$port=self::_optSelect
('port',$options,$sourceInfo,21);$conn=ftp_connect($host,$port);if(!$conn){$this->_log(AstCall::DEBUG_ERROR,'Unable to connect to FTP at '
.$host.':'.$port);return false;}$password=self::_optSelect('password',$options,$sourceInfo);$user=self::_optSelect('user'
,$options,$sourceInfo);if(!ftp_login($conn,$user,$password)){@ftp_close($conn);$this->_log(AstCall::DEBUG_ERROR,'FTP login failed for user '
.$user.' pass '.str_repeat('*',strlen($password)));return false;}$fp=@fopen('php://temp','r+');if(!$fp){@ftp_close($conn)
;$this->_log(AstCall::DEBUG_ERROR,'Cannot open temporary file stream.');return false;}if(!ftp_get($conn,$fp,$sourceInfo['path'
],FTP_BINARY)){@ftp_close($conn);@fclose($fp);$this->_log(AstCall::DEBUG_ERROR,'Unable to read '.$sourceInfo['path'].' via FTP '
);return false;}rewind($fp);$fileData=stream_get_contents($fp);@ftp_close($conn);@fclose($fp);}break;case 'https':case 'http'
:{foreach(array('host','password','port','user')as $key){if(isset($options[$key])){$sourceInfo[$key]=$options[$key];}}$url
='';if(isset($sourceInfo['user'])){$url=$sourceInfo['user'];if(isset($sourceInfo['password'])){$url.=':'.$sourceInfo['password'
];}$url.='@';}$url=$scheme.'://'.$url.$sourceInfo['host'].$sourceInfo['path'].(isset($sourceInfo['query'])? '?'.$sourceInfo
['query']:'').(isset($sourceInfo['anchor'])? '#'.$sourceInfo['anchor']:'');$fileData=$this->_curlGet($url);}break;default
:{$this->_log(AstCall::DEBUG_ERROR,'Unsupported protocol: '.$scheme);return false;}}return $fileData;}}
