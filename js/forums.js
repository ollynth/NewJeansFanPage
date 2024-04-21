$(document).ready(function () {
    $("form").submit(function (event) {
      event.preventDefault();

      var judul = $("#judul").val();
      var isi = $("#isi").val();

      if (judul !== "" && isi !== "") {
        var postingBaru = $(
          "<li><h3>" + judul + "</h3><p>" + isi + "</p></li>"
        );
        $("main ul").append(postingBaru);

        $("form")[0].reset();
      } else {
        alert("Mohon lengkapi semua kolom input.");
      }
    });
  });