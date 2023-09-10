<?php

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
?>
	<div class="artigo empresa item-page<?php echo $this->pageclass_sfx; ?>" >
		<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>;" />
		<div class="page-header">
			<h1 class="roboto100 page-title"> <?php echo $this->escape($this->item->title);?></h1>
		</div>
		<div class="text-area">
			<div class="intro-area">
				<?php if (!empty($images->image_fulltext)) { ?>
						<div class="img-intro">
							<img class="bk-img js-imagescale" src="<?php echo htmlspecialchars($images->image_intro); ?>" alt="" />
					</div>
				<?php } ?>

				<?php if(!empty($images->image_fulltext)) : ?>
					<div class="img-full-wrapper col-md-4 pull-left">
						<img class="img-full" src="<?php echo htmlspecialchars($images->image_fulltext) ?>"/>
					</div>
				<?php endif; ?>
				<div style="clear: both;"></div>
			</div>
			<div style="clear: both;"></div>
			<div class="full-area">
					<?php	echo $this->item->text; ?>	
					<div style="clear: both;"></div>
			</div>
		</div>
	</div>