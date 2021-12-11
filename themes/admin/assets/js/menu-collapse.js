// MENU
$(".short_menu").on("click", function () {
  $(this).toggleClass("rotate");
  $(".dash_sidebar").toggleClass("short");

  if (window.localStorage.short_menu !== "true") {
    window.localStorage.short_menu = "true";
  } else {
    window.localStorage.short_menu = "false";
  }
})

if (window.localStorage.short_menu === "true") {
  $(".short_menu").addClass("rotate");
  $(".dash_sidebar").addClass("short");
}
