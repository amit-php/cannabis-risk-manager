<?php
add_action('init', 'weaversweb_ftn_options');
if (!function_exists('weaversweb_ftn_options')) {
	function weaversweb_ftn_options()
	{
		// If using image radio buttons,define a directory path
		$imagepath = get_stylesheet_directory_uri() . '/images/';
		$options = array(
			/* ---------------------------------------------------------------------------- */
			/* Header Section */
			/* ---------------------------------------------------------------------------- */
			array(
				"name" => "Header Section",
				"type" => "heading"
			),
			array(
				"name" => "Header Logo",
				"desc" => "Choose Site Header Logo",
				"id" => "renovesa_header_logo",
				"std" => "",
				"type" => "upload"
			),
			array(
				"name" => "Header Favicon",
				"desc" => "Choose Site Favicon ",
				"id" => "renovesa_favicon",
				"std" => "",
				"type" => "upload"
			),


			/* Header Section end*/
			/* ---------------------------------------------------------------------------- */

			/* Footer Setting */
			/* ---------------------------------------------------------------------------- */
			array(
				"name" => "Footer Section",
				"type" => "heading"
			),

			array(
				"name" => "Footer Logo",
				"desc" => "Choose Site Footer Logo",
				"id" => "renovesa_footer_logo",
				"std" => "",
				"type" => "upload"
			),


			array(
				"name" => "Footer Contact No",
				"desc" => "Enter Footer Contact No",
				"id" => "ren_footer_phone_no",
				"std" => "",
				"type" => "text"
			),

		
			array(
				"name" => "Footer Address",
				"desc" => "Enter Footer Address",
				"id" => "ren_footer_address",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Copyright Text",
				"desc" => "Enter Copyright Text",
				"id" => "ren_copyright_text",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Terms & Condition Title",
				"desc" => "Terms & Condition Title",
				"id" => "ren_term_text",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Terms & Condition Link",
				"desc" => "Enter Terms & Condition Link",
				"id" => "ren_term_link",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Privacy Policy Title",
				"desc" => "Privacy Policy Title",
				"id" => "ren_privicy_text",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Privacy Policy Link",
				"desc" => "Enter Privacy Policy Link",
				"id" => "ren_privicy_link",
				"std" => "",
				"type" => "text"
			),


			////////////////////////////social link//////////////////////////////////////////////////////
			array(
				"name" => "Social link Section",
				"type" => "heading"
			),
			array(
				"name" => "Newsletter title",
				"desc" => "Enter Newsletter title",
				"id" => "rheader_newsletter_title",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Newsletter Link",
				"desc" => "Enter Newsletter link",
				"id" => "rheader_newsletter_link",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Facebook Link",
				"desc" => "Enter Facebook Link",
				"id" => "rheader_facebook_link",
				"std" => "",
				"type" => "text"
			),

			
			array(
				"name" => "Twitter Link",
				"desc" => "Enter Twitter Link",
				"id" => "rheader_twitter_link",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "youtube Link",
				"desc" => "Enter youtube Link",
				"id" => "rheader_youtube_link",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Linkdin Link",
				"desc" => "Enter Linkdin Link",
				"id" => "rheader_linkdin_link",
				"std" => "",
				"type" => "text"
			),
		
			


		

			//////////////////2.Second Question/////////////////////////////////////
			

			//////////////////////////blog section (single page)////////////////////////////
			

			//////////button section//////////////////////////

			array(
				"name" => "Button Section",
				"type" => "heading"
			),
			array(
				"name" => "Learn More Button Title For Blog",
				"desc" => "Enter Learn More Button Title For Blog",
				"id" => "ln_btn_blog",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Learn More Button Title For Product",
				"desc" => "Enter Learn More Button Title For Product",
				"id" => "ln_btn_product",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Testimonials Section",
				"type" => "heading"
			),

			array(
				"name" => "Testimonial title",
				"desc" => "Enter Testimonial title",
				"id" => "testimonial_title",
				"std" => "",
				"type" => "text"
			),


		);
		weaversweb_ftn_update_option('of_template', $options);
	}
}
