<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pembuatan SIM, STNK, SKCK / Pengaduan - MELAS'));
require_once('../config.php');

// if (isset($_POST['confirmPengawalan'])) {
//   $keterangan = $_POST['keterangan'];
//   $id = (int)$_POST['keramaianID'];
//   mysqli_query($koneksi, "UPDATE tbl_izin_keramaian SET keterangan = '$keterangan' WHERE id_keramaian = $id");
//   header("location:respon_keramaian.php?alert=berhasil_respon_keramaian");
// }

// $userID = $_SESSION['admin']['id'];
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">DATA PEMBUATAN SIM, STNK, SKCK</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>

    <div class="container data_sim">
      <nav class="nav nav-pills flex-column flex-sm-row">
        <a class="flex-sm-fill text-sm-center nav-link" id="btn_sim">SIM</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="btn_stnk">STNK</a>
        <a class="flex-sm-fill text-sm-center nav-link" id="btn_skck">SKCK</a>
      </nav>
    </div>

    <div class="container respon-pengawalan">
      <table id="table_sim" class="table tbl_respon text-center table-striped table-bordered bg-white" style="width:100%">
        <thead>
          <tr>
            <th>NAMA</th>
            <th>NIK</th>
            <th>DESKRIPSI PEMBUATAN</th>
          </tr>
        </thead>
        <tbody id="table_body_sim" class="">
          <?php
          $data = mysqli_query($koneksi, "SELECT * from tbl_sim_stnk_skck WHERE jenis = 'SIM' order by created_at desc");
          while ($result = mysqli_fetch_array($data)) {
            $deskripsi = 'PEMBUATAN';
            if ($result['jenis'] == 'SIM') {
              $deskripsi = $deskripsi . ' ' . 'SIM';
            } else if ($result['jenis'] == 'STNK') {
              $deskripsi = $deskripsi . ' ' . 'STNK';
            } else if ($result['jenis'] == 'SKCK') {
              $deskripsi = $deskripsi . ' ' . 'SKCK';
            }
            echo "<tr class='clickable-row' data-href='#'>";
            echo "<td>" . $result['nama'] . "</td>";
            echo "<td>" . $result['nik'] . "</td>";
            echo "<td>" . $deskripsi . "</td>";
            echo "</tr>";
          } ?>
        </tbody>
        <tbody id="table_body_stnk" class="hidden">
          <?php
          $data = mysqli_query($koneksi, "SELECT * from tbl_sim_stnk_skck WHERE jenis = 'STNK' order by created_at desc");
          while ($result = mysqli_fetch_array($data)) {
            $deskripsi = 'PEMBUATAN';
            if ($result['jenis'] == 'SIM') {
              $deskripsi = $deskripsi . ' ' . 'SIM';
            } else if ($result['jenis'] == 'STNK') {
              $deskripsi = $deskripsi . ' ' . 'STNK';
            } else if ($result['jenis'] == 'SKCK') {
              $deskripsi = $deskripsi . ' ' . 'SKCK';
            }
            echo "<tr class='clickable-row' data-href='#'>";
            echo "<td>" . $result['nama'] . "</td>";
            echo "<td>" . $result['nik'] . "</td>";
            echo "<td>" . $deskripsi . "</td>";
            echo "</tr>";
          } ?>
        </tbody>
        <tbody id="table_body_skck" class="hidden">
          <?php
          $data = mysqli_query($koneksi, "SELECT * from tbl_sim_stnk_skck WHERE jenis = 'SKCK' order by created_at desc");
          while ($result = mysqli_fetch_array($data)) {
            $deskripsi = 'PEMBUATAN';
            if ($result['jenis'] == 'SIM') {
              $deskripsi = $deskripsi . ' ' . 'SIM';
            } else if ($result['jenis'] == 'STNK') {
              $deskripsi = $deskripsi . ' ' . 'STNK';
            } else if ($result['jenis'] == 'SKCK') {
              $deskripsi = $deskripsi . ' ' . 'SKCK';
            }
            echo "<tr class='clickable-row' data-href='#'>";
            echo "<td>" . $result['nama'] . "</td>";
            echo "<td>" . $result['nik'] . "</td>";
            echo "<td>" . $deskripsi . "</td>";
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