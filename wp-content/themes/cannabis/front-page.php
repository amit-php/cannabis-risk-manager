<?php echo get_header() ; ?>

<!-- banner section  -->
<?php get_template_part('template-part/home/banner'); ?>

<!-- feature articals  -->
<?php get_template_part('template-part/home/featured-articals'); ?>

<!-- Latest news  -->
<?php get_template_part('template-part/home/latest-news'); ?>

    

    

    <section class="upcomming-events-sec common-padd">
        <img class="banner-img" src="<?php echo THEME_DIR; ?>/images/upcommin-events-banner.jpg" alt="upcommin-events-banner">
        <div class="banner-content">
            <div class="container">
                <div class="common-heading">
                    <div class="common-heading-text transparent-bg">
                        <h2 class="transparent-bg"><?php echo get_field('event_title') ?></h2>
                    </div>
                    <div class="common-heading-text transparent-bg right-text">
                        <a href="<?php echo get_field('event_button_link') ?>" class="view-more-btn transparent-bg"><?php echo get_field('event_button_name') ?></a>
                    </div>
                </div>
    
                <div class="row">
                <?php
                $args = array(
                    'post_type' => 'events', // Change 'event' to your custom post type
                    'posts_per_page' => 3,
                    'status' =>'published',  // Limit to 3 posts
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="letest-news-box">
                            <div class="letest-news-img">
                            <a href="<?php echo  the_permalink() ; ?>"><img src="<?php echo get_the_post_thumbnail_url($postIds, 'full') ; ?>" alt="upcomming-events"></a>
                            </div>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                    <li><?php echo get_field('_EventStartDate'); ?></li>
                                </ul>
                                <h4><a href="<?php echo  the_permalink() ; ?>"><?php echo get_the_title(); ?></a></h4>
                                <div class="date-wrapper-main">
                                    <div class="detail-box">
                                        <span><img src="<?php echo THEME_DIR; ?>/images/calender.svg" alt="calender"></span>
                                    </div>
                                    <ul class="date-box">
                                        <li><?php echo get_field('_EventStartDate'); ?> @ <?php echo get_field('start_time'); ?></li>
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <?php } } 
                wp_reset_postdata();
                ?>
                </div>
            </div>
        </div>
    </section>

<!-- risk-management  -->
<?php get_template_part('template-part/home/risk-management'); ?>
    

    <section class="ebook-sec light-green-bg common-padd">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2 class="light-green-bg"><?php echo get_field('ebook_tile'); ?></h2>
                </div>
                <div class="common-heading-text right-text">
                    <a href="<?php echo get_field('ebook_button_link'); ?>" class="view-more-btn light-green-bg"><?php echo get_field('ebook_button_name'); ?>  </a>
                </div>
            </div>

            <div class="row">
            <?php
                $args = array(
                    'post_type' => 'ebook', // Change 'event' to your custom post type
                    'posts_per_page' => 3,  // Limit to 3 posts
                );
                $query = new WP_Query($args);
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                ?>
                <div class="col-lg-4 col-md-4">
                    <a href="#">
                        <div class="ebook-wrapper">
                            <div class="ebook-img">
                            <a href="<?php echo  the_permalink() ; ?>"><img src="<?php echo get_the_post_thumbnail_url($postIds, 'full') ; ?>" alt="ebook-bg"></a>
                            </div>
                            <div class="ebook-title">
                                <h4><a href="<?php echo  the_permalink() ; ?>"><?php echo get_the_title(); ?></a></h4>
                                <p><?php echo get_the_excerpt(); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } } 
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>

    <section class="featured-podcast-sec common-padd">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2><?php echo get_field('podcast_title'); ?></h2>
                </div>
            </div>
            <?php
                $allPost = get_post_by_tag_val("poadcast",4,false,false);
                $postIds= [];
                foreach($allPost as $postval){
                    $check = get_field('select',$postval->ID);
                    if($check){
                    $postIds[] = $postval->ID;
                    }

                }
            ?>      
   
            <div class="row">
                <div class="col-lg-6">
                <?php
               
                if ($postIds) {
                    foreach ($postIds as $key => $valueId) {
                           if($key == 0)  {                      
                ?>
                    <div class="podcast-main-box">
                        <div class="podcast-img">
                        <img src="<?php echo get_the_post_thumbnail_url($valueId, 'full') ; ?>" alt="poadcast-bg">
                        </div>
                        <div class="poadcast-text-box">
                            <div class="poadcastmain-text">
                                <ul class="poadcast-title-tag">
                                    <li>Directed by <?php echo get_field('podcast_host',$valueId); ?></li>
                                </ul>
                                <h3 class="poadcast-title"><?php echo get_the_title($valueId); ?></h3>
                                <p><?php echo get_post_field('post_content',$valueId); ?></p>
                            </div>
                            <!-- <a href="#" class="poadcast-button-box"></a> -->
                        </div>
                    </div>
                    <?php } } }
                ?>
                </div>

                <div class="col-lg-6">
                    <div class="featured-main-box podcast-main-wrapper">
                    <?php
               if ($postIds) {
                   foreach ($postIds as $key => $valueId) {

                          if($key > 0)  {                        
               ?>
                            <div class="featured-img-box">
                                <div class="featured-img">
                                <img src="<?php echo get_the_post_thumbnail_url($valueId, 'full') ; ?>" alt="poadcast-bg">
                                    <!-- <a href="#" class="poadcast-button-box"></a> -->
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>Directed by <?php echo get_field('podcast_host',$valueId); ?></li>
                                    </ul>
                                    <h4><?php echo get_the_title($valueId); ?></h4>
                                    <div class="date-wrapper-main">
                                        <ul class="date-box">
                                            <li><?php echo get_post_field('post_content',$valueId); ?></li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
                            <?php } } }
                                ?>

                        <div class="view-more-artical">
                            <a href="<?php echo get_field('podcast_button_link'); ?>" class="view-more-btn"><?php echo get_field('podcast_button_name'); ?> </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row top-space-60">
                <div class="col-lg-6">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add3.jpg" alt="add-bg">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add4.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-us-sec light-green-bg">
        <div class="container">
            <div class="partical-about-text">
                <h6><?php echo get_field('about_us_title'); ?></h6>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <?php
                    $image = get_field('about_us_image');
                    if($image){
                    ?>
                    <div class="about-img">
                        <img src="<?php echo $image; ?>" alt="about-bg">
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="about-text">
                    <?php echo get_field('about_us_description'); ?>
                        <a href="<?php echo get_field('about_us_button_link'); ?>" class="view-more-btn"><?php echo get_field('about_us_button'); ?> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-part/common/newsletter'); ?>
<?php get_footer() ; ?>