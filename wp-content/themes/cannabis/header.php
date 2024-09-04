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
<header class="main-header">
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
                  <!-- <ul>
                    <li class="menu-has-children"><a href="news-listing.html">News</a><span></span>
                        <ul class="sub-menu">
                            <li><a href="">News 1</a></li>
                            <li><a href="">News 2</a></li>
                            <li><a href="">News 3</a></li>
                            <li><a href="">News 4</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Risk Management</a></li>
                    <li><a href="#">Insurance</a></li>
                    <li class="menu-has-children"><a href="#">States</a><span></span>
                        <ul class="sub-menu">
                            <li><a href="">States 1</a></li>
                            <li><a href="">States 2</a></li>
                            <li><a href="">States 3</a></li>
                            <li><a href="">States 4</a></li>
                        </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="learning.html">Learning</a></li>
                    <li><a href="podcast-directory.html">Podcast Directory</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="ebooks.html">Ebooks</a></li>

                  </ul> -->
                </div>
                <div class="user-sec">
                    <div class="search-box">
                        <a href="#search"><img src="<?php echo THEME_DIR; ?>/images/search-icon.svg" alt="search-icon"></a>
                        <div id="search-box">
                            <div class="container">
                                <a class="close" href="#close"><i class="fas fa-times"></i></a>
                                <div class="search-main">
                                    <div class="search-inner">
                                        <input type="text" id="inputSearch" placeholder="Search here">
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
                            <ul>
                                <li class="menu-item-has-children"><a href="news-listing.html">News<span></span></a>
                                    <ul class='sub-menu'>
                                        <li><a href="#" title="">News 1</a></li>
                                        <li><a href="#" title="">News 2</a></li>
                                        <li><a href="#" title="">News 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Risk Management</a></li>
                                <li><a href="#">Insurance</a></li>
                                <li class="menu-item-has-children"><a href="#">States <span></span></a>
                                    <ul class='sub-menu'>
                                        <li><a href="#" title="">States 1</a></li>
                                        <li><a href="#" title="">States 2</a></li>
                                        <li><a href="#" title="">States 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="learning.html">Learning</a></li>
                                <li><a href="podcast-directory.html">Podcast Directory</a></li>
                                <li><a href="events.html">Events</a></li>
                                <li><a href="ebooks.html">Ebooks</a></li>

                            </ul>
                      </div>
                  </div>
              </div>
        </div>
    </div>
</header>
<!--header sction-->
<main>