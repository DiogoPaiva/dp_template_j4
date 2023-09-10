<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

?>
<div class="produtos blog<?php echo $this->pageclass_sfx; ?>">
<div class="produtos-container">
<div class="intro-texto">
	<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h1 class="roboto100 category-title"> <?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php echo $this->category->title; ?>
		</h1>
	<?php endif; ?>

	<?php if ($this->params->get('show_cat_tags', 1) && !empty($this->category->tags->itemTags)) : ?>
		<?php $this->category->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->category->tagLayout->render($this->category->tags->itemTags); ?>
	<?php endif; ?>
	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc clearfix">
			
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<?php if (empty($this->lead_items) && empty($this->link_items) && empty($this->intro_items)) : ?>
		<?php if ($this->params->get('show_no_articles', 1)) : ?>
			<p><?php echo JText::_('COM_CONTENT_NO_ARTICLES'); ?></p>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
		<div class="cat-children">
			<?php echo $this->loadTemplate('children'); ?> 
		</div>
	<?php endif; ?>
	
</div>
	<?php
	$introcount = (count($this->intro_items));
	$counter = 0;
	?>
			<div class="coluna-galeria items-row cols-3">			
				
					<?php if (!empty($this->intro_items)) : ?>
					<?php foreach ($this->intro_items as $key => &$item) : ?>
						<div class="RepeaterItem item">
                            <?php
                                $this->item = & $item;
                                echo $this->loadTemplate('item');
                            ?>
                        </div>
                    <!-- end item -->
                    <?php $counter++; ?>
                <!-- end span -->
                <?php endforeach; ?>
                <?php endif; ?>
                </div>
           
       
			
</div><!-- end row -->
<div style="clear:both;"></div>


		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> 
		</div>

	</div>
</div>
