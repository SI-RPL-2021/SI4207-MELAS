<?php
require_once('../config.php');

$dataID = $_GET['id'];
mysqli_query($koneksi, "delete from tbl_apresiasi_aduan where id='$dataID'");
header("location:home.php");
