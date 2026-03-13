<?php
include 'koneksi.php';

if(isset($_POST['id'])){
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tahun_lulus = $_POST['tahun_lulus'];
    $prodi = $_POST['prodi'];
    $instansi = $_POST['instansi'];
    $kota = $_POST['kota'];
    $bidang = $_POST['bidang'];
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE alumni SET 
        nama='$nama', 
        tahun_lulus='$tahun_lulus', 
        prodi='$prodi', 
        instansi='$instansi',
        kota='$kota',
        bidang='$bidang',
        status='$status'
        WHERE id='$id'"
    );

    header("Location: dashboard.php");
}
?>