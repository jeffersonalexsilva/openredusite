<?php
/**
 * The template for displaying the header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php remove_action('wp_head', 'wp_generator'); wp_head();?>
	<meta property="fb:pages" content="309902399727" />
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-MPPQNCT');</script>
	<!-- End Google Tag Manager -->
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPPQNCT"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page">
	<header class="head-page" id="head-page">
		<section class="central">
			<div class="envelope head-social">
				<?php dynamic_sidebar( 'social-area' ); ?>
			</div>
			<div class="envelope head-menu">
				<div class="logo">
					<a href="<?= home_url();?>">
						<figure class="img-logo">
							<img class="horizontal" src="<?php bloginfo('template_url');?>/img/openredu-logo-horizontal.svg" />
							<img class="icon" src="<?php bloginfo('template_url');?>/img/icon-openredu.svg" />
						</figure>
					</a>
				</div>
				<input id="ck-menu" type="checkbox" />
				<label class="lb-ckmenu" for="ck-menu">
					<span class="icon-line"></span>
					<span class="icon-line"></span>
					<span class="icon-line"></span>
				</label>
				<nav class="menu-top">
					<?php wp_nav_menu( array( 'theme_location' => 'menu-top' ) ); ?>
				</nav>
			</div>
		</section>
	</header>
	<div id="content" class="site-content">
