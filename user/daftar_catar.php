<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pendaftaran Catar - MELAS'));
require_once('../config.php');

if (isset($_POST['daftarcatar'])) {
  $idUser = $_SESSION['user']['id'];
  $nama = $_POST['nama'];
  $nik = $_POST['nik'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];
  $alamat = $_POST['alamat'];
  $agama = $_POST['agama'];
  $status = $_POST['status'];
  $tinggi_badan = $_POST['tinggi_badan'];
  $ttl = $_POST['ttl'];
  $created_at = date('Y-m-d');

  $query = "INSERT INTO tbl_pendaftar_catar (id_user,nama,nik,email,telepon,alamat,status,agama,tinggi_badan,ttl,created_at) VALUES ('$idUser','$nama','$nik','$email','$telepon','$alamat','$status','$agama','$tinggi_badan','$ttl','$created_at')";

  if (mysqli_query($koneksi, $query)) {
    header('location:daftar_catar.php?alert=daftar_catar_berhasil');
  } else {
    die(mysqli_error($koneksi));
  }
}

?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PENDAFTARAN CATAR</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container container-detail-catar">
      <form class="mt-5" method="post">
        <div class="form-row">

          <div class="form-group col-md-9">
            <div class="form-group row col-md-5">
              <label for="inputEmail4" class="text-white">Nama Lengkap</label>
              <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="">
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group row col-md-5">
              <label for="inputEmail4" class="text-white">NIK</label>
              <input type="text" class="form-control" name="nik" id="inputEmail4" placeholder="">
            </div>
          </div>


          <div class="form-group col-md-2">
            <img src="../assets/polisi-ilustrasi-2.png" alt="" srcset="">
          </div>
        </div>


        <div class="form-row">
          <!-- <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="inputEmail4" required placeholder=""> -->
          <!-- </div> -->
          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Agama</label>
            <input type="text" name="agama" class="form-control" id="inputPassword4" required placeholder="">
          </div>
          <div class="form-group col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Status</label>
            <input type="text" class="form-control" name="status" id="inputPassword4" required placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" required placeholder="">
          </div>
          <div class="form-group col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Tinggi Badan</label>
            <div class="input-group">
              <input type="number" name="tinggi_badan" class="form-control" id="inputPassword4" required placeholder="">
              <div class="input-group-prepend">
                <div class="input-group-text">CM</div>
              </div>
            </div>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Telepon/HP</label>
            <input type="number" name="telepon" class="form-control" id="inputEmail4" required placeholder="">
          </div>
          <div class="form-group col-md-4"></div>

          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Tempat Tanggal Lahir</label>
            <input type="text" name="ttl" class="form-control" id="inputPassword4" required placeholder="Contoh: Bandung, 10-10-1995">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Alamat Domisili</label>
            <input type="text" name="alamat" class="form-control" id="inputEmail4" required placeholder="">
          </div>
          <div class="form-group col-md-4"></div>

          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" required placeholder="">
          </div>
        </div>


        <div class="form-group">
          <button type="submit" name="daftarcatar" class="btn btn-primary">Registrasi</button>
        </div>
      </form>
    </div>



  </section>
</main>

<?php
include('./layout/footer.php');
?>