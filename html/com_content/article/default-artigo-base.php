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
	<div class="artigo base item-page<?php echo $this->pageclass_sfx; ?>" >
		<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>;" />
					
		<div class="text-area" style="background: url(<?php echo htmlspecialchars($images->image_intro) ?>) ;">
				<div class="intro-area">
					<div class="img-intro">
							<img class="img-holder-img" src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="" />
						</div>
					
					<div class="intro-corpo">
					<?php if ($this->params->get('show_page_heading', 1)) : ?>
					<div class="page-header">
						<h1 class="roboto300"> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
					</div>	
					<?php endif; ?>
					<?php if ($this->params->get('show_title', 1)) : ?>
				    <h1 itemprop="name"><?php echo $this->escape($this->item->title);?></h1>
					<?php endif; ?>
						<div class="intro-texto">
							<?php echo htmlspecialchars_decode($this->item->introtext); ?>
						</div>
						
					</div>
					<div style="clear: both;"></div>
				</div>
		</div>	
		
		<div style="clear: both;"></div>
		<div class="full-area">
			<div class="galeria">
				<div class="gal-port">
								<?php echo $this->item->fulltext; ?>
								<?php echo $this->item->event->afterDisplayContent; ?> 
				</div>
				<div class="thumbs-wrapper">
					<ul id="gal-thumbs"></ul>
					</div>
				<div style="clear: both;"></div>
			</div>		
		</div>
		<div style="clear:both;"></div>
	    <div class="bottom-block">
			<div class="partilhas">
				{module Social Share}
			</div>
		</div>
	</div>