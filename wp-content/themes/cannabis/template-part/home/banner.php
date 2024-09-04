<section class="banner-sec">
        <img class="banner-img" src="<?php echo get_field('add_image_banner'); ?>" alt="">
        <div class="banner-content">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="banner-text-main">
                       <?php 
                         $bannerNewsId = get_field('select_banner_news');
                         if($bannerNewsId):
                          $postDetails = get_post_info($bannerNewsId);
                         // print_r($postDetails);
                           
                       ?>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                    <li><?=$postDetails->post_type; ?></li>
                                    <li><?=$postDetails->catType;?></li>
                                </ul>
                                <h1><a href="<?=$postDetails->link ; ?>"><?=$postDetails->post_title ; ?></a></h1>
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
                            <?php endif ; ?>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="popular-articles-box">
                            <h3>Popular articles</h3>
                            <div class="category-wrapper">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>