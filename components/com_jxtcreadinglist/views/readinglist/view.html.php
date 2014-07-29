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

jimport( 'joomla.application.component.view');

class xtcViewReadinglist extends JViewLegacy {
	function display($tpl = null) {

		$params = JComponentHelper::getParams('com_jxtcreadinglist');
		$this->assignRef('params', $params);

		$user = JFactory::getUser();
		$this->assignRef('user', $user);

		if ($user->guest) {
			$app = JFactory::getApplication();
			$app->redirect('index.php', JText::_('JGLOBAL_YOU_MUST_LOGIN_FIRST'));
		}

		$cid = JRequest::getInt('cid',-1);
		$this->assignRef('cid', $cid);

		$items = jxtcrlhelper::getReadingList(0);

		$categories = array_keys($items); sort($categories);

		$options = array( JHTML::_('select.option', -1, Jtext::_('RL_ALLCATEGORIES') ) );
		foreach ($categories as $id => $category) {
			$options[] = JHTML::_('select.option', $id, $category );
		}
		$categorySelector = JHTML::_('select.genericlist', $options, 'cid', 'class="pull-left" onchange="document.readingListForm.submit()"', 'value', 'text',$cid);
		$this->assignRef('categorySelector',$categorySelector);

		if ($cid == -1) {	// no filter
			$this->assignRef('items', $items);
		}
		else {
			$category = $categories[$cid];
			$filteredItems = array($category => $items[$category]);
			$this->assignRef('items', $filteredItems);
		}

		parent::display($tpl);
	}
}