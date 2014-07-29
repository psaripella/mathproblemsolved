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

$Itemid = JRequest::getInt('Itemid');
?>
<div class="rltoolbar">
	<a href="index.php?option=com_jxtcreadinglist&view=readinglist&task=delete&id=<?php echo $item->id; ?>&cid=<?php echo ''; ?>&Itemid=<?php echo $Itemid; ?>"
			class="rl_link hasTip" title="<?php echo JText::_('RL_TBDELETE'); ?>::" ><i class="rlicon-trash"></i></a>

	<a <?php echo ($this->params->get('newwindow', 0) == 0 ? '' : 'target="_blank"'); ?> href="<?php echo $item->itemUrl; ?>"
			class="rl_link hasTip" title="<?php echo JText::_('RL_TBGOTO'); ?>::" ><i class="rlicon-link-ext"></i></a>

	<div style="clear:both"></div>
</div>
