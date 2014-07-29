<?php
/*---------------------------------------------------------------
# SP Tab - Next generation tab module for joomla
# ---------------------------------------------------------------
# Author - JoomShaper http://www.joomshaper.com
# Copyright (C) 2010 - 2014 JoomShaper.com. All Rights Reserved.
# license - GNU/GPL V2 OR LATER
# Websites: http://www.joomshaper.com
-----------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.form.formfield');

class JFormFieldAsset extends JFormField
{
	protected	$type = 'Asset';
	
	protected function getInput() {
		$doc = JFactory::getDocument();
		if (JVERSION<3) {
			$doc->addScript(JURI::root(true).'/modules/mod_sptab/elements/js/jquery.js');
			$doc->addScript(JURI::root(true).'/modules/mod_sptab/elements/js/script.js');
			$doc->addStylesheet(JURI::root(true).'/modules/mod_sptab/elements/css/style.css');
		} else {
			$doc->addScript(JURI::root(true).'/modules/mod_sptab/elements/js/script_j3.js');			
		}
		$doc->addScript(JURI::root(true).'/modules/mod_sptab/elements/js/colorpicker.js');		
		$doc->addStylesheet(JURI::root(true).'/modules/mod_sptab/elements/css/colorpicker.css');
		return null;
	}
}