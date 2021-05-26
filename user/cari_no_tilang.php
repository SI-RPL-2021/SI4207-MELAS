<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Informasi Tilang - MELAS'));
require_once('../config.php');

if (isset($_POST['cari'])) {
  $no_regis_tilang = $_POST['no_registrasi_tilang'];
  $query = mysqli_query($koneksi, "SELECT * FROM tbl_tilang WHERE no_blanko = '$no_regis_tilang'");
  $result = mysqli_fetch_array($query);

  if (!mysqli_error($koneksi)) {
    if (mysqli_num_rows($query) > 0) {
      header('location:detail_info_tilang.php?no_regis=' . $result["no_blanko"] . '');
    } else {
      header('location:cari_no_tilang.php?alert=cari_tidak_ditemukan');
    }
  } else {
    die(mysqli_error($koneksi));
  }
}
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">INFORMASI TILANG</h2>
  </div>

  <section class="content">
    <?php
    include('../alert.php');
    ?>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 70vh;">
      <div class="cari-tilang">
        <form action="" method="POST">
          <h4 class="text-white font-weight-bold mb-4">Masukan Nomor Registrasi Tilang</h4>
          <div class="form-group col-md-12 d-flex flex-column align-items-center">
            <input type="text" class="form-control mb-1" name="no_registrasi_tilang" id="exampleInputEmail1" aria-describedby="emailHelp" required autocomplete="off">
            <small class="text-white">Contoh: C12345678</small>
          </div>
          <div class="form-group col-md-12 d-flex justify-content-center">
            <button type="submit" name="cari" class="btn">CARI</button>
          </div>
        </form>
      </div>
    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>