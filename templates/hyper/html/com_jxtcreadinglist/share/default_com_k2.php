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

defined('_JEXEC') or die;
require 'default_toolbar.php';

jimport('joomla.html.parameter');
JHTML::_('behavior.modal', 'a.modal');
?>

<div id="k2Container">
    <?php if ($item->params->get('itemImage') && !empty($item->imageXLarge)): ?>
        <div class="itemImageBlock">
            <span class="itemImage">
                <a class="modal" rel="{handler: 'image'}" href="<?php echo $item->imageXLarge; ?>" title="<?php echo JText::_('K2_CLICK_TO_PREVIEW_IMAGE'); ?>">
                    <img src="<?php echo $item->image; ?>" style="width:<?php echo $item->imageWidth; ?>px; height:auto;" />
                </a>
            </span>
        </div>
    <?php endif; ?>

    <?php if (!empty($item->fulltext)): ?>
        <?php if ($item->params->get('itemIntroText')): ?>
            <!-- Item introtext -->
            <div class="itemIntroText">
                <?php echo $item->introtext; ?>
            </div>
        <?php endif; ?>
        <?php if ($item->params->get('itemFullText')): ?>
            <!-- Item fulltext -->
            <div class="itemFullText">
                <?php echo $item->fulltext; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <!-- Item text -->
        <div class="itemFullText">
            <?php echo $item->introtext; ?>
        </div>
    <?php endif; ?>

    <div class="clr"></div>

    <?php if ($item->params->get('itemVideo') && !empty($item->video)): ?>
        <!-- Item video -->
        <a name="itemVideoAnchor" id="itemVideoAnchor"></a>

        <div class="itemVideoBlock">
            <h3><?php echo JText::_('K2_MEDIA'); ?></h3>
            
            <?php if ($item->videoType == 'embedded'): ?>
                <div class="itemVideoEmbedded">
                    <?php echo $item->video; ?>
                </div>
            <?php else: ?>
                <span class="itemVideo"><?php echo $item->video; ?></span>
            <?php endif; ?>

            <div class="clr"></div>
        </div>
    <?php endif; ?>

    <?php if ($item->params->get('itemImageGallery') && !empty($item->gallery)): ?>
        <!-- Item image gallery -->
        <a name="itemImageGalleryAnchor" id="itemImageGalleryAnchor"></a>
        <div class="itemImageGallery">
            <h3><?php echo JText::_('K2_IMAGE_GALLERY'); ?></h3>
            <?php echo $item->gallery; ?>
        </div>
    <?php endif; ?>
</div>