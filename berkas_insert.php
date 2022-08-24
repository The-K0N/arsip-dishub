<?php
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/bootstrap.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="vendor/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.css">
    <link rel="shortcut icon" type="text/css" href="img/Logo_DISHUB_icon.png">

    <title>Tambah File Arsip</title>

</head>

<body>
    <?php include 'include/navbar.php'; ?>

    <div class="container">

        <?php if (isset($_GET['pesan'])) { ?>

            <?php if ($_GET['pesan'] == "berhasil") { ?>
                <script>
                    alert('Berhasil Menambah Data');
                    document.location.href = 'berkas_insert.php'
                </script>

            <?php } elseif ($_GET['pesan'] == "gagal") { ?>
                <script>
                    alert('Gagal Menambah Data');
                    document.location.href = 'berkas_insert.php'
                </script>

            <?php } elseif ($_GET['pesan'] == "ekstensi") { ?>
                <script>
                    alert('Hanya diperbolehkan Mengupload pdf, docx, doc, xlsx, dan xls Saja ');
                    document.location.href = 'berkas_insert.php'
                </script>


            <?php } elseif ($_GET['pesan'] == "size") { ?>
                <script>
                    alert('Ukuran Maksimum File 10mb');
                    document.location.href = 'berkas_insert.php'
                </script>

            <?php } ?>
        <?php } ?>

        <br>

        <section id="berkas_insert" class="berkas_insert">
            <div class="container">
                <div class="row mb-2">
                    <div class="col text-white p-1 rounded bg-supergraphicss text-center">
                        <h2> Tambah File Arsip </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col bg-white rounded p-5 mb-2 shadow-box">
                        <form action="berkas_insert_act.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bolder; font-family: arial;">Kode Arsip</label>
                                <input type="text" id="kode_arsip" name="kode_arsip" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" style="font-weight: bolder; font-family: arial;">Berkas File</label>
                                <input type="file" name="berkas_file" class="form-control">
                            </div>

                            <br>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success"> Tambah File Arsip &ensp;<img src="icon/fix_data.png"></button>
								&nbsp;
								<a href="berkas.php" class="btn btn-danger"> Kembali &ensp;<img src="icon/previous.png"></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

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
        });
    </script>

</body>

</html>