<?php
include 'koneksi.php';
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
}

if (isset($_GET['id'])) {
    if ($_GET['id'] != "") {

        $id = $_GET['id'];

        $query = mysqli_query($koneksi, "SELECT * FROM berkas WHERE id_berkas='$id'");
        $row = mysqli_fetch_array($query);
    } else {
        header("location:berkas.php");
    }
} else {
    header("location:berkas.php");
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

    <title>Edit File Arsip</title>

</head>

<body>
    <?php include 'include/navbar.php'; ?>

    <div class="container mt-5 ">
        <div class="row h3">
            <div class="col">
                <h3 class="bg-supergraphicss p-2 text-white text-center rounded">Edit File Arsip</h3>
            </div>
        </div>

        <br>
        <form action="berkas_edit_act.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label class="form-label" style="font-weight: bolder; font-family: arial;">Kode Arsip</label>
                <input type="text" id="kode_arsip" name="kode_arsip" class="form-control" value="<?php echo $row['kode_berkas']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label" style="font-weight: bolder; font-family: arial;">Berkas File</label>
                <input type="file" name="berkas_file" class="form-control">
            </div>

            <br>
            <div class="mb-3">
                <button class="btn btn-success" type="submit">Send Edit Data</button>
                &nbsp;
                <a href="berkas.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>

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