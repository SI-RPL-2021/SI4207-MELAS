$(document).ready(function () {
  $("#pembayaranTransfer").css("display", "none");
  $("#pembayaranVA").css("display", "none");
  $("#pembayaranMBanking").css("display", "none");
  $("#pembayaranDK").css("display", "none");
  $("#pembayaranGRetail").css("display", "none");
  let GR = $("#GRetail").css("display", "none");

  let nominal = 0;
  let MetodeBayar = "";
  $("#btnPilihMetode").on("click", function () {
    MetodeBayar = $("#metodePembayaran").val();
    nominal = $("#nominal").val();
    if (MetodeBayar === "Transfer Bank") {
      $("#pembayaranTransfer").css("display", "block");
      $("#pembayaran").css("display", "none");
      console.log(nominal);
      console.log(MetodeBayar);
    } else if (MetodeBayar === "Gerai Retail") {
      $("#pembayaranGRetail").css("display", "block");
      $("#pembayaran").css("display", "none");
      $("#GRetail").css("display", "flex");
      $("#banks").css("display", "none");
    } else if (MetodeBayar === "Virtual Account") {
      $("#pembayaranVA").css("display", "block");
      $("#pembayaran").css("display", "none");
    } else if (MetodeBayar === "Debit / Credit") {
      $("#pembayaranDK").css("display", "block");
      $("#pembayaran").css("display", "none");
    } else if (MetodeBayar === "M-Banking") {
      $("#pembayaranMBanking").css("display", "block");
      $("#pembayaran").css("display", "none");
    }
  });
});
$(".custom-file-input").on("change", function () {
  let fileName = $(this).val().split("\\").pop();
  $(this).next(".custom-file-label").addClass("selected").html(fileName);
});
