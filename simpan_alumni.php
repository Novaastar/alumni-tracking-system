<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$tahun = $_POST['tahun_lulus'];
$prodi = $_POST['prodi'];
$instansi = $_POST['instansi'];
$kota = $_POST['kota'];
$bidang = $_POST['bidang'];

$status = "Belum Dilacak";
$tanggal = date("Y-m-d");

mysqli_query($conn,"INSERT INTO alumni
(nama,tahun_lulus,prodi,instansi,kota,bidang,status,tanggal_update)
VALUES
('$nama','$tahun','$prodi','$instansi','$kota','$bidang','$status','$tanggal')");

header("location:dashboard.php");
?>