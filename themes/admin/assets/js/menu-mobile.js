$(".mobile_menu").click((e) => {
  e.preventDefault();

  $(".short_menu").removeClass("rotate");
  $(".dash_sidebar").removeClass("short");

  $(".dash_sidebar").animate({ right: 0 }, 200, () => {
    $("body").css("overflow", "hidden");
  })
})

function closeMenu() {
  $(".dash_sidebar").animate({ right: "-260" }, 200, () => {
    $("body").css("overflow", "auto");
  });
}

$("body").on("touchstart", (e) => {
  const button = $(e.target).hasClass("mobile_menu");
  const item = $(e.target.offsetParent).hasClass("dash_sidebar");
  if (!button && !item) {
    closeMenu();
  }
});

$(".close_menu").on("click", () => {
  closeMenu();
});

$(window).on("resize", function () {
  if ($(this).width() >= 1280) {
    $(".dash_sidebar").css("right", 0);
  } else {
    $(".dash_sidebar").css("right", -260);
  }
});
