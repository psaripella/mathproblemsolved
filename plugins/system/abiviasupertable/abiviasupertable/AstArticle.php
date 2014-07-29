<?php
/**
 * Abivia Super Table Plus Plugin.
 *
 * @package AbiviaSuperTable
 * @copyright (C) ${copyright_range} by Abivia Inc. All rights reserved.
 * @license GNU/GPL
 * @link http://www.abivia.net/
 */
defined('_JEXEC')or die('Restricted access');require_once 'AstArticleBase.php';class AstArticle extends AstArticleBase{public
$versionPlus='${pkg.version}';protected function _blockAttributes($blockDictionary){$attrs=array();if(isset($blockDictionary
['blocklink'])){$attrs['open']='<a class="supertable-block"'.' href="'.$blockDictionary['blocklink'].'"'.(isset($blockDictionary
['blocktarget'])? ' target="'.$blockDictionary['blocktarget'].'"':'').'>';$attrs['close']='</a>';}else{$attrs['open']='';
$attrs['close']='';}return $attrs;}protected function _generateRows($ref){if($this->versionBase!=$this->versionPlus){return
AstCompat::_('version_plus');}$addResponsive=isset($ref->dictionary['desktop']);$html='';$cols=count($ref->dataset);if($cols
){$rowset=array();foreach($ref->dataset as $row=>$rowData){foreach($rowData as $col=>$cell){if(!isset($rowset[$col])){$rowset
[$col]=array();}$rowset[$col][$row]=$cell;}}$rows=count($rowset);foreach($rowset as $row=>$dataCols){$blockDictionary=array
();foreach($dataCols as $col=>$cell){$this->_blockMerge($blockDictionary,$cell);}$blockAttrs=$this->_blockAttributes($blockDictionary
);$html.=$this->_tabIn().$blockAttrs['open'].'<div class="supertable-row';if($row==0){$html.=' supertable-row-first';}if(
$row==$rows-1){$html.=' supertable-row-last';}if($this->_isHeaderRow[$row]){$html.=' supertable-row-head';$html.=' supertable-row-head-'
.$this->_rowParity[$row];$html.=' supertable-row-head-'.$this->_rowNumber[$row];}else{$html.=' supertable-row-'.$this->_rowParity
[$row];$html.=' supertable-row-'.$this->_rowNumber[$row];if($this->_rowNumber[$row]==$this->_activeIndex){$html.=' supertable-active'
;}}$html.='"';$html.='>'.chr(10);$rowStyle='';if(isset($ref->dictionary['rowheight'])){$vals=&$ref->dictionary['rowheight'
];$setting='auto';if(isset($vals[$row+1])){$setting=$vals[$row+1];}elseif(isset($vals['*'])){$setting=$vals['*'];}if($setting
!='auto'){$rowStyle.=$this->_appendStyle('height:'.$setting);}}if($this->_borders){$html.=$this->_tabIn().'<div class="supertable-row-border">'
.chr(10);}if($ref->rtl){$dataCols=array_reverse($dataCols);}$lastCol=count($dataCols)-1;foreach($dataCols as $col=>$cell)
{if($ref->rtl){$col=$cols-$col-1;}$html.=$this->_tabIn().'<div';if(isset($cell->dictionary['id'])){$html.=' id="'.$cell->
dictionary['id'].'"';}$html.=' class="supertable-cell';if($this->_isHeaderCol[$col]){$html.=' supertable-col-rowhead supertable-col-head-'
.$this->_colNumber[$col];}else{$html.=' supertable-col-'.$this->_colParity[$col].' supertable-col-'.$this->_colNumber[$col
];}if($col==0){$html.=' supertable-col-first';}if($col==$lastCol){$html.=' supertable-col-last';}if(isset($cell->dictionary
['class'])){$cellClass=trim($cell->dictionary['class']);if($cellClass!=''){$html.=' '.$cellClass;}}$html.='"';$cellStyle=
$rowStyle;if($addResponsive){$cellStyle.=$this->_appendStyle('min-width:'.$this->_colWidthPixels[$col].'px;');}if($this->
_colWidth[$col]!=''){$cellStyle.=$this->_appendStyle('width:'.$this->_colWidth[$col]);}if(isset($cell->dictionary['style'
])){$cellStyle.=$this->_appendStyle($cell->dictionary['style']);}if(trim($cellStyle)!=''){$html.=' style="'.trim($cellStyle
).'"';}$html.='>'.chr(10);$html.=$this->_innerCell($cell,$blockAttrs);$html.=$this->_tabOut().'</div>'.chr(10);}if($this->
_borders){$html.=$this->_tabOut().'</div>'.chr(10);}$html.=$this->_tabOut().'</div>'.$blockAttrs['close'].chr(10);}}return
$html;}protected function _innerCell($cell,$blockAttrs){$html=$this->_tabIn().'<div class="supertable-cell-inner">'.chr(
10);$textLink=null;$textTarget='';$subLink=null;$subTarget='';if($blockAttrs['open']==''){if(isset($cell->dictionary['link'
])){$textLink=$cell->dictionary['link'];$subLink=$cell->dictionary['link'];}if(isset($cell->dictionary['textlink'])){$textLink
=$cell->dictionary['textlink'];}if(isset($cell->dictionary['sublink'])){$subLink=$cell->dictionary['sublink'];}if(isset($cell
->dictionary['target'])&&$cell->dictionary['target']!=''){$textTarget=' target="'.$cell->dictionary['target'].'"';$subTarget
=$textTarget;}if(isset($cell->dictionary['texttarget'])){if($cell->dictionary['texttarget']==''){$textTarget='';}else{$textTarget
=' target="'.$cell->dictionary['texttarget'].'"';}}if(isset($cell->dictionary['subtarget'])){if($cell->dictionary['subtarget'
]==''){$subTarget='';}else{$subTarget=' target="'.$cell->dictionary['subtarget'].'"';}}}if($textLink){$linkPre='<a href="'
.$textLink.'"'.$textTarget.'>';$linkPost='</a>';}else{$linkPre='';$linkPost='';}$html.=$this->_tab().'<div class="supertable-cell-text">'
.$linkPre.$this->_cellText($cell,'text').$linkPost.'</div>'.chr(10);if(isset($cell->dictionary['subtext'])){if($subLink){
$linkPre='<a href="'.$subLink.'"'.$subTarget.'>';$linkPost='</a>';}else{$linkPre='';$linkPost='';}$html.=$this->_tab().'<div class="supertable-cell-subtext">'
.$linkPre.$this->_cellText($cell,'subtext').$linkPost.'</div>'.chr(10);}$html.=$this->_tabOut().'</div>'.chr(10);return $html
;}}
