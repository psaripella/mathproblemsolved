<?php
# copyright (c) plustheme.com  all rights reserved                        
# license - php - css - js and files are copyrighted material                           
# website: http://www.plustheme.com  
defined('_JEXEC') or die;

//LOAD MOOTOOLS JOOMLA 2.5 
JHtml::_('behavior.framework', true);

$app				= JFactory::getApplication();
$doc				= JFactory::getDocument();
$this->language		= $doc->language;
$this->direction	= $doc->direction;
$sitename			= $app->getCfg('sitename');
$menu				= $app->getMenu();

include 'params.php';
include 'load_slideshow.php';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">

<head>
<jdoc:include type="head" />
<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico" />

<?php
include 'css.php'; 
?>

<?php
// LOAD CSS
$doc->addStyleSheet('templates/'.$this->template.'/css/hor_nav.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template_css.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/template_css2.css');
$doc->addStyleSheet('templates/'.$this->template.'/css/colors/'.htmlspecialchars($color_style).'.css');
// LOAD SCRIPTS
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/jquery.js', 'text/javascript');
$doc->addScript($this->baseurl . '/templates/' . $this->template . '/scripts/jquery-noconflict.js', 'text/javascript');
?>

<!--[if lte IE 6]>
<script type="text/javascript" src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/scripts/suckerfish_ie.js"></script>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/css.ie.css.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if lte IE 7]>
<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/css.ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->

</head>

