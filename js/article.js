$(document).ready(function () {
    $(".artikel").on("click", function () {
      $(this).find(".konten-artikel").slideToggle();
      $(this).toggleClass("active");
    });

    $(".artikel").each(function () {
      var konten = $(this).find(".konten-artikel");
      konten.hide();
      $(this).addClass("collapsed");
    });
  });