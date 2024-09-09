<?php 
echo get_header() ; 
$term = get_queried_object(); // Get the current term object
if ($term && !is_wp_error($term)) {
    $term_id[]   = $term->term_id; 
    $term_name = $term->name;     
}
 ?>
    <section class="banner-sec inner-banner">
        <img class="banner-img" src="<?php echo  get_field('add_banner_image', 'term_' . $term_id[0]);  ?>" alt="">
        <div class="banner-content">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-12">
                        <div class="inner-banner-text">
                            <h1><?=$term_name ; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
     $getPopularpost = get_popular_posts(4,"news","news_tag",$term_id);
    //  echo "<pre/>";
    //  print_r($getPopularpost);
if ($getPopularpost) :
    ?>
    <section class="featured-articles-sec business-news">
        <div class="container">
            <div class="row add-sec">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg.jpg" alt="add-bg">
                    </div>
                </div>
            </div> 
            <div class="row featured-main-sec">
                <div class="col-lg-12">
                    <div class="common-heading">
                        <div class="common-heading-text">
                            <h2>Popular <?php echo $term_name ; ?> News</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="featured-main-box">
                        <?php 
                        foreach ($getPopularpost as $key => $value):
                            $populerPostId = $value->ID ;
                            $postDetails = get_post_info($populerPostId);
                            $authorInfo = $postDetails->author;
                          
                            if($key < 3):
                        ?>
                        <div class="featured-img-box">
                            <div class="featured-img">
                            <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="featured-main-img"> </a>
                            </div>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                <li><?=$postDetails->post_type; ?></li>
                                    <?php 
                                    if($postDetails->catType):
                                        foreach ($postDetails->catType as $key => $catvalue):
                                    ?>
                                    <li><?=$catvalue;?></li>
                                    <?php endforeach; endif; ?>
                                </ul>
                                <h4><a href="<?=$postDetails->link ; ?>"><?=$postDetails->post_title ; ?></a></h4>
                                <div class="date-wrapper-main">
                                    <div class="detail-box">
                                        <span><img src="<?=$authorInfo['profileImage'];?>" alt="profile"></span>
                                    </div>
                                    <ul class="date-box">
                                        <li><?=$authorInfo['name'];?></li>
                                        <li><?=$postDetails->customdate; ?></li>
                                        <?php if($postDetails->interval): ?>
                                        <li><?=$postDetails->interval ;?></li>
                                        <?php endif ; ?>
                                    </ul>
                                </div>  
                            </div>
                        </div>
                        <?php endif; endforeach ; ?>
                    </div>
                </div>
             <?php 
             foreach ($getPopularpost as $key => $value):
                $populerPostId = $value->ID ;
                $postDetails = get_post_info($populerPostId);
                $authorInfo = $postDetails->author;
                if($key == 3):
                ?>    
                <div class="col-lg-6">
                    <div class="featured-right-img-box">
                        <div class="featured-right-img">
                        <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="featured-main-img"> </a>
                        </div>
                        <div class="category-details-box">
                            <ul class="category-tag">
                                   <li><?=$postDetails->post_type; ?></li>
                                    <?php 
                                    if($postDetails->catType):
                                        foreach ($postDetails->catType as $key => $catvalue):
                                    ?>
                                    <li><?=$catvalue;?></li>
                                    <?php endforeach; endif; ?>
                            </ul>
                            <h3><a href="<?=$postDetails->link ; ?>"><?=$postDetails->post_title ; ?></a></h3>
                            <div class="date-wrapper-main">
                                <div class="detail-box">
                                    <span><img src="<?=$authorInfo['profileImage'];?>" alt="profile"></span>
                                </div>
                                <ul class="date-box">
                                <li><?=$authorInfo['name'];?></li>
                                        <li><?=$postDetails->customdate; ?></li>
                                        <?php if($postDetails->interval): ?>
                                        <li><?=$postDetails->interval ;?></li>
                                        <?php endif ; ?>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
                <?php endif; endforeach; ?>
            </div>

            <div class="row add-sec">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg2.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif ; ?>

    <section class="letest-news all-business-news-sec common-padd pt-0">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2>All <?php echo $term_name ; ?> News</h2>
                </div>
            </div>

            <div class="row">
                <?php 
                $getAllpost = get_posts_with_tax_and_pagination('news','news_tag', $term_id, 6);
                if ($getAllpost->have_posts()):
                    while ($getAllpost->have_posts()) :
                        $getAllpost->the_post();
                        $postIds = get_the_ID(); 
                        $postDetails = get_post_info($postIds);
                        $authorInfo = $postDetails->author;
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="letest-news-box">
                        <div class="letest-news-img">
                        <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="featured-main-img"> </a>
                        </div>
                        <div class="category-details-box">
                            <ul class="category-tag">
                            <li><?=$postDetails->post_type; ?></li>
                                    <?php 
                                    if($postDetails->catType):
                                        foreach ($postDetails->catType as $key => $catvalue):
                                    ?>
                                    <li><?=$catvalue;?></li>
                                    <?php endforeach; endif; ?>
                            </ul>
                            <h4><a href="<?=$postDetails->link ; ?>"><?=$postDetails->post_title ; ?></a></h4>
                            <div class="date-wrapper-main">
                                <div class="detail-box">
                                <span><img src="<?=$authorInfo['profileImage'];?>" alt="profile"></span>
                                </div>
                                <ul class="date-box">
                                        <li><?=$authorInfo['name'];?></li>
                                        <li><?=$postDetails->customdate; ?></li>
                                        <?php if($postDetails->interval): ?>
                                        <li><?=$postDetails->interval ;?></li>
                                        <?php endif ; ?>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
                <?php endwhile; endif ; ?>
                <div class="col-lg-12 col-md-12">
                    <div class="review-pagination common-padd-60">
                        <nav aria-label="Page navigation example justify-content-center">
                            <?php 
                            $pagination = get_pagination( $getAllpost);
                             if ($pagination) {
                                echo  $pagination ;
                            }
                            ?>
                          
                        </nav>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo get_footer() ; ?>