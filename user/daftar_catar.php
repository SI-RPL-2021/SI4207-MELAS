<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pendaftaran Catar - MELAS'));
require_once('../config.php');

if (isset($_POST['ajukan'])) {
  // filter data yang diinputkan
  $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
  $isi = filter_input(INPUT_POST, 'isi', FILTER_SANITIZE_STRING);
  $id_user = $_SESSION['user']['id'];


  // menyiapkan query
  $sql = "INSERT INTO tbl_apresiasi_aduan (id_user, jenis, isi) 
            VALUES (:id_user, :jenis, :isi)";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
    ":id_user" => $id_user,
    ":jenis" => $jenis,
    ":isi" => $isi
  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if ($saved) {
    header("Location: list_pengaduan_apresiasi.php");
  };
}

?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PENDAFTARAN CATAR</h2>
  </div>

  <section class="content d-flex flex-column">

    <div class="container catar">
      <div class="container-catar">
        <div class="title">
          <h5>REGULER POLA PEMBIBITAN</h5>
          <h5>REGULER NON POLA PEMBIBITAN</h5>
        </div>
        <div class="body-login">
          <form method="POST" action="daftar_catar_detail.php">
            <div class="form-group">
              <label for="exampleInputEmail1">NIK</label>
              <input type="text" class="form-control" placeholder="NIK" name="nik">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Password</label>
              <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            <p>Pendaftaran untuk Reguler Pola Pembibitan dibuka pada 8 Janu 2021 dengan mengakses portal dikdin.bkn.go.id</p>

            <div class="form-row d-flex mt-4" style="width:60%;">
              <div class="form-group col-md-9">
                <div class="custom-control col-md-6 custom-checkbox mt-2">
                  <input type="checkbox" class="custom-control-input" id="customControlInline">
                  <label class="custom-control-label" for="customControlInline">Remember</label>
                </div>
              </div>
              <div class="form-group col-md-3">
                <button type="submit" name="register" class="btn">Login</button>
              </div>
            </div>

          </form>
        </div>
      </div>
      <div class="foto">
        <img src="../assets/polisi-ilustrasi-2.png" alt="" srcset="">
      </div>
    </div>

  </section>
</main>

<?php
include('./layout/footer.php');
?>