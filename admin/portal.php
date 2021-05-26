<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Portal Berita - MELAS'));
require_once('../config.php');

if (isset($_POST['upload'])) {
  $userID = $_SESSION["admin"]["id"];
  $penulis = $_SESSION["admin"]["nama"];
  $isi = $_POST['isi'];
  $judul = $_POST['judul'];
  $created_at = date("Y-m-d H-i-s");

  $rand = date("dmY");
  $ekstensi =  array('jpg', 'png', 'jpeg');
  $filename = $_FILES['img']['name'];
  $ukuran = $_FILES['img']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);

  if (!in_array($ext, $ekstensi)) {
    echo "
    <script>
      alert('Pastika format file sudah benar');
    </script>";
  } else {
    if ($ukuran < 1044070000) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['img']['tmp_name'], '../berkas/img_berita/' . $rand . '_' . $filename);
      mysqli_query($koneksi, "INSERT INTO tbl_portal_berita (id_user, img, isi, judul, penulis, time) VALUES('$userID','$xx','$isi','$judul','$penulis', '$created_at')");
      header("location:portal.php?alert=berhasil_upload_berita");
      // echo 'BERHASIL';
    } else {
      echo 'GAGAL';
    }
  }
}
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PORTAL BERITA</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="pengaduan container mt-5 mb-4">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="form-group col-md-4">
            <label class="text-white" for="exampleFormControlSelect1">Masukan isi judul</label>
            <input name="judul" class="form-control" id="exampleFormControlSelect1" required>
          </div>
        </div>
        <div class="row mt-5">
          <div class="form-group col-md-7">
            <label class="text-white" for="exampleInputPassword1">Masukan isi berita</label>
            <textarea class="form-control" name="isi" id="exampleFormControlTextarea1" rows="9"></textarea required>
          </div>
          <div class="form-group col-md-1"></div>

          <div class="form-group col-md-4">
            <label class="text-white" for="custimeFile">Upload Gambar</label>
            <div class="custom-file">
              <input type="file" name="img" class="custom-file-input" id="customFile" required>
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
          </div>
        </div>

        <div class="form-group col-md">
          <button type="submit" name="upload" class="btn float-right mt-2 button-submit">Upload Berita</button>
        </div>
      </form>
    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>