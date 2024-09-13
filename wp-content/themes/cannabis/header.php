<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>" />
  <title><?php the_title() ; ?></title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/
      html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/
      respond.min.js"></script>
  <![endif]-->
<link rel="icon" href="<?php echo get_theme_value('renovesa_favicon') ; ?>" sizes="32x32" />
  <?php wp_head() ; ?>
</head>
<body <?php body_class(); ?>>
<!--header sction-->
<header class="main-header<?php if (is_single() || is_page(297) ||  is_page(306) ||is_page(25)) { echo ' nobanner-header'; } ?>">
    <div class="container header-row">
        <div class="top-header">
            <div class="right-box">
                <a href="<?php echo get_theme_value('rheader_newsletter_link') ; ?>" class="newsletter-tag"><?php echo get_theme_value('rheader_newsletter_title') ; ?></a>
            </div>
            <div class="center-logo desktop-menu">
                <a href="<?php echo home_url() ; ?>"><img src="<?php echo get_theme_value('renovesa_header_logo') ; ?>" alt="logo"></a>
            </div>
            <div class="left-social-icon">
                <ul class="social-icon">
                    <li><a href="<?php echo get_theme_value('rheader_facebook_link') ; ?>" class="faceBook-icon"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="<?php echo get_theme_value('rheader_twitter_link') ; ?>" class="twitter-icon"><img src="<?php echo THEME_DIR; ?>/images/twitter.png" alt="twitter"></a></li>
                    <li><a href="<?php echo get_theme_value('rheader_youtube_link') ; ?>" class="youtube-icon"><i class="fab fa-youtube"></i></a></li>
                    <li><a href="<?php echo get_theme_value('rheader_linkdin_link') ; ?>" class="linkdin-icon"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="manu-part mobile-menu-wrapper">
        <div class="container">
            <div class="logo mobile-menu">
                <a href="index.html"><img src="<?php echo THEME_DIR; ?>/images/logo.svg" alt="" /></a>
            </div>
            <div class="hdr-rt">
                <div class="main-menu">
                <?php
                    wp_nav_menu(array(
                    'menu'=>'header',
                    'menu_class'=>'',
                    ))
                  ?>
                </div>
                <div class="user-sec">
                    <div class="search-box">
                        <a href="#search"><img src="<?php echo THEME_DIR; ?>/images/search-icon.svg" alt="search-icon"></a>
                        <div id="search-box">
                            <div class="container">
                                <a class="close" href="#close"><i class="fas fa-times"></i></a>
                                <div class="search-main">
                                    <div class="search-inner">
                                        <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="hamburger-nav">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
              </div>
      
      
              <div class="mobile-menu-container">
                  <div class="inner-container">
                      <div class="mobile-top-section"> </div>
                      <div class="mobile-menu">
                      <?php
                    wp_nav_menu(array(
                    'menu'=>'header',
                    'menu_class'=>'',
                    ))
                  ?>
                      </div>
                  </div>
              </div>
        </div>
    </div>
</header>
<!--header sction-->
<main>