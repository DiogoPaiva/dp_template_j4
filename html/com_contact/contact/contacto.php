<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');

jimport('joomla.html.html.bootstrap');
?>
<div class="formulario contact<?php echo $this->pageclass_sfx?>" itemscope itemtype="http://schema.org/Person">
	<div style="clear: both;"></div>
	<div class="contactos-centerbody">
		<div class="contactos_left">
			<div class="mapa">	
				<a class="map-details" alt="Ver Mapa" target="_blank" href="https://www.google.pt/maps/place/Av.+Ant%C3%B3nio+Alberto+de+Almeida+Pinheiro+1954,+Codal/@40.871902,-8.4119478,19.5z/data=!4m5!3m4!1s0xd237969966af84f:0x90a7907505273716!8m2!3d40.8718671!4d-8.411665">
					<img src="images/mapa-static-lugardopintor.jpg" alt="maps" />
					<span>Ver detalhe do Mapa</span>
				</a> 
			</div>
			<?php if ($this->params->get('show_tags', 1) && !empty($this->item->tags)) : ?>
				<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
				<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
			<?php endif; ?>

			<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
				<?php echo JHtml::_('bootstrap.startAccordion', 'slide-contact', array('active' => 'basic-details')); ?>
			<?php endif; ?>
			<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
				<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'basic-details')); ?>
			<?php endif; ?>

			<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
				<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_DETAILS'), 'basic-details'); ?>
			<?php endif; ?>
			<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
				<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'basic-details', JText::_('COM_CONTACT_DETAILS', true)); ?>
			<?php endif; ?>
			<?php if ($this->params->get('presentation_style') == 'plain'):?>
				<?php # echo '<h3>'. JText::_('COM_CONTACT_DETAILS').'</h3>';  ?>
			<?php endif; ?>

			<?php if ($this->contact->image && $this->params->get('show_image')) : ?>
				<div class="thumbnail pull-right">
					<?php echo JHtml::_('image', $this->contact->image, JText::_('COM_CONTACT_IMAGE_DETAILS'), array('align' => 'middle', 'itemprop' => 'image')); ?>
				</div>
			<?php endif; ?>

			<?php if ($this->contact->con_position && $this->params->get('show_position')) : ?>
				<dl class="contact-position dl-horizontal">
					<dd itemprop="jobTitle">
						<?php echo $this->contact->con_position; ?>
					</dd>
				</dl>
			<?php endif; ?>
			
			<?php if ($this->params->get('show_page_heading')) : ?>
				<h1>
					<?php echo $this->escape($this->params->get('page_heading')); ?>
				</h1>
			<?php endif; ?>
			<?php if ($this->contact->name && $this->params->get('show_name')) : ?>
				<div class="page-header">
					<?php if ($this->params->get('show_contact_category') == 'show_no_link') : ?>
				<h3>
					<span class="contact-category"><?php echo $this->contact->category_title; ?></span>
				</h3>
			<?php endif; ?>
					<h2>
						<?php if ($this->item->published == 0) : ?>
							<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
						<?php endif; ?>
						<span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
					</h2>
				</div>
			<?php endif;  ?>
			
			<?php echo $this->loadTemplate('address'); ?>
			<div class="mais_info">
			
				<?php if ($this->contact->misc && $this->params->get('show_misc')) : ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_OTHER_INFORMATION'), 'display-misc'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-misc', JText::_('COM_CONTACT_OTHER_INFORMATION', true)); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'plain'):?>
					<?php echo '<h3>'. JText::_('COM_CONTACT_OTHER_INFORMATION').'</h3>';  ?>
				<?php endif; ?>

				<div class="contact-miscinfo">
					<dl class="dl-horizontal">
						<dt>
							<span class="<?php echo $this->params->get('marker_class'); ?>">
							<?php echo $this->params->get('marker_misc'); ?>
							</span>
						</dt>
						<dd>
							<span class="contact-misc">
								<?php echo $this->contact->misc; ?>
							</span>
						</dd>
					</dl>
				</div>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.endSlide'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.endTab'); ?>
				<?php endif; ?>

				<?php endif; ?>
			</div>
		</div>
		<div class="contactos_right ">
		<?php if ($this->params->get('allow_vcard')) :	?>
				<?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS');?>
				<a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id='.$this->contact->id . '&amp;format=vcf'); ?>">
				<?php echo JText::_('COM_CONTACT_VCARD');?></a>
			<?php endif; ?>

			<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
				<?php echo JHtml::_('bootstrap.endSlide'); ?>
			<?php endif; ?>
			<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
				<?php echo JHtml::_('bootstrap.endTab'); ?>
			<?php endif; ?>

			<?php if ($this->params->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_EMAIL_FORM'), 'display-form'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-form', JText::_('COM_CONTACT_EMAIL_FORM', true)); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'plain'):?>
					<?php echo '<h3>'. JText::_('COM_CONTACT_EMAIL_FORM').'</h3>';  ?>
				<?php endif; ?>

				<?php  echo $this->loadTemplate('form');  ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.endSlide'); ?>
				<?php endif; ?>
					<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
				<?php echo JHtml::_('bootstrap.endTab'); ?>
					<?php endif; ?>

			<?php endif; ?>

			<?php if ($this->params->get('show_links')) : ?>
				<?php echo $this->loadTemplate('links'); ?>
			<?php endif; ?>

			<?php if ($this->params->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('JGLOBAL_ARTICLES'), 'display-articles'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-articles', JText::_('JGLOBAL_ARTICLES', true)); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'plain'):?>
					<?php echo '<h3>'. JText::_('JGLOBAL_ARTICLES').'</h3>';  ?>
				<?php endif; ?>

				<?php echo $this->loadTemplate('articles'); ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.endSlide'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.endTab'); ?>
				<?php endif; ?>

			<?php endif; ?>

			<?php if ($this->params->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_PROFILE'), 'display-profile'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-profile', JText::_('COM_CONTACT_PROFILE', true)); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'plain'):?>
					<?php echo '<h3>'. JText::_('COM_CONTACT_PROFILE').'</h3>';  ?>
				<?php endif; ?>

				<?php echo $this->loadTemplate('profile'); ?>

				<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
					<?php echo JHtml::_('bootstrap.endSlide'); ?>
				<?php endif; ?>
				<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
					<?php echo JHtml::_('bootstrap.endTab'); ?>
				<?php endif; ?>

			<?php endif; ?>

			

			<?php if ($this->params->get('presentation_style') == 'sliders') : ?>
				<?php echo JHtml::_('bootstrap.endAccordion'); ?>
			<?php endif; ?>
			<?php if ($this->params->get('presentation_style') == 'tabs') : ?>
				<?php echo JHtml::_('bootstrap.endTabSet'); ?>
			<?php endif; ?>
		</div>
</div>
<div style="clear: both;height:90px;"></div>

</div>
