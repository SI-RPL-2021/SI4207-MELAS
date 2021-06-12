<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Data Apresiasi / Pengaduan - MELAS'));
require_once('../config.php');

$data = mysqli_query($koneksi, "SELECT * from tbl_apresiasi_aduan order by time desc");
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
      <table id="table_aduan" class="table tbl_respon text-center table-striped table-bordered bg-white" style="width:100%">
        <thead>
          <tr>
            <th>NAMA</th>
            <th>JENIS</th>
            <th>ISI</th>
            <th>WAKTU</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($result = mysqli_fetch_array($data)) {
            $date_hasil = new DateTime($result['time']);

            echo "<tr>";
            echo "<td>" . $result['nama'] . "</td>";
            echo "<td>" . $result['jenis'] . "</td>";
            echo "<td style='width:50%; padding:5px 5px 0 5px;'><div class='textwrapper'><textarea style='width:100%; border:none; background:transparent;' rows='3' cols='2' readonly>" . $result['isi'] . "</textarea></div></td>";
            echo "<td>" . $date_hasil->format('d/m/Y') . "</td>";
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