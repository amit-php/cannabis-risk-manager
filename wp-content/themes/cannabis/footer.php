</main>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="footer-menu-wrapper">
                    <div class="footer-logo">
                        <a href="<?php echo home_url();?>"><img src="<?php echo get_theme_value('renovesa_footer_logo') ; ?>" alt="logo"></a>
                    </div>
                    <?php
                    wp_nav_menu(array(
                    'menu'=>'footer',
                    'menu_class'=>'footer-menu',
                    ))
                  ?>
                </div>

                <div class="contact-setails">
                    <ul class="social-icon">
                        <li><a href="<?php echo get_theme_value('rheader_facebook_link') ; ?>"" class="faceBook-icon"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="<?php echo get_theme_value('rheader_twitter_link') ; ?>"" class="twitter-icon"><img src="<?php echo THEME_DIR; ?>/images/twitter.png" alt="twitter"></a></li>
                        <li><a href="<?php echo get_theme_value('rheader_youtube_link') ; ?>"" class="youtube-icon"><i class="fab fa-youtube"></i></a></li>
                        <li><a href="<?php echo get_theme_value('rheader_linkdin_link') ; ?>"" class="linkdin-icon"><i class="fab fa-linkedin-in"></i></a></li>
                    </ul>
                    <ul class="office-details">
                        <li><a href="tel:<?php echo get_theme_value('ren_footer_phone_no') ; ?>"><span><i class="fas fa-phone-alt"></i></span><span><?php echo get_theme_value('ren_footer_phone_no') ; ?></span></a></li>
                        <li><span><i class="fas fa-map-marker-alt"></i></span> <span><?php echo get_theme_value('ren_footer_address') ; ?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="copy-right-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copy-right-text-box">
                        <p><?php echo get_theme_value('ren_copyright_text') ; ?></p>
                        <ul class="copy-right-terms-conditation">
                            <li><a href="<?php echo get_theme_value('ren_term_link') ; ?>"><?php echo get_theme_value('ren_term_text') ; ?></a></li>
                            <li><a href="<?php echo get_theme_value('ren_privicy_link') ; ?>"><?php echo get_theme_value('ren_privicy_text') ; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>

