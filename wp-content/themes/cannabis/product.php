<?php
//Template Name:Product
get_header(); ?>
<!-- innar banner start here  -->
<div class="innar-banner">
    <?php if (!empty(get_the_post_thumbnail_url())) { ?>
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
    <?php } ?>
    <div class="banner-content">
        <div class="container position-relative">
            <div class="banner-text text-center">
                <h1>
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>
</div>
<!-- innar banner end here  -->

<div class="products-innar-sec common-padd position-relative">
    <div class="container">
        <div class="line-partical">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/pcarv.png">
        </div>
        <div class="half-circul">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/half-cir.png">
        </div>

        <?php
        $args = array(
            'post_type' => 'products',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'order' => 'DESC',

        );
        $product = new WP_Query($args);
        if ($product->have_posts()) { ?>

            <div class="grid-box">
                <?php
                while ($product->have_posts()) {
                    $product->the_post();

                    $product_icon_id = get_post_meta(get_the_ID(), 'product_icon', true);

                    $product_icon = wp_get_attachment_image_url($product_icon_id, 'full');
                    if (!empty($product_icon)) {
                ?>
                        <div class="sngl-box">
                            <div class="sngl-box-wraper">
                                <div class="heading-icon">
                                    <div class="icon-box">
                                        <img src="<?php echo $product_icon; ?>" alt="">
                                    </div>
                                    <h5>
                                        <?php echo get_the_title();; ?>
                                    </h5>
                                </div>
                                <?php the_content(); ?>
                                <div class="product-learn-more">
                                    <a href="<?php the_permalink(); ?>" class="btn btn-light-blue">
                                        <?php echo get_theme_value('ln_btn_product'); ?><span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        <?php
            wp_reset_query();
        }
        ?>

    </div>
</div>


<?php get_footer() ?>