<?php defined('_JEXEC') or die('Restricted access'); ?>

<div id="djslider-loader<?php echo $mid; ?>" class="slider_conteudos djslider-loader djslider-loader-<?php echo $theme; ?>" > 
	<?php if ($show->arr || $show->btn) {?>
		<div class="setas-area">
			<div class="seta-prev"></div>
			<div class="seta-next"></div>
		</div>
		<?php } ?>
			<ul id="slider" class="djslider-in">
			<?php foreach ($slides as $slide) { ?>	
				<li class="slider-item">
				
				<?php if ($params->get('slider_source') && ($params->get('show_title') || ($params->get('show_desc') && !empty($slide->description) || ($params->get('show_readmore') && $slide->link)))) { ?>

					<!-- Slide description area: START -->
					<div class="wrapper-slide">
					<div class="slide-desc tbl">
						<div class="tblcell">
							<?php if ($params->get('show_title')) { ?>
							<div class="slide-title roboto100">
								<?php	if ($params->get('link_title') && $slide->link) { ?>
								<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target; ?>">
								<?php } ?>
								<?= trim($slide->title); ?>
								<?php if ($params->get('link_title') && $slide->link) { ?>
								</a>
								<?php } ?>
							</div>
							<?php } ?>
							<?php	if ($params->get('show_desc')) { ?>
								<div class="slide-text robotoCond400">
									<?php if ($params->get('link_desc') && $slide->link) { ?>
									<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target;?>">
									<?php echo strip_tags($slide->description, "<br><span><em><i><b><strong><small><big>"); ?>
									</a>
									<?php } else { ?>
									<?php echo $slide->description; ?>
							
									<?php } ?>
								</div>
								<?php } ?>
							<a href="<?php echo $slide->link; ?>" target="<?php echo $slide->target; ?>" class="readmore">
							<?php echo ($params->get('readmore_text', 0) ? $params->get('readmore_text') : JText::_('MOD_DJIMAGESLIDER_READMORE'));?>
							</a>
							<div style="clear: both"></div>
						</div>
					</div></div>
						<!-- Slide description area: END -->
				<?php } ?>
				<div class="img-mask"></div>
				<img src="<?php echo $slide->image; ?>" class="js-imagescale slider-img" alt="<?php htmlspecialchars($slide->title . ' ') ?>" />
				</li>
					<?php } ?>
				</ul>
       <?php if($show->idx) 
		{ ?>		
<div id="navegacao"></div>
		<?php 
		} ?> 
</div>
<div style="clear: both"></div>