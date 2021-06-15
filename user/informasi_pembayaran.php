<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Informasi Pembayaran - MELAS'));
require_once('../config.php');
require_once('../format.php');

if (isset($_POST['transaksiBank'])) {
  header("location:info_bayar.php?metode=bank");
} else if (isset($_POST['submit'])) {
  // $selectedTagihan = $_POST['selectTagihan'];
  // echo $selectedTagihan;
  $dataSelect = array();
  $nominal = $_POST['nominal'];
  foreach ($_POST['selectTagihan'] as $selected) {
    array_push($dataSelect, $selected);
  }
  $query = http_build_query(array('tagihanParam' => $dataSelect, 'nominalParam' => $nominal));
  header('location:form_pembayaran.php?' . $query);
  // echo $nominal;
}
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">INFORMASI PEMBAYARAN</h2>
  </div>

  <section class="content">
    <div class="container-fluid informasi-pembayaran">
      <section id="tablePembayaran">
        <form action="" method="post" style="width: 100%; display:flex; flex-direction:column;">
          <table class="table table-hover table-light text-center" id="table-info-bayar">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">No. Tagihan</th>
                <th scope="col" class="bg-biru-muda">Jumlah Tagihan</th>
                <th scope="col">Tanggal Tagihan</th>
                <th scope="col" class="bg-biru-muda">Deskripsi Tagihan</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query = mysqli_query($koneksi, "SELECT * from tbl_tagihan order by tanggal DESC");
              while ($result = mysqli_fetch_array($query)) { ?>
                <tr>
                  <td>
                    <input type="checkbox" name="selectTagihan[]" onclick="checkTagihan()" value="<?php echo $result['no_tagihan'] ?>" id="selectTagihan" data-jumlah="<?php echo $result['jumlah'] ?>">

                  </td>
                  <td><?php echo $result['no_tagihan'] ?></td>
                  <td class="bg-biru-muda">Rp. <?php echo Rupiah($result['jumlah']) ?></td>
                  <td><?php echo Tgl_lokal($result['tanggal']) ?></td>
                  <td class="bg-biru-muda"><?php echo $result['deskripsi'] ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
          <input type="hidden" name="nominal" id="nominal" value="">
          <button disabled name="submit" class="btn bayar-sekarang" id="btnBayarSekarang" style="width:15rem;align-self:center;">Bayar Sekarang</button>
        </form>
      </section>

    </div>

  </section>
</main>

<script>
  function checkTagihan() {

    var checkbox = document.querySelectorAll("[id='selectTagihan']");
    let total = 0;
    for (var i = 0; i < checkbox.length; i++) {
      if (checkbox[i].checked == true) {
        document.getElementById('btnBayarSekarang').removeAttribute('disabled');
        total += parseInt(checkbox[i].getAttribute('data-jumlah'));
        // console.log(checkbox[i].getAttribute('data-jumlah'));
      }
      if (checkbox.checked == false) {
        document.getElementById('btnBayarSekarang').setAttribute('disabled');
      }
    }
    $('#nominal').val(total);
  }
</script>

<?php
include('./layout/footer.php');
?>