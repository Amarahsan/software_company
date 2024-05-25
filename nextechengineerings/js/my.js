const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}

inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});

jQuery(document).ready(function ($) {
  $("#submitForm").on("click", function () {
    var formData = $("#bookingForm").serialize();

    $.ajax({
      type: "post",
      url: ajax_object.ajax_url,
      data: {
        action: "save_booking_data",
        form_data: formData,
      },
      success: function (response) {
        var data = JSON.parse(response);

        if (data.status === "success") {
          Swal.fire({
            title: "Success!",
            text: data.message,
            icon: "success",
          });
        } else {
          Swal.fire({
            title: "Error!",
            text: data.message,
            icon: "error",
          });
        }
      },
    });
  });
});
 