<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_unite_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2013 Unite CMS, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the helper functions only once
require_once dirname(__FILE__) . '/helper.php';

//module defines
	$app  			= JFactory::getApplication();
	$document 		= JFactory::getDocument();
	$class_sfx 		= htmlspecialchars($params->get('class_sfx'));
	$assetsPath		= JURI::root() . 'modules/mod_unite_articles_category_tabs/assets/';
	
//conditional includes
	if ($params->get('loadJquery')){
		$document->addScript('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js');
	}

	if ($params->get('loadJqueryUi')){
		$document->addScript($assetsPath . 'jqueryUi/js/jquery-ui-1.10.3.custom.min.js');
	}

//include template style sheet	
	$styleTpl	= $params->get('styleTpl');
	$document->addStyleSheet($assetsPath . 'css/' . $styleTpl . '.css');

//prepare date for tpl.

//margins on container.
$containerStyle 	= 'style="';
if ($params->get('mLeft')){
	$containerStyle 	.= "margin-left:" . $params->get('mLeft') . 'px;';
}	

if ($params->get('mRight')){
	$containerStyle 	.= "margin-right:" . $params->get('mRight') . 'px;';
}	
	
if ($params->get('mTop')){
	$containerStyle 	.= "margin-top:" . $params->get('mTop') . 'px;';
}	

if ($params->get('mBottom')){
	$containerStyle 	.= "margin-bottom:" . $params->get('mBottom') . 'px;';
}
	
$containerStyle		.='"';	



//variables for script
$firstOpen	= $params->get('firstOpen');
$easing		= $params->get('easing');
$duration	= $params->get('transitionDuration');

//get script
$script 	= ModUniteArticlesCategoryTabsHelper::getScript($firstOpen , $easing, $duration);
$document->addScriptDeclaration($script);

/***continue basic joomla article category module ***/

$input = JFactory::getApplication()->input;

		// Prep for Normal or Dynamic Modes
		$mode = $params->get('mode', 'normal');
		$idbase = null;
		switch($mode)
		{
			case 'dynamic':
				$option = $input->get('option');
				$view = $input->get('view');
				if ($option === 'com_content')
				{
					switch($view)
					{
						case 'category':
							$idbase = $input->getInt('id');
							break;
						case 'categories':
							$idbase = $input->getInt('id');
							break;
						case 'article':
							if ($params->get('show_on_article_page', 1))
							{
								$idbase = $input->getInt('catid');
							}
							break;
					}
				}
				break;
			case 'normal':
			default:
				$idbase = $params->get('catid');
				break;
		}



$cacheid = md5(serialize(array ($idbase, $module->module)));

$cacheparams = new stdClass;
$cacheparams->cachemode = 'id';
$cacheparams->class = 'ModUniteArticlesCategoryTabsHelper';
$cacheparams->method = 'getList';
$cacheparams->methodparams = $params;
$cacheparams->modeparams = $cacheid;

$list = JModuleHelper::moduleCache($module, $params, $cacheparams);


if (!empty($list))
{
	$grouped = false;
	$article_grouping = $params->get('article_grouping', 'none');
	$article_grouping_direction = $params->get('article_grouping_direction', 'ksort');
	$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
	$item_heading = $params->get('item_heading');

	if ($article_grouping !== 'none')
	{
		$grouped = true;
		switch($article_grouping)
		{
			case 'year':
			case 'month_year':
				$list = ModUniteArticlesCategoryTabsHelper::groupByDate($list, $article_grouping, $article_grouping_direction, $params->get('month_year_format', 'F Y'));
				break;
			case 'author':
			case 'category_title':
				$list = ModUniteArticlesCategoryTabsHelper::groupBy($list, $article_grouping, $article_grouping_direction);
				break;
			default:
				break;
		}
	}
	require JModuleHelper::getLayoutPath('mod_unite_articles_category_tabs', $params->get('layout', 'default'));
}
