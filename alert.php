<?php
if (isset($_GET['alert'])) {
  if ($_GET['alert'] == 'berhasil_izin_keramaian') {
?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil upload berkas, silakan tunggu respon dari admin.
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_pengawalan") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil upload berkas, silakan tunggu respon dari admin.
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_respon_pengawalan") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil, respon pengawalan telah dikerim ke email pemohon.
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_respon_keramaian") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil, respon izin keramaian telah dikerim ke email pemohon.
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_upload_berita") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil upload portal berita.
    </div>
  <?php
  } elseif ($_GET['alert'] == "input_pengaduan_apresiasi") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil menginputkan pengaduan / apresiasi.
    </div>
  <?php
  } elseif ($_GET['alert'] == "update_apresiasi_aduan") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil update pengaduan / apresiasi.
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_izin_demo") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Berhasil upload surat izin demo.
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_sim_stnk_skck") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Upload data berhasil
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_edit_portal") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Edit Portal Berita Berhasil
    </div>
  <?php
  } elseif ($_GET['alert'] == "berhasil_hapus_portal") {
  ?>
    <div class="alert alert-success alert-dismissible col-md-9 ml-auto mr-auto mt-4 mb-0">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      Hapus Portal Berita Berhasil
    </div>


<?php
  }
}
?>