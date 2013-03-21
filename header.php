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
				<div id="header-banner" class="col span_6 clr">
					
				</div>
			</header>
			<nav id="site-nav" class="main-navigation" role="navigation">
				<div id="nav-toggle"><h3>Navigation</h3></div>
				<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'container_id' => 'responsive-nav', 'container_class' => 'nav-links' ) ); ?>
			</nav>
			
<?php if ( of_get_option( 'themedev_display_featured_bar' ) ) : ?>
	<?php if ( of_get_option( 'themedev_featured_bar' ) ) : ?>
		<div id="featured-bar" class="row featured-bar">
			<?php echo of_get_option( 'themedev_featured_bar' ); ?>
		</div>
	<?php endif; ?>
<?php endif; ?>
			<div id="main"class="row">