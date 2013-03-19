<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
	<!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" >
		<title><?php if(is_home()|is_front_page()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } elseif (get_post_meta($post->ID, 'custom_text', true)) { echo get_post_meta($post->ID, 'custom_text', true).' | '; echo bloginfo("name"); } else { wp_title(); }?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
		<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
		<![endif]-->
		<?php wp_head(); ?>
    </head>
	<body <?php body_class(); ?>>
	<div id="wrap">
		<div class="wrapper">
			<header id="branding" class="row" role="banner">
				<hgroup class="col span_16 clr">
					<h1 class="site-title"><?php echo get_bloginfo ( 'title', 'display' ); ?></h1>
					<h2 class="tagline"><?php bloginfo ( 'description' ); ?></h2>
				</hgroup>
				<div id= "social" class="col span_6 clr">
					<a href="https://github.com/pattonwebz/theme-dev" class="genericon genericon-github"></a>
					<a href="http://www.facebook.com/ThemeDevFramework" class="genericon genericon-facebook"></a>
					<a href="https://twitter.com/Theme_Dev_Frame" class="genericon genericon-twitter"></a>
					<a href="https://plus.google.com/u/0/b/100985048306496223683/" class="genericon genericon-googleplus"></a>
				</div>
			</header>
			<nav id="site-nav" class="main-navigation" role="navigation">
				<div id="nav-toggle"><h3>Navigation</h3></div>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_id' => 'responsive-nav', 'container_class' => 'nav-links' ) ); ?>
			</nav>
			<div id="main">