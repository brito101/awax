  let ajaxResponseBaseTime = 3;
  const ajaxResponseRequestError =
    "<div class='message error icon-warning'>Desculpe mas não foi possível processar sua requisição...</div>";

 // AJAX RESPONSE
 function ajaxMessage(message, time) {
  const ajaxMessageContent = $(message);

  ajaxMessageContent.append("<div class='message_time'></div>");
  ajaxMessageContent
    .find(".message_time")
    .animate({ width: "100%" }, time * 1000, function () {
      $(this).parents(".message").fadeOut(200);
    });

  $(".ajax_response").append(ajaxMessageContent);
  ajaxMessageContent.effect("bounce");
}

  // DATA SET
  $("[data-post]").click(function (e) {
    e.preventDefault();

    const clicked = $(this);
    const data = clicked.data();
    const load = $(".ajax_load");

    if (data.confirm) {
      const deleteConfirm = confirm(data.confirm);
      if (!deleteConfirm) {
        return;
      }
    }

    $.ajax({
      url: data.post,
      type: "POST",
      data,
      dataType: "json",
      beforeSend() {
        load.fadeIn(200).css("display", "flex");
      },
      success(response) {
        // redirect
        if (response.redirect) {
          window.location.href = response.redirect;
        } else {
          load.fadeOut(200);
        }

        // reload
        if (response.reload) {
          window.location.reload();
        } else {
          load.fadeOut(200);
        }

        // message
        if (response.message) {
          ajaxMessage(response.message, ajaxResponseBaseTime);
        }
      },
      error() {
        ajaxMessage(ajaxResponseRequestError, 5);
        load.fadeOut();
      }
    });
  });

  // FORMS
  $("form:not('.ajax_off')").submit(function (e) {
    e.preventDefault();

    const form = $(this);
    const load = $(".ajax_load");

    if (typeof tinyMCE !== "undefined") {
      tinyMCE.triggerSave();
    }

    form.ajaxSubmit({
      url: form.attr("action"),
      type: "POST",
      dataType: "json",
      beforeSend() {
        load.fadeIn(200).css("display", "flex");
      },
      uploadProgress(_event, _position, _total, completed) {
        const loaded = completed;
        const loadTitle = $(".ajax_load_box_title");
        loadTitle.text(`Enviando (${loaded}%)`);

        if (completed >= 100) {
          loadTitle.text("Aguarde, carregando...");
        }
      },
      success(response) {
        // redirect
        if (response.redirect) {
          window.location.href = response.redirect;
        } else {
          form.find("input[type='file']").val(null);
          load.fadeOut(200);
        }

        // reload
        if (response.reload) {
          window.location.reload();
        } else {
          load.fadeOut(200);
        }

        // message
        if (response.message) {
          ajaxMessage(response.message, ajaxResponseBaseTime);
        }

        // image by mce upload
        if (response.mce_image) {
          $(".mce_upload").fadeOut(200);
          tinyMCE.activeEditor.insertContent(response.mce_image);
        }
      },
      complete() {
        if (form.data("reset") === true) {
          form.trigger("reset");
        }
      },
      error() {
        ajaxMessage(ajaxResponseRequestError, 5);
        load.fadeOut();
      }
    });
  });

  // AJAX RESPONSE MONITOR
  $(".ajax_response .message").each((e, m) => {
    ajaxMessage(m, (ajaxResponseBaseTime += 1));
  });

  // AJAX MESSAGE CLOSE ON CLICK
  $(".ajax_response").on("click", ".message", function () {
    $(this).effect("bounce").fadeOut(1);
  });
