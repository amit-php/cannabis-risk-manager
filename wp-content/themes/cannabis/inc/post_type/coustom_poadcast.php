<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_poadcast_Post_Type')) :
    class WeaversWeb_poadcast_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'poadcast_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function poadcast_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('Poadcast', 'WeaversWeb'),
                'singular_name' => __('poadcast', 'WeaversWeb'),
                'add_new' => __('Add Poadcast', 'WeaversWeb'),
                'add_new_item' => __('Add New poadcast', 'WeaversWeb'),
                'edit_item' => __('Edit poadcast', 'WeaversWeb'),
                'new_item' => __('Add New poadcast', 'WeaversWeb'),
                'view_item' => __('View poadcast', 'WeaversWeb'),
                'search_items' => __('Search poadcast', 'WeaversWeb'),
                'not_found' => __('No poadcast found', 'WeaversWeb'),
                'not_found_in_trash' => __('No poadcast found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-admin-site',
                'rewrite' => array('slug' => 'poadcast'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail')
            );

            $args = apply_filters('WeaversWeb_poadcast_args', $args);
            register_post_type('poadcast', $args);
        }
    }
    new WeaversWeb_poadcast_Post_Type;
endif;
