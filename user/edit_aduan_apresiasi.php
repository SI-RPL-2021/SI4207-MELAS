<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pengaduan atau Apresiasi - MELAS'));
require_once('../config.php');

$dataID = $_GET['id'];
$select =  mysqli_query($koneksi, "SELECT * from tbl_apresiasi_aduan where id='$dataID'");
// mysqli_query($koneksi, "UPDATE tbl_apresiasi_aduan SET  where id='$dataID'");
// header("location:home.php");
$hasil;
while ($result = mysqli_fetch_array($select)) {
  $hasil =  $result;
}

if (isset($_POST['edited'])) {
  $isi = $_POST['isi'];
  $jenis = $_POST['jenis'];
  mysqli_query($koneksi, "UPDATE tbl_apresiasi_aduan SET jenis = '$jenis', isi = '$isi' WHERE id=$dataID ");
  header("location:list_pengaduan_apresiasi.php?alert=update_apresiasi_aduan");
}
?>


<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PENGADUAN / APRESIASI</h2>
  </div>

  <section class="content d-flex flex-column">
    <h6 class="text-white text-center mt-4">
      disini anda boleh membagikan keluhan ataupun apresiasi untuk kami
    </h6>
    <div class="pengaduan container mt-5 mb-4">
      <form method="POST" action="">
        <div class="form-group col-md-4">
          <label class="text-white" for="exampleFormControlSelect1">Pilih</label>
          <select name="jenis" value="<?php echo $hasil['jenis'] ?>" class="form-control" id="exampleFormControlSelect1">
            <option disabled>Silakan pilih</option>
            <?php
            if ($hasil['jenis'] === 'Pengaduan') {
              echo "<option selected value='" . $hasil['jenis'] . "'>" . $hasil['jenis'] . "</option>";
              echo "<option value='Apresiasi'>Apresiasi</option>";
            } else if ($hasil['jenis'] === 'Apresiasi') {
              echo "<option selected value='" . $hasil['jenis'] . "'>" . $hasil['jenis'] . "</option>";
              echo "<option value='Pengaduan'>Pengaduan</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-12 mt-5">
          <label class="text-white" for="exampleInputPassword1">Apa yang anda pikirkan tentang kami?</label>
          <textarea class="form-control" name="isi" id="exampleFormControlTextarea1" rows="9"><?php echo $hasil['isi'] ?></textarea>
        </div>

        <div class="form-group col-md">
          <button type="submit" name="edited" class="btn float-right mt-2 button-submit">Submit</button>
        </div>
      </form>
    </div>
  </section>
</main>

<?php
include('./layout/footer.php');
?>