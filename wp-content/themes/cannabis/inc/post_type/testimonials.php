<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_testimonials_Post_Type')) :
    class WeaversWeb_testimonials_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'testimonials_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function testimonials_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('Testimonials', 'WeaversWeb'),
                'singular_name' => __('Testimonials', 'WeaversWeb'),
                'add_new' => __('Add New', 'WeaversWeb'),
                'add_new_item' => __('Add New Testimonials', 'WeaversWeb'),
                'edit_item' => __('Edit Testimonials', 'WeaversWeb'),
                'new_item' => __('Add New Testimonials', 'WeaversWeb'),
                'view_item' => __('View Testimonials', 'WeaversWeb'),
                'search_items' => __('Search Testimonials', 'WeaversWeb'),
                'not_found' => __('No Testimonials found', 'WeaversWeb'),
                'not_found_in_trash' => __('No Testimonials found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-format-chat',
                'rewrite' => array('slug' => 'testimonials'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail')
            );

            $args = apply_filters('WeaversWeb_testimonials_args', $args);
            register_post_type('testimonials', $args);


            // Add new Class Type taxonomy,NOT hierarchical(like tags)
            $labels_one = array(
                'name' => _x('Testimonials Categories', 'taxonomy general name'),
                'singular_name' => _x('Testimonials Type', 'taxonomy singular name'),
                'search_items' => __('Search Testimonials Types'),
                'popular_items' => __('Popular Testimonials Types'),
                'all_items' => __('All Testimonials Types'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Edit Testimonials Type'),
                'update_item' => __('Update Testimonials Type'),
                'add_new_item' => __('Add New Testimonials Categories'),
                'new_item_name' => __('New Testimonials Type Name'),
                'separate_items_with_commas' => __('Separate Testimonials types with commas'),
                'add_or_remove_items' => __('Add or remove Testimonials types'),
                'choose_from_most_used' => __('Choose from the most used Testimonials types'),
                'not_found' => __('No Testimonials types found.'),
                'menu_name' => __('Testimonials Categories'),
            );

            $args_one = array(
                'hierarchical' => true,
                'labels' => $labels_one,
                'show_ui' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'testimonials-type'),
            );

            //register_taxonomy('testimonials_type', 'testimonials', $args_one);
        }
    }
    new WeaversWeb_testimonials_Post_Type;
endif;
