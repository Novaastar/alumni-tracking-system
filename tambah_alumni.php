<?php
include 'layout/header.php';
include 'layout/sidebar.php';
?>

<div class="content">

<h2>Tambah Alumni</h2>

<form action="simpan_alumni.php" method="POST">

<div class="mb-3">
<label>Nama</label>
<input type="text" name="nama" class="form-control">
</div>

<div class="mb-3">
<label>Tahun Lulus</label>
<input type="text" name="tahun_lulus" class="form-control">
</div>

<div class="mb-3">
<label>Prodi</label>
<input type="text" name="prodi" class="form-control">
</div>

<div class="mb-3">
<label>Instansi</label>
<input type="text" name="instansi" class="form-control">
</div>

<div class="mb-3">
<label>Kota</label>
<input type="text" name="kota" class="form-control">
</div>

<div class="mb-3">
<label>Bidang</label>
<input type="text" name="bidang" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>

</form>

</div>

<?php
include 'layout/footer.php';
?>