jQuery(document).ready(function ($) {
  $('input[type="checkbox"]').change(function () {
    filterPosts();
  });

  function filterPosts() {
    var filters = {};

    $('input[type="checkbox"]:checked').each(function () {
      var slug = $(this).attr("id").replace("filter_", "");
      var taxonomy = $(this).data("taxonomy");
      //   alert(slug);
      if (!filters[taxonomy]) {
        filters[taxonomy] = [];
      }

      filters[taxonomy].push(slug);
    });
    // alert(ajaxurl);
    $.ajax({
      url: frontendajaxint.ajaxurl,
      type: "POST",
      data: {
        action: "get_filterd_post",
        filters: filters,
      },
      success: function (data) {
        console.log(data);
        $("#content").html(data);
      },
    });
  }
});
