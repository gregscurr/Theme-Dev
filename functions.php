<?php

if ( ! isset( $content_width ) ) $content_width = 755;
	function register_td_menus() {
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'extra-menu' => __( 'Extra Menu' )
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
 
  wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array('jquery'), '1.9.1' );
  wp_enqueue_script( 'responsive-nav', get_template_directory_uri() . '/js/responsive-nav.js', array('jquery'), '1.0' );
}
add_action( 'wp_enqueue_scripts', 'td_load_javascript_files' );

/* Define the custom box */
// Add the Meta Box
function add_custom_meta_box() {
    add_meta_box(
		'custom_meta_box', // $id
		'Custom Meta Box', // $title 
		'show_custom_meta_box', // $callback
		'post', // $page
		'normal', // $context
		'high'); // $priority
}

add_action('add_meta_boxes', 'add_custom_meta_box');
  
// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
	array(
		'label'=> 'Custom Title Tag',
		'desc'	=> 'Use this box to add a custom Title tag to your page.',
		'id'	=> $prefix.'text',
		'type'	=> 'text'
	),
	array(
		'label'=> 'Meta Description',
		'desc'	=> 'Enter a meta description to the page.',
		'id'	=> $prefix.'textarea',
		'type'	=> 'textarea'
	),
	array(
		'label'=> 'Checkbox Input',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'checkbox',
		'type'	=> 'checkbox'
	),
	array(
		'label'=> 'Select Box',
		'desc'	=> 'A description for the field.',
		'id'	=> $prefix.'select',
		'type'	=> 'select',
		'options' => array (
			'one' => array (
				'label' => 'Option One',
				'value'	=> 'one'
			),
			'two' => array (
				'label' => 'Option Two',
				'value'	=> 'two'
			),
			'three' => array (
				'label' => 'Option Three',
				'value'	=> 'three'
			)
		)
	)
);

// The Callback
function show_custom_meta_box() {
global $custom_meta_fields, $post;
// Use nonce for verification
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
	
	// Begin the field table and loop
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// case items will go here
					// text
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
							<br /><span class="description">'.$field['desc'].'</span>';
					break;

					// textarea
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
							<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// textarea
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
							<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// select
					case 'select':
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
						foreach ($field['options'] as $option) {
							echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';
						}
						echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;


				} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}
 
// Save the Data
function save_custom_meta($post_id) {
    global $custom_meta_fields;
	
	// verify nonce
	if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}
	
	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // end foreach
}
add_action('save_post', 'save_custom_meta');  


// options framework
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}


?>