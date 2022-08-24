<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
	header("Location: login.php");
}

if (isset($_POST['submit'])) {


	// cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST) > 0) {
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "<script>
				alert('data gagal ditambahkan!');
				document.location.href = 'input.php';
			</script>
		";
	}
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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
	<link rel="shortcut icon" type="text/css" href="img/Logo_DISHUB_icon.png">

	<title>Tambah Data Arsip</title>
</head>

<body class="bg">
	<?php include 'include/navbar.php'; ?>

	<section id="tambah_data" class="tambah_data">
		<div class="container">
			<div class="row mb-2">
				<div class="col text-white p-1 rounded bg-supergraphicss text-center">
					<h2>Tambah Data Arsip</h2>
				</div>
			</div>
			<div class="row">
				<div class="col bg-white rounded p-5 mb-2 shadow-box">
					<form action="" method="POST">
						<div class="row">
							<div class="col-sm-6" style="font-weight: bolder; font-family: arial;">
								<div class="form-group">
									<label for="kode_rak">Kode Rak : </label>
									<input type="text" name="kode_rak" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="kode_box">Kode Box : </label>
									<input type="text" name="kode_box" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="kode_ordner">Kode Ordner : </label>
									<input type="text" name="kode_ordner" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="kode_arsip">Kode Arsip : </label>
									<input type="text" id="kode_arsip" name="kode_arsip" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="no_akun">No Akun : </label>
									<input type="number" name="no_akun" class="form-control" required autocomplete="onSelect">
								</div>
							</div>
							<div class="col-sm-6" style="font-weight: bolder; font-family: arial;">
								<div class="form-group">
									<label for="bidang">Bidang : </label>
									<input type="text" id="bidang" name="bidang" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="sub_bidang">Sub Bidang : </label>
									<input type="text" id="sub_bidang" name="sub_bidang" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="kegiatan">Kegiatan : </label>
									<input type="text" id="kegiatan" name="kegiatan" class="form-control" required>
								</div>
								<div class="form-group">
									<label for="tahun">Tahun : </label>
									<input type="number" min="2000" max="9999" id="tahun" name="tahun" class="form-control" required>
								</div>

								<div class="form-group">
									<label for="status_arsip">Status Arsip : </label>
									<input type="text" id="status_arsip" name="status_arsip" class="form-control" required>
								</div>

								<!-- Upload -->
								<!-- <div class="form-group" enctype="multipart/form-data">
									<label for="file">File ( PDF, WORD, EXEL ) </label><br>
									<input type="file" accept="'application/pdf', 'application/word', 'application/exel'" />
								</div> -->

							</div>
							<div class="form-group col-sm-6 mt-3">
								<button type="submit" class="btn btn-success" name="submit"> Tambah Data Arsip &ensp;<img src="icon/fix_data.png"></button>
								&nbsp;
								<a href="index.php" class="btn btn-danger"> Kembali &ensp;<img src="icon/previous.png"></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>



	<div class="footer fixed-bottom">
		<center>
			Copyright &copy; <?= date('Y'); ?> <a href="https://lomboktengahkab.go.id/halaman/dinas-perhubungan">DINAS PERHUBUNGAN </a>Kab. Lombok Tengah | By <a href='https://the-k0n.github.io/' title='The-K0N.dev' target='_blank'>The-K0N.dev</a>
		</center>
	</div>
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="vendor/jquery-3.3.1.min.js"></script>
	<script src="vendor/jquery.autocomplete.min.js"></script>
	<script src="vendor/popper.min.js"></script>
	<script src="vendor/bootstrap.min.js"></script>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script>
		$(document).ready(function(e) {
			// Submit form data via Ajax
			$("#fupForm").on('submit', function(e) {
				e.preventDefault();
				$.ajax({
					type: 'POST',
					url: 'submit.php',
					data: new FormData(this),
					dataType: 'json',
					contentType: false,
					cache: false,
					processData: false,
					beforeSend: function() {
						$('.submitBtn').attr("disabled", "disabled");
						$('#fupForm').css("opacity", ".5");
					},
					success: function(response) {
						$('.statusMsg').html('');
						if (response.status == 1) {
							$('#fupForm')[0].reset();
							$('.statusMsg').html('<p class="alert alert-success">' + response.message + '</p>');
						} else {
							$('.statusMsg').html('<p class="alert alert-danger">' + response.message + '</p>');
						}
						$('#fupForm').css("opacity", "");
						$(".submitBtn").removeAttr("disabled");
					}
				});
			});
		});

		// File type validation
		$("#file").change(function() {
			var file = this.files[0];
			var fileType = file.type;
			var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office', 'image/jpeg', 'image/png', 'image/jpg'];
			if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))) {
				alert('Sorry, only PDF, DOC, Exel files are allowed to upload.');
				$("#file").val('');
				return false;
			}
		});
	</script> -->

	<script type="text/javascript">
		$(document).ready(function() {

			// Selector input yang akan menampilkan autocomplete.
			$("#kode_arsip").autocomplete({
				serviceUrl: "suggestion.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#kode_arsip").val("" + suggestion.kode_arsip);
				}
			});

			// Selector input yang akan menampilkan autocomplete.
			$("#bidang").autocomplete({
				serviceUrl: "suggestion1.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#bidang").val("" + suggestion.bidang);
				}
			});
			// Selector input yang akan menampilkan autocomplete.
			$("#sub_bidang").autocomplete({
				serviceUrl: "suggestion2.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#sub_bidang").val("" + suggestion.sub_bidang);
				}
			});

			// Selector input yang akan menampilkan autocomplete.
			$("#kegiatan").autocomplete({
				serviceUrl: "suggestion3.php", // Kode php untuk prosesing data.
				dataType: "JSON", // Tipe data JSON.
				onSelect: function(suggestion) {
					$("#kegiatan").val("" + suggestion.deskripsi_arsip);
				}
			});

		});
	</script>
</body>

</html>