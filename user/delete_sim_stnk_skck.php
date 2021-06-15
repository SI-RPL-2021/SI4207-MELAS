<?php
require_once('../config.php');

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM tbl_sim_stnk_skck WHERE id = '$id'") or die(mysqli_error($koneksi));
header('location:pembuatan_sim_stnk_skck.php?alert=hapus_sim_stnk_skck');
