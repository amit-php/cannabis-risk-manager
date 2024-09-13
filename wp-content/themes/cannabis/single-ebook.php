<?php 
echo get_header() ;
$postDetails = get_post_info($post->ID);
$authorInfo = $postDetails->author;
$pdIds = $post->ID;
 ?>

   
    <section class="featured-articles-sec business-news ebook-padd">
        <div class="container">
            <div class="row add-sec common-padd pt-0">
                <div class="col-lg-12">
                    <div class="add-box">
                        <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                    </div>
                </div>
            </div> 
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="ebook-wrapper ebook-dtl-wrap">
                        <div class="eebook-img">
                            <img src="<?php echo get_the_post_thumbnail_url() ; ?>" alt="ebook-bg">
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text-wrapper-box fw-normal for-letter-space">
                        <h2 class="for-letter-space"><?php echo get_the_title(); ?></h2>
                        <p><?php echo get_the_content(); ?></p>
                        <div class="ev-detail-btn">
                            <a href="#" class="btn w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" id="downloadLink">  <img src="<?php echo THEME_DIR; ?>/images/download.png" alt="download">&nbsp;Download E-book</a>
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
                           $AllPost = get_posts_with_tax_and_pagination('ebook',false, false, 5);
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
                                 
                        ?>
                            <div class="letest-news-box">
                                <div class="letest-news-img">
                                <a href="<?=$postDetails->link ; ?>" ><img src="<?=$postDetails->thumbnailUrl; ?>" alt="letest-news"></a>
                                </div>
                                <div class="category-details-box">
                                    <!-- <ul class="category-tag">
                                        <li>News</li>
                                        <li>Politics</li>
                                    </ul> -->
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
                                <!-- <ul class="category-tag">
                                    <li>News</li>
                                    <li>Politics</li>
                                </ul> -->
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
   
    <div class="modal fade down-model" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Download  E-book</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="add-new-poadcast-form">
                <form class="row" id="ajaxForm">
                    <?php
                    $pdf_file_id = get_field('dowload_image'); // Replace 'dowload_image' with your actual ACF field name
                    // var_dump($pdf_file_id);
                    // Get the file URL using the file ID
                    if ($pdf_file_id) {
                        $pdf_file_url = wp_get_attachment_url($pdf_file_id); // Retrieve the URL of the file
                        // echo '<p>File ID: ' . $pdf_file_id . '</p>'; // Optional: Display file ID for debugging
                    }
                    ?>
                <input type="hidden" name="imagePath" id="imagePath" value="<?php echo esc_url($pdf_file_url); ?>">

                <div class="col-lg-12 col-md-12 mb-4">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Enter full name" required>
                </div>
                <div class="col-lg-12 col-md-12 mb-4">
                    <label for="email" class="form-label">Email Address*</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
                </div>
                <div class="col-lg-12 col-md-12 col-12">
                    <button class="btn w-100" type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

    <?php echo get_footer() ; ?>


    <script>
        jQuery(document).ready(function($) {
            $('#ajaxForm').on('submit', function(e) {
                e.preventDefault(); // Prevent default form submission
                var fullName = $('#fullName').val();
                var email = $('#email').val();
                var pdf_image = $('#imagePath').val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>', // WordPress AJAX URL
                    data: {
                        action: 'send_email_and_download_pdf', // Hook in PHP
                        fullName: fullName,
                        email: email,
                        pdf_image: pdf_image,
                    },
                    success: function(response) {
                        if(response.success) {
                            var pdfUrl = pdf_image; // Replace with your PDF URL
                            var link = document.createElement('a');
                            link.href = pdfUrl;
                            link.download = 'file.pdf';  // Optional: Specify a default filename
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                            jQuery('.btn-close').trigger('click');
                        } else {
                            alert('Failed to send the email.');
                        }
                    }
                });
            });
        });

    </script>