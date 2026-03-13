<form action="update_verifikasi.php" method="POST">

<input type="hidden" name="id" value="<?php echo $data['id']; ?>">

<label>Status</label>
<select name="status" class="form-control">
<option>Teridentifikasi</option>
<option>Perlu Verifikasi</option>
<option>Belum Ditemukan</option>
</select>

<label>Confidence Score</label>
<input type="number" name="confidence_score" class="form-control">

<label>Link Bukti</label>
<input type="text" name="link_bukti" class="form-control">

<button class="btn btn-primary">Simpan</button>

</form>