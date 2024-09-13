<?php 
echo get_header();
$term = get_queried_object();
?>

    <section class="banner-sec inner-banner">
        <img class="banner-img" src="<?php echo THEME_DIR; ?>/images/ebook-banner.png" alt="events-bg">
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

    <section class="about-text-box common-padd">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
           <section class="ebook-sec ebooks-one common-padd pb-0">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2 class="">E-books</h2>
                </div>
             
            </div>

            <div class="row">
            <?php 
               if (have_posts()) :
                while (have_posts()) : the_post(); 
                        $postIds = get_the_ID(); 
                        
                        ?>
                <div class="col-lg-4 col-md-6">
                    <a href="#">
                        <div class="ebook-wrapper">
                            <div class="ebook-img">
                            <a href="<?php echo  the_permalink() ; ?>"><img src="<?php echo get_the_post_thumbnail_url($postIds, 'full') ; ?>" alt=""></a>
                            </div>
                            <div class="ebook-title">
                                <h4><a href="<?php echo  the_permalink() ; ?>"><?php the_title() ; ?></a></h4>
                                <p><?php echo get_post_field('post_excerpt',$postIds); ?></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                endwhile;
            endif; 
                ?>
            </div>
            <div class="pagination-wrap">
            <?php 
                            $pagination = get_pagination( $wp_query);
                             if ($pagination) {
                                echo  $pagination ;
                            }
                            ?>
            </div>

            <div class="add-box">
                <img src="<?php echo THEME_DIR; ?>/images/add-bg2.jpg" alt="add-bg">
            </div>
        </div>
    </section>
        </div>
    </section>
    <?php echo get_footer() ; ?>