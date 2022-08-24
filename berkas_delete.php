<?php 
include 'koneksi.php';
if (isset($_GET['id'])) {
	if ($_GET['id'] != "") {
		
		// Mengambil ID diURL
		$id = $_GET['id'];

		// Mengambil data file_berkas didalam table berkas
		$get_berkas = "SELECT file_berkas FROM berkas WHERE id_berkas='$id'";
		$data_berkas = mysqli_query($koneksi, $get_berkas); 
        // Mengubah data yang diambil menjadi Array
		$berkas_lama = mysqli_fetch_array($data_berkas);

        // Menghapus Berkas lama didalam folder Berkas
		unlink("berkas/".$berkas_lama['file_berkas']);    

		// Mengapus data berkas berdasarkan ID
		$query = mysqli_query($koneksi,"DELETE FROM berkas WHERE id_berkas='$id'");
		if ($query) {
			header("location:berkas.php?");
		}else{
			header("location:berkas.php?");
		}
		
	}else{
		// Apabila ID nya kosong maka akan dikembalikan kehalaman index
		header("location:berkas.php");
	}
}else{
	// Jika tidak ada Data ID maka akan dikembalikan kehalaman index
	header("location:berkas.php");
}

?>