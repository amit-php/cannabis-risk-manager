<section class="banner-sec">
        <img class="banner-img" src="<?php echo get_field(
            "add_image_banner"
        ); ?>" alt="">
        <div class="banner-content">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="banner-text-main">
                       <?php
                       $bannerNewsId = get_field("select_banner_news");
                       if ($bannerNewsId):

                           $postDetails = get_post_info($bannerNewsId);

                           $authorInfo = $postDetails->author;
                           ?>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                    <li><?= $postDetails->post_type ?></li>
                                    <?php if ($postDetails->catType):
                                        foreach (
                                            $postDetails->catType
                                            as $key => $catvalue
                                        ): ?>
                                    <li><?= $catvalue ?></li>
                                    <?php endforeach;
                                    endif; ?>
                                </ul>
                                <h1><a href="<?= $postDetails->link ?>"><?= $postDetails->post_title ?></a></h1>
                                <div class="date-wrapper-main">
                                    <div class="detail-box">
                                        <span><img src="<?= $authorInfo[
                                            "profileImage"
                                        ] ?>" alt="profile"></span>
                                    </div>
                                    <ul class="date-box">
                                        <li><?= $authorInfo["name"] ?></li>
                                        <li><?= $postDetails->customdate ?></li>
                                        <?php if ($postDetails->interval): ?>
                                        <li><?= $postDetails->interval ?></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>  
                            </div>
                            <?php
                       endif;
                       ?>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="popular-articles-box">
                            <h3><?php echo get_field(
                                "popular_articles_title"
                            ); ?></h3>
                            <div class="category-wrapper">
                                <?php
                                $populerPostInfo = get_popular_posts(4, "news");
                                if ($populerPostInfo):
                                    foreach (
                                        $populerPostInfo
                                        as $key => $value
                                    ):

                                        $populerPostId = $value->ID;
                                        $postDetails = get_post_info(
                                            $populerPostId
                                        );
                                        $authorInfo = $postDetails->author;
                                        ?>
                                <div class="category-details-box">
                                    <ul class="category-tag">
                                        <li><?= $postDetails->post_type ?></li>
                                        <?php if ($postDetails->catType):
                                            foreach (
                                                $postDetails->catType
                                                as $key => $catvalue
                                            ): ?>
                                            <li><?= $catvalue ?></li>
                                        <?php endforeach;
                                        endif; ?>
                                    </ul>
                                    <h4><a href="<?= $postDetails->link ?>"><?= $postDetails->post_title ?></a></h4>
                                    <div class="date-wrapper-main">
                                        <div class="detail-box">
                                            <span><img src="<?= $authorInfo[
                                                "profileImage"
                                            ] ?>" alt="profile"></span>
                                        </div>
                                        <ul class="date-box">
                                            <li><?= $authorInfo["name"] ?></li>
                                            <li><?= $postDetails->customdate ?></li>
                                            <?php if (
                                                $postDetails->interval
                                            ): ?>
                                            <li><?= $postDetails->interval ?></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>  
                                </div>
                                <?php
                                    endforeach;
                                    endif;
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>