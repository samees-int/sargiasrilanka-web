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
        action: "my_custom_action",
        newIndex: newIndex,
      };

      // Send an AJAX request to the server
      jQuery.post(ajaxurl, data, function (response) {
        console.log("Response from server:", response);
        item.innerHTML = response;
        // const responseElement = document.getElementById('sub_field_2_' + newIndex);
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
      title: "Choose Image",
      button: {
        text: "Choose Image",
      },
      multiple: false,
    });

    customUploader.on("select", function () {
      // console.log('click' + index);
      let attachment = customUploader.state().get("selection").first().toJSON();
      // console.log(attachment.url);
      document.getElementById("sub_field_image_" + index).value =
        attachment.url;
      const wrapper = document.getElementById("img-preview_" + index);
      // console.log(attachment.url);
      const item = document.createElement("div");

      item.innerHTML = `<img src=${attachment.url} width="100px">`;
      wrapper.appendChild(item);
    });

    customUploader.open();
  }

  // Event listener for image upload buttons
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("upload-image-button")) {
      event.preventDefault(); // Prevent form submission

      let index = event.target.id.split("_")[3];
      handleImageUpload(index);
      // /console.log(index)
    }
  });
})(jQuery);
