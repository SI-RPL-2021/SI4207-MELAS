<?php 
function Rupiah($angka) 
{
  $hasil_rupiah = number_format($angka, 0, ',', '.');
  return $hasil_rupiah;
}

function Tgl_lokal($tanggal)
{
  $bulan = array(
    1 =>   'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecah = explode('-', $tanggal);

  return $pecah[2] . ' ' . $bulan[(int)$pecah[1]] . ' ' . $pecah[0];
}

function RandomNumber($length = 5)
{
  $intMin = (10 ** $length) / 10; // 100...
  $intMax = (10 ** $length) - 1;  // 999...

  $codeRandom = mt_rand($intMin, $intMax);

  return $codeRandom;
}
