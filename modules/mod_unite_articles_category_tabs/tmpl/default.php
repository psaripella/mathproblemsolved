<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_unite_articles_category
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<div class="unite-category-module-tabs <?php echo $moduleclass_sfx; ?>" <?php echo($containerStyle);?>>
<?php if ($grouped) : ?>
	<?php 
		$i = 0;
	?>
	<div class="unite-category-module-tabs-outer"><!-- outer tabs wraper -->
		<ul class="unite-category-module-tabs-titles"> <!-- tabs header for groups -->
			<?php foreach ($list as $group_name => $group) :  
				echo('<li><a href="#outer_tab_' . $i . '">' . $group_name . '</a></li>');
				$i++;
			 endforeach; ?>
		</ul>
		
		
		<?php //tab items for groups 
			$i = 0;
			foreach ($list as $group_name => $group) :
		?> 
		
		<div id="outer_tab_<?php echo($i);?>"><!--group li, next sibling - holds item for outer accordion-->
			<?php $i++; ?>
		 
		 
		 
			<div class="unite-category-module-tabs-inner">
				
				<?php
					echo('<ul>');
					$k = 0;
					foreach ($group as $item) : //generate tab titles
						echo('<li><a href="#unite_inner_tab_' . $k . '_' . $i . '">' . $item->title . '</a></li>');
						$k++;				
					endforeach;
					echo('</ul>');
				?>
				
				<?php 
					$k = 0;
					foreach ($group as $item) : //generate items?>
					
					<div id="unite_inner_tab_<?php echo($k . '_' . $i); ?>">
					<?php $k++; ?>
						<?php if ($params->get('link_titles') == 1) : ?>
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
							</a>
						<?php else : ?>
							<?php echo $item->title; ?>
						<?php endif; ?>

						<?php if ($item->displayHits) : ?>
							<span class="mod-articles-category-hits">
							(<?php echo $item->displayHits; ?>)
							</span>
						<?php endif; ?>

						<?php if ($params->get('show_author')) :?>
							<span class="mod-articles-category-writtenby">
							<?php echo $item->displayAuthorName; ?>
							</span>
						<?php endif;?>

						<?php if ($item->displayCategoryTitle) :?>
							<span class="mod-articles-category-category">
							(<?php echo $item->displayCategoryTitle; ?>)
							</span>
						<?php endif; ?>

						<?php if ($item->displayDate) : ?>
							<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
						<?php endif; ?>

						<?php if ($params->get('show_introtext')) :?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>

						<?php if ($params->get('show_readmore')) :?>
							<p class="mod-articles-category-readmore">
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php if ($item->params->get('access-view') == false) :
								echo JText::_('mod_unite_articles_category_REGISTER_TO_READ_MORE');
							elseif ($readmore = $item->alternative_readmore) :
								echo $readmore;
								echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
									if ($params->get('show_readmore_title', 0) != 0) :
										echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
										endif;
							elseif ($params->get('show_readmore_title', 0) == 0) :
								echo JText::sprintf('mod_unite_articles_category_READ_MORE_TITLE');
							else :
								echo JText::_('mod_unite_articles_category_READ_MORE');
								echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
							endif; ?>
							</a>
							</p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
			
			
		</div><!-- end indevidual outer tab -->
	<?php endforeach; ?>
	</div><!-- end outer tabs wrapper -->
<?php else : ?>
			<div class="unite-category-module-tabs-inner">
				
				<?php
					echo('<ul>');
					$k = 0;
					foreach ($list as $item) : //generate tab titles
						echo('<li><a href="#unite_inner_tab_' . $k . '">' . $item->title . '</a></li>');
						$k++;				
					endforeach;
					echo('</ul>');
				?>
				
				<?php 
					$k = 0;
					foreach ($list as $item) : //generate items?>
					
					<div id="unite_inner_tab_<?php echo($k); ?>">
					<?php $k++; ?>
						<?php if ($params->get('link_titles') == 1) : ?>
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php echo $item->title; ?>
							</a>
						<?php else : ?>
							<?php echo $item->title; ?>
						<?php endif; ?>

						<?php if ($item->displayHits) : ?>
							<span class="mod-articles-category-hits">
							(<?php echo $item->displayHits; ?>)
							</span>
						<?php endif; ?>

						<?php if ($params->get('show_author')) :?>
							<span class="mod-articles-category-writtenby">
							<?php echo $item->displayAuthorName; ?>
							</span>
						<?php endif;?>

						<?php if ($item->displayCategoryTitle) :?>
							<span class="mod-articles-category-category">
							(<?php echo $item->displayCategoryTitle; ?>)
							</span>
						<?php endif; ?>

						<?php if ($item->displayDate) : ?>
							<span class="mod-articles-category-date"><?php echo $item->displayDate; ?></span>
						<?php endif; ?>

						<?php if ($params->get('show_introtext')) :?>
							<p class="mod-articles-category-introtext">
								<?php echo $item->displayIntrotext; ?>
							</p>
						<?php endif; ?>

						<?php if ($params->get('show_readmore')) :?>
							<p class="mod-articles-category-readmore">
							<a class="mod-articles-category-title <?php echo $item->active; ?>" href="<?php echo $item->link; ?>">
							<?php if ($item->params->get('access-view') == false) :
								echo JText::_('mod_unite_articles_category_REGISTER_TO_READ_MORE');
							elseif ($readmore = $item->alternative_readmore) :
								echo $readmore;
								echo JHtml::_('string.truncate', $item->title, $params->get('readmore_limit'));
									if ($params->get('show_readmore_title', 0) != 0) :
										echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
										endif;
							elseif ($params->get('show_readmore_title', 0) == 0) :
								echo JText::sprintf('mod_unite_articles_category_READ_MORE_TITLE');
							else :
								echo JText::_('mod_unite_articles_category_READ_MORE');
								echo JHtml::_('string.truncate', ($item->title), $params->get('readmore_limit'));
							endif; ?>
							</a>
							</p>
						<?php endif; ?>
					</div>
				<?php endforeach; ?>
			</div>
<?php endif; ?>
</div>
