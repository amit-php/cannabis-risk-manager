<?php

/*****************************************
 * Weaver's Web Functions & Definitions *

/* Optional Panel Helper Functions
/*--------------------------------------*/
define('THEME_DIR', get_template_directory_uri() . '/assets');

foreach (glob(get_template_directory() . '/functions/*.php') as $files) {
	include_once $files;
}

/* Post Type Helper Functions
/*--------------------------------------*/

foreach (glob(get_template_directory() . '/inc/post_type/*.php') as $file) {
	include_once $file;
}

function weaversweb_ftn_get_option($name)
{
	$options = get_option('weaversweb_ftn_options');
	if (isset($options[$name]))
		return $options[$name];
}
function weaversweb_ftn_update_option($name, $value)
{
	$options = get_option('weaversweb_ftn_options');
	$options[$name] = $value;
	return update_option('weaversweb_ftn_options', $options);
}
function weaversweb_ftn_delete_option($name)
{
	$options = get_option('weaversweb_ftn_options');
	unset($options[$name]);
	return update_option('weaversweb_ftn_options', $options);
}
function get_theme_value($field)
{
	$field1 = weaversweb_ftn_get_option($field);
	if (!empty($field1)) {
		$field_val = $field1;
	}
	return $field_val;
}


/*--------------------------------------*/
/* Theme Helper Functions
/*--------------------------------------*/
if (!function_exists('weaversweb_theme_setup')) :
	function weaversweb_theme_setup()
	{
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');
		register_nav_menus(
			array(
				'primary' => __('Primary Menu', 'weaversweb'),
				'secondary' => __('Secondary Menu', 'weaversweb'),
			)
		);

		add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
	}
endif;
add_action('after_setup_theme', 'weaversweb_theme_setup');

// enque theme style and script
function weaversweb_scripts()
{
	wp_enqueue_style('bootstrap.min', THEME_DIR . '/css/bootstrap.min.css', array());
	wp_enqueue_style('font-awesome-all-min', THEME_DIR . '/css/font-awesome.min.css', array());
	wp_enqueue_style('owl-css', THEME_DIR . '/css/owl.carousel.min.css', array());
	wp_enqueue_style('owl-theme', THEME_DIR . '/css/owl.theme.default.min.css', array());
	wp_enqueue_style('animate', THEME_DIR . '/css/aos.css', array());
	wp_enqueue_style('custom.css', THEME_DIR . '/css/custom.css', array());
	global $wp_scripts;
	wp_enqueue_script('bootstrap-bundle-min-js', THEME_DIR . '/js/bootstrap.bundle.min.js', array('jquery'), false);
	wp_enqueue_script('font-awesome-all-min-js', THEME_DIR . '/js/font-awesome-all.min.js', array('jquery'), false);
	wp_enqueue_script('owl-carousel-min', THEME_DIR . '/js/owl.carousel.min.js', array('jquery'), false);
	wp_enqueue_script('PLAYER-js', 'https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js', array('jquery'), false);
	wp_enqueue_script('AOS-js', THEME_DIR . '/js/aos.js', array('jquery'), false);
	wp_enqueue_script('custom-js', THEME_DIR . '/js/custom.js', array(), 1, 1, 1);
}
add_action('wp_enqueue_scripts', 'weaversweb_scripts');
//** SVG format supporter

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype($filename, $mimes);
	return [
		'ext' => $filetype['ext'],
		'type' => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];
}, 10, 4);

function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

function fix_svg()
{
	echo '<style type="text/css">
		  .attachment-266x266, .thumbnail img {
			   width: 100% !important;
			   height: auto !important;
		  }
		  </style>';
}
add_action('admin_head', 'fix_svg');

function remove_editor_from_specific_pages() {
    // List of page IDs where the editor should be removed
    $pages = array(9); // Replace with your page IDs

    // Check if we are in the admin area and editing a page
    if (is_admin()) {
        global $pagenow;
        
        if ($pagenow == 'post.php' || $pagenow == 'post-new.php') {
            $post_id = isset($_GET['post']) ? $_GET['post'] : '';

            // If the page ID is in the array, remove the editor
            if (in_array($post_id, $pages)) {
                remove_post_type_support('page', 'editor');
            }
        }
    }
}
add_action('admin_init', 'remove_editor_from_specific_pages');

