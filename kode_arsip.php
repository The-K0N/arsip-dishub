<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

// pagination
// konfigurasi
$jumlah_data_per_halaman = 6;
$jumlah_data = count(query("SELECT * FROM kode_arsip"));
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_per_halaman);
$halaman_aktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awal_data = ($jumlah_data_per_halaman * $halaman_aktif) - $jumlah_data_per_halaman;

$isi = query("SELECT * FROM kode_arsip ORDER BY kode_arsip ASC LIMIT $awal_data, $jumlah_data_per_halaman");

// tombol cari di klik
if (isset($_POST['cari_kode_arsip'])) {
	$keyword = $_POST['keyword'];
	$isi = cariKodeArsip1($keyword);
}

if (isset($_POST['cari_deskripsi_arsip'])) {
	$keyword = $_POST['keyword'];
	$isi = cariDeskripsiArsip1($keyword);
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="vendor/bootstrap.min.css">

	<!-- CSS -->
	<link rel="stylesheet" href="vendor/style.css">
	<link rel="shortcut icon" type="text/css" href="img/Logo_DISHUB_icon.png">
	<title>Halaman Kode Arsip</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>
	<section>
		<div class="container-fluid">
			<div class="row h3">
				<div class="col">
					<h3 class="bg-supergraphicss p-2 text-white text-center rounded">Info Kode Arsip</h3>
				</div>
			</div>

			<div class="row content-center menu">
				<div class="col-md-9 mt-3 mb-2">
					<form class="form-inline" method="post">
						<input for="colFormLabel" class="form-control mr-sm-2" type="text" autocomplete="off" style="font-style: italic; font-family: monospace;" placeholder="Search" aria-label="Search" name="keyword">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" style="font-style: italic; font-family: monospace;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="img/baseline_search_white_18dp.png"> Cari Berdasarkan
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<button class="dropdown-item" name="cari_kode_arsip" type="submit">Kode Arsip</button>
								<button class="dropdown-item" name="cari_deskripsi_arsip" type="submit">Deskripsi Arsip</button>
							</div>
						</div>
					</form>
				</div>

				<div class="col-md-3 mt-3 mb-2">
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<a class="btn btn-success text-center" href="tambah_kode_arsip.php"><img src="icon/add_data.png">&ensp;&nbsp; Tambah Kode Arsip </a>
					&ensp;
					<button class="btn btn-danger text-center" onclick="window.print()"><img src="icon/print.png">&nbsp;&nbsp; Print PDF </button>
				</div>
			</div>

			<div class="row">
				<!-- pagination -->
				<div class="col-md-3">
					<nav aria-label="Page navigation example">
						<ul class="pagination pagination-md">
							<li class="page-item">
								<?php if ($halaman_aktif > 1) : ?>
									<a class="page-link" href="?halaman=<?= $halaman_aktif - 1; ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								<?php endif; ?>
							</li>

							<?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
								<?php if ($i == $halaman_aktif) : ?>
									<li class="page-item"><a class="rounded page-link bg-primary text-white" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
								<?php else : ?>
									<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
								<?php endif; ?>
							<?php endfor; ?>

							<li class="page-item">
								<?php if ($halaman_aktif < $jumlah_halaman) : ?>
									<a class="page-link" href="?halaman=<?= $halaman_aktif + 1; ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								<?php endif; ?>
							</li>
						</ul>
					</nav>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<table class="rounded table bg-white table-bordered table-hover table-primary shadow-box">
						<thead>
							<tr class="bg-primary text-white text-center">
								<th>No.</th>
								<th>Kode Arsip</th>
								<th>Deskripsi Arsip</th>
								<th class="aksi">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1; ?>
							<?php foreach ($isi as $row) : ?>
								<tr class="text-center">
									<td><?= $i; ?></td>
									<td><?= $row["kode_arsip"]; ?></td>
									<td><?= $row["deskripsi_arsip"]; ?></td>
									<td class="aksi">
										<a href="ubah_kode_arsip.php?id=<?= $row['id_kode_arsip']; ?>" onclick="return confirm('Apakah Anda Ingin Mengubah Data ?');" class="btn btn-light text-center text-white">
											<img src="icon/edit_data.png">
										</a>
										&ensp;
										<a href="hapus_kode_arsip.php?id=<?= $row['id_kode_arsip']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Data ?');" class="btn btn-light text-center">
											<img src="icon/delete_data.png">
										</a>
									</td>
								</tr>
								<?php $i++; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<!-- pagination -->
				<div class="col-md-3">
					<nav aria-label="Page navigation example">
						<ul class="pagination pagination-md">
							<li class="page-item">
								<?php if ($halaman_aktif > 1) : ?>
									<a class="page-link" href="?halaman=<?= $halaman_aktif - 1; ?>" aria-label="Previous">
										<span aria-hidden="true">&laquo;</span>
									</a>
								<?php endif; ?>
							</li>

							<?php for ($i = 1; $i <= $jumlah_halaman; $i++) : ?>
								<?php if ($i == $halaman_aktif) : ?>
									<li class="page-item"><a class="rounded page-link bg-primary text-white" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
								<?php else : ?>
									<li class="page-item"><a class="page-link" href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
								<?php endif; ?>
							<?php endfor; ?>

							<li class="page-item">
								<?php if ($halaman_aktif < $jumlah_halaman) : ?>
									<a class="page-link" href="?halaman=<?= $halaman_aktif + 1; ?>" aria-label="Next">
										<span aria-hidden="true">&raquo;</span>
									</a>
								<?php endif; ?>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<br>

	<div class="footer fixed-bottom">
		<center>
			Copyright &copy; <?= date('Y'); ?> <a href="https://lomboktengahkab.go.id/halaman/dinas-perhubungan">DINAS PERHUBUNGAN </a>Kab. Lombok Tengah | By <a href='https://the-k0n.github.io/' title='The-K0N.dev' target='_blank'>The-K0N.dev</a>
		</center>
	</div>


	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="vendor/jquery-3.3.1.slim.min.js"></script>
	<script src="vendor/popper.min.js"></script>
	<script src="vendor/bootstrap.min.js"></script>
</body>

</html>