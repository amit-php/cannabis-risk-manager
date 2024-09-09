<section class="risk-manage-ment-sec common-padd">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2><?php echo get_field('risk_management_title') ; ?></h2>
                </div>
                <div class="common-heading-text right-text">
                    <a href="<?php echo get_field('view_all_button_url') ; ?>" class="view-more-btn"><?php echo get_field('view_all_button_text') ; ?></a>
                </div>
            </div>
            <?php 
                    $termids[] = 10 ;
                    $getFeaturedpostInfo = get_post_by_tag_val("news",4,"news_tag",$termids);
                  if($getFeaturedpostInfo):
             ?>
            <div class="row">
            <?php 
                         foreach ($getFeaturedpostInfo as $key => $value):
                          $featuredPostId = $value->ID;
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
                        
                          if($key == 0):
                       
                    ?>
                <div class="col-lg-4 col-md-4">
                    <div class="featured-right-img-box risk-manage-ment-wrapper">
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

                <div class="col-lg-4 col-md-4">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add5.jpg" alt="add-bg">
                    </div>
                </div>
                <?php 
                         foreach ($getFeaturedpostInfo as $key => $value):
                          $featuredPostId = $value->ID;
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
                          if ($key > 0 && $key < 4) :
                    ?>
                <div class="col-lg-4 col-md-4">
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
                                    <ul class="date-box">
                                        <li><?=$authorInfo['name'];?></li>
                                        <li><?=$postDetails->customdate; ?></li>
                                        <?php if($postDetails->interval): ?>
                                        <li><?=$postDetails->interval ;?></li>
                                        <?php endif ; ?>
                                    </ul>
                                </ul>
                            </div>  
                        </div>
                    </div>
                </div>
                <?php endif; endforeach; ?>
            </div>
            <?php endif ; ?>
        </div>
    </section>