<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Izin Keramaian - MELAS'));
require_once('../config.php');

$userID = $_SESSION["user"]["id"];
if (isset($_POST['upload'])) {
  $rand = date("dmY");
  $ekstensi =  array('pdf');
  $filename = $_FILES['berkas']['name'];
  $ukuran = $_FILES['berkas']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  $keterangan = '0';
  $emailPemohon = $_POST['email'];

  if (!in_array($ext, $ekstensi)) {
    echo "
    <script>
      alert('Pastika file berformat PDF');
    </script>";
  } else {
    if ($ukuran < 1044070000) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['berkas']['tmp_name'], '../berkas/keramaian/' . $rand . '_' . $filename);
      mysqli_query($koneksi, "INSERT INTO tbl_izin_keramaian (id_user, berkas, keterangan, email) VALUES('$userID','$xx','$keterangan','$emailPemohon')");
      header("location:izin_keramaian.php?alert=berhasil_izin_keramaian");
      // echo 'BERHASIL';
    } else {
      echo 'GAGAL';
    }
  }
}
?>

<main>
  <div class="mb-4 title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">IZIN KERAMAIAN</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>

    <h6 class="text-white text-center mt-4">
      Izin Keramaian dimaksudkan untuk menjadga suasana yang kondusif bagi semua pihak. Kelancaran suatu acara keramaian pasti harus didukung dengan persiapan pengamanan yang pas.
    </h6>

    <div class="contoh-laporan container d-md-flex justify-content-around">
      <div class="contoh1">
        <img src="../berkas/contoh/IZIN-KERAMAIAN.jpg" alt="" srcset="">
      </div>
      <div class="contoh2">
        <img src="../berkas/contoh/IZIN-KERAMAIAN-2.jpg" alt="" srcset="">
      </div>
    </div>
    <p class="text-center text-white">Contoh Surat Permohonan Izin Keramaian</p>
    <div class="footer-keramaian d-flex justify-content-center mt-4">
      <div class="ajukan-upload">
        <h3 class="text-white">Ajukan Laporan</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="row d-md-flex justify-content-center mt-4">
            <div class="form-group col-5">
              <label class="text-white" for="custimeFile">Upload Surat Permohonan</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="berkas" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <div class="form-group col-5">
              <label class="text-white" for="custimeFile">Email</label>
              <div class="custom-file">
                <input type="email" name="email" class="form-control" id="customFile">
              </div>
            </div>

          </div>
          <div class="button">
            <button href="#" type="submit" name="upload" class="btn">Kirim</button>
          </div>

        </form>
      </div>

    </div>
  </section>
</main>


<?php
include('./layout/footer.php');
?>