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

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');
$useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));

?>
<div class="artigo item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
    <div class="left-side pull-left item-image">
            <?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
            <?php $imgfloat = (empty($images->float_fulltext)) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
            <img
            <?php if ($images->image_fulltext_caption):
                echo 'class="caption"'.' title="' .htmlspecialchars($images->image_fulltext_caption) . '"';
            endif; ?>
            src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" itemprop="image"/> 
            <?php endif; ?>
        
    </div>
     <div class="right-side pull-right">
            <?php if ($this->params->get('show_page_heading', 1)) : ?>
            <div class="page-header">
                <h2>  
                <?php $title = $this->escape($this->item->category_title); ?>
                <?php $url = '<a href="' . JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug)) . '" itemprop="genre">' . $title . '</a>'; ?>
                <?php echo $url; ?>
            </h2>
            </div>
            <?php endif;
                if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative)
                {
                    echo $this->item->pagination;
                }
            ?>
            <?php if ($params->get('show_title') || $params->get('show_author')) : ?>
            <div class="page-header">
                <h1 itemprop="name">
                    <?php  echo $this->escape($this->item->title); ?>
                </h1>
            </div>
            <?php endif; ?>
            <?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
            <div class="article-info muted">
                <dl class="article-info">
                <dt class="article-info-term"><?php echo JText::_('COM_CONTENT_ARTICLE_INFO'); ?></dt>
                <?php if ($params->get('show_publish_date')) : ?>
                    <dd class="published">
                        <span class="icon-calendar"></span>
                        <time datetime="<?php echo JHtml::_('date', $this->item->publish_up, 'c'); ?>" itemprop="datePublished">
                            <?php echo JText::sprintf('COM_CONTENT_PUBLISHED_DATE_ON', JHtml::_('date', $this->item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
                        </time>
                    </dd>
                <?php endif; ?>
                </dl>
                </div>
                <?php endif; ?>
                <div itemprop="articleBody">
                    <?php echo $this->item->text; ?>
                    <div style="clear: both;"></div>
                </div>
                <?php
                    if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
                        echo $this->item->pagination;
                    ?>
                <?php endif; ?>
    </div>
<div style="clear: both;"></div>
<?php echo $this->item->event->afterDisplayContent; ?> </div>
