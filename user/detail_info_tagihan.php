<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Informasi Pembayaran - MELAS'));
require_once('../config.php');

if (isset($_POST['transaksiBank'])) {
  header("location:info_bayar.php?metode=bank");
  // $keterangan = '0';
  // $emailPemohon = $_POST['email'];

  // if (!in_array($ext, $ekstensi)) {
  //   echo "
  //   <script>
  //     alert('Pastika file berformat PDF');
  //   </script>";
  // } else {
  //   if ($ukuran < 1044070000) {
  //     $xx = $rand . '_' . $filename;
  //     move_uploaded_file($_FILES['berkas']['tmp_name'], '../berkas/keramaian/' . $rand . '_' . $filename);
  //     mysqli_query($koneksi, "INSERT INTO tbl_izin_keramaian (id_user, berkas, keterangan, email) VALUES('$userID','$xx','$keterangan','$emailPemohon')");
  //     header("location:izin_keramaian.php?alert=berhasil_izin_keramaian");
  //     // echo 'BERHASIL';
  //   } else {
  //     echo 'GAGAL';
  //   }
  // }
} else if (isset($_POST['transaksiGRetail'])) {
  header("location:info_bayar.php?metode=GRetail");
} else if (isset($_POST['transaksiVA'])) {
  header("location:info_bayar.php?metode=VA");
} else if (isset($_POST['transaksiDK'])) {
  header("location:info_bayar.php?metode=DK");
} else if (isset($_POST['transaksiMBanking'])) {
  header("location:info_bayar.php?metode=MBanking");
}
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">INFORMASI PEMBAYARAN</h2>
  </div>

  <section class="content">
    <div class="container-fluid informasi-pembayaran">
      <div class="info-bayar">
        <div class="body-info-bayar" id="infoPembayaran">

          <div class="mt-3" style="text-align: left;">
            <h6>Total Tagihan</h6>
          </div>
          <div class="mt-3" style="text-align: right;">
            <h6>Rp.250.000</h6>
          </div>
          <div class="mt-3" style="text-align: left;">
            <h6>No. Rekening</h6>
          </div>
          <div class="mt-3" style="text-align: right;">
            <h6>2329893423232</h6>
          </div>
          <div class="mt-3" style="text-align: left;">
            <h6>Nama Pengirim</h6>
          </div>
          <div class="mt-3" style="text-align: right;">
            <h6>Kal</h6>
          </div>
          <div class="mt-3" style="text-align: left;">
            <h6>Metode Pembayaran</h6>
          </div>
          <div class="mt-3" style="text-align: right;">
            <h6>Bank BNI</h6>
          </div>
        </div>
      </div>

    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>