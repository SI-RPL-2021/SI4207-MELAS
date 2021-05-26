<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Tambah Data Tilang - MELAS'));
require_once('../config.php');
require_once('../format.php');

if (isset($_POST['submit_tilang'])) {
  $no_tilang = date("dis") . RandomNumber();
  $no_blanko = 'C' . RandomNumber(6);

  $nama_pelanggar = $_POST['nama_pelanggar'];
  $gender = $_POST['gender'];
  $bukti = $_POST['bukti'];
  $no_bukti = $_POST['no_bukti'];
  $tgl_pelanggaran = $_POST['tgl_pelanggaran'];
  $jenis_kendaraan = $_POST['jenis_kendaraan'];
  $no_polisi = $_POST['no_polisi'];
  $nrp_penindak = $_POST['nrp_penindak'];
  $nama_penindak = $_POST['nama_penindak'];
  $tgl_sidang = $_POST['tgl_sidang'];
  $lokasi_sidang = $_POST['lokasi_sidang'];
  $jumlah_denda = $_POST['jumlah_denda'];

  $query = mysqli_query($koneksi, "INSERT INTO tbl_tilang (no_tilang, no_blanko, nama_pelanggar, gender, bukti, no_bukti, tgl_pelanggaran, jenis_kendaraan, no_polisi, nrp_penindak, nama_penindak, tgl_sidang, lokasi_sidang, jumlah_denda) VALUES ('$no_tilang','$no_blanko','$nama_pelanggar', '$gender','$bukti','$no_bukti','$tgl_pelanggaran','$jenis_kendaraan','$no_polisi','$nrp_penindak','$nama_penindak','$tgl_sidang','$lokasi_sidang','$jumlah_denda')");

  if (!mysqli_error($koneksi)) {
    header("location:tilang.php?alert=berhasil_tambah_tilang");
  } else {
    header("location:tilang.php?alert=gagal_tambah_tilang");
  }
}

?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">TAMBAH DATA TILANG</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container col-md-4 mt-5">
      <form method="POST">
        <section id="pelanggaran">
          <h4 class="text-white font-weight-bold text-center mb-5">Pelanggaran</h4>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Nama Pelanggar</label>
            <input type="text" name="nama_pelanggar" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Pelanggar" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1" class="text-white">Jenis Kelamin</label>
            <select name="gender" class="form-control" id="exampleFormControlSelect1">
              <option selected disable>Pilih Jenis Kelamin</option>
              <option value="Pria">Pria</option>
              <option value="Wanita">Wanita</option>
            </select>
          </div>
          <div class="form-group">
            <label for="bukti" class="text-white">Bukti</label>
            <input type="text" name="bukti" class="form-control" id="bukti" aria-describedby="emailHelp" placeholder="Masukan Barang Bukti" required>
          </div>
          <div class="form-group">
            <label for="no_bukti" class="text-white" id="label_no_bukti">Nomor</label>
            <input type="text" name="no_bukti" class="form-control" id="no_bukti" aria-describedby="emailHelp" placeholder="Masukan Nomor" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Tanggal Pelanggaran</label>
            <input type="date" name="tgl_pelanggaran" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <a href="tilang.php" class="btn button-submit">Batal</a>
          <a type="button" class="btn button-submit float-right" id="btn-lanjut-pelanggaran">Selanjutnya</a>
        </section>

        <section id="kendaraan" class="hidden">
          <h4 class="text-white font-weight-bold text-center mb-5">Kendaraan</h4>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Jenis Kendaraan</label>
            <input type="text" name="jenis_kendaraan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Jenis Kendaraan" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Nomor Polisi</label>
            <input type="text" name="no_polisi" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nomor Polisi" required>
          </div>

          <a type="button" class="btn button-submit" id="btn-kembali-kendaraan">Kembali</a>
          <a href="tilang.php" class="btn button-submit">Batal</a>
          <a type="button" class="btn button-submit float-right" id="btn-lanjut-kendaraan">Selanjutnya</a>
        </section>

        <section id="penindak" class="hidden">
          <h4 class="text-white font-weight-bold text-center mb-5">Penindak</h4>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">NRP Penindak</label>
            <input type="text" name="nrp_penindak" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan NRP Penindak" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Nama Penindak</label>
            <input type="text" name="nama_penindak" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Penindak" required>
          </div>
          <a type="button" class="btn button-submit" id="btn-kembali-penindak">Kembali</a>
          <a href="tilang.php" class="btn button-submit">Batal</a>
          <a type="button" class="btn button-submit float-right" id="btn-lanjut-penindak">Selanjutnya</a>
        </section>

        <section id="pengadilan" class="hidden">
          <h4 class="text-white font-weight-bold text-center mb-5">Pengadilan</h4>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Tanggal Sidang</label>
            <input type="date" name="tgl_sidang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Lokasi Sidang</label>
            <input type="text" name="lokasi_sidang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Lokasi Sidang" required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-white">Jumlah Denda</label>
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text">Rp</div>
              </div>
              <input type="number" name="jumlah_denda" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Jumlah Denda" required>
            </div>
          </div>
          <a type="button" class="btn button-submit" id="btn-kembali-pengadilan">Kembali</a>
          <a href="tilang.php" class="btn button-submit">Batal</a>
          <button type="submit" name="submit_tilang" class="btn button-submit float-right" id="btn-submit-pengadilan">Submit</button>
        </section>
      </form>
    </div>
  </section>
</main>

<?php
include('./layout/footer.php');
?>