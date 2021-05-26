<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Informasi Tilang - MELAS'));
require_once('../config.php');
require_once('../format.php');

$query = mysqli_query($koneksi, "SELECT * FROM tbl_tilang WHERE no_blanko = '$_GET[no_regis]'");
$results = mysqli_fetch_array($query);

if ($results['status_denda'] == 'Belum Dibayar') {
  $bg_status = '#EC4545';
} else if ($results['status_denda'] == 'Sudah Dibayar') {
  $bg_status = '#00ab66';
}

?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">INFORMASI TILANG</h2>
  </div>

  <section class="content">
    <div class="container text-white d-flex flex-column align-items-center mt-5">
      <div class="perkara d-flex flex-column align-items-center" style="width: 100%;">
        <h5 class="font-weight-bold">Perkara</h5>
        <div class="body d-flex justify-content-between" style="width:90%;">
          <div class="left" style="width:50%; text-align:left;">
            <h6 class="mt-2">Nomor Tilang</h6>
            <h6 class="mt-3">Nomor Blanko</h6>
          </div>
          <div class="right" style="width:50%; text-align:right;">
            <h6 class="mt-2"><?php echo $results['no_tilang'] ?></h6>
            <h6 class="mt-3"><?php echo $results['no_blanko'] ?></h6>
          </div>
        </div>
      </div>
      <div class="perkara d-flex flex-column align-items-center mt-5" style="width: 100%;">
        <h5 class="font-weight-bold">Pelanggaran</h5>
        <div class="body d-flex justify-content-between" style="width:90%;">
          <div class="left" style="width:50%; text-align:left;">
            <h6 class="mt-2">Nama</h6>
            <h6 class="mt-3">Jenis Kelamin</h6>
            <h6 class="mt-3">Bukti</h6>
            <h6 class="mt-3">Nomor <?php echo $results['bukti'] ?></h6>
            <h6 class="mt-3">Tanggal Pelanggaran</h6>
          </div>
          <div class="right" style="width:50%; text-align:right;">
            <h6 class="mt-2"><?php echo $results['nama_pelanggar'] ?></h6>
            <h6 class="mt-3"><?php echo $results['gender'] ?></h6>
            <h6 class="mt-3"><?php echo $results['bukti'] ?></h6>
            <h6 class="mt-3"><?php echo $results['no_bukti'] ?></h6>
            <h6 class="mt-3"><?php echo $results['tgl_pelanggaran'] ?></h6>
          </div>
        </div>
      </div>
      <div class="perkara d-flex flex-column align-items-center mt-5" style="width: 100%;">
        <h5 class="font-weight-bold">Kendaraan</h5>
        <div class="body d-flex justify-content-between" style="width:90%;">
          <div class="left" style="width:50%; text-align:left;">
            <h6 class="mt-2">Jenis Kendaraan</h6>
            <h6 class="mt-3">Nomor Polisi</h6>
          </div>
          <div class="right" style="width:50%; text-align:right;">
            <h6 class="mt-2"><?php echo $results['jenis_kendaraan'] ?></h6>
            <h6 class="mt-3"><?php echo $results['no_polisi'] ?></h6>
          </div>
        </div>
      </div>
      <div class="perkara d-flex flex-column align-items-center mt-5" style="width: 100%;">
        <h5 class="font-weight-bold">Penindak</h5>
        <div class="body d-flex justify-content-between" style="width:90%;">
          <div class="left" style="width:50%; text-align:left;">
            <h6 class="mt-2">NRP</h6>
            <h6 class="mt-3">Nama</h6>
          </div>
          <div class="right" style="width:50%; text-align:right;">
            <h6 class="mt-2"><?php echo $results['nrp_penindak'] ?></h6>
            <h6 class="mt-3"><?php echo $results['nama_penindak'] ?></h6>
          </div>
        </div>
      </div>
      <div class="perkara d-flex flex-column align-items-center mt-5" style="width: 100%;">
        <h5 class="font-weight-bold">Pengadilan</h5>
        <div class="body d-flex justify-content-between" style="width:90%;">
          <div class="left" style="width:50%; text-align:left;">
            <h6 class="mt-2">Tanggal Sidang</h6>
            <h6 class="mt-3">Lokasi Pengadilan</h6>
            <h6 class="mt-3">Jumlah Denda</h6>
          </div>
          <div class="right" style="width:50%; text-align:right;">
            <h6 class="mt-2"><?php echo $results['tgl_sidang'] ?></h6>
            <h6 class="mt-3"><?php echo $results['lokasi_sidang'] ?></h6>
            <h6 class="mt-3">Rp. <?php echo Rupiah($results['jumlah_denda']) ?></h6>
          </div>
        </div>
      </div>
      <div class="perkara d-flex flex-column align-items-center mt-5 mb-5" style="width: 100%;">
        <div class="body d-flex justify-content-between" style="width:90%;">
          <div class="left" style="width:50%; text-align:left;">
            <h6 class="mt-2">Status Denda</h6>
          </div>
          <div class="right" style="width:50%; text-align:right;">
            <h6 class="mt-2">

              <span style="background: <?php echo $bg_status ?>; padding: 5px 40px; border-radius: 20px;"><?php echo $results['status_denda'] ?></span>
            </h6>
          </div>
        </div>
      </div>


  </section>
</main>

<?php
include('./layout/footer.php');
?>