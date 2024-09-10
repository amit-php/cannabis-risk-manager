
<section class="newsletter-sec" id="newsletter-section">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                    <div class="news-letter-box-main">
                        <img class="right-partical-img" src="<?php echo THEME_DIR; ?>/images/partical-right.png" alt="partical-right">
                        <div class="news-letter-text-box">
                            <div class="news-letter-text">
                                <h2><?php echo get_theme_value('newsletter_title') ; ?></h2>
                                <p><?php echo get_theme_value('newsletter_heading') ; ?></p>
                            </div>
                            <form class="row">
                            <?php echo do_shortcode('[mc4wp_form id=177]'); ?>

                            </form>
                        </div>

                        <div class="partical-img-box">
                            <img src="<?php echo get_theme_value('newsletter_image') ; ?>" alt="tree-partical">
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
    document.querySelector('.right-box').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent the default anchor link behavior

        // Scroll to the newsletter section smoothly
        document.querySelector('#newsletter-section').scrollIntoView({
            behavior: 'smooth'
        });
    });
</script>
