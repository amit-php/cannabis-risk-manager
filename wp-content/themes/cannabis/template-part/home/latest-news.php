<section class="letest-news light-green-bg common-padd">
        <div class="container">
            <div class="common-heading">
                <div class="common-heading-text">
                    <h2 class="light-green-bg"><?php echo get_field('latest_news_title');?></h2>
                </div>
                <div class="common-heading-text right-text">
                    <a href="<?php echo get_field('view_more_news_url');?>" class="view-more-btn light-green-bg"><?php echo get_field('view_more_news_title');?> </a>
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
                          $postDetails = get_post_info($featuredPostId);
                          $authorInfo = $postDetails->author;
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
                <?php endforeach ; ?>
            </div>
            <?php endif ; ?>


            <div class="row letest-news-add">
                <div class="col-lg-6 col-md-6">
                    <div class="row add-sec">
                        <div class="col-lg-12">
                            <div class="add-box">
                                <img src="<?php echo THEME_DIR; ?>/images/add3.jpg" alt="add-bg">
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row add-sec">
                        <div class="col-lg-12">
                            <div class="add-box">
                                <img src="<?php echo THEME_DIR; ?>/images/add4.jpg" alt="add-bg">
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </section>