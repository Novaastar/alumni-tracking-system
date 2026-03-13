<?php
include 'koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

$data = mysqli_query($conn,"SELECT * FROM alumni");
?>

<div class="content">

<h2>Hasil Pelacakan Alumni</h2>

<table class="table table-bordered">

<tr>
<th>Nama</th>
<th>Tahun Lulus</th>
<th>Prodi</th>
<th>Instansi</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<tr>

<td><?php echo $row['nama']; ?></td>
<td><?php echo $row['tahun_lulus']; ?></td>
<td><?php echo $row['prodi']; ?></td>
<td><?php echo $row['instansi']; ?></td>

<td>

<?php
$status = $row['status'];

if($status == "Teridentifikasi"){
    echo "<span class='badge bg-success'>Teridentifikasi</span>";
}elseif($status == "Perlu Verifikasi"){
    echo "<span class='badge bg-warning text-dark'>Perlu Verifikasi</span>";
}else{
    echo "<span class='badge bg-secondary'>Belum Dilacak</span>";
}
?>

</td>

</tr>

<?php } ?>

</table>

<table class="table table-bordered">

<tr>
<th>Nama</th>
<th>Instansi</th>
<th>Kota</th>
<th>Bidang</th>
<th>Status</th>
<th>Confidence</th>
<th>Bukti</th>
</tr>

<?php
$data = mysqli_query($conn,"SELECT * FROM alumni");

while($d = mysqli_fetch_array($data)){
?>

<tr>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['instansi']; ?></td>
<td><?php echo $d['kota']; ?></td>
<td><?php echo $d['bidang']; ?></td>
<td><?php echo $d['status']; ?></td>
<td><?php echo $d['confidence_score']; ?>%</td>
<td>
<a href="bukti_pelacakan.php?id=<?php echo $d['id']; ?>" 
   class="btn btn-info btn-sm">
   Bukti
</a>
</td>
</tr>

<?php } ?>

</table>

</div>

<?php
include 'layout/footer.php';
?>