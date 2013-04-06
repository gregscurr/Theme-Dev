<?php

if ( ! isset( $content_width ) ) $content_width = 755;
	function register_td_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'extra-menu' => __( 'Extra Menu' ),
				'head-menu' => __( 'Head Bar Menu' )
			)
		);
	}
	add_action( 'init', 'register_td_menus' );
	
	
	// Register Sidebars
	// Primary, Left Footer, Right Footer
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'name' => 'Primary Sidebar',
	'id' => 'primary-sidebar',
	'description' => 'Appears to the right of the content area.',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
	));
	}
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'name' => 'Left Footer Widgets',
	'id' => 'left-footer',
	'description' => 'Appears as the left footer widget area.',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>',
	));
	}
	if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	'name' => 'Right Footer Widgets',
	'id' => 'right-footer',
	'description' => 'Appears as the right footer widget area.',
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h3 class="widgettitle">',
	'after_title' => '</h3>',
	));
	}

// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 
 

 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
 
function td_load_javascript_files() {
 
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'responsive-nav', get_template_directory_uri() . '/js/responsive-nav.js', array('jquery'), '1.0', true);
}
add_action( 'wp_enqueue_scripts', 'td_load_javascript_files' );



// options framework
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}


?>