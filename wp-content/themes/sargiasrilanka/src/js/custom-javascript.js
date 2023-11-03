// Add your JS customizations here

jQuery(document).ready(function ($) {});
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
        mainNav.removeClass("-translate-y-full");
        mainNav.addClass("bg-white shadow");
        navLink.addClass("bg-white");
        navLink.parent().addClass("primary-underline");
        customLogo.hide();
        secondaryLogo.show();

        // Check if we're at the top of the page
        if (currentScrollTop === 0) {
          mainNav.removeClass("bg-white shadow");
          navLink.removeClass("bg-white");
          navLink.parent().removeClass("primary-underline");
          secondaryLogo.hide();
          customLogo.show();
        }
      }

      lastScrollTop = currentScrollTop;
    });
  });
})(jQuery);
