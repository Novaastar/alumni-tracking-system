<?php
include 'koneksi.php';

if(isset($_GET['id'])) { // ambil id alumni dari URL
    $id = intval($_GET['id']); // pastikan aman

    $result = mysqli_query($conn, "SELECT nama, instansi FROM alumni WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    $score = 0;
    if(!empty($row['nama'])) $score += 20;
    if(stripos($row['instansi'], 'UMM') !== false) $score += 30;
    $score += rand(0,50); // simulasi cek online
    if($score > 100) $score = 100;

    mysqli_query($conn, "UPDATE alumni 
        SET status='Perlu Verifikasi',
            confidence_score=$score,
            tanggal_update=CURDATE()
        WHERE id=$id"
    );
}

header("Location: dashboard.php");
?>