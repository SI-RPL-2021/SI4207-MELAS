<?php

function Bayar($metode_bayar, $koneksi)
{
  $query_bayar = mysqli_query($koneksi, "SELECT max(no_pembayaran) as kode FROM tbl_pembayaran");
  $dataCoba = mysqli_fetch_array($query_bayar);
  $bayar = $dataCoba['kode'];
  $kode_bayar = (int)$bayar;
  $kode_bayar++;
  $no_pembayaran = sprintf("%09s", $kode_bayar);

  $nama = $_SESSION['user']['nama'];
  $id_user = $_SESSION['user']['id'];
  $nominal = $_POST['nominal'];
  $metode = $metode_bayar;
  $tanggal = date('Y-m-d');
  $keterangan = '';

  $query = "INSERT INTO tbl_pembayaran (no_pembayaran,nama,tanggal,jumlah,metode_bayar,keterangan,id_user) VALUES ('$no_pembayaran','$nama','$tanggal','$nominal','$metode','$keterangan','$id_user')" or die(mysqli_error($query));

  if (mysqli_query($koneksi, $query)) {
    return 'Success';
  } else {
    die(mysqli_error($query));
  }
}
