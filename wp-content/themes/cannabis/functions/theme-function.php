<?php 

//get post info by id
 function get_post_info(int $postId) {
    $post = get_post($postId);
    $post->post_type = ucwords(strtolower($post->post_type));
     // Get categories associated with the post
   // Get custom taxonomy terms (if any)
   //$custom_terms = wp_get_post_terms($post_id, 'news_type'); // Replace 'your_custom_taxonomy' with the actual custom taxonomy
   //$post['custom_terms'] = !empty($custom_terms) && !is_wp_error($custom_terms) ? $custom_terms : [];
   $terms = wp_get_post_terms($postId, 'news_type');

   // Check if terms were retrieved successfully
   if (!empty($terms) && !is_wp_error($terms)) {
       // Extract the 'name' of each term
       $term_names = array_map(function($term) {
           return $term->name;
       }, $terms);

       // Combine the names with a space between them
       $combined_names = implode(' ', $term_names);

       // Output the combined term names
       $post->catType = $combined_names; // Outputs: "News type Politics"
   } 
   //post link 
   $permalink = get_the_permalink($postId);
   $post->link = $permalink;
   return $post;
}