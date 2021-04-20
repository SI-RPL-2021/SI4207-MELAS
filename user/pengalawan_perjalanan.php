<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pengawalan Perjalanan - MELAS'));
require_once('../config.php');

$userID = $_SESSION["user"]["id"];
$email = $_SESSION["user"]["email"];

if (isset($_POST['upload'])) {
  $rand = date("dmY");
  $ekstensi =  array('pdf');
  $filename = $_FILES['berkas']['name'];
  $ukuran = $_FILES['berkas']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  $keterangan = '0';

  if (!in_array($ext, $ekstensi)) {
    echo "
    <script>
      alert('Pastika file berformat PDF');
    </script>";
  } else {
    if ($ukuran < 1044070000) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['berkas']['tmp_name'], '../berkas/pengawalan/' . $rand . '_' . $filename);
      mysqli_query($koneksi, "INSERT INTO tbl_pengawalan (id_user, berkas, keterangan, email) VALUES('$userID','$xx','$keterangan','$email')");
      header("location:pengalawan_perjalanan.php?alert=berhasil_pengawalan");
      // echo 'BERHASIL';
    } else {
      echo 'GAGAL';
    }
  }
}

?>

<main>
  <div class="title-bar d-flex justify-content-center mb-4">
    <h2 class="text-white font-weight-bold">PENGAWALAN PERJALANAN</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <h6 class="text-white text-center mt-4">
      Pengawalan dalam perjalanan merupakan salah satu layanan dari pihak kepolisian baik yang bersifat individu maupun kelompok
    </h6>
    <div class="contoh-laporan container d-md-flex justify-content-around">
      <div class="contoh1">
        <img src="../berkas/contoh/PENGAWALAN-PERJALANAN.jpg" alt="" srcset="">

      </div>
      <div class="contoh2">
        <img src="../berkas/contoh/PENGAWALAN-PERJALANAN-2.jpg" alt="" srcset="">
      </div>
    </div>
    <p class="text-center text-white">Contoh Surat Permohonan Pengawalan</p>
    <div class="footer-pengawalan d-md-flex justify-content-around mt-4">
      <div class="ajukan-upload">
        <h3 class="text-white">Ajukan Permohonan</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="custom-file">
            <input type="file" name="berkas" class="custom-file-input" id="customFile">
            <label class="custom-file-label" for="customFile">Choose file</label>
          </div>
          <button type="submit" name="upload" class="btn">Kirim</button>
        </form>
      </div>

      <div class="catatan text-white font-weight-bold">
        <h6>Catatan!!</h6>
        <p class="text-center mt-2 mb-3">Untuk respon dari permohonan akan disampaikan lebih lanjut lewat Email</p>
        <h5>Terima kasih</h5>
      </div>
    </div>
  </section>
</main>

<?php
include('./layout/footer.php');
?>