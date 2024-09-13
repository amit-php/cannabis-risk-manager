<?php 
echo get_header() ;
 ?>
<section class="add-new-poadcast-sec common-padd-60 pb-0 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="add-box">
                    <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                </div>
            </div>
        </div>
        <div class="row featured-main-sec learn-sct">
            <div class="col-lg-12">
                <div class="news-details-box">
                    
                    <div class="news-details-img">
                        <div class="box-video">
                            <div class="bg-video" style="background-image: url(<?php echo get_field('banner_image') ; ?>)">
                              <div class="bt-play"></div>
                            </div>
                            <div class="video-container">
                              <iframe width="100%" height="550" src="<?php echo get_field('banner_video') ; ?>" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                            </div>
                          </div>
                          
                    </div>
                    <div class="category-details-box">
                       
                      <h2>
                      </h2>
                      <hr>
                  </div>
                    <div class="news-details-text-box">
                    <?php echo get_post_field('post_content',$post->ID) ; ?>
                        <div class="add-box common-padd-60">
                            <img src="<?php echo THEME_DIR; ?>/images/add-bg2.jpg" alt="add-bg">
                        </div>
                        <h2><?php echo get_field('heading') ; ?></h2>
                        <?php 
                        $stateData = get_field('add_states') ;
                        if($stateData):
                        ?>
                        <div class="news-accr pt-4">
                            <div class="accordion" id="accordionExample">
                              <?php 
                              foreach ($stateData as $key => $state_value): 
                              if($key == 0){
                                $is_hide = "show";
                              } else {
                                $is_hide = "";
                              }
                              ?>
                              
                                <div class="accordion-item">
                                  <h2 class="accordion-header" id="heading<?php echo $key ; ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key ; ?>" aria-expanded="true" aria-controls="collapseOne">
                                        <?php echo $state_value["title"] ; ?>
                                    </button>
                                  </h2>
                                  <div id="collapse<?php echo $key ; ?>" class="accordion-collapse collapse <?php echo $is_hide ; ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    <?php echo $state_value["content"] ; ?>  
                                    </div>
                                  </div>
                                </div>
                                <?php endforeach ; ?>

                                
                        </div>
                        <?php endif ; ?>
                                <div class="add-box common-padd-60">
                                    <img src="<?php echo THEME_DIR; ?>/images/add6.jpg" alt="add-bg">
                                </div>
                          <?php 
                          $pricingData = get_field('add_price') ;
                          if($pricingData):
                          ?>      
                         <h2><?php echo get_field('heading_price') ; ?></h2>
                        <div class="table-wrap">
                          <table class="rwd-table">
                            <tbody>
                              <tr>
                                <?php 
                                foreach ($pricingData as $key => $thead):
                                  ?>
                                <th><?php echo $thead['title'] ; ?> </th>
                                <?php endforeach ; ?>
                            
                              </tr>

                              <tr>
                              <?php 
                                foreach ($pricingData as $key => $priceVal):
                                  ?>
                                <td data-th="Supplier Code">
                                  <?php echo $priceVal["price"]; ?>
                                </td>
                                <?php endforeach ; ?>
                              </tr>
                          
                              <tr>
                              <?php 
                                foreach ($pricingData as $key => $userVal):
                                  ?>
                                <td data-th="Supplier Code">
                                 <?php echo $userVal["users"]; ?>
                                </td>
                                <?php endforeach ; ?>
                             
                              </tr>
                        
                            </tbody>
                          </table>
                        </div>
                        <?php endif ; ?>
                        
                        
                    </div>
                </div>
            </div>
           
        </div>
       
    </div>
</section>
<section class="learn-form light-green-bg">
<div class="container">
    <div class="row common-padd  ">
        <div class="common-heading">
            <div class="common-heading-text">
                <h2 class="light-green-bg for-letter-space"><?php echo get_field('add_title') ; ?></h2>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="add-new-poadcast-form">
              <?php echo do_shortcode('[contact-form-7 id="70706af" title="Register for classes"]') ; ?>
               
            </div>
        </div>
    </div>
</div>
</section>

<?php echo get_footer() ; ?>