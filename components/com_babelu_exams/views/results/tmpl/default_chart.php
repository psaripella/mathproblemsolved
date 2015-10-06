<?php
/**
 * @version     1.0.9
 * @package     com_babelu_exams
 * @copyright   Copyright (C) 2011. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Mathew Lenning
 */

// no direct access
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/assets/fusioncharts/FusionCharts_Gen.php';
JHTML::_('script','components/com_babelu_exams/assets/fusioncharts/FusionCharts.js');
jimport('joomla.utilities.date');

// count the # of results
$rcount = count($this->results);

if ($rcount != 0)
{
	$FC = new FusionCharts('Line',$this->params->get('chartWidth'),$this->params->get('chartHeight'),'performanceChart');
	$FC->setSWFPath(JRoute::_(JURI::base(true).'/components/com_babelu_exams/assets/fusioncharts/'));
	
	//generic properties
	$strParam = 'shownames='.$this->params->get('chartShowNames').';';
	$strParam .= 'showValues='.$this->params->get('chartShowValues').';';
	$strParam .= 'showLimits='.$this->params->get('chartShowLimits').';';
	$strParam .= 'animation='.$this->params->get('chartAnimation').';';
	
	//caption properties
	$strParam .= 'caption='.$this->params->get('chartCaption').';';
	$strParam .= 'subCaption='.$this->params->get('chartSubCaption').';';
	
	// background properties
	$strParam .= 'bgColor='.JString::substr($this->params->get('chartBgColor'), 1).';';
	$strParam .= 'bgAlpha='.$this->params->get('chartBgAlpha').';';
	
	// canvas properties
	$strParam .= 'canvasbgColor='.JString::substr($this->params->get('chartCanvasBgColor'),1).';';
	$strParam .= 'canvasbgAlpha='.$this->params->get('chartCanvasBgAlpha').';';
	$strParam .= 'canvasBorderThickness='.$this->params->get('chartCanvasBorderThickness').';';
	$strParam .= 'canvasBorderColor='.JString::substr($this->params->get('chartCanvasBorderColor'),1).';';
	
	// line properties
	$strParam .= 'lineColor='.JString::substr($this->params->get('chartLineColor'),1).';';
//  Compatiblity issues
//  $strParam .= 'lineAlpha='.$this->params->get('chartLineAlpha').';';
//
	$strParam .= 'lineThickness='.$this->params->get('chartLineThickness').';';

	// anchor properties
	$strParam .= 'showAnchors='.$this->params->get('chartShowAnchors').';';
	$strParam .= 'anchorBgColor='.JString::substr($this->params->get('chartAnchorBGColor'),1).';';
	$strParam .= 'anchorBgAlpha='.$this->params->get('chartAnchorBGAlpha').';';
	$strParam .= 'anchorAlpha='.$this->params->get('chartAnchorAlpha').';';
	$strParam .= 'anchorBorderThickness='.$this->params->get('chartAnchorBorderThickness').';';
	$strParam .= 'anchorBorderColor='.JString::substr($this->params->get('chartAnchorBorderColor'),1).';';	
	
	// horizontal divisional lines 
	$strParam .= 'showDivLineValue='.$this->params->get('chartShowDivLineValue').';';
	$strParam .= 'showAlternateHGridColor='.$this->params->get('chartShowAlternativeHGridColor').';';
	$strParam .= 'divLinecolor='.JString::substr($this->params->get('chartDivLineColor'),1).';';
	$strParam .= 'divLineAlpha='.$this->params->get('chartDivLineAlpha').';';
	$strParam .= 'alternateHGridColor='.JString::substr($this->params->get('chartAlternativeHGridColor'),1).';';
	$strParam .= 'alternateHGridAlpha='.$this->params->get('chartAlternativeHGridAlpha').';';
	$strParam .= 'numdivlines='.$this->params->get('chartNumDivLines').';';
	
	//hover caption properties 
	$strParam .= 'showhovercap='.$this->params->get('chartShowHoverCap').';';
	$strParam .= 'hoverCapBgColor='.JString::substr($this->params->get('chartHoverCapBgColor'),1).';';
	$strParam .= 'hoverCapBorderColor='.JString::substr($this->params->get('chartHoverCapBorderColor'),1).';';
	$strParam .= 'hoverCapSepChar='.$this->params->get('chartHoverCapSepChar').';';
	
	// margins
	$strParam .= 'chartLeftMargin='.$this->params->get('chartLeftMargin').';';
	$strParam .= 'chartRightMargin='.$this->params->get('chartRightMargin').';';
	$strParam .= 'chartTopMargin='.$this->params->get('chartTopMargin').';';
	$strParam .= 'chartBottomMargin='.$this->params->get('chartBottomMargin').';';
	
	// font properties
	$strParam .= 'baseFontSize='.$this->params->get('chartBaseFontSize').';';
	$strParam .= 'baseFontColor='.JString::substr($this->params->get('chartBaseFontColor'),1).';';
	$strParam .= 'outCnvBaseFontSze='.$this->params->get('chartOutCnvBaseFontSze').';';
	$strParam .= 'outCnvBaseFontColor='.JString::substr($this->params->get('chartOutCnvBaseFontColor'),1).';';
	
	// preset unchangable 
	$strParam .= 'yAxisMinValue=0;';
	$strParam .= 'yAxisMaxValue=100;';
	$strParam .= 'xAxisName='.JText::_('COM_BABELU_EXAMS_CHART_X_AXIS_NAME').';';
	$strParam .= 'decimalPrecision=0;';
	$strParam .= 'formatNumberScale=0;';
	$strParam .= 'numberSuffix=%25;';
	$strParam .= 'showShadow=0;';
	
	//set the chart params
	$FC->setChartParams($strParam);
	
	$avg_base = 0;
	
	// reverse the order of the results
	$rev_results = array_reverse($this->results, false);
	foreach ($rev_results as $result)
	{
		$r_date = new JDate($result->creation_date);
		$date_only = $r_date->format($this->params->get('chartResultDateFormate'));
		$itemParams = 'name='.$date_only.';';
		
		// only add graded exams to chart
		if($result->status != 0)
		{
			$FC->addChartData($result->percentage_grade,$itemParams);
		}
		// add all the percentage grades together
		$avg_base += $result->percentage_grade;
	}
	
	if($this->params->get('chartShowTrendLine'))
	{
		$avg_grade = round(($avg_base / count($this->results)));
	
		$trendParams = 'startValue='.$avg_grade.';';
		$trendParams .='color='.JString::substr($this->params->get('chartTrendLineColor'),1).';';
		$trendParams .='displayValue='.JText::_('COM_BABELU_EXAMS_CHART_AVG_LABEL').';';
		$trendParams .='showOnTop=1;';
		$FC->addTrendLine($trendParams);
	}
	
	$FC->renderChart();
}
