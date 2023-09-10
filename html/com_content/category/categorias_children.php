<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');

$lang  = JFactory::getLanguage();
$class = ' class="first "';

if (count($this->children[$this->category->id]) > 0 && $this->maxLevel != 0) : ?>

	<?php

    $i=1;
    foreach ($this->children[$this->category->id] as $id => $child) : ?>
	    <?php $link = JRoute::_(ContentHelperRoute::getCategoryRoute($child->id));?>
        <div class="coluna-produtos row-fluid clearfix">
        <a style="position: absolute; width: 100%; height: 100%; top:0;z-index: 1;" href="<?php echo $link; ?>"></a>
        <div class="conteudo-produtos">
           <div class="imagem-categoria">
                <a class="link-overlay" href="<?php echo $link; ?>">
                <?php $imageUrl = json_decode($child->params)->image;
                if(empty($imageUrl)) {
                    $imageUrl = $this->baseurl.'/images/image_0.jpg';
                }
                echo '<img class="product-img" alt="'.$this->escape($child->title).'" src="' . $imageUrl . '" />'; ?>
                </a>
            </div> 
            <div class="produto-title">
                <div class="inner-produto-title">
                    <a class="title" href="<?php echo $link; ?>" alt=" <?php echo $this->escape($child->title); ?>">
                        <?php echo $this->escape($child->title); ?>
                    </a>
                    <div class="produto-intro-text">
                        <?php echo JHtml::_('content.prepare', $child->description, '', 'com_content.category'); ?>
                    </div>
                    <div class="" title="<?php echo JText::_('COM_CONTENT_NUM_PRODUCTS'); ?>">
                       
                        <?php 
                            $message = "";
                            (int)$numberProduts = $child->getNumItems(true);
                            if($numberProduts == 0){
                                $message = JText::_('COM_CONTENT_NO_PRODUCTS');
                            } else {
                                $message = JText::_('COM_CONTENT_NUM_PRODUCTS');
                            }
                        ?> 
                        <span><?php echo $message; ?></span>
                        <strong><?php $numberProduts > 0 ? $numberProduts : null; echo $numberProduts; ?></strong>
                    </div>
                </div>
                

            </div>
            <div class="show-more-link">
                <a class="readmore-link" href="<?php echo $link; ?>">
                    <span class="fa fa-chevron-right"></span>
                </a>
            </div>
        </div>
        </div>
	<?php
    $i++;
    endforeach; ?>
<?php endif;
