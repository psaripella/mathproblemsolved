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

jimport('joomla.html.pane');

$pane = JPane::getInstance('sliders', array('allowAllClose' => true, 'duration' => 200, 'startOffset' => -1, 'startTransition' => 0));

?>
<div class="readinglist_shared<?php echo (isset($this->pageclass_sfx) ? $this->pageclass_sfx : ''); ?>">
	<?php if ($this->params->get('show_page_heading', 1)) { ?>
		<h1>
			<?php if ($this->escape($this->params->get('page_heading'))) :?>
				<?php echo $this->escape($this->params->get('page_heading')); ?>
			<?php else : ?>
				<?php echo $this->escape($this->params->get('page_title')); ?>
			<?php endif; ?>
		</h1>
	<?php }

		if (empty($this->items)) {
			echo JText::_('RL_NOITEMS');
		}
		else {

			echo '<div class="shared_intro">'.JText::sprintf('RL_SHAREDLISTINTRO',$this->user->name).'</div>';
			$categories = array_keys($this->items);
			sort($categories);
	
			foreach ($categories as $category) {
				?><div class="category_title"><?php
					echo $category;
				?></div><?php
	
				echo $pane->startPane('readingpane'.$category);
	
				foreach ($this->items[$category] as $item) {
					$title = $item->title . '<div class="header_date">'.JHtml::_('date',$item->modified,JText::_('RL_DATE')).'</div>';
					echo $pane->startPanel($title, $item->id);
					require 'default_'.$item->component.'.php';
					echo $pane->endPanel();
				}
				
				echo $pane->endPane();
			}
		}
	?>
</div>
		
