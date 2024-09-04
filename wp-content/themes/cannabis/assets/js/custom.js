
jQuery(document).ready(function() {
    jQuery('.hamburger-nav').click(function() {
        jQuery('.main-header').toggleClass('mobile-menu-open');
    });
    jQuery('.menu-item-has-children').click(function() {
        jQuery('.sub-menu').toggleClass('sub-menu-open');
    });
    jQuery('.menu-has-children').click(function() {
        jQuery('.menu-has-children').toggleClass('menu-has-children-open');
    });
});



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






