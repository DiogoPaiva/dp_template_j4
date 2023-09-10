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
JHTML::_('behavior.modal'); 
$doc = JFactory::getDocument();
// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
$useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));

?>

<?php $myfield = $this->item->jcfields;
foreach($myfield as $field) {
    $myfield[$field->name] = $field;
} ?>
<div class="produtos-show artigo item-page<?php echo $this->pageclass_sfx; ?>" itemscope itemtype="http://schema.org/Article">
    <meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
    <?php
    if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
        echo $this->item->pagination;
    endif;
    ?>
    <div class="produtos-content-area">
        <h1 class="product-title"><?php echo $this->escape($this->item->title); ?> </h1>
        <div class="text-area">
            <div class="content-wrapper">
                <div class="img-holder">
                    <?php
                    $img_intro = (!empty($images->image_intro) ? $images->image_intro : '');
                    $img_fulltext = (!empty($images->image_fulltext) ? $images->image_fulltext : '');
                    $img_final = (!empty($img_fulltext) ? $img_fulltext : $img_intro);
                    
                    // Add Document OG metatag for Image
                    if ($img_final!== '')  :
                        $doc->addCustomTag('<meta property="og:image" content="'. htmlspecialchars($img_final). '" />');
                    endif;
                    ?>
                    <a class="modal" href="<?php $imagem = $img_final!== '' ? htmlspecialchars($img_final) : 'images/image_0.jpg'; echo $imagem; ?>">
                        <?php 
                            if($img_final!== '') : 
                        ?>
                            <img class="img-produto" title="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>";
                            src="<?php echo htmlspecialchars($img_final); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" itemprop="image"/>
                            
                            <div class="see-more">
                                <span class="fa fa-search"></span>
                                <span><?= JText::_('SEE_MORE'); ?></span>
                            </div>
                        <?php else : ?>
                            <img class="img-holder-img" src="images/image_0.jpg" alt="" />	
						<?php endif; ?>
                        <div style="clear:both;"></div>
                    </a>
                    <div class="more-images">
                        <?php echo $myfield['mais-imagens']->rawvalue; ?>
                    </div>
                </div>
                <div class="product-description">
                    <h3><?= JText::_('PRODUTOS_DESCRICAO'); ?></h3>
                    <?php echo $this->item->text; ?>
                </div>
                <div class="tabela-referencias">
                <h3><?= JText::_('TABELAS_REFERENCIAS'); ?></h3>
                    <?php echo $myfield['tabela-de-referencias']->rawvalue; ?>
                </div>
            </div>
            <?php echo $this->item->event->afterDisplayContent; ?>
        </div>
        
        <div style="clear: both;"></div>
	
	</div>

</div>