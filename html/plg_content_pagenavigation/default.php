<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Content.pagenavigation
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$lang = JFactory::getLanguage();
$disableNext = (!empty($row->next) ? '' : 'disabled');
$disablePrev = (!empty($row->prev) ? '' : 'disabled');
$next = (!empty($row->next) ? $row->next : '#');
$prev = (!empty($row->prev) ? $row->prev : '#');

?>

<ul class="page-nav">
	<li class="prev">
		<a class="<?php echo $disablePrev; ?>" href="<?php echo $prev; ?>" rel="prev">
			<span class="fa fa-angle-left"></span>
		</a>
	</li>
	<li class="next">
		<a  class="<?php echo $disableNext; ?>" href="<?php echo $next; ?>" rel="next">
			<span class="fa fa-angle-right"></span>
		</a>
	</li>
	<div style="clear:both;"></div>
</ul>
