<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_news_Post_Type')) :
    class WeaversWeb_news_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'news_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function news_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('News', 'WeaversWeb'),
                'singular_name' => __('news', 'WeaversWeb'),
                'add_new' => __('Add New', 'WeaversWeb'),
                'add_new_item' => __('Add New news', 'WeaversWeb'),
                'edit_item' => __('Edit news', 'WeaversWeb'),
                'new_item' => __('Add New news', 'WeaversWeb'),
                'view_item' => __('View news', 'WeaversWeb'),
                'search_items' => __('Search news', 'WeaversWeb'),
                'not_found' => __('No news found', 'WeaversWeb'),
                'not_found_in_trash' => __('No news found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-admin-site',
                'rewrite' => array('slug' => 'news'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail')
            );

            $args = apply_filters('WeaversWeb_news_args', $args);
            register_post_type('news', $args);


            // Add new Class Type taxonomy,NOT hierarchical(like tags)
            $labels_one = array(
                'name' => _x('news Categories', 'taxonomy general name'),
                'singular_name' => _x('news Type', 'taxonomy singular name'),
                'search_items' => __('Search news Types'),
                'popular_items' => __('Popular news Types'),
                'all_items' => __('All news Types'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Edit news Type'),
                'update_item' => __('Update news Type'),
                'add_new_item' => __('Add New news Categories'),
                'new_item_name' => __('New news Type Name'),
                'separate_items_with_commas' => __('Separate news types with commas'),
                'add_or_remove_items' => __('Add or remove news types'),
                'choose_from_most_used' => __('Choose from the most used news types'),
                'not_found' => __('No news types found.'),
                'menu_name' => __('news Categories'),
            );

            $args_one = array(
                'hierarchical' => true,
                'labels' => $labels_one,
                'show_ui' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'news-type'),
            );

            register_taxonomy('news_type', 'news', $args_one);
        }
    }
    new WeaversWeb_news_Post_Type;
endif;
