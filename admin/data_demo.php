<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Data Laporan Demo - MELAS'));
require_once('../config.php');

if (isset($_POST['confirmPengawalan'])) {
  $keterangan = $_POST['keterangan'];
  $id = (int)$_POST['keramaianID'];
  mysqli_query($koneksi, "UPDATE tbl_izin_keramaian SET keterangan = '$keterangan' WHERE id_keramaian = $id");
  header("location:respon_keramaian.php?alert=berhasil_respon_keramaian");
}

// $userID = $_SESSION['admin']['id'];
$data = mysqli_query($koneksi, "SELECT * from tbl_demo order by timestamp desc");
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">DATA LAPORAN DEMO</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container respon-pengawalan">
      <table id="table_demo" class="table tbl_respon text-center table-striped table-bordered bg-white" style="width:100%">
        <thead>
          <tr>
            <th>NAMA PELAPOR</th>
            <th>SURAT PELAPORAN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($result = mysqli_fetch_array($data)) {
            $link = $result['berkas'];
            echo "<tr>";
            echo "<td>" . $result['nama'] . "</td>";
            // echo "<td>" . $result['berkas'] . "</td>";
            echo "<td><a class='btn-unduh' href='../berkas/demo/$link'>" . 'Unduh' . "</a></td>";
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