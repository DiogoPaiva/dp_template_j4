<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.dp_template.v4
 *
 * @copyright   Copyright (C) 2005 - 2023 - Diogo Paiva
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

JFactory::getDocument()->setGenerator('');
defined('_JEXEC') or die;

$app  = JFactory::getApplication();
$doc = JFactory::getDocument();
$user = JFactory::getUser();
$config = JFactory::getConfig();

$this->language  = $doc->language;
$this->direction = $doc->direction;

/*FIX FOR LANGUAGE TEMPLATE OVERRIDES*/
$language = JFactory::getLanguage();
$base_dir = dirname(__FILE__); // loads template root path
$language_tag = $language->getTag(); // loads the current language-tag

/*Declare a unique variable to each new extension */
$extension = '';
$content = 'com_content';

/*Run the load function for each extension on the argument*/
$language->load($extension, $base_dir, $language_tag, true);
$language->load($content, $base_dir, $language_tag, true);


// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');

if($task == "edit" || $layout == "form" ) {
	$fullWidth = 1;
} else {
	$fullWidth = 0;
}

// Verify if is homepage and language code
$htmlclass;
$lang = JFactory::getLanguage();
$menu = $app->getMenu();

if ($menu->getActive() == $menu->getDefault($lang->getTag())) {
	$htmlclass = $lang->getTag() . " homepage";
}
else
{$htmlclass = $lang->getTag() . " conteudos";}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);
JHtml::_('jquery.framework',  true, true);

// Add Stylesheets
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');

// Adjusting content width
if ($this->countModules('right') && $this->countModules('left')){$span = "span6";}
elseif ($this->countModules('right') && !$this->countModules('left')){$span = "span9";}
elseif (!$this->countModules('right') && $this->countModules('left')){$span = "span9";}
else
{$span = "span12";}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" class='<?php print_r($htmlclass)?>' >
<head>
<jdoc:include type="head" />

<link rel="apple-touch-icon" sizes="57x57" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/favicon-16x16.png">
<link rel="manifest" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/favicons/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="google-site-verification" content="761AuQO0n1YKfdL5q-optS-3H7XNcD55jWWSaTFCs1g" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/layout.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/menu.css" type="text/css" media="screen,projection" />
<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/font-awesome.css" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700|Roboto:100,300,400,700" rel="stylesheet"> 
<?php

