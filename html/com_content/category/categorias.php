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
JHtml::_('behavior.caption');

?>
<div class="cat-produtos blog<?php echo $this->pageclass_sfx; ?> categorias-listagem">
    <?php if ($this->params->get('show_page_heading', 1)) : ?>
        <div class="page-header">
            <h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
        </div>
    <?php endif; ?>
    <?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
        <div class="category-desc clearfix">
            <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
                <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
            <?php endif; ?>
            <?php if ($this->params->get('show_description') && $this->category->description) : ?>
                <?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="cat-produtos-container">
		<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
            <h1 class="category-title roboto100"> <?php echo $this->escape($this->params->get('page_subheading')); ?>
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
                <div class="video-container">
				    <?php echo JHtml::_('content.prepare', $this->category->description, '','com_content.category'); ?>
                </div>
		    <?php endif; ?>
        </div>
		<?php endif; ?>
		<?php if (!empty($this->children[$this->category->id]) && $this->maxLevel != 0) : ?>
            <div class="cat-children listagem-categorias">
				<?php echo $this->loadTemplate('children'); ?>
            </div>
		<?php endif; ?>

        <div style="clear:both;"></div>
    </div>
</div>
