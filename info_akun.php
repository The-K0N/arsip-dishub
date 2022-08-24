<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

$ambil = query("SELECT * FROM user WHERE id_user ='$_SESSION[id_user]'")[0];
$isi = mysqli_query($koneksi, "SELECT * FROM user");

// tombol cari di klik
if (isset($_POST['cari'])) {
	$keyword = $_POST['keyword'];
	$isi = cariAkun($keyword);
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

	<title>Info Akun</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>
	<section>
		<div class="container">
			<div class="row">
				<div class="col rounded text-white p-1 bg-supergraphicss text-center">
					<h2>Info Akun</h2>
				</div>
			</div>
			<br>

			<div class="row rounded text-center justify-content-center mb-1">

				<div class="col-md-8 mt-3 mb-4">
					<form class="form-inline my-2 my-lg-0 m-1" method="post">
						<input class="form-control mr-sm-2" type="text" autocomplete="off" style="font-style: italic; font-family: monospace;" placeholder="Masukkan Username" aria-label="Search" name="keyword">
						<button class="btn btn-secondary my-2 my-sm-0" name="cari" type="submit">Search <img src="img/baseline_search_white_18dp.png"></button>
					</form>
				</div>

				<?php if ($_SESSION['akses'] == 'administrator') : ?>
					<div class="col-md-2 mt-3 mb-4">
						<a href="tambah_akun.php" class="btn btn-success p-2 text-center text-white">
							<img src="Icon/add_user.png"> Tambah Akun</a>
					</div>
				<?php endif ?>

				<?php if ($ambil['id_user']) : ?>
					<div class="col-md-2 mt-3 mb-4">
						<a href="ubah_akun.php?id=<?= $ambil['id_user']; ?>" onclick="return confirm('Apakah Anda Ingin Mengubah Data Diri ?');" class="btn btn-warning p-2 text-center text-white">
							<img src="Icon/edit_user.png"> Ubah Data Diri</a>
					</div>
				<?php endif ?>

			</div>
			<table class="table bg-white table-bordered table-hover table-primary shadow-box">
				<thead class="bg-primary text-white text-center">
					<tr>
						<th>No</th>
						<th>Username</th>
						<th>Nama</th>
						<th>NIP</th>
						<th>Akses</th>
						<?php if ($_SESSION['akses'] == 'administrator') : ?>
							<th>Aksi</th>
						<?php endif; ?>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1; ?>
					<?php foreach ($isi as $row) : ?>
						<tr class="text-center">
							<td><?= $i; ?></td>
							<td><?= $row['username']; ?></td>
							<td><?= ucwords($row['nama']); ?></td>
							<td><?= $row['nip']; ?></td>
							<td><?= strtoupper($row['akses']); ?></td>

							<?php if ($_SESSION['akses'] == 'administrator') : ?>
								<td>
									<a href="ubah_akun.php?id=<?= $row['id_user']; ?>" onclick="return confirm('Apakah Anda Ingin Mengubah Akun ?');" class="btn btn-warning">
										<img src="Icon/edit_user.png"></a>
									&nbsp;
									<a href="hapus_akun.php?id=<?= $row['id_user']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus Akun ?');" class="btn btn-danger">
										<img src="icon/delete_user.png"></a>
								</td>
							<?php endif ?>
						</tr>
						<?php $i++; ?>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</section>
	<br><br><br>

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