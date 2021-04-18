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
    <div class="container container-detail-catar">
      <form class="mt-5">
        <div class="form-row">
          <div class="form-group col-md-9">
            <div class="form-group row col-md-5">
              <label for="formGroupExampleInput" class="text-white">Plih Jenis Pendaftar</label>
              <select name="jenis" class="form-control" id="exampleFormControlSelect1">
                <option disabled selected>Silakan pilih</option>
                <option value="Pengaduan">Item</option>
                <option value="Apresiasi">Item</option>
              </select>
            </div>
            <div class="form-group col-md-4"></div>
            <div class="form-group row col-md-5">
              <label for="formGroupExampleInput" class="text-white">Politeknik Pilihan</label>
              <select name="politeknik" class="form-control" id="exampleFormControlSelect1">
                <option disabled selected>Silakan pilih</option>
                <option value="Pengaduan">Item</option>
                <option value="Apresiasi">Item</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-2">
            <img src="../assets/polisi-ilustrasi-2.png" alt="" srcset="">
          </div>
        </div>


        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Agama</label>
            <input type="text" name="agama" class="form-control" id="inputPassword4" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">NIK</label>
            <input type="text" class="form-control" name="nik" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Status</label>
            <input type="text" class="form-control" id="inputPassword4" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Tinggi Badan</label>
            <input type="text" name="tinggi_badan" class="form-control" id="inputPassword4" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Telepon/HP</label>
            <input type="number" name="telepon" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-4"></div>

          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Tempat Tanggal Lahir</label>
            <input type="text" name="ttl" class="form-control" id="inputPassword4" placeholder="">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="inputEmail4" class="text-white">Alamat Domisili</label>
            <input type="text" name="alamat" class="form-control" id="inputEmail4" placeholder="">
          </div>
          <div class="form-group col-md-4"></div>

          <div class="form-group col-md-4">
            <label for="inputPassword4" class="text-white">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="">
          </div>
        </div>


        <div class="form-group">
          <button type="submit" name="regis" class="btn btn-primary">Registrasi</button>
        </div>
      </form>
    </div>



  </section>
</main>

<?php
include('./layout/footer.php');
?>