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
		<header id="site-head" class="row">
			<div class="logo-cont col span_4">
				<?php if ( is_front_page() ){ ?>
					<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
					<span id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
				<?php } ?>
			</div>
			<nav id="head-nav" class="navigation col span_14">
				<?php wp_nav_menu( array( 'theme_location' => 'head-menu', 'container_class' => 'bar-nav-links' ) ); ?>
			</nav>
			<div class="bar-cta col span_6">
				<?php // if ( of_get_option( 'top-social' ) ) : ?>
					<div id="social">
						<a href="https://github.com/pattonwebz/theme-dev" class="genericon genericon-github"></a>
						<a href="http://www.facebook.com/ThemeDevFramework" class="genericon genericon-facebook"></a>
						<a href="https://twitter.com/Theme_Dev_Frame" class="genericon genericon-twitter"></a>
						<a href="https://plus.google.com/u/0/b/100985048306496223683/" class="genericon genericon-googleplus"></a>
					</div>
				<?php // endif; ?>
			</div>
		</header>
		<div class="cta-cont">
			<div id="cta-block">
				<div class="feat-sec">
					<?php if ( of_get_option( 'themedev_display_featured_bar' ) ) : ?>
						<?php if ( of_get_option( 'themedev_featured_bar' ) ) : ?>
							<?php echo of_get_option( 'themedev_featured_bar' ); ?>
							<?php if ( of_get_option( 'themedev_mail_list' ) ) : ?>
								<?php echo of_get_option( 'themedev_mail_list' ); ?>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<div id="wrap">
		<div class="wrapper">
			<div id="main" class="row">