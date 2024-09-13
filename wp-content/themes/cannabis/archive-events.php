<?php 
echo get_header() ;
$term = get_queried_object();
?>
    <section class="banner-sec inner-banner">
        <img class="banner-img" src="<?php echo get_theme_value('event_page_banner') ; ?>" alt="events-bg">
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

    <section class="poadcast-missing light-green-bg common-padd-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="poadcast-box-wrap">
                        <div class="poadcast-text">
                            <h2><?php echo get_theme_value('event_page_heading') ; ?></h2>
                            <p><?php echo get_theme_value('event_page_sub_heading') ; ?></p>
                        </div>
                        <div class="poadcast-btn">
                            <a href="<?php echo get_theme_value('event_page_button_link') ; ?>" class="btn"><?php echo get_theme_value('event_page_button_name') ; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-text-box common-padd">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 common-padd-60 pt-0">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add-bg.jpg" alt="add-bg">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="search-for-events-form">
                        <form action="">
                            <input type="text" class="form-control"name="cps" placeholder="Search For Events">
                            <button class="btn" type="submit">Find Events</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="filter-events">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                             <li> <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">List</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Month</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Day</button>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content upcomming-events-list common-padd-60" id="pills-tabContent">
                        <div class="common-heading">
                            <div class="common-heading-text">
                                <h2>Upcoming Events</h2>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="row">
                            <?php 

                              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            if ( isset( $_GET['cps'] ) ) {
                                $search_query = sanitize_text_field( $_GET['cps'] );
                                $args = array(
                                    'post_type'      => 'events', // Specify the custom post type
                                    'posts_per_page' => 6, // Number of posts per page
                                    'paged'          => $paged, // Current page number
                                    's'              => $search_query, // The search keyword
                                    'post_status'    => 'publish' // Only show published posts
                                );
                            } else {
                                $args = array(
                                    'post_type'      => 'events', // Specify the custom post type
                                    'posts_per_page' => 6, // Number of posts per page
                                    'paged'          => $paged, // Current page number
                                    'post_status'    => 'publish' // Only show published posts
                                );
                                }
                                $query = new WP_Query( $args );
                                if ( $query->have_posts() ) :
                                    while ( $query->have_posts() ) :
                                        $query->the_post();
                                    $postIds = get_the_ID(); 
                        
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="letest-news-box">
                                        <div class="letest-news-img">
                                        <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($postIds); ?>" alt="upcomming-events"></a>
                                        </div>
                                        <div class="category-details-box">
                                            <ul class="category-tag">
                                                <li><?php echo get_field('_EventStartDate') ; ?></li>
                                            </ul>
                                            <h4><a href="<?php the_permalink();?>"><?php the_title() ; ?></a></h4>
                                            <div class="date-wrapper-main">
                                                <div class="detail-box">
                                                    <span><img src="<?php echo THEME_DIR; ?>/images/calender.svg" alt="calender"></span>
                                                </div>
                                                <ul class="date-box">
                                                    <li><?php echo get_field('_EventStartDate') ; ?> @ <?php echo get_field('start_time') ; ?></li>
                                                </ul>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; endif; ?>
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <div class="row">
                                <div class="date-filter"
                                 <label for="month-select">Select Month:</label>
                                <input type="month" id="month-select" name="month" onchange="getMonthValue()">
                                </div>
                            <div id="monthresult">
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post(); 
                                    $postIds = get_the_ID(); 
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="letest-news-box">
                                        <div class="letest-news-img">
                                        <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($postIds); ?>" alt="upcomming-events"></a>
                                        </div>
                                        <div class="category-details-box">
                                            <ul class="category-tag">
                                                <li><?php echo get_field('_EventStartDate') ; ?></li>
                                            </ul>
                                            <h4><a href="<?php the_permalink();?>"><?php the_title() ; ?></a></h4>
                                            <div class="date-wrapper-main">
                                                <div class="detail-box">
                                                    <span><img src="<?php echo THEME_DIR; ?>/images/calender.svg" alt="calender"></span>
                                                </div>
                                                <ul class="date-box">
                                                    <li><?php echo get_field('_EventEndDate') ; ?> @ <?php echo get_field('start_time') ; ?></li>
                                                </ul>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; endif; ?>
                            </div>
                           
                            </div>
                        </div>
                        <div class="tab-pane fade show" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="row">
                            <div class="date-filter"
                                 <label for="month-select">Select Day:</label>
                                <input type="date" id="month-date" name="day" onchange="getDayValue()">
                            </div>
                            <div id="dayresult">
                                <?php
                                if (have_posts()) :
                                    while (have_posts()) : the_post(); 
                                    $postIds = get_the_ID(); 
                                ?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="letest-news-box">
                                        <div class="letest-news-img">
                                        <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url($postIds); ?>" alt="upcomming-events"></a>
                                        </div>
                                        <div class="category-details-box">
                                            <ul class="category-tag">
                                                <li><?php echo get_field('_EventStartDate') ; ?></li>
                                            </ul>
                                            <h4><a href="<?php the_permalink();?>"><?php the_title() ; ?></a></h4>
                                            <div class="date-wrapper-main">
                                                <div class="detail-box">
                                                    <span><img src="<?php echo THEME_DIR; ?>/images/calender.svg" alt="calender"></span>
                                                </div>
                                                <ul class="date-box">
                                                    <li><?php echo get_field('_EventStartDate') ; ?> @ <?php echo get_field('start_time') ; ?></li>
                                                </ul>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <?php endwhile; endif; ?>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="review-pagination common-padd-60 pt-0">
                                <nav aria-label="Page navigation example">
                                <?php 
                            $pagination = get_pagination( $wp_query);
                             if ($pagination) {
                                echo  $pagination ;
                            }
                            ?>
                                </nav>
                            </div>
                        </div>
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
    <script>
function getMonthValue() {
    // Get the value of the month input
    var selectedMonth = document.getElementById("month-select").value;
       // Perform the AJAX request
       jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php') ; ?>', // The AJAX URL passed from PHP
            type: 'POST',
            data: {
                action: 'fetch_month', // The action hook in PHP
                month: selectedMonth, // Example data to send
            },
            success: function(response) {
                // Handle success response
                console.log('Response: ', response);
                jQuery('#monthresult').html(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log('Error: ', error);
            }
        });
}
function getDayValue(){
       // Get the value of the month input
       var selectedMonthday = document.getElementById("month-date").value;
       // Perform the AJAX request
       jQuery.ajax({
            url: '<?php echo admin_url('admin-ajax.php') ; ?>', // The AJAX URL passed from PHP
            type: 'POST',
            data: {
                action: 'fetch_day', // The action hook in PHP
                day: selectedMonthday, // Example data to send
            },
            success: function(response) {
                // Handle success response
                console.log('Response: ', response);
                jQuery('#dayresult').html(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log('Error: ', error);
            }
        });

}
</script>
<?php echo get_footer() ; ?>