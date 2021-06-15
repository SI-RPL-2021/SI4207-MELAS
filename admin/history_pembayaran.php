<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Data Apresiasi / Pengaduan - MELAS'));
require_once('../config.php');
require_once('../format.php');
 

$query = "SELECT max(no_pembayaran) as maxKode FROM tbl_pembayaran";
$hasil = mysqli_query($koneksi, $query);
$dataCoba = mysqli_fetch_array($hasil);
$kodeBarang = $dataCoba['maxKode'];

$noUrut = (int) substr($kodeBarang, 3, 3);
$noUrut++;

$kodeBarang = sprintf("%09s", $noUrut);

$data = mysqli_query($koneksi, "SELECT * from tbl_pembayaran order by tanggal desc");
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">DATA APRESIASI / PENGADUAN</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container respon-pengawalan">
      <table id="table_pembayaran" class="table tbl_respon text-center table-striped table-bordered bg-white" style="width:100%">
        <thead>
          <tr>
            <th>NO. PEMBAYARAN</th>
            <th>NAMA</th>
            <th>TANGGAL</th>
            <th>JUMLAH</th>
            <th>METODE PEMBAYARAN</th>
            <th>KETERANGAN PEMBAYARAN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($result = mysqli_fetch_array($data)) {
            $date_hasil = new DateTime($result['tanggal']);
            echo "<tr>";
            echo "<td>" . $result['no_pembayaran'] . "</td>";
            echo "<td>" . $result['nama'] . "</td>";
            echo "<td>" . $date_hasil->format('d-m-Y') . "</td>";
            echo "<td>" . 'Rp. ' . Rupiah($result['jumlah']) . "</td>";
            echo "<td>" . $result['metode_bayar'] . "</td>";
            echo "<td>" . $result['keterangan'] . "</td>";
            echo "</tr>";
          } ?>
        </tbody>
      </table>
    </div>

  </section>
</main>

<!-- Modal -->
<div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog" aria-labelledby="modalConfirmLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalConfirmLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <input type="hidden" id="IDPemohonPengawalan" name="keramaianID">
          <input type="hidden" id="ket" name="keterangan">
          <p></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-warning" data-dismiss="modal">Batal</button>
          <button type="submit" name="confirmPengawalan" id="confirmPengawalan" class="btn btn-sm btn-outline-success"></button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include('./layout/footer.php');
?>