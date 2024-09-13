<?php

/***
 * Display Post Type
 ***/
if (!class_exists('WeaversWeb_events_Post_Type')) :
    class WeaversWeb_events_Post_Type
    {

        function __construct()
        {
            // Adds the class post type and taxonomies
            add_action('init', array(&$this, 'events_init'), 0);
            // Thumbnail support for workouts posts
            //add_theme_support('post-thumbnails',array('workouts'));
        }

        function events_init()
        {
            /**
             * Enable the display_init custom post type
             * http://codex.wordpress.org/Function_Reference/register_post_type
             */
            $labels = array(
                'name' => __('events', 'WeaversWeb'),
                'singular_name' => __('events', 'WeaversWeb'),
                'add_new' => __('Add New', 'WeaversWeb'),
                'add_new_item' => __('Add New events', 'WeaversWeb'),
                'edit_item' => __('Edit events', 'WeaversWeb'),
                'new_item' => __('Add New events', 'WeaversWeb'),
                'view_item' => __('View events', 'WeaversWeb'),
                'search_items' => __('Search events', 'WeaversWeb'),
                'not_found' => __('No events found', 'WeaversWeb'),
                'not_found_in_trash' => __('No events found in trash', 'WeaversWeb')
            );

            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => 'dashicons-book',
                'rewrite' => array('slug' => 'events'),
                'map_meta_cap' => true,
                'hierarchical' => false,
                'menu_position' => 4,
                'supports' => array('title', 'editor', 'thumbnail')
            );

            $args = apply_filters('WeaversWeb_events_args', $args);
            register_post_type('events', $args);

                        // Add new Class Type taxonomy,NOT hierarchical(like tags)
            $labels_one = array(
                'name' => _x('events Categories', 'taxonomy general name'),
                'singular_name' => _x('events Type', 'taxonomy singular name'),
                'search_items' => __('Search events Types'),
                'popular_items' => __('Popular events Types'),
                'all_items' => __('All events Types'),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => __('Edit events Type'),
                'update_item' => __('Update events Type'),
                'add_new_item' => __('Add New events Categories'),
                'new_item_name' => __('New events Type Name'),
                'separate_items_with_commas' => __('Separate events types with commas'),
                'add_or_remove_items' => __('Add or remove events types'),
                'choose_from_most_used' => __('Choose from the most used events types'),
                'not_found' => __('No events types found.'),
                'menu_name' => __('events Categories'),
            );

            $args_one = array(
                'hierarchical' => true,
                'labels' => $labels_one,
                'show_ui' => true,
                'show_admin_column' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'events-type'),
            );

            register_taxonomy('events_type', 'events', $args_one);
        }
    }
    new WeaversWeb_events_Post_Type;
endif;
