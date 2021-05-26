<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Form Pembayaran - MELAS'));
require_once('../config.php');
require_once('./func_bayar.php');

if (isset($_POST['transaksiBank'])) {
  $metode_bayar = $_POST['bank'];

  if (Bayar($metode_bayar, $koneksi) == 'Success') {
    header("location:info_bayar.php?metode=bank");
  } else {
    die(mysqli_error($query));
  }
} else if (isset($_POST['transaksiGRetail'])) {
  $metode_bayar = $_POST['nama_retail'];
  if (Bayar($metode_bayar, $koneksi) == 'Success') {
    header("location:info_bayar.php?metode=GRetail");
  } else {
    die(mysqli_error($query));
  }
} else if (isset($_POST['transaksiVA'])) {
  $metode_bayar = $_POST['nama_VA'];
  if (Bayar($metode_bayar, $koneksi) == 'Success') {
    header("location:info_bayar.php?metode=VA");
  } else {
    die(mysqli_error($query));
  }
} else if (isset($_POST['transaksiDK'])) {
  $metode_bayar = $_POST['nama_DK'];
  if (Bayar($metode_bayar, $koneksi) == 'Success') {
    header("location:info_bayar.php?metode=DK");
  } else {
    die(mysqli_error($query));
  }
} else if (isset($_POST['transaksiMBanking'])) {
  $metode_bayar = $_POST['bank'];
  if (Bayar($metode_bayar, $koneksi) == 'Success') {
    header("location:info_bayar.php?metode=MBanking");
  } else {
    die(mysqli_error($query));
  }
}
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">FORM PEMBAYARAN</h2>
  </div>

  <section class="content d-flex">
    <div class="pembayaran container d-md-flex justify-content-between">
      <div class="leftSide">
        <form method="POST" action="">
          <section id="pembayaran">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-white">Nominal</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">Rp</div>
                </div>
                <input type="number" class="form-control" id="nominal" aria-describedby="emailHelp" name="nominal" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-white">Metode Pembayaran</label>
              <select name="metode" class="form-control" id="metodePembayaran" required>
                <option disabled selected>Silakan pilih</option>
                <option value="Debit / Credit">Debit / Credit</option>
                <option value="Virtual Account">Virtual Account</option>
                <option value="Transfer Bank">Transfer Bank</option>
                <option value="M-Banking">M-Banking</option>
                <option value="Gerai Retail">Gerai Retail</option>
              </select>
            </div>

            <div class="btnBayar">
              <button type="button" id="btnPilihMetode" class="btn">Kirim</button>
            </div>
          </section>

          <section id="pembayaranTransfer">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-white">Nama Bank</label>
              <select name="bank" class="form-control" id="metodePembayaran" id="namaBank">
                <option disabled selected>Silakan pilih</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="BJB">BJB</option>
                <option value="Mandiri">Mandiri</option>
              </select>
            </div>
            <!-- <input type="text" name="nominal" id="valNominal">
            <input type="text" name="nominal" id="jenisBayar"> -->
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-white">Nomor Rekening</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="norek" id="norek">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-white">Nama Pemilik Bank</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="pemilik" id="pemilik">
            </div>

            <div class="btnBayar">
              <button type="submit" name="transaksiBank" class="btn">Kirim</button>
            </div>
          </section>

          <section id="pembayaranMBanking">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-white">Nama Bank</label>
              <select name="bank" class="form-control" id="metodePembayaran" id="namaBank">
                <option disabled selected>Silakan pilih</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="BJB">BJB</option>
                <option value="Mandiri">Mandiri</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" class="text-white">User ID M-Banking</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_mbanking">
            </div>

            <div class="btnBayar">
              <button type="submit" name="transaksiMBanking" class="btn">Kirim</button>
            </div>
          </section>

          <section id="pembayaranDK">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-white">Nama Bank</label>
              <select name="nama_DK" class="form-control">
                <option disabled selected>Silakan pilih</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="BJB">BJB</option>
                <option value="Mandiri">Mandiri</option>
              </select>
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1" class="text-white">Nomor Kartu</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="norek" id="norek">
            </div>

            <div class="form-row">
              <div class="form-group col-5">
                <label for="inputCity" class="text-white">Masa Berlaku</label>
                <input type="month" min="2021-03" name="bulan" class="form-control" id="inputCity" placeholder="MM">
              </div>

              <div class="form-group col-4"></div>
              <div class="form-group col-md-3">
                <label for="inputZip" class="text-white">CVV</label>
                <input type="text" name="cvv" class="form-control" id="inputZip">
              </div>
            </div>

            <div class="btnBayar">
              <button type="submit" name="transaksiDK" class="btn">Kirim</button>
            </div>
          </section>

          <section id="pembayaranGRetail">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-white">Gerai Retail</label>
              <select name="nama_retail" class="form-control" id="metodePetail" id="namaRetail">
                <option disabled selected>Silakan pilih</option>
                <option value="Alfamart">Alfamart</option>
                <option value="Indomart">Indomart</option>
                <option value="Circle K">Circle K</option>
              </select>
            </div>
            <!-- <input type="text" name="nominal" id="valNominal">
            <input type="text" name="nominal" id="jenisBayar"> -->

            <div class="btnBayar">
              <button type="submit" name="transaksiGRetail" class="btn">Kirim</button>
            </div>
          </section>

          <section id="pembayaranVA">
            <div class="form-group">
              <label for="exampleInputEmail1" class="text-white">Nama Bank</label>
              <select name="nama_VA" class="form-control" id="namaVA">
                <option disabled selected>Silakan pilih</option>
                <option value="BCA">BCA</option>
                <option value="BNI">BNI</option>
                <option value="BJB">BJB</option>
                <option value="Mandiri">Mandiri</option>
              </select>
            </div>
            <!-- <input type="text" name="nominal" id="valNominal">
            <input type="text" name="nominal" id="jenisBayar"> -->

            <div class="btnBayar">
              <button type="submit" name="transaksiVA" class="btn">Kirim</button>
            </div>
          </section>

          <div class="banks" id="banks">
            <div>
              <img src="../assets/bca.png" alt="" srcset="">
              <img src="../assets/mandiri.png" alt="" srcset="">
              <img src="../assets/bni.png" alt="" srcset="">
            </div>
            <div>
              <img src="../assets/bjb.png" alt="" srcset="">
            </div>
          </div>

          <div class="banks" id="GRetail">
            <div class="mb-3">
              <img src="../assets/alfamart.png" style="height:4rem;" alt="" srcset="">
            </div>
            <div>
              <img class="mr-2" src="../assets/indomart.png" alt="" srcset="">
              <img src="../assets/circle-k.png" alt="" srcset="">
            </div>
          </div>
        </form>
      </div>
      <div class="rightSide">
        <img src="../assets/polisi-ilustrasi-2.png" alt="" srcset="">
      </div>
    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>