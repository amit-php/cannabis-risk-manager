<?php 

//get post info by id
 function get_post_info(int $postId) {
    $post = get_post($postId);
    $post->post_type = ucwords(strtolower($post->post_type));
     // Get categories associated with the post
   $terms = wp_get_post_terms($postId, 'news_type');

   // Check if terms were retrieved successfully
   if (!empty($terms) && !is_wp_error($terms)) {
       // Extract the 'name' of each term
       $term_names = array_map(function($term) {
           return $term->name;
       }, $terms);
       // Combine the names with a space between them
       $combined_names = $term_names;

       // Output the combined term names
       $post->catType = $combined_names; // Outputs: "News type Politics"
   } 
   //post link 
   $permalink = get_the_permalink($postId);
   $post->link = $permalink;
   //post author
   $postAuthorId = get_post_field('post_author',$postId);
   $authorInfo = [];
   if($postAuthorId){
    $first_name = get_user_meta($postAuthorId, 'first_name', true);
    $last_name = get_user_meta($postAuthorId, 'last_name', true);
    $full_name = trim($first_name . ' ' . $last_name);
    $userImageId = get_user_meta($postAuthorId,"add_profile_image",true);
    $imagUrl   = wp_get_attachment_url( $userImageId );
    $authorInfo = [
        "id"=>$postAuthorId,
        "name"=>$full_name,
        "profileImage"=>$imagUrl,
    ];
   }
   $post->author = $authorInfo;
   //post date 
   $date = new DateTime($post->post_date);
   $formatted_date = $date->format('d M Y');
   $now = new DateTime(); // Current date and time
   $interval = $now->diff($date);
   if($interval && ($interval->h <= 48) ){
    $post->interval = $interval->h . ' hours ago';
   }
   $post->customdate = $formatted_date;

    //post thumbnail
    $postImage = get_the_post_thumbnail_url($postId, 'full');
    $post->thumbnailUrl = $postImage;

  
   return $post;
}

// Function to track post views
function track_post_views($post_id) {
    if (!is_single()) return; // Only track views on single posts

    $views = get_post_meta($post_id, 'post_views_count', true);
    
    // If no views exist, set it to 0
    if ($views == '') {
        $views = 0;
        delete_post_meta($post_id, 'post_views_count');
        add_post_meta($post_id, 'post_views_count', 0);
    } else {
        $views++;
        update_post_meta($post_id, 'post_views_count', $views);
    }
}

// Hook the function to track views
function track_post_views_on_load($post_id) {
    if (!is_single()) return; // Only track views on single posts
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    track_post_views($post_id);
}
add_action('wp_head', 'track_post_views_on_load');

// To prevent counting multiple views from the same user, disable it for logged-in users or bots
function exclude_bots_and_logged_in_users() {
    if (is_user_logged_in()) return true;
    if (isset($_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'], 'bot') !== false) return true;
    return false;
}

// Function to display popular posts
function get_popular_posts($number_of_posts,$postType) {
    $args = array(
        'posts_per_page' => $number_of_posts, // Number of posts to retrieve
        'meta_key'       => 'post_views_count', // Meta key to query
        'orderby'        => 'meta_value_num', // Order by the numeric meta value
        'order'          => 'DESC', // Highest view counts first
        'post_type'      => $postType, // Post type to query (e.g., posts)
        'post_status'    => 'publish', // Only published posts
    );
    
    $popular_posts = get_posts($args);
    return $popular_posts ; 

    
}
// get all post
function get_all_post_details($numberposts,$postType){
    $args = array(
        'numberposts' => $numberposts, 
        'post_type'   => $postType, 
        'post_status' => 'publish', 
        'orderby'     => 'date', 
        'order'       => 'DESC',
    );
    
    $latest_posts = get_posts($args);
    return $latest_posts ;
}

