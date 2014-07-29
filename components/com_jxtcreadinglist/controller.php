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

jimport( 'joomla.application.component.controller' );
JTable::addIncludePath( JPATH_ROOT.'/administrator/components/com_jxtcreadinglist/tables' );
require_once JPATH_ROOT.'/administrator/components/com_jxtcreadinglist/helper.php';

class xtcController extends JControllerLegacy {

	/* POST AN ITEM FLAG CHANGE */
	function post() {
		$db = JFactory::getDBO();
		$app = JFactory::getApplication();
		$template = $app->getTemplate(true)->template;
		$userid = JFactory::getUser()->id;
		
		@list($id,$component,$plugin) = explode('|',base64_decode(JRequest::getVar('code')));
		settype($id,'integer');
		
		if (!$id || !$component || !$plugin || !$userid) { return; }
		
		$row = JTable::getInstance('readinglist', 'Table');
		$row->load(array('user_id'=>$userid,'item_id'=>$id,'component'=>$component)); // Check if already stored

		if (empty($row->id)) { // Add new entry
			$row->published = 1;
			// $row->checked_out = 0;
			// $row->checked_out_time = '0000-00-00 00:00:00';
			$row->ordering = $row->getNextOrder('user_id='.$userid );
			$row->item_id = $id;
			$row->user_id = $userid;
			$row->component = $component;
			$row->entry_date = date("Y-m-d H:i:s");
			$row->read = 0;
			$row->checkin();
			if (!$row->store()) {
				echo $row->getError();
			} else {
				$defaultFile = JPATH_ROOT.'/plugins/content/'.$plugin.'/tmpl/remove.php';
				$overrideFile = JPATH_ROOT.'/templates/'.$template.'/html/'.$plugin.'/remove.php';
				ob_start();
				require (JFile::exists($overrideFile) ? $overrideFile : $defaultFile);
				$buttonhtml = ob_get_contents();
				ob_end_clean();
			}
		} else { // Change entry
			if ($row->published == 0) {
				$row->published = 1;
				$defaultFile = JPATH_ROOT.'/plugins/content/'.$plugin.'/tmpl/remove.php';
				$overrideFile = JPATH_ROOT.'/templates/'.$template.'/html/'.$plugin.'/remove.php';
				$markupFile = JFile::exists($overrideFile) ? $overrideFile : JPATH_ROOT.'/plugins/content/'.$plugin.'/tmpl/remove.php';
			}
			else {
				$row->published = 0;
				$overrideFile = JPATH_ROOT.'/templates/'.$template.'/html/'.$plugin.'/add.php';
				$markupFile = JFile::exists($overrideFile) ? $overrideFile : JPATH_ROOT.'/plugins/content/'.$plugin.'/tmpl/add.php';
			}
				
			if (!$row->store()) {
				echo $row->getError();
			} else {
				ob_start();
				require $markupFile;
				$buttonhtml = ob_get_contents();
				ob_end_clean();
			}
		}

		// ajax return
		$count = jxtcrlhelper::getReadingListCount();
		echo json_encode(array($count,$buttonhtml));
	}
	
	/* DELETE A USER ENTRY */
	function delete()	{

		$id = JRequest::getInt('id');
		$catid = JRequest::getInt('catid');
		$userid = JFactory::getUser()->id;
		$Itemid = JRequest::getInt('Itemid');
		$msg = '';

		$row = JTable::getInstance('readinglist', 'Table');
		$row->load(array('user_id'=>$userid,'item_id'=>$id)); // Check if already stored
		if (!empty($row->id)) {
			if (!$row->delete()) {
				echo $row->getError();
			} else {
				$msg = JText::_('RL_ITEMDELETED');
			}
		}

		$link = 'index.php?option=com_jxtcreadinglist&view=readinglist&cid='.$catid.'&Itemid='.$Itemid;
		$this->setRedirect( $link, $msg );
	}
}