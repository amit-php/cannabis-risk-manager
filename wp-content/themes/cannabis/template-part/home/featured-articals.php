<section class="featured-articles-sec">
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
                            <h2><?php echo get_field('featured_articles_title') ; ?></h2>
                        </div>
                    </div>
                </div>
                <?php 
                $termids[] = 9 ;
                 // $getFeaturedpostInfo = get_all_post_details(-1,"news");
                  $getFeaturedpostInfo = get_post_by_tag_val("news",4,"news_tag",$termids);
                  if($getFeaturedpostInfo):
                    ?>
                <div class="col-lg-6">
                    <div class="featured-main-box">
                    <?php 
                         foreach ($getFeaturedpostInfo as $key => $value):
                          $featuredPostId = $value->ID;
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
                        
                          if($key < 3 ):
                       
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
                        <?php endif; endforeach;?>
                        <div class="view-more-artical">
                            <a href="<?php echo get_field('view_more_articles_url') ; ?>" class="view-more-btn"><?php echo get_field('view_more_articles_button_text') ; ?> </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                <?php 
                         foreach ($getFeaturedpostInfo as $key => $value):
                          $featuredPostId = $value->ID;
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
                          if($key == 3):
                       
                    ?>
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
                    <?php endif; endforeach; ?>
                </div>
                <?php endif; ?>
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