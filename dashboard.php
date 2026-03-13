<?php
include 'koneksi.php';
include 'layout/header.php';
include 'layout/sidebar.php';

$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM alumni"));

$teridentifikasi = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM alumni WHERE status='Teridentifikasi'"));

$belum = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) as total FROM alumni WHERE status='Belum Dilacak'"));

if(isset($_GET['tahun']) && $_GET['tahun'] != ""){
    $tahun = $_GET['tahun'];
    $data = mysqli_query($conn,"SELECT * FROM alumni WHERE tahun_lulus='$tahun'");
}else{
    $data = mysqli_query($conn,"SELECT * FROM alumni");
}
?>

<div class="content">

<h2 class="mb-4">Dashboard Alumni</h2>

<div class="row mb-4">

    <div class="col-md-4 mb-3">
        <div class="card text-center p-3 shadow-sm">
            <h5>Total Alumni</h5>
            <h2><?php echo $total['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center p-3 shadow-sm">
            <h5>Teridentifikasi</h5>
            <h2><?php echo $teridentifikasi['total']; ?></h2>
        </div>
    </div>

    <div class="col-md-4 mb-3">
        <div class="card text-center p-3 shadow-sm">
            <h5>Belum Dilacak</h5>
            <h2><?php echo $belum['total']; ?></h2>
        </div>
    </div>

</div>

<!-- Chart Card -->
<div class="card p-3 mb-4 shadow-sm">
    <canvas id="chart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById("chart").getContext('2d');
    new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Total", "Teridentifikasi", "Belum Dilacak"],
            datasets: [{
                label: 'Jumlah Alumni',
                data: [<?php echo $total['total']; ?>, <?php echo $teridentifikasi['total']; ?>, <?php echo $belum['total']; ?>],
                backgroundColor: ['#0d6efd','#198754','#6c757d']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false },
            }
        }
    });
</script>

<div class="d-flex justify-content-between mb-3">
    <a href="tambah_alumni.php" class="btn btn-primary">Tambah Alumni</a>

    <form method="GET" class="d-flex">
        <select name="tahun" class="form-select me-2">
            <option value="">Tahun Lulus</option>
            <option>2020</option>
            <option>2021</option>
            <option>2022</option>
        </select>
        <button class="btn btn-primary">Filter</button>
    </form>
</div>

<table class="table table-bordered table-striped align-middle">
    <thead class="table-light">
        <tr>
            <th>Nama</th>
            <th>Tahun</th>
            <th>Prodi</th>
            <th>Instansi</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = mysqli_fetch_assoc($data)){ ?>
        <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['tahun_lulus']; ?></td>
            <td><?php echo $row['prodi']; ?></td>
            <td><?php echo $row['instansi']; ?></td>
            <td>
                <?php
                if($row['status']=="Teridentifikasi"){
                    echo "<span class='badge bg-success'>Teridentifikasi</span>";
                } elseif($row['status']=="Perlu Verifikasi"){
                    echo "<span class='badge bg-warning text-dark'>Perlu Verifikasi</span>";
                } else{
                    echo "<span class='badge bg-secondary'>Belum Dilacak</span>";
                }
                ?>
            </td>
            <td>
                <a href="edit_alumni.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus_alumni.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data alumni ini?')">Hapus</a>
                <a href="jalankan_pelacakan.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">Pelacakan</a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

</div>

<?php
include 'layout/footer.php';
?>