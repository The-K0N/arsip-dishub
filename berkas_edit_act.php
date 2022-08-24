<?php
// Menghubungkan file ini dengan file database
include 'koneksi.php';

// Mengecek apakah ID ada datanya atau tidak
if (isset($_POST['id'])) {
    if ($_POST['id'] != "") {

        // Mengambil data dari form lalu ditampung didalam variabel
        $id = $_POST['id'];
        $kode_arsip = $_POST['kode_arsip'];
        $berkas_nama = $_FILES['berkas_file']['name'];
        $berkas_size = $_FILES['berkas_file']['size'];
    } else {
        header("location:berkas.php");
    }

    // Mengecek apakah file lebih besar 2 MB atau tidak
    if ($berkas_size > 20971520) {
        // Jika File lebih dari 2 MB maka akan gagal mengupload File
        header("location:berkas.php?pesan=size");
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

                // Mengambil data siswa_foto didalam table siswa
                $get_berkas = "SELECT file_berkas FROM berkas WHERE id_berkas='$id'";
                $data_berkas = mysqli_query($koneksi, $get_berkas);
                // Mengubah data yang diambil menjadi Array
                $berkas_lama = mysqli_fetch_array($data_berkas);

                // Menghapus Foto lama didalam folder FOTO
                unlink("berkas/" . $berkas_lama['file_berkas']);

                // Memindahkan File kedalam Folder "FOTO"
                move_uploaded_file($file_tmp, 'berkas/' . $berkas_nama_new);

                // Query untuk memasukan data kedalam table SISWA
                $query = mysqli_query($koneksi, "UPDATE berkas SET kode_berkas='$kode_arsip', file_berkas='$berkas_nama_new' WHERE id_berkas='$id'");

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
            $query = mysqli_query($koneksi, "UPDATE berkas SET kode_berkas='$kode_arsip' WHERE id_berkas='$id'");

            // Mengecek apakah data gagal diinput atau tidak
            if ($query) {
                header("location:berkas.php?pesan=berhasil");
            } else {
                header("location:berkas.php?pesan=gagal");
            }
        }
    }
} else {
    // Apabila ID tidak ditemukan maka akan dikembalikan ke halaman index
    header("location:berkas.php");
}
