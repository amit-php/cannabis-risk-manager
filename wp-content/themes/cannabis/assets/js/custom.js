jQuery(document).ready(function($) {
    jQuery('.hamburger-nav').click(function() {
        jQuery('.main-header').toggleClass('mobile-menu-open');
        jQuery(this).toggleClass('ham-motion');
        if (jQuery(window).width() < 1200) {
            if (jQuery('.main-header').hasClass('mobile-menu-open')) {
                // Only append if the icon doesn't already exist
                jQuery("header li.menu-item-has-children").each(function() {
                    if ($(this).find('.dropdown-icon-menu').length === 0) {
                        $(this).append('<span class="dropdown-icon-menu"></span>');
                    }
                });
            } else {
                jQuery('.dropdown-icon-menu').remove();
            }
            jQuery(".mobile-menu .sub-menu").hide();
            jQuery("header .sub-menu").hide();
            jQuery("header li.menu-item-has-children").removeClass('menu-open');
            jQuery('.sub-menu').removeClass('sub-menu-open');
        }
    });

    jQuery('.menu-item-has-children').click(function() {
        jQuery(this).find('.sub-menu').toggleClass('sub-menu-open');
        jQuery(this).toggleClass('menu-open');
    });

    jQuery('.menu-has-children').click(function() {
        jQuery(this).find('.menu-has-children').toggleClass('menu-has-children-open');
    });

    jQuery(document).on("click", ".dropdown-icon-menu", function() {
        jQuery(this).prev(".sub-menu").slideToggle();
        jQuery(this).toggleClass("active");
    });

    jQuery(".menu-item-has-children > a").click(function(e) {
        e.preventDefault();
        if (jQuery(window).width() < 1200) {
            var submenu = jQuery(this).siblings(".sub-menu");
            var isOpen = submenu.is(":visible");
            jQuery(this).parent().toggleClass("menu-open"); 
            jQuery(this).parent().find(".dropdown-icon-menu").toggleClass("active");

            var submenuItems = submenu.children("li");
            if (!isOpen) {
                setTimeout(function(){
                    jQuery(this).parent().find(".sub-menu").slideDown(); 
                }.bind(this), submenuItems.length === 1 ? 20 : 10);
            } else {
                setTimeout(function(){
                    jQuery(this).parent().find(".sub-menu").slideUp(); 
                }.bind(this), submenuItems.length === 1 ? 20 : 10);
                window.location.href = jQuery(this).attr("href");
            }
        } else {
            window.location.href = jQuery(this).attr("href");
        }
    });

    jQuery(".sub-menu li a").click(function(event) {
        event.stopPropagation();
        jQuery(this).parents(".menu-item-has-children").removeClass("menu-open");
        jQuery(this).parents(".menu-item-has-children").find(".dropdown-icon-menu").removeClass("active");
        jQuery(".dropdown-icon-menu").removeClass("active"); // Update this line
        jQuery('.hamburger-nav').removeClass('ham-motion');
    });

    jQuery(".sub-menu li a[href*='#']").click(function(event) {
        jQuery(".main-header").removeClass("mobile-menu-open");
    });
});
// Function For hamburger menu end


jQuery(window).scroll(function(){
  if (jQuery(window).scrollTop() >= 100) {
    jQuery('header').addClass('fixed');
   }
   else {
    jQuery('header').removeClass('fixed');
   }
});

jQuery(document).ready(function(){
    jQuery('a[href="#search"]').click(function() {
      event.preventDefault()
      jQuery("#search-box").addClass("-open");
      setTimeout(function() {
          inputSearch.focus();
      }, 800);
      });
    
      jQuery('a[href="#close"]').click(function() {
      event.preventDefault()
      jQuery("#search-box").removeClass("-open");
      });
    
      jQuery(document).keyup(function(e) {
      if (e.keyCode == 27) { // escape key maps to keycode `27`
        jQuery("#search-box").removeClass("-open");
      }
    });

    // video

    jQuery(document).ready(function(){
      jQuery(".box-video").click(function(){
        jQuery('iframe',this)[0].src += "&amp;autoplay=1";
        jQuery(this).addClass('open');
    });
    });
});

jQuery(document).ready(function(){
  const realFileBtn = document.getElementById("real-file");
  const customBtn = document.getElementById("choose-btn");
  const customTxt = document.getElementById("custom-text");

  customBtn.addEventListener("click", function() {
    realFileBtn.click();
  });

  realFileBtn.addEventListener("change", function() {
    if (realFileBtn.value) {
      customTxt.innerHTML = realFileBtn.value.match(
        /[\/\\]([\w\d\s\.\-\(\)]+)$/
      )[1];
    } else {
      customTxt.innerHTML = "No file chosen, yet.";
    }
  });
});




jQuery(document).ready(function(){
AOS.init();
});






