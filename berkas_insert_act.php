<?php
// Menghubungkan file ini dengan file database
include 'koneksi.php';

// Mengambil data dari form lalu ditampung didalam variabel

$kode_arsip = $_POST['kode_arsip'];
$berkas_nama = $_FILES['berkas_file']['name'];
$berkas_size = $_FILES['berkas_file']['size'];

// Mengecek apakah file lebih besar 20 MB atau tidak
if ($berkas_size > 20971520) {
    // Jika File lebih dari 20 MB maka akan gagal mengupload File
    header("location:insert.php?pesan=size");
} else {

    // Mengecek apakah Ada file yang diupload atau tidak
    if ($berkas_nama != "") {

        // Ekstensi yang diperbolehkan untuk diupload boleh diubah sesuai keinginan
        $ekstensi_izin = array('pdf', 'docx', 'doc', 'xlsx', 'xls');
        // Memisahkan nama file dengan Ekstensinya
        $pisahkan_ekstensi = explode('.', $berkas_nama);
        $ekstensi = strtolower(end($pisahkan_ekstensi));
        // Nama file yang berada di dalam direktori temporer server
        $file_tmp = $_FILES['berkas_file']['tmp_name'];
        // Membuat angka/huruf acak berdasarkan waktu diupload
        $tanggal = md5(date('Y-m-d h:i:s'));
        // Menyatukan angka/huruf acak dengan nama file aslinya
        $berkas_nama_new = $tanggal . '-' . $berkas_nama;

        // Mengecek apakah Ekstensi file sesuai dengan Ekstensi file yg diuplaod
        if (in_array($ekstensi, $ekstensi_izin) === true) {
            // Memindahkan File kedalam Folder "Berkas"
            move_uploaded_file($file_tmp, 'berkas/' . $berkas_nama_new);

            // Query untuk memasukan data kedalam table Berkas
            $query = mysqli_query($koneksi, "INSERT INTO berkas VALUES (NULL,'$kode_arsip', '$berkas_nama_new')");

            // Mengecek apakah data gagal diinput atau tidak
            if ($query) {
                header("location:berkas.php?pesan=berhasil");
            } else {
                header("location:berkas.php?pesan=gagal");
            }
        } else {
            // Jika ekstensinya tidak sesuai dengan apa yg kita tetapkan maka error
            header("location:berkas.php?pesan=ekstensi");
        }
    } else {

        // Apabila tidak ada file yang diupload maka akan menjalankan code dibawah ini
        $query = mysqli_query($koneksi, "INSERT INTO berkas (kode_berkas) VALUES ('$kode_arsip')");

        // Mengecek apakah data gagal diinput atau tidak
        if ($query) {
            header("location:berkas.php?pesan=berhasil");
        } else {
            header("location:berkas.php?pesan=gagal");
        }
    }
}
