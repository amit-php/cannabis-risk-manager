<?php 
echo get_header();
?>
    <section class="banner-sec inner-banner">
        <img class="banner-img" src="<?php echo THEME_DIR; ?>/images/podcast-directory.jpg" alt="podcast-directory">
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

    <section class="poadcast-missing light-green-bg common-padd-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="poadcast-box-wrap">
                        <div class="poadcast-text">
                            <h2><?php echo get_theme_value('podcast_header') ; ?></h2>
                            <p><?php echo get_theme_value('podcast_sub_header') ; ?></p>
                        </div>
                        <div class="poadcast-btn">
                            <a href="<?php echo get_theme_value('podcast_button_link') ; ?>" class="btn"><?php echo get_theme_value('podcast_button_name') ; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="director-sec common-padd">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 common-padd-60 pt-0">
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
                <div class="col-lg-6">
                    <div class="podcast-main-box">
                        <div class="podcast-img">
                            <img src="<?php echo get_the_post_thumbnail_url($postIds, 'full') ; ?>" alt="poadcast-bg">
                        </div>
                        <div class="poadcast-text-box">
                            <div class="poadcastmain-text">
                                <ul class="poadcast-title-tag">
                                    <li>Directed by <?php echo get_post_field('podcast_host',$postIds); ?></li>
                                </ul>
                                <h3 class="poadcast-title"><?php the_title() ; ?></h3>
                                <p><?php echo get_the_content(); ?></p>
                            </div>
                            <!-- <a href="#" class="poadcast-button-box"></a> -->
                        </div>
                    </div>
                </div>
                    <?php
                    endwhile;
                endif; 
                    ?>
            

                <div class="col-lg-12 col-md-12">
                    <div class="review-pagination common-padd-60 pb-0">
                        <nav aria-label="Page navigation example">
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
                <div class="col-lg-12 common-padd-60 pb-0">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo get_footer() ; ?>
