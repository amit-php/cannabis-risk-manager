<?php 
/* Template Name: About */
 echo get_header(); 
?>
 <!-- banner section  -->
<?php get_template_part('template-part/common/banner'); ?>

    <section class="about-text-box common-padd pt-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 common-padd-60">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="about-img-box">
                        <img src="<?php echo get_field('add_image_abt_rsk'); ?>" alt="about-img">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="about-text-wrapper-box">
                        <h2><?php echo get_field('add_title_abt_rsk'); ?></h2>
                        <?php echo get_field('add_content_abt_rsk'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-text-box light-green-bg about-second-text-box common-padd pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img-box">
                        <img src="<?php echo get_field('add_image_abt_misn'); ?>" alt="about-img">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text-wrapper-box">
                        <h2><?php echo get_field('add_title_abt_misn'); ?></h2>
                        <?php echo get_field('add_content_abt_msn'); ?>
                 </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 common-padd-60">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg2.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="our-community common-padd">
        <div class="offer-partical-img">
            <img src="<?php echo THEME_DIR; ?>/images/offer-bg.jpg" alt="offer-bg">
        </div>
        <?php 
        $offerArr = get_field('add_offer');
        if($offerArr):
        ?>
        <div class="offer-content-box">
            <div class="container text-center">
                <div class="we-offer-heading">
                    <h2><?php echo get_field('add_title_abt_offr') ; ?></h2>
                </div>
                <div class="row justify-content-center">
                    <?php 
                    foreach ($offerArr as $key => $offervalue) :
                        ?>
                    <div class="col-lg-4 col-md-4">
                        <div class="offer-box-wrapper">
                            <div class="offer-icon"><img src="<?php echo $offervalue["add_icon"] ; ?>" alt="daily-news"></div> 
                            <div class="offer-box-content">
                                <h4><?php echo $offervalue["add_title"] ; ?></h4>
                                <p><?php echo $offervalue["add_content"] ; ?>  </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach ; ?>
                </div>
            </div>
        </div>
        <?php endif ; ?>
    </section>

    <section class="about-text-box common-padd pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-2">
                    <div class="about-img-box">
                        <img src="<?php echo get_field('add_image_abt_comm'); ?>" alt="community-img">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="about-text-wrapper-box">
                        <h2><?php echo get_field('add_title_abt_comm'); ?></h2>
                        <p><?php echo get_field('add_content_abt_comm'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <!-- newsletter section  -->
 <?php get_template_part('template-part/common/newsletter'); ?>
 
<?php echo get_footer() ; ?>
