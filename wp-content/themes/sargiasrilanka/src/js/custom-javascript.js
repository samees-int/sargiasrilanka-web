// Add your JS customizations here

(function ($) {
  $(document).ready(function () {
    let lastScrollTop = 0;

    $(window).scroll(function () {
      const currentScrollTop = $(this).scrollTop();
      const mainNav = $("#main-nav");
      const customLogo = mainNav.find(".custom-logo-link");
      const secondaryLogo = mainNav.find(".secondary-logo-link");
      const navLink = mainNav.find(".nav-item .nav-link");

      if (currentScrollTop > lastScrollTop) {
        if (currentScrollTop > 100) {
          // Scrolling down, hide the header
          mainNav.addClass("-translate-y-full");
          // customLogo.hide();
          // secondaryLogo.show();
        }
      } else {
        // Scrolling up, show the header
        mainNav.removeClass("-translate-y-full navbar-dark");
        mainNav.addClass("bg-white shadow navbar-light");
        navLink.addClass("has-bg-white");
        navLink.parent().addClass("primary-underline");
        customLogo.hide();
        secondaryLogo.show();

        // Check if we're at the top of the page
        if (currentScrollTop === 0) {
          mainNav.removeClass("bg-white shadow navbar-light");
          mainNav.addClass("navbar-dark");
          navLink.removeClass("has-bg-white");
          navLink.parent().removeClass("primary-underline");
          secondaryLogo.hide();
          customLogo.show();
        }
      }

      lastScrollTop = currentScrollTop;
    });

    $(".sargia_discover--slider").slick({
      // arrows: true, // Optional: Hide navigation arrows
      // dots: false, // Optional: Hide navigation dots
      // infinite: false, // Optional: Infinite loop
      // speed: 800, // Optional: Transition speed
      slidesToShow: 4,

      // centerMode: true,
      // centerPadding: 0,
      // centerPadding: "20%",
      // centerMode: true,
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            centerMode: true,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
            centerMode: true,
          },
        },
      ],
    });
    $(".tour-frature-slider").slick({
      speed: 800,
      dots: true,
      fade: true,
      cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
      appendDots: $(".tour-frature-slider__dots--list"),
    });
  });
})(jQuery);
