<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_learning_Post_Type')) :
    class WeaversWeb_learning_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'learning_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function learning_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('Learning', 'WeaversWeb'),
                'singular_name' => __('Learning', 'WeaversWeb'),
                'add_new' => __('Add New', 'WeaversWeb'),
                'add_new_item' => __('Add New learning', 'WeaversWeb'),
                'edit_item' => __('Edit learning', 'WeaversWeb'),
                'new_item' => __('Add New learning', 'WeaversWeb'),
                'view_item' => __('View learning', 'WeaversWeb'),
                'search_items' => __('Search learning', 'WeaversWeb'),
                'not_found' => __('No learning found', 'WeaversWeb'),
                'not_found_in_trash' => __('No learning found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-book',
                'rewrite' => array('slug' => 'learning'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail','excerpt')
            );

            $args = apply_filters('WeaversWeb_learning_args', $args);
            register_post_type('learning', $args);
        }
    }
    new WeaversWeb_learning_Post_Type;
endif;
