<?php

/*------------------------------------------------------------------------
# "horizonal tab dynamic joomla" Joomla module
# Copyright (C) 2013 Templates81. All Rights Reserved.
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Author: Templates81.com
# Website: http://www.Templates81.com
-------------------------------------------------------------------------*/

//no direct access
defined('_JEXEC') or die('Direct Access to this location is not allowed.');

// Path assignments
$mosConfig_absolute_path = JPATH_SITE;
$mosConfig_live_site = JURI :: base();
if(substr($mosConfig_live_site, -1)=="/") { $mosConfig_live_site = substr($mosConfig_live_site, 0, -1); }
 
// get parameters from the module's configuration
$tabNumber = 4;

$TabWidth = $params->get('TabWidth','750');
$TabHeight = $params->get('TabHeight','400');
$colorContent = $params->get('colorContent','#FFEDF2');
$colorTab = $params->get('colorTab','#5ba4a4');

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$title[$loop] = $params->get('title'.$loop,'templates81.com');
}

for ($loop = 1; $loop <= $tabNumber; $loop += 1) {
$TabContent[$loop] = $params->get('TabContent'.$loop,'TabContent'.$loop);
}
require(JModuleHelper::getLayoutPath('mod_horizontal_tab_dynamic'));