(function ($) {
  "use strict";

  /**
   * All of the code for your admin-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */

  document.addEventListener("click", function (event) {
    if (event.target.id === "add-repeater-item") {
      event.preventDefault(); // Prevent form submission

      const wrapper = document.getElementById("repeater-fields");
      const newIndex = wrapper.children.length;
      const item = document.createElement("div");
      item.className = "repeater-item";
      // Create a JavaScript object with the data to send
      const data = {
        action: "tour_date_repeter_ajax",
        newIndex: newIndex,
      };

      // Send an AJAX request to the server
      jQuery.post(ajaxurl, data, function (response) {
        console.log("Response from server:", response);
        item.innerHTML = response;
        // const responseElement = document.getElementById('tour_itineraries_date_content_' + newIndex);
        // if (responseElement) {
        // 	responseElement.innerHTML = response;
        // }

        // Reinitialize the editor: Remove the editor then add it back
        tinymce.execCommand("mceRemoveEditor", false, "tdmessagereply");
        tinymce.execCommand("mceAddEditor", false, "tdmessagereply");
      });

      wrapper.appendChild(item);
    }
    if (event.target.classList.contains("remove-repeater-item")) {
      event.preventDefault(); // Prevent form submission

      event.target.closest(".repeater-item").remove();
    }
  });

  // Function to handle image upload
  function handleImageUpload(index) {
    let customUploader = wp.media({
      title: "Choose Images",
      button: {
        text: "Choose Images",
      },
      multiple: true, // Allow multiple image selection
    });

    customUploader.on("select", function () {
      let attachments = customUploader.state().get("selection").toJSON();

      // Clear any existing previews
      const wrapper = document.getElementById("img-preview_" + index);
      wrapper.innerHTML = "";

      // Loop through each selected attachment and display its preview
      attachments.forEach(function (attachment) {
        console.log("Attachment URL: ", attachment.id);
        document.getElementById("tour_itineraries_date_image_" + index).value +=
          attachment.id + ","; // Store URLs (you can modify how you want to store these URLs)

        const item = document.createElement("span");
        item.innerHTML = `<img src="${attachment.url}" width="100px">`;
        wrapper.appendChild(item);
      });
    });

    // customUploader.on("select", function () {
    //   // console.log('click' + index);
    //   let attachment = customUploader.state().get("selection").first().toJSON();
    //   console.log(attachment);
    //   document.getElementById("tour_itineraries_date_image_" + index).value =
    //     attachment.url;
    //   const wrapper = document.getElementById("img-preview_" + index);
    //   // console.log(attachment.url);
    //   const item = document.createElement("div");

    //   item.innerHTML = `<img src=${attachment.url} width="100px">`;
    //   wrapper.appendChild(item);
    // });

    customUploader.open();
  }

  // Event listener for image upload buttons
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("upload-image-button")) {
      event.preventDefault(); // Prevent form submission

      let index = event.target.id.split("_")[3];
      handleImageUpload(index);
    }
  });

  jQuery(document).ready(function ($) {
    // Function to handle the "Remove Image" link
    $(".custom-image-container").on("click", ".remove-map-image", function (e) {
      e.preventDefault();
      $("#map_image_id").val(""); // Clear the image ID
      $(".custom-image-container img").attr("src", ""); // Clear the displayed image
      $(".custom-image-container img").hide();
      $("#map_image_btn").show();
      $(this).hide();
    });
    $(".custom_image_upload_btn").on("click", function (e) {
      e.preventDefault();
      let imageFrame = wp.media({
        title: "Select or Upload Image",
        button: {
          text: "Use this image",
        },
        multiple: false,
      });

      imageFrame.on("select", function () {
        let attachment = imageFrame.state().get("selection").first().toJSON();
        $("#map_image_id").val(attachment.id);

        var img_preview_tag = document.getElementById("map_img_preview");
        img_preview_tag.style.display = "block";
        $(".remove-map-image").show();
        $("#map_image_btn").hide();

        // Display the selected image
        let imageUrl = attachment.url;
        $(".custom-image-container img").attr("src", imageUrl);
      });

      imageFrame.open();
    });
    // tour type make as radio button
    $("#tour_destinationchecklist .selectit input").attr("type", "radio");
  });
})(jQuery);
