<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Respon Izin Keramaian - MELAS'));
require_once('../config.php');

if (isset($_POST['confirmPengawalan'])) {
  $keterangan = $_POST['keterangan'];
  $id = (int)$_POST['keramaianID'];
  mysqli_query($koneksi, "UPDATE tbl_izin_keramaian SET keterangan = '$keterangan' WHERE id_keramaian = $id");
  header("location:respon_keramaian.php?alert=berhasil_respon_keramaian");
}

// $userID = $_SESSION['admin']['id'];
$data = mysqli_query($koneksi, "SELECT tbl_users.nama, tbl_izin_keramaian.email, tbl_izin_keramaian.berkas, tbl_izin_keramaian.id_keramaian, tbl_izin_keramaian.keterangan from tbl_izin_keramaian LEFT JOIN tbl_users ON tbl_users.id = tbl_izin_keramaian.id_user order by keterangan asc, timestamp desc");
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">DATA RESPON PERMOHONAN KERAMAIAN</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container respon-pengawalan">
      <table id="respon_keramaian" class="table tbl_respon text-center table-striped table-bordered bg-white" style="width:100%">
        <thead>
          <tr>
            <th>NAMA PEMOHON</th>
            <th>SURAT PERMOHONAN</th>
            <th>KETERANGAN</th>
            <th>EMAIL PEMOHON</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ($result = mysqli_fetch_array($data)) {
            $ket;
            if ($result['keterangan'] == '0') {
              $ket = "<td><div>" . '<a href="#" class="btnConfirmTolak" data-id=' . $result['id_keramaian'] . ' data-nama=' . $result['nama'] . ' data-toggle="modal" data-target="#modalConfirm"><i class="far fa-times-circle text-danger fa-lg"></i></a>
              <a href="#" data-id=' . $result['id_keramaian'] . ' data-nama=' . $result['nama'] . ' data-toggle="modal" data-target="#modalConfirm" class="ml-3 btnConfirmTerima"><i class="far fa-check-circle text-success fa-lg"></i></a>
              ' . "</div></td>";
            } else if ($result['keterangan'] == 'Diterima') {
              $ket = "<td>" . 'DITERIMA' . "</td>";
            } else if ($result['keterangan'] == 'Ditolak') {
              $ket = "<td>" . 'DITOLAK' . "</td>";
            }

            $link = $result['berkas'];
            echo "<tr>";
            echo "<td>" . $result['nama'] . "</td>";
            // echo "<td>" . $result['berkas'] . "</td>";
            echo "<td><a class='btn-unduh' href='../berkas/keramaian/$link'>" . 'Unduh' . "</a></td>";
            echo $ket;
            echo "<td>" . $result['email'] . "</td>";
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