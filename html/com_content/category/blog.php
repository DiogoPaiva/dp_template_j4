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
JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

?>
<?php
	
	$introcount = (count($this->intro_items));
	$counter = 0;
	$conta = 0;	
?>
<div class="blog-listagem blog<?php echo $this->pageclass_sfx; ?>">
<?php if ($this->params->get('show_category_title', 1) or $this->params->get('page_subheading')) : ?>
		<h1 class="category-title roboto100"> <?php echo $this->escape($this->params->get('page_subheading')); ?>
			<?php echo $this->category->title; ?>
		</h1>
	<?php endif; ?>
<div class="intro-texto">
	
	<?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
		<div class="category-desc clearfix">
			
			<?php if ($this->params->get('show_description') && $this->category->description) : ?>
				<?php echo JHtml::_('content.prepare', $this->category->description, '', 'com_content.category'); ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>
	</div>
	<div class="artigos_list">
	
	<?php $leadingcount = 0; ?>
	<?php if (!empty($this->lead_items)) : ?>
		<div class="destaque items-leading clearfix">
			<?php foreach ($this->lead_items as &$item) : ?>
				<div class="leading-<?php echo $leadingcount; ?><?php echo $item->state == 0 ? ' system-unpublished' : null; ?>"
					itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting">
					<?php
					$this->item = & $item;
					echo $this->loadTemplate('item_destaque');
					?>
				</div>
				<?php $leadingcount++; ?>
			<?php endforeach; ?>
		</div><!-- end items-leading -->
	<?php endif; ?>
	
	<div class="listagem">
		<?php if (!empty($this->intro_items)) : ?>
		<?php foreach ($this->intro_items as $key => &$item) : ?>
			<?php $rowcount = ((int) $key % (int) $this->columns) + 1; ?>
				<div class="item-noticia" id="item<?php echo $conta+1?>">
						<?php	$this->item = & $item;
							$params = $this->item->params;
							JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
							$info = $params->get('info_block_position', 0);
						?>
					<div class="conteudo_item">
						<div class="titulo">
							<?php echo JLayoutHelper::render('joomla.content.blog_style_default_item_title', $this->item); ?> 
						</div>
						<div class="informacao">
								<?php $useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
									|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author') ); ?>

								<?php if ($useDefList && ($info == 0 || $info == 2)) : ?>
									<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
								<?php endif; ?>
						</div>
						<div class="inner-noticia">
								<?php $images = json_decode($this->item->images); ?>
								<?php  if (isset($images->image_intro) and !empty($images->image_intro)) : ?>
								<?php $imgfloat = (empty($images->float_intro)) ? $params->get('float_intro') : $images->float_intro; ?>
								<div class="imagem-item"> 
								<a href="<?php $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));  echo $link;?>">
										<img class="img-holder-img" src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="" />
										</a>
							   </div>
								<?php endif;  ?>
								<div class="item-content-texto">
									<div class="container_texto">
										<?php 
										if ($params->get('show_intro'))
										{
											echo $this->item->event->beforeDisplayContent;
											
                                            //Corta String
                                            $Limite = 120;
                                            $introtext = explode("\n", wordwrap($this->item->introtext, $Limite, "\n") );
                                            echo $introtext[0]; 
											
                                            $link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid));
											echo JLayoutHelper::render('joomla.content.readmore', array('item' => $this->item, 'params' => $params, 'link' => $link)); 
										}
										else
											{//echo $this->item->fulltext;
                                            }
										?>
										<div style="clear:both;"></div>
									</div>
								</div>
								<div style="clear:both;"></div>
						</div>
					</div>
					<?php 	$conta++; ?>
				</div><!-- end row -->
			<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
	<?php if (($this->params->def('show_pagination', 1) == 1 || ($this->params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>
		<div class="pagination">
			<?php if ($this->params->def('show_pagination_results', 1)) : ?>
				<p class="counter pull-right"> <?php echo $this->pagination->getPagesCounter(); ?> </p>
			<?php endif; ?>
			<?php echo $this->pagination->getPagesLinks(); ?> 
		</div>
	<?php endif; ?>
</div>
