<?php 
echo get_header() ; 
$postDetails = get_post_info($post->ID);

$authorInfo = $postDetails->author;

?>
    <section class="featured-articles-sec business-news ebook-padd">
        <div class="container">
            <div class="row add-sec">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div> 
            <?php 
            //echo "<pre/>";
              // print_r($postDetails);
            ?>
            <div class="row featured-main-sec">
                <div class="col-lg-7">
                    <div class="news-details-box">
                        <div class="category-details-box">
                            <ul class="category-tag">
                            <li><?=$postDetails->post_type; ?></li>
                                <?php 
                                if($postDetails->catType):
                                    $tremsID = [];
                                    foreach ($postDetails->catType as $key => $catvalue):
                                        $term = get_term_by('name', $catvalue, "news_type");
                                        if ($term && !is_wp_error($term)) {
                                            $tremsID[] = $term->term_id;
                                        }
                                ?>
                            <li><?=$catvalue;?></li>
                            <?php endforeach; endif; ?>
                            </ul>
                            <h2><?php the_title();?></h2>
                            <div class="date-wrapper-main">
                                <ul class="date-box">
                                <li><?=$postDetails->customdate; ?></li>
                                        <?php if($postDetails->interval): ?>
                                        <li><?=$postDetails->interval ;?></li>
                                        <?php endif ; ?>
                                </ul>
                            </div>  
                        </div>
                        <div class="news-details-img">
                            <img src="<?=$postDetails->thumbnailUrl; ?>" alt="news-details-bg">
                        </div>
                        <div class="profile-details-main-box">
                            <div class="profile-img-box">
                                <div class="profile-img">
                                    <img src="<?=$authorInfo['profileImage'];?>" alt="profile-img">
                                </div>
                                <div class="author-details">
                                    <p>Written by</p>
                                    <h4 class="profile-name"><?=$authorInfo['name'];?></h4>
                                </div>
                            </div>
                            <div class="profile-social-icon">
                                <ul class="social-icon-box">
                                    <li><a href="#"><img src="<?php echo THEME_DIR; ?>/images/twitter.png" alt="twitter"></a></li>
                                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fas fa-envelope"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="news-details-text-box">
                           <?php the_content() ; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="featured-main-box  articals-wrapper">
                                <h3>Recommended Articles</h3>
                                <?php 
                             //print_r($tremsID);
                                 $getAllpost = get_posts_with_tax_and_pagination('news','news_type', $tremsID, 6);
                                 if ($getAllpost->have_posts()):
                                    while ($getAllpost->have_posts()) :
                                        $getAllpost->the_post();
                                        $postIds = get_the_ID(); 
                                        $postDetails = get_post_info($postIds);
                                        $authorInfo = $postDetails->author;
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
                                <?php  endwhile; endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="add-box">
                                <img src="<?php echo THEME_DIR; ?>/images/add3.jpg" alt="add-bg">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="add-box">
                                <img src="<?php echo THEME_DIR; ?>/images/add4.jpg" alt="add-bg">
                            </div>
                        </div>
                        <div class="col-lg-12 mb-5">
                            <div class="add-box">
                                <img src="<?php echo THEME_DIR; ?>/images/add5.jpg" alt="add-bg">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="featured-main-box  articals-wrapper">
                            <h3>Top News</h3>
                            <div class="featured-img-box">
                                <div class="featured-img">
                                    <img src="<?php echo THEME_DIR; ?>/images/featured3.jpg" alt="featured1">
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>News</li>
                                        <li>Business</li>
                                    </ul>
                                    <h4><a href="#">Ohio Issues Permits for Recreational Cannabis Companies</a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li>Cannabis risk manager staff</li>
                                            <li>July 31, 2024</li>
                                            <li>2 hours ago</li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
                            
                            <div class="featured-img-box">
                                <div class="featured-img">
                                    <img src="<?php echo THEME_DIR; ?>/images/featured1.jpg" alt="featured1">
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>News</li>
                                        <li>Cultivation</li>
                                    </ul>
                                    <h4><a href="#">Cannabis Firm Faces Insurance Dispute After Grow Room Blaze</a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li>Cannabis risk manager staff</li>
                                            <li>July 31, 2024</li>
                                            <li>2 hours ago</li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>

                            <div class="featured-img-box">
                                <div class="featured-img">
                                    <img src="<?php echo THEME_DIR; ?>/images/featured4.jpg" alt="featured1">
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>News</li>
                                        <li>Cultivation</li>
                                    </ul>
                                    <h4><a href="#">Cannabis Firm Faces Insurance Dispute After Grow Room Blaze</a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li>Cannabis risk manager staff</li>
                                            <li>July 31, 2024</li>
                                            <li>2 hours ago</li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
    
                            <div class="featured-img-box">
                                <div class="featured-img">
                                    <img src="<?php echo THEME_DIR; ?>/images/featured2.jpg" alt="featured1">
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>News</li>
                                        <li>Politics</li>
                                    </ul>
                                    <h4><a href="#">GOP Senator Pushes for Cannabis Reform, Backs Federal Market</a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li>Cannabis risk manager staff</li>
                                            <li>July 31, 2024</li>
                                            <li>2 hours ago</li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
    
                            <div class="featured-img-box">
                                <div class="featured-img">
                                    <img src="<?php echo THEME_DIR; ?>/images/featured6.jpg" alt="featured1">
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>News</li>
                                        <li>Politics</li>
                                    </ul>
                                    <h4><a href="#">GOP Senator Pushes for Cannabis Reform, Backs Federal Market</a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li>Cannabis risk manager staff</li>
                                            <li>July 31, 2024</li>
                                            <li>2 hours ago</li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>

                            <div class="featured-img-box">
                                <div class="featured-img">
                                    <img src="<?php echo THEME_DIR; ?>/images/featured5.jpg" alt="featured1">
                                </div>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li>News</li>
                                        <li>Business</li>
                                    </ul>
                                    <h4><a href="#">Ohio Issues Permits for Recreational Cannabis Companies</a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li>Cannabis risk manager staff</li>
                                            <li>July 31, 2024</li>
                                            <li>2 hours ago</li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row next-previous-box">
                <div class="col-lg-3">
                    <div class="next-previous-box previous-box">
                        <div class="view-more-artical">
                            <a href="#" class="view-more-btn">Read Previous</a>
                        </div>
                        <div class="letest-news-box">
                            <div class="letest-news-img">
                                <img src="<?php echo THEME_DIR; ?>/images/letest-news4.jpg" alt="letest-news">
                            </div>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                    <li>News</li>
                                    <li>Politics</li>
                                </ul>
                                <h6><a href="#">Florida Police Oppose Recreational Weed; Supporters Cite Costs</a></h6>
                                <div class="date-wrapper-main">
                                    <div class="detail-box">
                                        <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                    </div>
                                    <ul class="date-box">
                                        <li>Cannabis risk manager staff</li>
                                        <li>July 31, 2024</li>
                                        <li>2 hours ago</li>
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add7.jpg" alt="add-bg">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="next-previous-box next-box">
                        <div class="view-more-artical">
                            <a href="#" class="view-more-btn">Read next</a>
                        </div>
                        <div class="letest-news-box">
                            <div class="letest-news-img">
                                <img src="<?php echo THEME_DIR; ?>/images/letest-news5.jpg" alt="letest-news">
                            </div>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                    <li>News</li>
                                    <li>Politics</li>
                                </ul>
                                <h6><a href="#">Florida Police Oppose Recreational Weed; Supporters Cite Costs</a></h6>
                                <div class="date-wrapper-main">
                                    <div class="detail-box">
                                        <span><img src="<?php echo THEME_DIR; ?>/images/profile.svg" alt="profile"></span>
                                    </div>
                                    <ul class="date-box">
                                        <li>Cannabis risk manager staff</li>
                                        <li>July 31, 2024</li>
                                        <li>2 hours ago</li>
                                    </ul>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 common-padd-60 pb-0">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg2.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="letest-news light-green-bg common-padd">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2 class="light-green-bg">Latest News</h2>
                </div>
            </div>
            <?php 
                 $getFeaturedpostInfo = get_all_post_details(4,"news");
                 if($getFeaturedpostInfo):
            ?>
            <div class="row">
            <?php 
                         foreach ($getFeaturedpostInfo as $key => $value):
                          $featuredPostId = $value->ID;
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
                          if($featuredPostId != $post->ID):
                    ?>
                <div class="col-lg-4 col-md-4">
                    <div class="letest-news-box">
                        <div class="letest-news-img">
                        <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="latest news"> </a>

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
                <?php endif; endforeach ; ?>
            </div>
            <?php endif ;?>
        </div>
    </section>
<?php echo get_footer(); ?>
