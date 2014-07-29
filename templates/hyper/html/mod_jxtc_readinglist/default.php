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
?>
<div class="readinglist_module">
	<?php
		if (empty($items)) {
			echo JText::_('RL_NOITEMS');
		} else {
			echo '<div class="rlmod_intro">'.JText::_('RL_INTRO').'</div>';

			echo '<div class="rlmod_categories">';
			if ($params->get('showall', 1)) { // Show "All" option
				$class = ($cid == -1) ? 'selected' : '';
				$link = JRoute::_('index.php?option=com_jxtcreadinglist&view=readinglist');
				echo '<a href="'.$link.'" class="rlmodcategory '.$class.'"><span>'.JText::_('RL_ALL').'</span></a>';
			}
			$categories = array_keys($items);
			sort($categories);
			foreach ($categories as $categoryid => $category) {
				$link = JRoute::_('index.php?option=com_jxtcreadinglist&view=readinglist&cid='.$categoryid);
				$class = ($cid == $categoryid) ? 'selected' : '';
				echo '<a href="'.$link.'" class="rlmodcategory '.$class.'"><span>'.$category.'</span></a>';
			}
			echo '</div>';

			echo '<div class="rlmod_options">';
			if ($params->get('showcopy', 1)) { // Show "Copy" option
				JHTML::_('behavior.modal', 'a.rlmodal');	
				$link = JRoute::_('index.php?option=com_jxtcreadinglist&tmpl=component&view=copy&cid='.$cid);
				echo '<a class="rlmodal rlmodcopy" href="'.$link.'" rel="{handler: \'iframe\', size: {x: 700, y: 400}}"><span>'.JText::_('RL_COPY').'</span></a>';
			}
			
			if ($params->get('showemail', 1)) { // Show "Email" option
				require_once JPATH_SITE . '/components/com_mailto/helpers/mailto.php';
			
				$link = jxtcrlhelper::getEmailLink($cid);
				$url	= 'index.php?option=com_mailto&tmpl=component&link='.MailToHelper::addLink($link);
				$text = JText::_('RL_EMAIL');
			
				$attribs['class']	= 'rlmodemail';
				$attribs['title']	= JText::_('JGLOBAL_EMAIL');
				$attribs['onclick'] = "window.open(this.href,'win2','width=400,height=350,menubar=yes,resizable=yes'); return false;";
			
				echo JHtml::_('link', JRoute::_($url), $text, $attribs);
			}
			echo '</div>';
		}
	?>
</div>