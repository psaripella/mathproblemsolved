<?php
/**
 * @version		$Id$
 * @author		NooTheme
 * @package		Joomla.Site
 * @subpackage	mod_noo_ticker
 * @copyright	Copyright (C) 2013 NooTheme. All rights reserved.
 * @license		License GNU General Public License version 2 or later; see LICENSE.txt, see LICENSE.php
 */

// no direct access
defined('_JEXEC') or die('Restricted access'); 
?>
<div class="noo-ticker<?php echo $params->get('moduleclass_sfx');?>">
	<?php if ($params->get('show_headtext',1)):?>
		<div class="noo-ticker-headtext">
			<span><?php echo $params->get('headtext', 'Headlines:')?></span>
		</div>
	<?php endif;?>
	<?php if ($params->get('show_buttons_control',1)):?>
		<div class="noo-ticker-control">
			<a id="noo_ticker_prev<?php echo $module->id?>" class="noo-ticker-prev" onclick="return false;" href=""><span><?php echo JText::_("MOD_NOO_TICKER_PREVIOUS");?></span></a>
    		<a id="noo_ticker_next<?php echo $module->id?>" class="noo-ticker-next" onclick="return false;" href=""><span><?php echo JText::_("MOD_NOO_TICKER_NEXT");?></span></a> 
		</div>
	<?php endif;?>
	<?php if (isset($lists) && count($lists) > 0) :?>
		<div id="noo-ticker<?php echo $module->id?>" class="noo-ticker-inner" style="position:relative!important;overflow: hidden;">
		<?php $i = 0?>
		<?php foreach ($lists as $list):?>
			<div  class="noo-ticker-item" style="visibility:<?php echo (++$i !=1) ?'hidden':'visible' ?>;">
				<a href="<?php echo $list->link ?>" title="<?php echo modNooTickerHelper::trimChar(strip_tags($list->introtext),300) ?>"><span><?php echo modNooTickerHelper::trimChar($list->title,$params->get('title_max_chars',150)) ?></span></a>
			</div>
		<?php endforeach;?>
		</div>
	<?php endif;?>
</div>