<?php echo get_header() ; ?>
    <section class="featured-articles-sec business-news ebook-padd">
        <div class="container">
            <div class="row add-sec">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div> 
            <div class="row featured-main-sec pb-0">
                <div class="col-lg-6">
                    <div class="news-details-box">
                        <div class="category-details-box">
                            <ul class="category-tag">
                            <?php
                                $post_id = get_the_ID();

                                // Get the terms (categories) associated with the post in the 'events_type' taxonomy
                                $terms = wp_get_post_terms($post_id, 'events_type');

                                // Check if any terms are found
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    // Loop through each term and display its name
                                    foreach ($terms as $term) {
                                        echo '<li>' . esc_html($term->name) . '</li>';
                                    }
                                } else {
                                    // Display a fallback message if no categories are found
                                    echo '<li>No categories assigned</li>';
                                }
                                ?>
                            </ul>
                            <h2><?php echo get_the_title(); ?></h2>
                            <div class="date-wrapper-main">
                                <ul class="date-box">
                                    <li><img src="<?php echo THEME_DIR; ?>/images/date.png" alt="add-bg"> <?php echo get_field('_EventStartDate') ?>  - <?php echo get_field('_EventEndDate') ?></li>
                                </ul>
                            </div>  
                        </div>
                        <div class="news-details-img">
                            <img src="<?php echo get_the_post_thumbnail_url() ; ?>" alt="news-details-bg">
                        </div>
                        <p><?php echo get_the_content(); ?></p>
                        <?php

                            $event_title = get_the_title();
                            $event_description = get_the_content();
                            $event_startdate = get_post_meta(get_the_ID(), '_EventStartDate', true);
                            $event_enddate = get_post_meta(get_the_ID(), '_EventEndDate', true);
                            $event_starttime = get_post_meta(get_the_ID(), 'start_time', true);
                            $event_endtime = get_post_meta(get_the_ID(), 'end_time', true);
                            $event_url = get_permalink();
                            $event_location = get_post_meta(get_the_ID(), '_EventLocation', true); // Optional, if you have a location

                            // Combine date and time
                            $event_startdatetime = $event_startdate . ' ' . $event_starttime;
                            $event_enddatetime = $event_enddate . ' ' . $event_endtime;

                            // Format dates and times for Google Calendar (YYYYMMDDTHHMMSSZ)
                            $start_date = date('Ymd\THis\Z', strtotime($event_startdatetime));
                            $end_date = date('Ymd\THis\Z', strtotime($event_enddatetime));

                            // Google Calendar link
                            $google_calendar_url = 'https://calendar.google.com/calendar/render?action=TEMPLATE&text=' . urlencode($event_title) .
                                                '&dates=' . $start_date . '/' . $end_date .
                                                '&details=' . urlencode($event_description) .
                                                '&location=' . urlencode($event_location) .
                                                '&sf=true&output=xml';
                        ?>

                        <div class="ev-detail-btn">
                            <a href="<?php echo esc_url($google_calendar_url); ?>" class="btn">  <img src="<?php echo THEME_DIR; ?>/images/calender.png" alt="calender"> Add to Calendar</a>
                        </div>
                       
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="featured-main-box  articals-wrapper">
                                <h3>Event Schedules</h3>
                                <div class="featured-img-box ul-list">
                                    
                                        <ul class="category-tag cat-tag">
                                            <li>
                                                <div class="date-section">
                                                    <div>
                                                         <div class="date-img">
                                                            <img src="<?php echo THEME_DIR; ?>/images/icon1.png" alt="featured1">
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="date-content">
                                                       <h4><b>Starting-date:</b><?php echo get_field('_EventStartDate') ?></h4>
                                                    </div>
                                                    &nbsp;
                                                    <div class="date-content">
                                                    <h4><b>@</b><?php echo get_field('start_time') ?></h4>
                                                </div>
                                                </div>
                                        </li>
                                        <li>
                                            <div class="date-section">
                                                <div>
                                                    <div class="date-img">
                                                        <img src="<?php echo THEME_DIR; ?>/images/icon1.png" alt="featured1">
                                                    </div>
                                                </div>
                                                <div class="date-content">
                                                       <h4><b>End-date:</b><?php echo get_field('_EventEndDate') ?></h4>
                                                    </div>
                                                    &nbsp;
                                                    <div class="date-content">
                                                    <h4><b>@</b><?php echo get_field('end_time') ?></h4>
                                                </div>
                                            </div>
                                    </li>
                                    <li>
                                        <div class="date-section">
                                            <div>
                                                <div class="date-img">
                                                    <img src="<?php echo THEME_DIR; ?>/images/itm3.png" alt="featured1">
                                                </div>
                                            </div>
                                            
                                            <div class="date-content">
                                               <h4><b> Website:</b><a href="<?php echo get_field('_EventURL') ?>"><?php echo get_field('_EventURL') ?></a> </h4>
                                            </div>
                                        </div>
                                </li>
                                           
                                        </ul>
                                      
                                       
                                    </div>
                                </div>
        
                               
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
                       
                    </div>

                    
                </div>
            </div>
            
            
        </div>
    </section>
    <section class="feature-two  light-green-bg ">
        <div class="container">
        <div class="light-green common-padd">
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
                           $AllPost = get_posts_with_tax_and_pagination('events',false, false, 5);
                           if ($AllPost->have_posts()):
                            $postIdss = [];
                            while ($AllPost->have_posts()) :
                                $AllPost->the_post();
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
                                 $terms = wp_get_post_terms($value, 'events_type');
                                 
                        ?>
                        <div class="letest-news-box">
                            <div class="letest-news-img">
                            <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="letest-news"></a>
                            </div>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                <?php
                                // Check if terms exist and display them
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<li>' . esc_html($term->name) . '</li>';
                                    }
                                } else {
                                    echo '<li>No categories assigned</li>';
                                }
                                ?>
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
                        <?php
                        endif; endforeach; endif;
                        ?>
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
                        <?php 
                        if($postIdss):
                       foreach ($postIdss as $key => $values):
                        if($key == 1):
                            $postDetails = get_post_info($values);
                            $authorInfo = $postDetails->author;
                            ?>
                        <div class="letest-news-box">
                            <div class="letest-news-img">
                            <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="letest-news"></a>
                            </div>
                            <div class="category-details-box">
                                <ul class="category-tag">
                                <?php
                                // Check if terms exist and display them
                                if (!empty($terms) && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<li>' . esc_html($term->name) . '</li>';
                                    }
                                } else {
                                    echo '<li>No categories assigned</li>';
                                }
                                ?>
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
        </div></div>
    </section>
