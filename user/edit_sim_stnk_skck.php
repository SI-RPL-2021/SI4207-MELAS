<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Edit Pembuatan SIM, STNK, SKCK - MELAS'));
require_once('../config.php');
$idUser = $_SESSION['user']['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tbl_sim_stnk_skck WHERE id_user='$idUser' order by id desc limit 1") or die(mysqli_error($koneksi));
$result = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
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
  $idKartu = $result['id'];
  $nik = $_POST['nik'];


  if (false) {
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

      if ($filenameAKTA and $filenamePASPOR) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_akta='$akta', copy_paspor='$paspor' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenamePASPOR and $filenamePAS) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_paspor='$paspor', pas_foto='$pas' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenamePAS and $filenameKTP) {
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);
        move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', pas_foto='$pas' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenameKTP and $filenameKK) {
        move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', copy_kk='$kk' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenameAKTA and $filenamePASPOR and $filenamePAS) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', copy_paspor='$paspor', pas_foto='$pas' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenameAKTA and $filenamePASPOR and $filenameKTP) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
        move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', copy_paspor='$paspor', copy_ktp='$ktp' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenameAKTA and $filenamePASPOR and $filenameKK) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
        move_uploaded_file($_FILES['copy_kk']['tmp_name'], '../berkas/sim_stnk_skck/kk/' . $kk);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', copy_paspor='$paspor', copy_kk='$kk' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenamePAS and $filenamePASPOR and $filenameKTP) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', copy_paspor='$paspor', pas_foto='$pas' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }

      if ($filenamePAS and $filenamePASPOR and $filenameKK) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_kk']['tmp_name'], '../berkas/sim_stnk_skck/kk/' . $kk);
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_kk='$kk', copy_paspor='$paspor', pas_foto='$pas' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");

        return;
      }


      if ($filenameAKTA) {
        move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_akta='$akta' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");
        return;
      }

      if ($filenamePAS) {
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);

        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', pas_foto='$pas' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");
        return;
      }

      if ($filenameKTP) {
        move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);

        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");
        return;
      }

      if ($filenameKK) {
        move_uploaded_file($_FILES['copy_kk']['tmp_name'], '../berkas/sim_stnk_skck/kk/' . $kk);

        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_kk='$kk' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");
        return;
      }

      if ($filenamePASPOR) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        $query =  mysqli_query($koneksi, "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_paspor='$paspor' WHERE id = $idKartu");
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");
        return;
      }

      if ($filenameAKTA and $filenameKK and $filenameKTP and $filenamePAS and $filenamePASPOR) {
        $paspor = $rand . '_' . $filenamePASPOR;
        move_uploaded_file($_FILES['copy_paspor']['tmp_name'], '../berkas/sim_stnk_skck/paspor/' . $paspor);
        move_uploaded_file($_FILES['copy_ktp']['tmp_name'], '../berkas/sim_stnk_skck/ktp/' . $ktp);
        move_uploaded_file($_FILES['copy_kk']['tmp_name'], '../berkas/sim_stnk_skck/kk/' . $kk);
        move_uploaded_file($_FILES['copy_akta']['tmp_name'], '../berkas/sim_stnk_skck/akta/' . $akta);
        move_uploaded_file($_FILES['pas_foto']['tmp_name'], '../berkas/sim_stnk_skck/pasfoto/' . $pas);

        $query =  "UPDATE tbl_sim_stnk_skck SET nama = '$nama', jenis='$jenis', nik='$nik', alamat='$alamat', copy_ktp='$ktp', copy_kk='$kk', copy_akta='$akta', copy_paspor='$paspor', pas_foto='$pas' WHERE id = $idKartu";
      }


      if (mysqli_query($koneksi, $query)) {
        header("location:edit_sim_stnk_skck.php?alert=update_sim_stnk_skck");
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
} else if (isset($_POST['kembali'])) {
  header('location:pembuatan_sim_stnk_skck.php');
} else if (isset($_POST['hapus_data'])) {
  $id = $_POST['id'];
  mysqli_query($koneksi, "DELETE FROM tbl_sim_stnk_skck WHERE id = '$id'");
  header('location:pembuatan_sim_stnk_skck.php?alert=hapus_sim_stnk_skck');
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
        <div class="container-edit-sim">
          <div class="form-row">
            <div class="form-group col-md-9">
              <div class="form-group row col-md-5">
                <label for="formGroupExampleInput" class="text-white">Plih Proses Pembuatan</label>
                <select name="jenis" class="form-control" id="exampleFormControlSelect1">
                  <option selected value="<?php echo $result['jenis'] ?>"><?php echo $result['jenis'] ?></option>
                  <option value="SIM">SIM</option>
                  <option value="STNK">STNK</option>
                  <option value="SKCK">SKCK</option>
                </select>
              </div>
              <div class="form-group col-md-1"></div>

            </div>
            <div class="form-group col-md-2 btn-edit-sim">
              <div>

              </div>
            </div>
          </div>

          <div class="container" style="padding: 0 5rem;">
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="text-white">Nama</label>
                <input type="text" name="nama" value="<?php echo $result['nama'] ?>" class="form-control" id="inputEmail4" placeholder="">
              </div>
              <div class="form-group col-md-4"></div>
              <div class="form-group col-md-4">
                <label class="text-white" for="custimeFile">Fotocopy Akta Kelahiran</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="copy_akta" id="customFile">
                  <label class="custom-file-label" for="customFile"><?php echo $result['copy_akta'] ?></label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="text-white">Alamat</label>
                <input type="text" class="form-control" value="<?php echo $result['alamat'] ?>" name="alamat" id="inputEmail4" placeholder="">
              </div>
              <div class="form-group col-md-4"></div>
              <div class="form-group col-md-4">
                <label class="text-white" for="custimeFile">Fotocopy Paspor(<small>Bagi yang punya paspor</small>)</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="copy_paspor" id="customFile">
                  <label class="custom-file-label" for="customFile"><?php echo $result['copy_paspor'] ?></label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="text-white" for="custimeFile">Fotocopy KTP</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="copy_ktp" id="customFile">
                  <label class="custom-file-label" for="customFile"><?php echo $result['copy_ktp'] ?></label>
                </div>
              </div>
              <div class="form-group col-md-4"></div>
              <div class="form-group col-md-4">
                <label class="text-white" for="custimeFile">Pas foto 4x6</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="pas_foto" id="customFile">
                  <label class="custom-file-label" for="customFile"><?php echo $result['pas_foto'] ?></label>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label class="text-white" for="custimeFile">Fotocopy Kartu Keluarga</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="copy_kk" id="customFile">
                  <label class="custom-file-label" for="customFile"><?php echo $result['copy_kk'] ?></label>
                </div>
              </div>
              <div class="form-group col-md-4"></div>
              <div class="form-group col-md-4">
                <label for="inputEmail4" class="text-white">NIK</label>
                <input type="text" name="nik" value="<?php echo $result['nik'] ?>" class="form-control" id="inputEmail4" placeholder="">
              </div>
            </div>
          </div>
        </div>
        <div class="form-group btn_edit_sim">

          <button type="submit" name="update" class="btn btn-primary">Edit</button>
          <a id="HpsSIM" data-toggle="modal" data-id="<?php echo $result['id'] ?>" data-jenis="<?php echo $result['jenis'] ?>" data-target="#ModalHapus" class="btn btnHps btn-primary">Hapus</a>
          <button type="submit" name="kembali" class="btn btn-primary float-left">Kembali</button>
        </div>
      </form>
    </div>



  </section>
</main>
<!-- Modal -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="ModalHapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalHapusLabel">Hapus Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post">
        <div class="modal-body">
          <p>Apakah anda akan menghentikan proses pembuatan <b><span id="IDSIM"></span></b>?</p>
          <input type="hidden" id="idSTNK" name="id">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="hapus_data" class="btn btn-sm btn-outline-danger">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include('./layout/footer.php');
?>