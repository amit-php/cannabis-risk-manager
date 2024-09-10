<?php 
echo get_header();
$term = get_queried_object();
?>

    <section class="banner-sec inner-banner">
        <img class="banner-img" src="<?php echo THEME_DIR; ?>/images/home-banner.jpg" alt="">
        <div class="banner-content">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="inner-banner-text">
                            <h1><?php  echo ucfirst($term->name); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="learning-box-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 common-padd-60">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
               if (have_posts()) :
                while (have_posts()) : the_post(); 
                        $postIds = get_the_ID(); 
                        
                        ?>
                <div class="col-lg-4 col-md-6">
                    <div class="learnig-box-wrapper">
                        <div class="learning-img">
                        <a href="<?php echo  the_permalink() ; ?>"><img src="<?php echo get_the_post_thumbnail_url($postIds, 'full') ; ?>" alt=""></a>
                        </div>
                        <div class="learning-text">
                            <h4><a href="<?php echo  the_permalink() ; ?>"><?php the_title() ; ?></a></h4>
                            <p><?php echo get_post_field('post_excerpt',$postIds); ?></p>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; ?>

                <div class="col-lg-12 col-md-12">
                    <div class="review-pagination common-padd-60 pb-0">
                    <nav aria-label="Page navigation example justify-content-center">
                            <?php 
                            $pagination = get_pagination( $wp_query);
                             if ($pagination) {
                                echo  $pagination ;
                            }
                            ?>
                          
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 common-padd-60">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php echo get_footer() ; ?>
