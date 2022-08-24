<?php
require 'functions.php';
include 'koneksi.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="vendor/style.css">
    <link rel="shortcut icon" type="text/css" href="img/Logo_DISHUB_icon.png">

    <title>Data Berkas</title>

</head>

<body>

    <?php include 'include/navbar.php'; ?>

    <section>
        <div class="container-fluid">
            <div class="row h3">
                <div class="col">
                    <h3 class="bg-supergraphicss p-2 text-white text-center rounded">File Arsip</h3>
                </div>
            </div>

            <?php if (isset($_GET['pesan'])) { ?>

                <?php if ($_GET['pesan'] == "berhasil") { ?>
                    <script>
                        alert('Data Berhasil Diubah');
                        document.location.href = 'berkas.php'
                    </script>


                <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                    <script>
                        alert('Data Gagal Diubah');
                        document.location.href = 'berkas.php'
                    </script>


                <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
                    <script>
                        alert('Hanya diperbolehkan Mengupload pdf, docx, doc, xlsx, dan xls Saja ');
                        document.location.href = 'berkas.php'
                    </script>


                <?php } elseif ($_GET['pesan'] == "size") { ?>
                    <script>
                        alert('Ukuran Maksimum File 10mb');
                        document.location.href = 'berkas.php'
                    </script>


                <?php } elseif ($_GET['pesan'] == "hapus") { ?>
                    <script>
                        alert('Berhasil Menghapus Data');
                        document.location.href = 'berkas.php'
                    </script>



                <?php } elseif ($_GET['pesan'] == "gagalhapus") { ?>
                    <script>
                        alert('Gagal Menghapus Data');
                        document.location.href = 'berkas.php'
                    </script>


                <?php } ?>
            <?php } ?>


            <div class="row content-center menu">
                <div class="col-md-11 mb-2">
                    <a class="btn btn-success text-center" href="berkas_insert.php">&ensp;<img src="icon/add_berkas.png">&ensp; Tambah File Arsip &ensp;</a>
                </div>
                <!-- Button PDF Page -->
                <div class="col-md-1 mb-2">
                    <button class="btn btn-danger text-center" onclick="window.print()"><img src="icon/print.png">&nbsp; Print PDF</button>
                </div>
            </div>

            <!-- Content Search -->
            <div class="row content-center menu">
                <div class="col-md-10 mb-2">

                    <!-- Pencarian -->
                    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" style="width: 30%;">
                        <div class="form-group mr-sm-2">
                            <label for="sel1" style="font-style: italic; font-family: Arial;"></label>
                            <?php
                            $kata_kunci = "";
                            if (isset($_POST['kata_kunci'])) {
                                $kata_kunci = $_POST['kata_kunci'];
                            }
                            ?>
                            <input type="text" name="kata_kunci" value="<?php echo $kata_kunci; ?>" class="form-control" style="font-style: italic; font-family: monospace;" placeholder="Cari Berdasarkan Kode Arsip ... " />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-secondary" value="Search"><img src="Icon/search.png"> Search </button>
                        </div>
                    </form>
                    <!-- end Pencarian -->

                </div>
            </div>
            <!-- End Content -->

            <!-- Table -->
            <div class="row">
                <div class="col">
                    <table class="rounded table bg-white table-bordered table-hover table-primary shadow-box text-center">
                        <thead>
                            <tr class="bg-primary text-white text-center">
                                <th>No</th>
                                <th>Kode Arsip</th>
                                <th>File Berkas</th>
                                <th class="aksi" scope="col" width="20%">Opsi</th>
                            </tr>
                            <!-- <tr>
                    <th scope="col" width="1%">No</th>

                    <th scope="col">Kode Arsip</th>

                    <th scope="col" width="40%">File Berkas</th>

                    <th scope="col" width="20%">Opsi</th>

                </tr> -->
                        </thead>
                        <tbody>

                            <?php
                            include 'koneksi.php';

                            if (isset($_POST['kata_kunci'])) {
                                $kata_kunci = trim($_POST['kata_kunci']);
                                $sql = "SELECT * FROM berkas WHERE kode_berkas like '%" . $kata_kunci . "%'  ORDER BY id_berkas ASC";
                            } else {
                                $sql = "SELECT * FROM berkas ORDER BY id_berkas ASC";
                            }


                            $hasil = mysqli_query($koneksi, $sql);
                            $no = 1;
                            while ($data = mysqli_fetch_array($hasil)) {
                            ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $data['kode_berkas']; ?></td>
                                    <td><?php echo $data['file_berkas']; ?></td>

                                    <td class="aksi">
                                        <?php if ($_SESSION['akses'] == 'administrator') : ?>
                                            <a href="berkas_delete.php?id=<?php echo $data['id_berkas'] ?>" onclick="return confirm('Apakah Anda Ingin Menghapus File Berkas ?');" class="btn btn-light"><img src="Icon/trash.png"></a>
                                        <?php endif ?>

                                        <a href="berkas_download.php?filename=<?= $data['file_berkas'] ?>" onclick="return confirm('Apakah Anda Ingin Mendownload File Berkas ?');" class="btn btn-light"><img src="Icon/down_file.png"></a>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Table -->
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
    <script src="vendor/jquery-3.3.1.min.js"></script>
    <script src="vendor/jquery.autocomplete.min.js"></script>
    <script src="vendor/popper.min.js"></script>
    <script src="vendor/bootstrap.min.js"></script>

    <script src="vendor/jquery-3.3.1.slim.min.js"></script>

    <script>
        $(function() {
            $('[data-toggle="popover"]').popover()
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {

            // Selector input yang akan menampilkan autocomplete.
            $("#kode_arsip").autocomplete({
                serviceUrl: "suggestion.php", // Kode php untuk prosesing data.
                dataType: "JSON", // Tipe data JSON.
                onSelect: function(suggestion) {
                    $("#kata_kunci").val("" + suggestion.kode_arsip);
                }
            });
        });
    </script>

</body>

</html>