$doc->addScript('templates/'.$this->template.'/js/jquery.bxslider.min.js', 'text/javascript');
$doc->addScript('templates/'.$this->template.'/js/image-scale.min.js', 'text/javascript');
$doc->addScript('templates/'.$this->template.'/js/jquery.mousewheel.min.js', 'text/javascript');
$doc->addScript('templates/'.$this->template.'/js/jquery.simplr.smoothscroll.min.js', 'text/javascript');
$doc->addScript('templates/'.$this->template.'/js/dp_template.js', 'text/javascript');

	//Add OG content
	$meta_sitename = $config->get( 'sitename' );
	$meta_title = $meta_sitename . ' - ' . $doc->getTitle();
	$meta_description = $doc->getMetaData( 'description' );
	$meta_keywords =$doc->getMetaData( 'keywords' );

	 $doc->addCustomTag( '
	<meta property="og:title" content="'.(isset($meta_title) ? $meta_title : '').'"/>
	<meta property="og:type" content="website"/>
	<meta property="og:url" content="'.JURI::current().'"/>
	<meta property="og:keywords" content="'.(isset($meta_keywords) ? $meta_keywords : '').'"/>
	<meta property="og:site_name" content="'.(isset($meta_sitename) ? $meta_sitename : '').'"/>
	<meta property="og:description" content="'.(isset($meta_description) ? $meta_description : '').'"/>
	');
	if ($menu->getActive() == $menu->getDefault($lang->getTag()))  :
		$doc->addCustomTag('<meta property="og:image" content="'. $this->baseurl .'/templates/'. $this->template .'/images/logo.png"/>');
	endif;
?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-RWETZHRV5N"></script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-PVHC6ZT');</script>
<!-- End Google Tag Manager -->
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-RWETZHRV5N'); // https:
  gtag('config', 'G-WZ0SZZQLXP'); //site2 - http:
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>

</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '');
?>">
<!-- Google Tag Manager (noscript) -->
<noscript>
	<iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PVHC6ZT" height="0" width="0" style="display:none;visibility:hidden">
	</iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->

	<div class="body">
			<!-- Header -->
			<div class="wide-bar">
				<div class="wide-bar-inner">
					<div class="inner-bar container">
						<a id="logo-bar" href="<?php echo $this->baseurl; ?>" target="_self">
							<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" alt="Lugar do Pintor - Artigos de Pintura" class="logo-bar-png" alt="" />
						</a>
						<div class="c-hamburger c-hamburger--htx">
							<span>toggle menu</span>
						</div>
						<div class="menu menu_principal">
							<jdoc:include type="modules" name="menu" style="xhtml" />
						</div>
					</div>
				</div>
			</div>
			<div style="clear:both;"></div>
			<?php  if ($this->countModules('banner-home')): ?>
				<div class="full-width-banner">
					<jdoc:include type="modules" name="banner-home" style="xhtml" />
				</div>
			<?php endif; ?>
			<div class="centro">
				<?php  if ($this->countModules('breadcrumbs')): ?>
				<nav class="caminho-barra" role="navigation">
					<jdoc:include type="modules" name="breadcrumbs" style="xhtml" />
				</nav>
				<?php endif; ?>
				<div class="message-area">
					<jdoc:include type="message" />
			</div>
				<div style="clear: both;"></div>
				<div class="inner-centro container">
					<div class="modulo_topo">
						<jdoc:include type="modules" name="modulo_topo" style="xhtml" />
					</div>
					<div class="bloco-central row-fluid">
						<?php if ($this->countModules('left')) : ?>
							<!-- Begin Sidebar -->
							<div id="sidebar" class="span3">
								<div class="inner-sidebar">
									<div class="sidebar-nav">
										<jdoc:include type="modules" name="left" style="xhtml" />
									</div>
									<div class="social_area">
										<div class="social_area_inner">
											<jdoc:include type="modules" name="redes_sociais" style="xhtml" />
										</div>
									</div>
								</div>
							</div>
							<!-- End Sidebar -->
						<?php endif; ?>
						<main id="content" role="main" class="<?php echo $span; ?>">
							<div class="inner-content">
							
								<?php if ($menu->getActive() != $menu->getDefault($lang->getTag())) : ?> 
									<jdoc:include type="component" />
								<?php endif; ?>
								
								<div style="clear: both;"></div>
								<?php if ($this->countModules('box1') || $this->countModules('box2')): ?>
								<div class="block-box">
									<div id="caixas" class="container">
										<?php if ($this->countModules('box1')): ?>
										<div class="box"> <jdoc:include type="modules" name="box1" style="xhtml" /></div>
										<?php endif; ?>
										 <div style="clear:both;"></div>
										<?php if ($this->countModules('box2')): ?>
										<div class="box"> <jdoc:include type="modules" name="box2" style="xhtml" /></div>
										<?php endif; ?>
										
										<div style="clear: both;"></div>
									 </div>
								 </div>
								 <?php endif ; ?>
								<jdoc:include type="modules" name="position-3" style="xhtml" />
							</div>
						</main>
						<?php if ($this->countModules('right')) : ?>
							<div id="aside" class="span3">
								<!-- Begin Right Sidebar -->
								<jdoc:include type="modules" name="right" style="xhtml" />
								<!-- End Right Sidebar -->
							</div>
						<?php endif; ?>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
			<div style="clear:both;"></div>
			<?php if ($this->countModules('full-width-middle1')): ?>
			<div class="full-width-middle-box full-1">
				<jdoc:include type="modules" name="full-width-middle1" style="xhtml" />
			</div>
			<?php endif ; ?>

			<?php if ($this->countModules('full-width-middle2')): ?>
			<div class="full-width-middle-box full-2 inner-centro">
				<div id="sidebar1" class="span3">
				&nbsp;
				</div>
				<div class="full-width-middle-box-inner">
				<jdoc:include type="modules" name="full-width-middle2" style="xhtml" />
				</div>
			</div>
			<?php endif ; ?>

			<div class="footer" role="contentinfo">
					<div class="footer-inner">
						<a href="#top" id="back-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
							<div class="tab">
								<div class="menu_footer_area">
									<jdoc:include type="modules" name="menu-footer" style="xhtml" />
									<div style="clear: both;"></div>
								</div>
								<div class="logo-footer">
									<jdoc:include type="modules" name="footer-address" style="xhtml" />
									<div class="contactos-footer-wrapper">
										<div class="page-header">
											<h2><span class="contact-name">Lugar do Pintor - Artigos de Pintura</span></h2>
										</div>
										<ul class="contactos-list morada">
											<li>
												<span class="fa fa-map-marker">&nbsp;</span>
												<div class="contact-address-container">
													<span class="contact-address">Av. António Alberto de Almeida Pinheiro,1950</span>
													<br />
													<span class="contact-address"> 3730-536 Codal - Vale de Cambra</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<div class="footer-more">
									<jdoc:include type="modules" name="footer-more" style="xhtml" />
									<div class="contactos-footer-wrapper">
										<ul class="contactos-list telef">
											<li><span class="fa fa-envelope-o">&nbsp;</span> <span class="contact-email"> lugardopintor@gmail.com </span></li>
											<li><span class="fa fa-phone">&nbsp;</span> <span class="contact-telephone"> 256 413 054 </span></li>
											<li><span class="fa fa-fax">&nbsp;</span> <span class="contact-fax"> 256 413 054 </span></li>
										</ul>
									</div>
								</div>
							</div>
					</div>
				<div class="copyright-text">
					<div class="footer-inner">
					<span>&copy; <?php echo date('Y'); ?> <?php echo $meta_sitename; ?> - Todos os direitos reservados</span>
					<jdoc:include type="modules" name="footercopyright" style="xhtml" />
					<a class="developed" href="http://www.diogopaiva.com" target="_blank" title="Developed by Diogo Paiva">Developed by Diogo Paiva</a>
				</div>
				</div>
			</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>