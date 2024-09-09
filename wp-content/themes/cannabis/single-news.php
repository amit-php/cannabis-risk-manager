<?php 
echo get_header() ; 
$postDetails = get_post_info($post->ID);
$authorInfo = $postDetails->author;
$pdIds = $post->ID;

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
                                        // print_r( $tremsID);
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
                            <?php
                                $post_url = get_permalink(); // Get the current post URL
                                $post_title = get_the_title(); // Get the current post title

                                $twitter_share_url = 'https://twitter.com/intent/tweet?text=' . urlencode( $post_title ) . '&url=' . urlencode( $post_url );
                                $linkedin_share_url = 'https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( $post_url ) . '&title=' . urlencode( $post_title );
                                $gmail_subject = 'Check out this post: ' . $post_title;
                                $gmail_body = 'I found this post and thought you might like it: ' . $post_url;
                                
                                $gmail_share_url = 'https://mail.google.com/mail/?view=cm&fs=1&to=&su=' . urlencode( $gmail_subject ) . '&body=' . urlencode( $gmail_body );
                               ?>
                                <ul class="social-icon-box">
                                    <li><a href="<?php echo $twitter_share_url ; ?>" target="_blank"><img src="<?php echo THEME_DIR; ?>/images/twitter.png" alt="twitter"></a></li>
                                    <li><a  href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="<?php echo  $linkedin_share_url ; ?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="<?php echo $gmail_share_url ; ?>"><i class="fas fa-envelope"></i></a></li>
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
                                <h3><?php echo get_theme_value('news_rem_artical_title') ; ?></h3>
                                <?php 
                             //print_r($tremsID);
                                 $getAllpost = get_posts_with_tax_and_pagination('news','news_type', $tremsID, 7);
                                 if ($getAllpost->have_posts()):
                                    while ($getAllpost->have_posts()) :
                                        
                                        $getAllpost->the_post();
                                        $postIds = get_the_ID(); 
                                        $postDetails = get_post_info($postIds);
                                        $authorInfo = $postDetails->author;
                                        if($postIds != $pdIds):
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
                                <?php  endif; endwhile; endif; ?>
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
                            <h3><?php echo get_theme_value('news_top_title') ; ?></h3>
                            <?php
                               $getPopularpost = get_popular_posts(7,"news","news_type",$tremsID);
                               //  echo "<pre/>";
                               //  print_r($getPopularpost);
                           if ($getPopularpost) :
                            foreach ($getPopularpost as $key => $value):
                                $populerPostId = $value->ID ;
                                $postDetails = get_post_info($populerPostId);
                                $authorInfo = $postDetails->author;
                                if($populerPostId != $pdIds):
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
                            <?php endif; endforeach ; endif ; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
                        $next_post = get_next_post();
                                if ( !empty( $next_post ) ) {
                                    $next_post_url = get_permalink( $next_post->ID );
                               
                                }
                                $prev_post = get_previous_post();
                                if ( !empty( $prev_post ) ) {
                                    $prev_post_url = get_permalink( $prev_post->ID );
                                  
                                }
                                ?>
            <div class="row next-previous-box">
                <div class="col-lg-3">
                    <div class="next-previous-box previous-box">
                        <div class="view-more-artical">
                            <a href="<?php echo $prev_post_url ; ?>" class="view-more-btn"><?php echo get_theme_value('news_read_previous_title') ; ?></a>
                        </div>
                        <?php
                         if ($getAllpost->have_posts()):
                            $postIdss = [];
                            while ($getAllpost->have_posts()) :
                                $getAllpost->the_post();
                                $postIds = get_the_ID(); 
                                //$postDetails = get_post_info($postIds);
                               // $authorInfo = $postDetails->author;
                                if($postIds != $pdIds):
                                    $postIdss[] = get_the_ID(); 
                                endif;
                            endwhile;
                        endif;
                        if($postIdss):
                       foreach ($postIdss as $key => $value):
                        if($key == 0):
                            $postDetails = get_post_info($value);
                            $authorInfo = $postDetails->author;
                            ?>
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
                                <h6><a href="<?=$postDetails->link ; ?>"><?=$postDetails->post_title ; ?></a></h6>
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
                        <?php endif; endforeach; endif; ?>
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
                        
                            <a href="<?php echo $next_post_url ; ?>" class="view-more-btn"><?php echo get_theme_value('news_read_next_title') ; ?></a>
                        </div>
                       <?php if($postIdss):
                       foreach ($postIdss as $key => $values):
                        if($key == 1):
                            $postDetails = get_post_info($values);
                            $authorInfo = $postDetails->author;
                            ?>
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
                                <h6><a href="<?=$postDetails->link ; ?>"><?=$postDetails->post_title ; ?></a></h6>
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
                        <?php endif ; endforeach; endif ; ?>
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
                    <h2 class="light-green-bg"><?php echo get_theme_value('news_latest_title') ; ?></h2>
                </div>
            </div>
            <?php 
                 $getFeaturedpostInfo = get_all_post_details(3,"news");
                 if($getFeaturedpostInfo):
            ?>
            <div class="row">
            <?php 
                         foreach ($getFeaturedpostInfo as $key => $value):
                           $featuredPostId = $value->ID;
                        //  echo $post->ID;
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
                          if($featuredPostId != $pdIds):
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
