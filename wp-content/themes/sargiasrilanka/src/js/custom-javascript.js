// Add your JS customizations here

jQuery(document).ready(function ($) {
  console.log(11111);

  $(document).ready(function () {
    let lastScrollTop = 0;
    const mainNav = $("#main-nav");
    if (window.scrollY > 100) {
      mainNav.addClass("-translate-y-full");
    }
    $(window).scroll(function () {
      const currentScrollTop = $(this).scrollTop();

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
      arrows: true, // Optional: Hide navigation arrows
      // dots: false, // Optional: Hide navigation dots
      infinite: false, // Optional: Infinite loop
      // speed: 800, // Optional: Transition speed
      slidesToShow: 3,
      variableWidth: true,
      // centerMode: true,
      // centerPadding: 0,
      // centerPadding: "20%",
      // centerMode: true,
      prevArrow:
        '<div class="slick-prev sargia_discover__pre"><img src="wp-content/themes/sargiasrilanka/assets/icons/arrowleft.svg" /></div>',
      nextArrow:
        '<div class="slick-next sargia_discover__next"><img src="wp-content/themes/sargiasrilanka/assets/icons/arrowright.svg" /></div>',
      responsive: [
        {
          breakpoint: 1400,
          settings: {
            slidesToShow: 5,
            infinite: false,
            dots: false,
            variableWidth: true,
          },
        },
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
          },
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: false,
            centerMode: true,
            dots: false,
            variableWidth: true,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            centerMode: false,
          },
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: false,
            dots: false,
            centerMode: false,
          },
        },
      ],
    });

    // Remove the first slide on mobile screens
    if ($(window).width() <= 767) {
      $(".sargia_discover--slider").slick("slickRemove", 0);
    }
    // $(".slider").slick({
    //   adaptiveHeight :false,
    // });
    $(".tour-frature-slider")
      .slick({
        speed: 800,
        dots: true,
        fade: true,
        adaptiveHeight: false,
        arrows: false,
        cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",
        appendDots: $(".tour-frature-slider__dots--list"),
        rows: 0,
      })
      .on("setPosition", function (event, slick) {
        slick.$slides.css("height", slick.$slideTrack.height() + "px");
      });
  });
  // debugger;
  AOS.init({
    offset: 400,
    duration: 1000,
    easing: "ease-in-out-back",
  });
});
