<?php

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class='<?php print_r($htmlclass)?>' >
<head>
<jdoc:include type="head" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/layout.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/menu.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.css" type="text/css" />
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300|Cinzel:400,700|Roboto+Condensed:400,700' rel='stylesheet' type='text/css' />
<title><?php echo $this->title; ?></title>
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
<link href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">
	<!-- Body -->
	<div class="body">
			<!-- Header -->
			<div class="full-header">
				<div class="header-container">
					<div class="logoheader "> 
							<a id="logo" href="<?php echo $this->baseurl; ?>" target="_self"></a>
							<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" class="logo-png" alt="" />
					</div>
					<div class="c-hamburger c-hamburger--htx">
						<span>toggle menu</span>
					</div>
					<div class="menu menu_principal">
						<jdoc:include type="modules" name="menu" style="xhtml" />
							<div class="opcoes">
								<jdoc:include type="modules" name="opcoes" style="xhtml" />
							</div>
					</div>
					<div style="clear: both;"></div>
				</div>
			</div>
			<div class="navigation">
				<?php // Display position-1 modules ?>
				<?php echo $doc->getBuffer('modules', 'position-8', array('style' => 'xhtml')); ?>
			</div>
			<!-- Banner -->
			<div class="banner">
				<?php echo $doc->getBuffer('modules', 'banner', array('style' => 'xhtml')); ?>
			</div>
		<div class="container">
				<div class="bloco-central row-fluid">
					<!-- Begin Content -->
					<h1 class="page-header"><?php echo htmlspecialchars(JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'), ENT_QUOTES, 'UTF-8'); ?></h1>
					<div class="well" style="min-height: 480px;">
						<div class="row-fluid">
							<div class="span6">
								<p><strong><?php echo htmlspecialchars(JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'),  ENT_QUOTES, 'UTF-8'); ?></strong></p>
								<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
								<ul>
									<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
								</ul>
							</div>
							<div class="span6">
								<?php if (JModuleHelper::getModule('search')) : ?>
									<p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
									<p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
									<?php echo $doc->getBuffer('module', 'search'); ?>
								<?php endif; ?>
								<p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></p>
								<p><a href="<?php echo $this->baseurl; ?>/index.php" class="btn"><i class="icon-home"></i> <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
							</div>
						</div>
						<hr />
						<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
						<blockquote>
							<span class="label label-inverse"><?php echo $this->error->getCode(); ?></span> <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8');?>
						</blockquote>
					</div>
					<!-- End Content -->
				</div>
				</div>
	<!-- Footer -->
	<div class="footer" role="contentinfo">
		<div class="footer-inner">
			<a href="#top" id="back-top"></a>
			<div class="tabs_area">
				<div id="tab1" class="tab">
					<div class="menu_footer_area">
						<jdoc:include type="modules" name="menu-copyright" style="xhtml" />
						<div style="clear: both;"></div>
					</div>	
					<div class="social_area">
					<jdoc:include type="modules" name="redes_sociais" style="xhtml" />
			</div>
				</div>
				<div id="tab2" class="tab">
					<div class="logo-footer">
					<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo-footer.png" />
					</div>
					<div class="copyright-text">
						<jdoc:include type="modules" name="footercopyright" style="xhtml" />
					</div>
				</div>
				<div style="clear: both;"></div>
			</div>
		
		</div>
		<div style="clear: both;"></div>
	</div>
	<?php echo $doc->getBuffer('modules', 'debug', array('style' => 'xhtml')); ?>
</body>
</html>