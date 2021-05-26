<?php
require_once('./includeVariabel.php');
includeWithVariables('./layout/header.php', array('webTitle' => 'Portal Berita - MELAS'));
require_once('../config.php');

if (isset($_POST['ubah'])) {
  $rand = date("dmYHis"); 
  $ekstensi =  array('png', 'jpg', 'jpeg');
  $filename = $_FILES['img']['name']; 
  $ukuran = $_FILES['img']['size'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
 
  $judul = $_POST['judul']; 
  $isi = $_POST['isi'];
  $idBerita = $_POST['id'];

  if ($filename == '') {
    mysqli_query($koneksi, "UPDATE tbl_portal_berita SET judul = '$judul', isi = '$isi' WHERE id = '$idBerita'") or die(mysqli_error($koneksi));
    echo 'TIDAK GAMBAR';

    header("location:list_portal.php?alert=berhasil_edit_portal");
  } else if (!in_array($ext, $ekstensi)) {
    echo "
    <script>
      alert('Pastika file berformat Gambar');
    </script>";
  } else {
    if ($ukuran < 1044070000) {
      $xx = $rand . '_' . $filename;
      move_uploaded_file($_FILES['img']['tmp_name'], '../berkas/img_berita/' . $xx);
      mysqli_query($koneksi, "UPDATE tbl_portal_berita SET judul = '$judul', isi = '$isi',img = '$xx' WHERE id = '$idBerita'") or die(mysqli_error($koneksi));

      header("location:list_portal.php?alert=berhasil_edit_portal");
      echo 'GAMBAR';
    } else {
      echo "
    <script>
      alert('Update Gagal!');
    </script>";
    }
  }
} else if (isset($_POST['hapus'])) {
  $idBerita = $_POST['id'];
  mysqli_query($koneksi, "DELETE FROM tbl_portal_berita WHERE id = '$idBerita'");
  header("location:list_portal.php?alert=berhasil_hapus_portal");
}
?>

<main>
  <div class="title-bar d-flex justify-content-center">
    <h2 class="text-white font-weight-bold">DATA PORTAL BERITA</h2>
  </div>

  <section class="content d-flex flex-column">
    <?php
    include('../alert.php');
    ?>
    <div class="container respon-pengawalan">
      <div class="float-right tambah-berita">
        <a href="portal.php"><i class="fa fa-plus"></i></a>
      </div>
      <table id="table_portal" class="table tbl_respon text-center table-striped table-bordered bg-white" style="width:100%">
        <thead>
          <tr>
            <th>JUDUL</th>
            <th>GAMBAR</th>
            <th>ISI</th>
            <th>AKSI</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $data = mysqli_query($koneksi, "SELECT * from tbl_portal_berita order by time desc");
          while ($result = mysqli_fetch_array($data)) {
            // $date_time = new DateTime($result['time']);

            echo "<tr>";
            echo "<td>" . $result['judul'] . "</td>";
            echo "<td><a href='../berkas/img_berita/" . $result['img'] . "'>
            <img class='img-table' src='../berkas/img_berita/" . $result['img'] . "'></img>
            </a></td>";
            echo "<td style='width:50%; padding:5px 5px 0 5px;'><div class='textwrapper'><textarea style='width:100%; border:none; background:transparent;' rows='5' cols='2' readonly>" . $result['isi'] . "</textarea></div></td>";
            echo "<td> 
            <a class='btnEditBerita' data-id='" . $result['id'] . "' data-isi='" . $result['isi'] . "' data-judul='" . $result['judul'] . "' data-img='" . $result['img'] . "'><i class='fas fa-edit text-warning' style='cursor:pointer;'></i></a> 

            <a class='btnHapusBerita' data-id='" . $result['id'] . "' data-judul='" . $result['judul'] . "' style='cursor:pointer;'><i class='fas fa-trash text-danger'></i></a>
            </td>";
            echo "</tr>";
          } ?>
        </tbody>
      </table>
    </div>
  </section>
</main>

<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalHapusLabel">Hapus Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST">
        <div class="modal-body">
          <input type="hidden" id="idHapus" name="id">
          <p>Hapus berita&nbsp;<b id="idTextHapus"></b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-outline-warning" data-dismiss="modal">Batal</button>
          <button type="submit" name="hapus" class="btn btn-sm btn-outline-success">Hapus</button>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">Edit Berita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="inputPassword4" class="text-black">Judul</label>
            <input type="hidden" name="id" id="idEdit">
            <input type="text" name="judul" class="form-control" id="judulEdit" placeholder="">
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="text-black">Isi</label>
            <textarea type="text" name="isi" rows="5" class="form-control" id="isiEdit"></textarea>
          </div>
          <div class="form-group">
            <label class="text-black" for="custimeFile">Gambar</label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="img" id="customFile">
              <label class="custom-file-label" id="imgEdit" for="customFile">Choose file</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
include('./layout/footer.php');
?>