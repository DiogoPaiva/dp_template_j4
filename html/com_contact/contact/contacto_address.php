<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>

<ul class="contact-address contactos-list" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
	<?php if (($this->params->get('address_check') > 0) &&
		($this->item->address || $this->item->suburb  || $this->item->state || $this->item->country || $this->item->postcode)) : ?>

		<?php if ($this->item->address && $this->params->get('show_street_address')) : ?>
			<li>
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<div class="contact-street" itemprop="streetAddress">
					<?php echo $this->item->address .'<br/>'; ?>
                    <?php if ($this->item->suburb && $this->params->get('show_suburb')) : ?>
                        <span class="contact-suburb" itemprop="addressLocality">
                            <?php echo $this->item->suburb .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($this->item->postcode && $this->params->get('show_postcode')) : ?>
                        <span class="contact-postcode" itemprop="postalCode">
                            <?php echo $this->item->postcode .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
										<?php if ($this->item->postcode && $this->params->get('show_state')) : ?>
                        <span class="contact-state" itemprop="state">
                            <?php echo $this->item->state .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($this->item->country && $this->params->get('show_country')) : ?>
                        <span class="contact-country" itemprop="addressCountry">
                            <?php echo $this->item->country .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
				</div>
			</li>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($this->item->email_to && $this->params->get('show_email')) : ?>
		<li>
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
			<span class="contact-emailto">
				<?php echo $this->item->email_to; ?>
			</span>
		</li>
	<?php endif; ?>
	<?php if ($this->item->telephone && $this->params->get('show_telephone')) : ?>
		<li>
			<i class="fa fa-phone" aria-hidden="true"></i>
			<span class="contact-telephone" itemprop="telephone">
				<?php echo nl2br($this->item->telephone); ?>
			</span>
		</li>
	<?php endif; ?>
	<?php if ($this->item->fax && $this->params->get('show_fax')) : ?>
		<li>
			<i class="fa fa-fax" aria-hidden="true"></i>
			<span class="contact-fax" itemprop="faxNumber">
			<?php echo nl2br($this->item->fax); ?>
			</span>
		</li>
	<?php endif; ?>
	<?php if ($this->item->mobile && $this->params->get('show_mobile')) :?>
	<li>
		<i class="fa fa-mobile" aria-hidden="true"></i>
		<span class="contact-mobile" itemprop="telephone">
			<?php echo nl2br($this->item->mobile); ?>
		</span>
	</li>
<?php endif; ?>
<?php if ($this->item->webpage && $this->params->get('show_webpage')) : ?>
	<li>
		<span class="<?php echo $this->params->get('marker_class'); ?>" >
		</span>
	</li>
	<li>
		<span class="contact-webpage">
			<a href="<?php echo $this->item->webpage; ?>" target="_blank" itemprop="url">
			<?php echo JStringPunycode::urlToUTF8($this->item->webpage); ?></a>
		</span>
	</li>
<?php endif; ?>
</ul>