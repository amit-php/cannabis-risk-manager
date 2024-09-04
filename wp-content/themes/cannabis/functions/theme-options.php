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

			array(
				"name" => "Header Phone Icon",
				"desc" => "Choose Phone icon",
				"id" => "renovesa_phone_icon",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Header Phone Number",
				"desc" => "Enter Phone Number",
				"id" => "renovesa_phone_no",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Header Email Icon",
				"desc" => "Choose Email Icon",
				"id" => "renovesa_email_icon",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Header Email Address",
				"desc" => "Enter Email Address",
				"id" => "renovesa_email_id",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Header Contact Us Button Text",
				"desc" => "Enter Text",
				"id" => "rheader_contact_text",
				"std" => "",
				"type" => "text"
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
				"name" => "Footer Description",
				"desc" => "Enter Footer Description",
				"id" => "ren_footer_desc",
				"std" => "",
				"type" => "textarea"
			),


			array(
				"name" => "Footer Contact Info Title",
				"desc" => "Enter Footer Contact Info Title",
				"id" => "ren_footer_ci_title",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Footer Contact No",
				"desc" => "Enter Footer Contact No",
				"id" => "ren_footer_phone_no",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Footer Email",
				"desc" => "Enter Footer Email",
				"id" => "ren_footer_email",
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
				"name" => "Footer Resources Title",
				"desc" => "Enter Resources Title",
				"id" => "ren_footer_resources_title",
				"std" => "",
				"type" => "text"
			),



			array(
				"name" => "Footer Follow Us Title",
				"desc" => "Enter Follow Us Title",
				"id" => "ren_footer_follow_us_title",
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


			////////////////////////////social link//////////////////////////////////////////////////////
			array(
				"name" => "Social link Section",
				"type" => "heading"
			),
			array(
				"name" => " Facebook Title",
				"desc" => "Enter Facebook Title",
				"id" => "renovesa_fb_title",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => " Facebook Icon",
				"desc" => "Choose facebook Icon",
				"id" => "renovesa_fb_icon",
				"std" => "",
				"type" => "upload"
			),
			array(
				"name" => "Facebook Link",
				"desc" => "Enter Facebook Link",
				"id" => "rheader_facebook_link",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Twitter Title",
				"desc" => "Enter Twitter Title",
				"id" => "renovesa_tw_title",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Twitter Icon",
				"desc" => "Choose twitter Icon",
				"id" => "renovesa_twit_icon",
				"std" => "",
				"type" => "upload"
			),
			array(
				"name" => "Twitter Link",
				"desc" => "Enter Twitter Link",
				"id" => "rheader_twitter_link",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Linkedin Title",
				"desc" => "Enter Linkedin Title",
				"id" => "renovesa_ln_title",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Linkedin Icon",
				"desc" => "Choose linkedin Icon",
				"id" => "renovesa_lin_icon",
				"std" => "",
				"type" => "upload"
			),
			array(
				"name" => "Linkdin Link",
				"desc" => "Enter Linkdin Link",
				"id" => "rheader_linkdin_link",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Arrow Image",
				"desc" => "Choose Image",
				"id" => "rheader_arrow_img",
				"std" => "",
				"type" => "upload"
			),


			//////////////////////////////contact section/////////////////////////////////////////
			array(
				"name" => "Contact Section",
				"type" => "heading"
			),
			array(
				"name" => "Contact Us Title",
				"desc" => "Enter Contact Us Title",
				"id" => "renovesa_contact_title",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Get In Touch Title",
				"desc" => "Enter Get In Touch Title",
				"id" => "renovesa_getintouch_title",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Get In Touch Subtitle",
				"desc" => "Enter Get In Touch Subtitle",
				"id" => "renovesa_getintouch_subtitle",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Contact Us Image",
				"desc" => "Choose Image",
				"id" => "contact_us_img",
				"std" => "",
				"type" => "upload"
			),
			array(
				"name" => "Contact Us Form Short Code",
				"desc" => "Insert Short Code",
				"id" => "contact_us_shortcode",
				"std" => "",
				"type" => "text"
			),
			////////////Question & Answer Popup///////////////////////////////////////
			//////////////////1.First Question/////////////////////////////////////
			array(
				"name" => "Question One Lable",
				"desc" => "Enter Your First Question",
				"id" => "cfst_qstn",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Question One First Option Image",
				"desc" => "Choose Image",
				"id" => "cfst_qstn_fst_img",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Question One First Option Title",
				"desc" => "Enter the first option for question one",
				"id" => "cfst_qstn_fst_title",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Question One Second Option Image",
				"desc" => "Choose Image",
				"id" => "cfst_qstn_snd_img",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Question One Second Option Title",
				"desc" => "Enter the second option for question one",
				"id" => "cfst_qstn_snd_title",
				"std" => "",
				"type" => "text"
			),

			//////////////////2.Second Question/////////////////////////////////////
			array(
				"name" => "Question Two Lable",
				"desc" => "Enter Your second Question",
				"id" => "csnd_qstn",
				"std" => "",
				"type" => "text"
			),
			array(
				"name" => "Question Two First Option Image",
				"desc" => "Choose Image",
				"id" => "csnd_qstn_fst_img",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Question Two First Option Title",
				"desc" => "Enter the first option for question two",
				"id" => "csnd_qstn_fst_title",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Question Two Second Option Image",
				"desc" => "Choose Image",
				"id" => "csnd_qstn_snd_img",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Question Two Second Option Title",
				"desc" => "Enter the second option for question two",
				"id" => "csnd_qstn_snd_title",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Question Two Third Option Image",
				"desc" => "Choose Image",
				"id" => "csnd_qstn_third_img",
				"std" => "",
				"type" => "upload"
			),

			array(
				"name" => "Question Two Third Option Title",
				"desc" => "Enter the third option for question two",
				"id" => "csnd_qstn_third_title",
				"std" => "",
				"type" => "text"
			),

			//////////////////////////blog section (single page)////////////////////////////
			array(
				"name" => "Blogs Section",
				"type" => "heading"
			),
			array(
				"name" => "Related Blogs Heading",
				"desc" => "Enter Related Blogs Heading",
				"id" => "ren_blog_head",
				"std" => "",
				"type" => "text"
			),

			array(
				"name" => "Related Blogs Subheading",
				"desc" => "Enter Related Blogs SubHeading",
				"id" => "ren_blog_sub_head",
				"std" => "",
				"type" => "text"
			),

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
