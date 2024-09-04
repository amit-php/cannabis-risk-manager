<?php get_header();
$post_id = get_queried_object_id();
if (have_posts()) {
    while (have_posts()) {
        the_post(); ?>
        <section class="blog-details common-padd">
            <div class="container">
                <div class="heading-top">
                    <p>
                        <?php echo get_the_date('F j,Y') ?>
                    </p>
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                </div>
                <div class="row">
                    <?php if (has_post_thumbnail()) {
                        $img = get_the_post_thumbnail_url(); ?>
                        <div class="col-lg-12">
                            <div class="blog-details-img">
                                <img src="<?php echo $img; ?>" alt="#" class="img-fluid">
                            </div>
                        </div>
                    <?php }
                    $content = get_the_content();
                    if (!empty($content)) {
                        ?>
                        <div class="b-details-text">
                            <?php echo $content; ?>
                        </div>
                    <?php } ?>
                    <div class="middle-heading">
                        <?php
                        $coaching_experience_title = get_post_meta(get_the_ID(), 'coaching_experience_title', true);
                        $coaching_experience_content = get_post_meta(get_the_ID(), 'coaching_experience_content', true);
                        if (!empty($coaching_experience_title)) {
                            ?>
                            <h3>
                                <?php echo $coaching_experience_title; ?>
                            </h3>
                        <?php }
                        if (!empty($coaching_experience_content)) { ?>
                            <p>
                                <?php echo $coaching_experience_content; ?>
                            </p>
                        <?php }
                        if (have_rows('gallery')) { ?>
                            <div class="blog-details-small-img">
                                <?php while (have_rows('gallery')) {
                                    the_row();
                                    $gallery_image = get_sub_field('gallery_image');
                                    if (!empty($gallery_image)) { ?>
                                        <div class="item"><img src="<?php echo $gallery_image['url']; ?>" alt="#">
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        <?php } ?>
                    </div>


                    <?php $training_title = get_post_meta(get_the_ID(), 'training_title', true);
                    $training_content = get_post_meta(get_the_ID(), 'training_content', true);
                    if (!empty($training_title) || !empty($training_content)) { ?>
                        <div class="middle-heading">
                            <?php

                            if (!empty($training_title)) {
                                ?>
                                <h3>
                                    <?php echo $training_title; ?>
                                </h3>
                            <?php }
                            if (!empty($training_content)) { ?>
                                <p>
                                    <?php echo $training_content; ?>
                                </p>
                            <?php } ?>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
} ?>


<!-- related blogs -->
<div class="blog-sec blog-details-slider common-padd">
    <div class="container">
        <div class="section-header">
            <?php
            $ren_blog_head = get_theme_value('ren_blog_head');
            $ren_blog_sub_head = get_theme_value('ren_blog_sub_head');
            if (!empty($ren_blog_head)) {
                ?>
                <h6>
                    <?php echo $ren_blog_head; ?>
                </h6>
            <?php }
            if (!empty($ren_blog_sub_head)) { ?>
                <h2>
                    <?php echo $ren_blog_sub_head; ?>
                </h2>
            <?php } ?>
        </div>
        <?php
        $args = array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'order' => 'DESC',
            'post__not_in' => array($post_id),
            'posts_per_page' => -1,
        
        );
        $rblogs = new WP_Query($args);
        if ($rblogs->have_posts()) { ?>
            <div class="owl-carousel owl-theme" id="blog-slider">
                <?php while ($rblogs->have_posts()) {
                    $rblogs->the_post(); ?>
                    <div class="item">
                        <div class="slng-blog">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="blog-img">
                                    <div class="blog-img-wraper">
                                        <?php echo get_the_post_thumbnail(); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="text-box">
                                <h6>
                                    <?php echo get_the_date('F j,Y') ?>
                                </h6>
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <a href="<?php the_permalink(); ?>" class="btn btn-light-blue"><?php echo get_theme_value('ln_btn_blog'); ?><span><img
                                            src="<?php echo get_template_directory_uri() ?>/assets/images/arrow.svg"></span></a>
                            </div>
                        </div>
                    </div>
                <?php }
                wp_reset_query();  ?>
            </div>
        <?php }
        ?>


    </div>
</div>
</div>






<?php get_footer(); ?>