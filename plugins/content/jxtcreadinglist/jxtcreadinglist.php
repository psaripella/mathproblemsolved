<?php
/*
	JoomlaXTC Reading List

	version 1.3.1
	
	Copyright (C) 2012,2013 Monev Software LLC.	All Rights Reserved.
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
	
	THIS LICENSE IS NOT EXTENSIVE TO ACCOMPANYING FILES UNLESS NOTED.

	See COPYRIGHT.php for more information.
	See LICENSE.php for more information.
	
	Monev Software LLC
	www.joomlaxtc.com
*/

defined( '_JEXEC' ) or die;

jimport('joomla.plugin.plugin');
require_once JPATH_ROOT.'/administrator/components/com_jxtcreadinglist/helper.php';

class plgContentjxtcreadinglist extends JPlugin {

	public function __construct(&$subject, $config) {
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	function onContentPrepare( $context, &$article, &$params, $limitstart=0 ) {

		// fail checks
		list($component,$view) = explode('.',$context);
		if ($component != 'com_content' || !isset($article->id)) { return; }
		$integration = $this->params->get('integration',3);

		$_GLOBALS['rlcatid'] = (array) $this->params->get('catid',0);	// share with the helper/walls
		if ($_GLOBALS['rlcatid'][0] && !in_array($article->catid,$_GLOBALS['rlcatid'])) { return; }
		
		if (JFactory::getUser()->guest) {	// guest users
			$button = $this->params->get('guestbutton') ? jxtcrlHelper::getGuestButton($this->params->get('guesturl'),$this->_name) : '';
		}
		else {	// registered users
			$button = jxtcrlHelper::getPluginButton($article->id,$component,$this->_name);
		}

		if (JRequest::getCmd('option') != 'com_jxtcreadinglist') {	// do not add button within RL component
			switch ($this->params->get('placement','b')) {
				case 't':
					if (!empty($article->text) && ($integration == 2 || $integration == 3)) {
						$article->text = str_ireplace('{readinglist}','',$article->text);
						$article->text = $button.$article->text;
					}
					if (!empty($article->introtext) && ($integration == 1 || $integration == 3)) {
						$article->introtext = str_ireplace('{readinglist}','',$article->introtext);
						$article->introtext = $button.$article->introtext;
					}
				break;
				case 'b':
					if (!empty($article->text) && ($integration == 2 || $integration == 3)) {
						$article->text = str_ireplace('{readinglist}','',$article->text);
						$article->text .= $button;
					}
					if (!empty($article->introtext) && ($integration == 1 || $integration == 3)) {
						$article->introtext = str_ireplace('{readinglist}','',$article->introtext);
						$article->introtext .= $button;
					}
				break;
			}
		}
		else {	// tricked to hide button on RL component
			$button = '';
		}

		// Use tag if present
		if (!empty($article->text)) $article->text = str_ireplace('{readinglist}',$button,$article->text);
		if (!empty($article->introtext)) $article->introtext = str_ireplace('{readinglist}',$button,$article->introtext);
	}
}
?>
