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
		($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>

		<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
			<li>
				<i class="fa fa-map-marker" aria-hidden="true"></i>
				<div class="contact-street" itemprop="streetAddress">
					<?php echo $this->contact->address .'<br/>'; ?>
                    <?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
                        <span class="contact-suburb" itemprop="addressLocality">
                            <?php echo $this->contact->suburb .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
                        <span class="contact-postcode" itemprop="postalCode">
                            <?php echo $this->contact->postcode .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
										<?php if ($this->contact->postcode && $this->params->get('show_state')) : ?>
                        <span class="contact-state" itemprop="state">
                            <?php echo $this->contact->state .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
                    <?php if ($this->contact->country && $this->params->get('show_country')) : ?>
                        <span class="contact-country" itemprop="addressCountry">
                            <?php echo $this->contact->country .'<br/>'; ?>
                        </span>
                    <?php endif; ?>
				</div>
			</li>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
		<li>
			<i class="fa fa-envelope-o" aria-hidden="true"></i>
			<span class="contact-emailto">
				<?php echo $this->contact->email_to; ?>
			</span>
		</li>
	<?php endif; ?>
	<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
		<li>
			<i class="fa fa-phone" aria-hidden="true"></i>
			<span class="contact-telephone" itemprop="telephone">
				<?php echo nl2br($this->contact->telephone); ?>
			</span>
		</li>
	<?php endif; ?>
	<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
		<li>
			<i class="fa fa-fax" aria-hidden="true"></i>
			<span class="contact-fax" itemprop="faxNumber">
			<?php echo nl2br($this->contact->fax); ?>
			</span>
		</li>
	<?php endif; ?>
	<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
	<li>
		<i class="fa fa-mobile" aria-hidden="true"></i>
		<span class="contact-mobile" itemprop="telephone">
			<?php echo nl2br($this->contact->mobile); ?>
		</span>
	</li>
<?php endif; ?>
<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
	<li>
		<span class="<?php echo $this->params->get('marker_class'); ?>" >
		</span>
	</li>
	<li>
		<span class="contact-webpage">
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank" itemprop="url">
			<?php echo JStringPunycode::urlToUTF8($this->contact->webpage); ?></a>
		</span>
	</li>
<?php endif; ?>
</ul>