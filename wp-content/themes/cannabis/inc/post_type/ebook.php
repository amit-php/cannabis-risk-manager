<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_ebook_Post_Type')) :
    class WeaversWeb_ebook_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'ebook_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function ebook_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('Ebook', 'WeaversWeb'),
                'singular_name' => __('Ebook', 'WeaversWeb'),
                'add_new' => __('Add New', 'WeaversWeb'),
                'add_new_item' => __('Add New ebook', 'WeaversWeb'),
                'edit_item' => __('Edit ebook', 'WeaversWeb'),
                'new_item' => __('Add New ebook', 'WeaversWeb'),
                'view_item' => __('View ebook', 'WeaversWeb'),
                'search_items' => __('Search ebook', 'WeaversWeb'),
                'not_found' => __('No ebook found', 'WeaversWeb'),
                'not_found_in_trash' => __('No ebook found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-book',
                'rewrite' => array('slug' => 'ebook'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail','excerpt')
            );

            $args = apply_filters('WeaversWeb_ebook_args', $args);
            register_post_type('ebook', $args);
        }
    }
    new WeaversWeb_ebook_Post_Type;
endif;
