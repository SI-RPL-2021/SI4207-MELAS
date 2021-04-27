<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Pengaduan atau Apresiasi - MELAS'));
require_once('../config.php');


if (isset($_POST['ajukan'])) {
  // filter data yang diinputkan
  $jenis = filter_input(INPUT_POST, 'jenis', FILTER_SANITIZE_STRING);
  $isi = filter_input(INPUT_POST, 'isi', FILTER_SANITIZE_STRING);
  $id_user = $_SESSION['user']['id'];
  $nama = $_SESSION['user']['nama'];


  // menyiapkan query
  $sql = "INSERT INTO tbl_apresiasi_aduan (id_user, nama, jenis, isi) 
            VALUES (:id_user, :nama, :jenis, :isi)";
  $stmt = $db->prepare($sql);

  // bind parameter ke query
  $params = array(
    ":id_user" => $id_user,
    ":nama" => $nama,
    ":jenis" => $jenis,
    ":isi" => $isi

  );

  // eksekusi query untuk menyimpan ke database
  $saved = $stmt->execute($params);

  // jika query simpan berhasil, maka user sudah terdaftar
  // maka alihkan ke halaman login
  if ($saved) {
    header("Location: list_pengaduan_apresiasi.php?alert=input_pengaduan_apresiasi");
  };
}

?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">PENGADUAN / APRESIASI</h2>
  </div>

  <section class="content d-flex flex-column">
    <h6 class="text-white text-center mt-4">
      disini anda boleh membagikan keluhan ataupun apresiasi untuk kami
    </h6>



    <div class="pengaduan container mt-5 mb-4">
      <form method="POST" action="">
        <div class="form-group col-md-4">
          <label class="text-white" for="exampleFormControlSelect1">Pilih</label>
          <select name="jenis" class="form-control" id="exampleFormControlSelect1">
            <option disabled selected>Silakan pilih</option>
            <option value="Pengaduan">Pengaduan</option>
            <option value="Apresiasi">Apresiasi</option>
          </select>
        </div>
        <div class="form-group col-md-12 mt-5">
          <label class="text-white" for="exampleInputPassword1">Apa yang anda pikirkan tentang kami?</label>
          <textarea class="form-control" name="isi" id="exampleFormControlTextarea1" rows="9"></textarea>
        </div>

        <div class="form-group col-md">
          <button type="submit" name="ajukan" class="btn float-right mt-2 button-submit">Submit</button>
        </div>
      </form>
    </div>
  </section>
</main>

<?php
include('./layout/footer.php');
?>