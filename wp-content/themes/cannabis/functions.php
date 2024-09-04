<?php

/*****************************************
 * Weaver's Web Functions & Definitions *

/* Optional Panel Helper Functions
/*--------------------------------------*/
foreach (glob(get_template_directory() . '/functions/*.php') as $files) {
	include_once $files;
}


/* Post Type Helper Functions
/*--------------------------------------*/

foreach (glob(get_template_directory() . '/inc/post_type/*.php') as $file) {
	include_once $file;
}


function weaversweb_ftn_wp_enqueue_scripts()
{
	if (!is_admin()) {
		wp_enqueue_script('jquery');
		if (is_singular() and get_site_option('thread_comments')) {
			wp_print_scripts('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'weaversweb_ftn_wp_enqueue_scripts');
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




function weaversweb_scripts()
{
	wp_enqueue_style('bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array());
	wp_enqueue_style('validator-css', 'https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css', array());
	wp_enqueue_style('font-awesome-all-min', get_template_directory_uri() . '/assets/css/font-awesome-all.min.css', array());
	wp_enqueue_style('owl-css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array());
	wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array());
	wp_enqueue_style('animate', get_template_directory_uri() . '/assets/css/animate.min.css', array());
	wp_enqueue_style('custom.css', get_template_directory_uri() . '/assets/css/custom.css', array());
	// Load the Internet Explorer specific script.

	global $wp_scripts;




	wp_enqueue_script('bootstrap-bundle-min-js', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array('jquery'), false);

	//wp_enqueue_script('boot', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js');
	wp_enqueue_script('font-awesome-all-min-js', get_template_directory_uri() . '/assets/js/font-awesome-all.min.js', array('jquery'), false);
	wp_enqueue_script('owl-carousel-min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), false);
	wp_enqueue_script('validator-js', 'https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js', array('jquery'), false);
	wp_enqueue_script('boots-validator-js', 'https://hostssb.weavers-web.com/wp-content/themes/hostssb/assets/js/bootstrap-validation.js', array('jquery'), false);

	wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/custom.js', array(), 1, 1, 1);
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
