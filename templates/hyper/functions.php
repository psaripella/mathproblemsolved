<?php /**  * @copyright	Copyright (C) 2013 JoomlaTemplates.me - All Rights Reserved. **/ defined( '_JEXEC' ) or die( 'Restricted index access' );

if ($this->countModules("left") && $this->countModules("right")) {$compwidth="6";}
else if ($this->countModules("left") && !$this->countModules("right")) { $compwidth="9";}
else if (!$this->countModules("left") && $this->countModules("right")) { $compwidth="9";}
else if (!$this->countModules("left") && !$this->countModules("right")) { $compwidth="12";}

$user1_count = $this->countModules('user1');
if ($user1_count > 4) {
$user1_width = $user1_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user1_width = $user1_count > 0 ? ' span_' . floor(12 / $user1_count) : '';}

$user2_count = $this->countModules('user2');
if ($user2_count > 4) {
$user2_width = $user2_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user2_width = $user2_count > 0 ? ' span_' . floor(12 / $user2_count) : '';}

$user3_count = $this->countModules('user3');
if ($user3_count > 4) {
$user3_width = $user3_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user3_width = $user3_count > 0 ? ' span_' . floor(12 / $user3_count) : '';}

$user4_count = $this->countModules('user4');
if ($user4_count > 4) {
$user4_width = $user4_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user4_width = $user4_count > 0 ? ' span_' . floor(12 / $user4_count) : '';}

$user5_count = $this->countModules('user5');
if ($user5_count > 4) {
$user5_width = $user5_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user5_width = $user5_count > 0 ? ' span_' . floor(12 / $user5_count) : '';}

$user6_count = $this->countModules('user6');
if ($user6_count > 4) {
$user6_width = $user6_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user6_width = $user6_count > 0 ? ' span_' . floor(12 / $user6_count) : '';}

$user7_count = $this->countModules('user7');
if ($user7_count > 4) {
$user7_width = $user7_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user7_width = $user7_count > 0 ? ' span_' . floor(12 / $user7_count) : '';}

$user8_count = $this->countModules('user8');
if ($user8_count > 4) {
$user8_width = $user8_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user8_width = $user8_count > 0 ? ' span_' . floor(12 / $user8_count) : '';}

$user9_count = $this->countModules('user9');
if ($user9_count > 4) {
$user9_width = $user9_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user9_width = $user9_count > 0 ? ' span_' . floor(12 / $user9_count) : '';}

$user10_count = $this->countModules('user10');
if ($user10_count > 4) {
$user10_width = $user10_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user10_width = $user10_count > 0 ? ' span_' . floor(12 / $user10_count) : '';}

$user11_count = $this->countModules('user11');
if ($user11_count > 4) {
$user11_width = $user11_count > 0 ? ' span_' . floor(12 / 4) : '';} else {
$user11_width = $user11_count > 0 ? ' span_' . floor(12 / $user11_count) : '';}

/* function jlink() {
$host = substr(hexdec(md5($_SERVER['HTTP_HOST'])),0,1);
$url1	= "http://joomlatemplates.me/3.5";
$text1	= array("Joomla Templates","Joomla 3.5","Free Joomla Template","Joomla Theme", "Free Joomla Templates","Gratis Joomla","Plantillas Joomla","Templates Joomla","&#1096;&#1072;&#1073;&#1083;&#1086;&#1085;&#1099; Joomla", "Gratis Joomla");
$url2	= "http://online-hosting.net/";
$text2	= array("Online Host","Web Host","Host Reviews","Top Hosting", "Best Host","Cheap Web Host","Website Creation","Hosting Blog","OnlineH", "Hosting Service");
echo "<a target='_blank' title='Joomla Templates' href='".$url1."'>".$text1[$host]."</a> by <a target='_blank' title='Online Host' href='".$url2."'>".$text2[$host]."</a>";
} */
?>