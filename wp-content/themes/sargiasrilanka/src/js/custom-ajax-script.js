jQuery(document).ready(function ($) {
  $('input[type="checkbox"]').change(function () {
    filterPosts();
  });

  function filterPosts() {
    var filters = {};

    $('input[type="checkbox"]:checked').each(function () {
      var slug = $(this).attr("id").replace("filter_", "");
      var taxonomy = $(this).data("taxonomy");
      //alert(slug);
      if (!filters[taxonomy]) {
        filters[taxonomy] = [];
      }

      filters[taxonomy].push(slug);
    });

    // alert(frontendajaxint.ajaxurl);

    $.ajax({
      url: ajax_object.ajax_url,
      type: "POST",
      data: {
        action: "tour_ajax_filter_posts",
        filters: filters,
      },
      success: function (data) {
        console.log(data);
        $("#content").html(data);
      },
    });
  }
});
