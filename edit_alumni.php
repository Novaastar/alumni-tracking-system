<?php
include 'koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

$id = $_GET['id'];
$data = mysqli_query($conn,"SELECT * FROM alumni WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<div class="content">

<div class="card p-4">

<h3 class="mb-4">Edit Data Alumni</h3>

<form action="update_alumni.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="mb-3">
    <label class="form-label">Nama</label>
    <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Tahun Lulus</label>
    <input type="number" name="tahun_lulus" class="form-control" value="<?php echo $row['tahun_lulus']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Program Studi</label>
    <input type="text" name="prodi" class="form-control" value="<?php echo $row['prodi']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Instansi</label>
    <input type="text" name="instansi" class="form-control" value="<?php echo $row['instansi']; ?>" required>
</div>

<div class="mb-3">
    <label class="form-label">Kota</label>
    <input type="text" name="kota" class="form-control" value="<?php echo $row['kota']; ?>">
</div>

<div class="mb-3">
    <label class="form-label">Bidang</label>
    <input type="text" name="bidang" class="form-control" value="<?php echo $row['bidang']; ?>">
</div>

<div class="mb-3">
    <label class="form-label">Status</label>
    <select name="status" class="form-control" required>
        <option value="Belum Dilacak" <?php if($row['status']=="Belum Dilacak") echo "selected"; ?>>Belum Dilacak</option>
        <option value="Perlu Verifikasi" <?php if($row['status']=="Perlu Verifikasi") echo "selected"; ?>>Perlu Verifikasi</option>
        <option value="Teridentifikasi" <?php if($row['status']=="Teridentifikasi") echo "selected"; ?>>Teridentifikasi</option>
    </select>
</div>

<button class="btn btn-success">Update Data</button>
<a href="dashboard.php" class="btn btn-secondary">Kembali</a>

</form>

</div>

</div>

<?php
include 'layout/footer.php';
?>