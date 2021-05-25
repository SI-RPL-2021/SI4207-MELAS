<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pembuatan SIM, STNK, SKCK - MELAS'));
require_once('../config.php');

$idUser = $_SESSION['user']['id'];


if (isset($_POST['ajukan'])) {
  $rand = date("dmYHis");
  $ekstensi =  array('png', 'jpg', 'jpeg');
  $filenameKTP = $_FILES['copy_ktp']['name'];
  $filenameKK = $_FILES['copy_kk']['name'];
  $filenameAKTA = $_FILES['copy_akta']['name'];
  $filenamePASPOR = $_FILES['copy_paspor']['name'];
  $filenamePAS = $_FILES['pas_foto']['name'];
  $ukuran = $_FILES['copy_ktp']['size'];

  $extKTP = pathinfo($filenameKTP, PATHINFO_EXTENSION);
  $extKK = pathinfo($filenameKK, PATHINFO_EXTENSION);
  $extAKTA = pathinfo($filenameAKTA, PATHINFO_EXTENSION);
  $extPASPOR = pathinfo($filenamePASPOR, PATHINFO_EXTENSION);
  $extPAS = pathinfo($filenamePAS, PATHINFO_EXTENSION);

  $id_user = $_SESSION['user']['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $jenis = $_POST['jenis'];

  if (!in_array($extKTP, $ekstensi) and !in_array($extKK, $ekstensi) and !in_array($extAKTA, $ekstensi) and !in_array($extPAS, $ekstensi)) {
    echo "
    <script>
      alert('Pastika file berformat JPG, JPEG, atau PNG');
      window.location = 'pembuatan_sim_stnk_skck.php';
    </script>";
  } else {
    if ($ukuran < 1044070000) {
      $ktp = $rand . '_' . $filenameKTP;
      $kk = $rand . '_' . $filenameKK;
      $akta = $rand . '_' . $filenameAKTA;
      $paspor = null;
      $pas = $rand . '_' . $filenamePAS;
      move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);
      move_uploaded_file($_FILES['copy_kk']['tmp_name'], '../berkas/sim_stnk_skck/kk/' . $kk);
      move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
      move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);

      if ($filenamePASPOR) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
      }

      $nik = $_POST['nik'];
      $created_at = date("Y-m-d H-i-s");
      $query =  "INSERT INTO tbl_sim_stnk_skck (id_user, nama, jenis, nik, alamat, copy_ktp, copy_kk, copy_akta, copy_paspor, pas_foto, created_at) VALUES('$id_user','$nama','$jenis','$nik','$alamat','$ktp','$kk','$akta','$paspor','$pas','$created_at')";


      if (mysqli_query($koneksi, $query)) {
        $tanggal = date("Y-m-d");

        $query_tagihan = mysqli_query($koneksi, "SELECT max(no_tagihan) as kode FROM tbl_tagihan");
        $dataCoba = mysqli_fetch_array($query_tagihan);
        $tagihan = $dataCoba['kode'];
        $kode_tagihan = (int)$tagihan;
        $kode_tagihan++;
        $no_tagihan = sprintf("%08s", $kode_tagihan);

        $jumlah_tagihan;
        $deskripsi;

        if ($jenis == 'SIM') {
          $jumlah_tagihan = '250000';
          $deskripsi = 'Membayar SIM';
        } else if ($jenis == 'STNK') {
          $jumlah_tagihan = '350000';
          $deskripsi = 'Membayar STNK';
        } else if ($jenis == 'SKCK') {
          $jumlah_tagihan = '450000';
          $deskripsi = 'Membayar STNK';
        }

        mysqli_query($koneksi, "INSERT INTO tbl_tagihan (no_tagihan, jumlah, tanggal, deskripsi, id_user) VALUES ('$no_tagihan','$jumlah_tagihan','$tanggal','$deskripsi','$id_user')") or die(mysqli_error($koneksi));

        header("location:pembuatan_sim_stnk_skck.php?alert=berhasil_sim_stnk_skck");
      } else {
        die(mysqli_error($koneksi));
      }
    } else {
      echo "
    <script>
      alert('Gagal!');
    </script>";
    }
  }
}

?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PEMBUATAN SIM, STNK, DAN SKCK</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container container-detail-catar">
      <form class="mt-5" method="POST" enctype="multipart/form-data">
        <div class="form-row">
          <div class="form-group col-md-9">
            <div class="form-group row col-md-5">
              <label for="formGroupExampleInput" class="text-white">Plih Proses Pembuatan</label>
              <select name="jenis" class="form-control" id="exampleFormControlSelect1" required>
                <option disabled selected>Silakan pilih</option>
                <option value="SIM">SIM</option>
                <option value="STNK">STNK</option>
                <option value="SKCK">SKCK</option>
              </select>
            </div>
            <div class="form-group col-md-1"></div>

          </div>
          <div class="form-group col-md-2 btn-edit-sim">
            <div>
              <a href="edit_sim_stnk_skck.php" class="btn_yellow">Edit</a>
              <a href="edit_sim_stnk_skck.php"><i class="far fa-trash-alt fa-lg"></i></a>
            </div>
          </div>
        </div>

        <div class="container" style="padding: 0 5rem;">
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4" class="text-white">Nama</label>
              <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="" required>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
              <label class="text-white" for="custimeFile">Fotocopy Akta Kelahiran</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="copy_akta" id="customFile" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="inputEmail4" class="text-white">Alamat</label>
              <input type="text" class="form-control" name="alamat" id="inputEmail4" placeholder="" required>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
              <label class="text-white" for="custimeFile">Fotocopy Paspor(<small>Bagi yang punya paspor</small>)</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="copy_paspor" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label class="text-white" for="custimeFile">Fotocopy KTP</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="copy_ktp" id="customFile" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
              <label class="text-white" for="custimeFile">Pas foto 4x6</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="pas_foto" id="customFile" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label class="text-white" for="custimeFile">Fotocopy Kartu Keluarga</label>
              <div class="custom-file">
                <input type="file" class="custom-file-input" name="copy_kk" id="customFile" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="inputEmail4" class="text-white">NIK</label>
              <input type="text" name="nik" class="form-control" id="inputEmail4" placeholder="">
            </div>

          </div>

        </div>


        <div class="form-group">
          <button type="submit" name="ajukan" class="btn btn-primary">Selanjutnya</button>
        </div>
      </form>
    </div>



  </section>
</main>


<?php
include('./layout/footer.php');
?>