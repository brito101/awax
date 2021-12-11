$(() => {
  $("form").submit(function (e) {
    e.preventDefault();

    const form = $(this);
    const load = $(".ajax_load");

    load.fadeIn(200).css("display", "flex");

    $.ajax({
      url: form.attr("action"),
      type: "POST",
      data: form.serialize(),
      dataType: "json",
      success(response) {
        // redirect
        if (response.redirect) {
          window.location.href = response.redirect;
        } else {
          load.fadeOut(200);
        }

        // Error
        if (response.message) {
          $(".ajax_response").html(response.message).effect("shake");
        }
      },
      error() {
        load.fadeOut(200);
      },
    });
  });
});
