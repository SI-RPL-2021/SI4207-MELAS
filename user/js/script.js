$(document).ready(function () {
  $("#respon_pengawalan").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>TABEL RESPON PERMOHONAN <br>PENGAWALAN PERJALANAN</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#respon_keramaian").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>TABEL RESPON PERMOHONAN IZIN <br>KERAMAIAN</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#table_aduan").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>TABEL APRESIASI / PENGADUAN</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#table_pembayaran").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>TABEL HISTORY PEMBAYARAN</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#table_demo").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>TABEL DATA LAPORAN DEMO</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#table_catar").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p>TABEL PENDAFTARAN CATAR</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#table_sim").DataTable({
    info: false,
    dom: '<"top"ls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p id='titleSIM'>PEMBUATAN SIM</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $("#table_portal").DataTable({
    info: false,
    dom: '<"top"fls><bottam>p',
    language: {
      lengthMenu:
        "<div class='tableTitle'><p id='titleSIM'>TABLE PORTAL BERITA</p></div>",
      zeroRecords: "Tidak ada data.",
      search: "_INPUT_",
      searchPlaceholder: "Cari...",
    },
  });

  $(".btnEditBerita").click(function () {
    $("#judulEdit").val($(this).data("judul"));
    $("#isiEdit").val($(this).data("isi"));
    $("#idEdit").val($(this).data("id"));
    $("#imgEdit").text($(this).data("img"));
    $("#modalEdit").modal("show");
  });

  $(".btnHapusBerita").click(function () {
    $("#idHapus").val($(this).data("id"));
    const judulBerita = $(this).data("judul");
    $("#idTextHapus").text(`${judulBerita}`);
    $("#modalHapus").modal("show");
  });

  jQuery(document).ready(function ($) {
    $(".clickable-row").click(function () {
      window.location = $(this).data("href");
    });
  });

  $("#btn_sim").css("border", "3px solid black");
  $("#btn_sim").on("click", function () {
    $(this).css("border", "3px solid black");
    $("#btn_stnk").css("border", "none");
    $("#btn_skck").css("border", "none");
    $("#table_body_sim").removeClass("hidden");
    $("#table_body_stnk").addClass("hidden");
    $("#table_body_skck").addClass("hidden");
    $("#titleSIM").text("PEMBUATAN SIM");
  });

  $("#btn_stnk").on("click", function () {
    $(this).css("border", "3px solid black");
    $("#btn_sim").css("border", "none");
    $("#btn_skck").css("border", "none");
    $("#table_body_stnk").removeClass("hidden");
    $("#table_body_sim").addClass("hidden");
    $("#table_body_skck").addClass("hidden");
    $("#titleSIM").text("PEMBUATAN STNK");
  });

  $("#btn_skck").on("click", function () {
    $(this).css("border", "3px solid black");
    $("#btn_sim").css("border", "none");
    $("#btn_stnk").css("border", "none");
    $("#table_body_skck").removeClass("hidden");
    $("#table_body_sim").addClass("hidden");
    $("#table_body_stnk").addClass("hidden");
    $("#titleSIM").text("PEMBUATAN SKCK");
  });

  // Confirm pengawalan
  $(".btnConfirmTerima").on("click", function () {
    console.log($(this).data("id"));
    $("#IDPemohonPengawalan").val($(this).data("id"));
    $("#modalConfirm p").text(
      `Apakah anda yakin menerima permohonan dari ${$(this).data("nama")}?`
    );
    $("#ket").val("Diterima");
    $("#confirmPengawalan").text("Terima");
    // $("#confirmPengawalan").toggleClass("btn btn-sm btn-outline-success");
  });

  $(".btnConfirmTolak").on("click", function () {
    console.log($(this).data("id"));
    $("#IDPemohonPengawalan").val($(this).data("id"));
    $("#modalConfirm p").text(
      `Apakah anda yakin menolak permohonan dari ${$(this).data("nama")}?`
    );
    $("#ket").val("Ditolak");
    $("#confirmPengawalan").text("Tolak");
  });

  document
    .querySelector(".custom-file-input")
    .addEventListener("change", function (e) {
      var fileName = document.getElementById("customFile").files[0].name;
      var nextSibling = e.target.nextElementSibling;
      nextSibling.innerText = fileName;
    });
});
