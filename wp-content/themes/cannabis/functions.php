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

// Enqueue a custom stylesheet for the WordPress admin area
function my_custom_admin_styles() {
    wp_enqueue_style('my-admin-style', THEME_DIR . '/css/admin-style.css', array(),'1.0.0');
}
add_action('admin_enqueue_scripts', 'my_custom_admin_styles');

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
    $pages = array(9,19); // Replace with your page IDs

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

add_action('wp_ajax_send_email_and_download_pdf', 'send_email_and_download_pdf');

// Hook for non-logged-in users
add_action('wp_ajax_nopriv_send_email_and_download_pdf', 'send_email_and_download_pdf');

//// EBook Download//////
function send_email_and_download_pdf() {
    // Get the posted data from the AJAX request
    $full_name = sanitize_text_field($_POST['fullName']);
    $email = sanitize_email($_POST['email']);
	$pdf_image = esc_url_raw($_POST['pdf_image']);
    $pdf_file_name = basename($pdf_image);

    // Determine the base URL for the uploads directory
    $upload_dir = wp_get_upload_dir();
    $base_url = $upload_dir['baseurl']; // Base URL for the uploads directory

    // Construct the PDF URL
    $pdf_url = $base_url . '/' . $pdf_file_name;
	// echo $full_name;
    
	 $admin_email = get_option('admin_email');
	// echo $admin_email;
    // Setup the email content
	$to = $admin_email; // The email where form submissions should go
    $subject = "New E-book Request";
    $message = "Full Name: $full_name\nEmail: $email\nPDF File: $pdf_file_name";
    $headers = array('Content-Type: text/html; charset=UTF-8', 'From: no-reply@yourdomain.com');

    // Send email
    if (wp_mail($to, $subject, $message, $headers)) {
        // If email sent successfully, return the PDF URL
        wp_send_json_success(array('pdf_url' => $pdf_url));
    } else {
        wp_send_json_error('Failed to send email.');
    }

    wp_die(); // Required to terminate immediately and return a response
}
function fetch_month_events(){
	$date = $_POST['month'];
	$dateParts = explode('-', $date);
	$year = $dateParts[0]; // 2024
    $month = $dateParts[1]; // 06
	$args = array(
		'post_type'  => 'events', // You can change this to your custom post type
		'post_status' => 'publish',
		'meta_query' => array(
			'relation' => 'AND', // Can be 'AND' or 'OR'
			array(
				'key'     => '_Month', // First meta key
				'value'   => $month,     // First meta value
				'compare' => '=',          // Comparison operator
			),
			array(
				'key'     => '_Year', // Second meta key
				'value'   => $year,           // Second meta value
				'compare' => '=',          // Comparison operator
			),
		),
	);
	
	// Custom query
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post(); 
			$postIds = get_the_ID();
			?>
			    <div class="col-lg-4 col-md-6">
                                    <div class="letest-news-box">
                                        <div class="letest-news-img">
                                        <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($postIds); ?>" alt="upcomming-events"></a>
                                        </div>
                                        <div class="category-details-box">
                                            <ul class="category-tag">
                                                <li><?php echo get_field('_EventStartDate') ; ?></li>
                                            </ul>
                                            <h4><a href="<?php the_permalink();?>"><?php the_title() ; ?></a></h4>
                                            <div class="date-wrapper-main">
                                                <div class="detail-box">
                                                    <span><img src="<?php echo THEME_DIR; ?>/images/calender.svg" alt="calender"></span>
                                                </div>
                                                <ul class="date-box">
                                                    <li><?php echo get_field('_EventStartDate') ; ?> @ <?php echo get_field('start_time') ; ?></li>
                                                </ul>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
<?php 
		} 
		die;
	} else {
		echo "<p class='error_message'>There are no any events in this month.</p>";
		die;
	}
}
add_action('wp_ajax_fetch_month', 'fetch_month_events');
add_action('wp_ajax_nopriv_fetch_month', 'fetch_month_events');
//fetch by day

function fetch_day_events(){
	$date = $_POST['day'];
	//echo $date;
	//die;
	$dateParts = explode('-', $date);
	$year = $dateParts[0]; // 2024
    $month = $dateParts[1]; // 06
	$day = $dateParts[2]; // 06
	$args = array(
		'post_type'  => 'events', // You can change this to your custom post type
		'post_status' => 'publish',
		'meta_query' => array(
			'relation' => 'AND', // Can be 'AND' or 'OR'
			array(
				'key'     => '_Month', // First meta key
				'value'   => $month,     // First meta value
				'compare' => '=',          // Comparison operator
			),
			array(
				'key'     => '_Year', // Second meta key
				'value'   => $year,           // Second meta value
				'compare' => '=',          // Comparison operator
			),
			array(
				'key'     => '_Day', // Second meta key
				'value'   => $day,           // Second meta value
				'compare' => '=',          // Comparison operator
			),
		),
	);
	
	// Custom query
	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		while ( $query->have_posts() ) {
			$query->the_post(); 
			$postIds = get_the_ID();
			?>
			    <div class="col-lg-4 col-md-6">
                                    <div class="letest-news-box">
                                        <div class="letest-news-img">
                                        <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($postIds); ?>" alt="upcomming-events"></a>
                                        </div>
                                        <div class="category-details-box">
                                            <ul class="category-tag">
                                                <li><?php echo get_field('_EventStartDate') ; ?></li>
                                            </ul>
                                            <h4><a href="<?php the_permalink();?>"><?php the_title() ; ?></a></h4>
                                            <div class="date-wrapper-main">
                                                <div class="detail-box">
                                                    <span><img src="<?php echo THEME_DIR; ?>/images/calender.svg" alt="calender"></span>
                                                </div>
                                                <ul class="date-box">
                                                    <li><?php echo get_field('_EventStartDate') ; ?> @ <?php echo get_field('start_time') ; ?></li>
                                                </ul>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
<?php 
		} 
		die;
	} else {
		echo "<p class='error_message'>There are no any events in this day.</p>";
		die;
	}
}
add_action('wp_ajax_fetch_day', 'fetch_day_events');
add_action('wp_ajax_nopriv_fetch_day', 'fetch_day_events');


