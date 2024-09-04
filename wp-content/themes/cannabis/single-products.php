<?php get_header(); ?>
<!-- innar banner start here  -->
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <div class="innar-banner">
            <?php
            $banimg = get_the_post_thumbnail_url();
            if ($banimg) {
            ?>
                <img src="<?php echo $banimg; ?>" alt="">
            <?php } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/product-details-bn.png" alt="">
            <?php } ?>
            <div class="banner-content">
                <div class="container position-relative">
                    <div class="banner-text text-center">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- innar banner end here  -->

        <!-- Power Solutions start here  -->
        <section class="product-d-tails">
            <?php
            if (have_rows('product_details_content')) :
                $iteration_count = 1; // Counter to track the iteration number
                while (have_rows('product_details_content')) : the_row();
                    $content_image = get_sub_field("content_image");
                    $title_content = get_sub_field("title_content");
                    $content_prod = get_sub_field("content_prod");

            ?>
                    <div class="power-solution common-padd position-relative">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <div class="left-part">
                                        <div class="round-img">
                                            <?php if ($iteration_count % 2 == 0) { ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/energy-before.png" alt="#">
                                            <?php } else { ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/psafter.png" alt="#">
                                            <?php } ?>
                                        </div>
                                        <?php if ($content_image != "") { ?>
                                            <figure class="z-index2">
                                                <img src="<?php echo $content_image; ?>" alt="#" class="img-fluid">
                                            </figure>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <div class="text-box">
                                        <?php if ($title_content != "") { ?>
                                            <h2><?php echo $title_content; ?></h2>
                                        <?php } ?>
                                        <?php if ($content_prod != "") { ?>
                                            <?php echo $content_prod; ?>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="left-round">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/c1.png" alt="#">
                        </div>

                        <div class="left-round-strock">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/c2.png" alt="#">
                        </div>
                    </div>
            <?php
                    $iteration_count++; // Increment the iteration count
                endwhile;
            endif;
            ?>
        </section>


<?php
    }
}
?>
<?php get_footer(); ?>