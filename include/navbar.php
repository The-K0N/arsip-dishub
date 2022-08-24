<nav class="navbar navbar-expand-lg navbar-dark bg-navbar fixed-top">
  <div class="container">
    <img src="img/Logo_DISHUB.png" width="10%">
    <a class="navbar-brand mb-2" href="index.php" style="font-family: Arial; font-weight: bolder;">Aplikasi Arsip</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link btn btn-light text-dark m-1" style="font-weight: bolder;" href="index.php"><img src="icon/dashboard.png"> Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn btn-light text-dark m-1" style="font-weight: bolder;" href="kode_arsip.php"><img src="icon/kode_arsip.png"> Kode Arsip</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn btn-light text-dark m-1" style="font-weight: bolder;" href="bidang.php"><img src="icon/info_bidang.png"> Info Bidang</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn btn-light text-dark m-1" style="font-weight: bolder;" href="berkas.php"><img src="icon/archive.png"> File Arsip</a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link btn btn-light text-dark m-1" style="font-weight: bolder;" href="tambah_kode_arsip.php">Tambah Kode Arsip</a>
        </li>

        <li class="nav-item">
          <a class="nav-link btn btn-light text-dark m-1" style="font-weight: bolder;" href="tambah_bidang.php">Tambah Bidang</a>
        </li> -->

        &emsp;&emsp;&emsp;&emsp;
        <li class="nav-item">
          <div class="dropdown text-center">
            <button class="btn btn-light text-dark m-1 dropdown-toggle ml-1 pt-2 pb-2" style="font-weight: bolder;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="icon/profile.png">&ensp; <?= ucfirst($_SESSION["nama"]); ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

              <!-- info akun -->
              <a class="dropdown-item text-white mt-1 mb-1 p-2 bg-info" href="info_akun.php?id=<?= $_SESSION['id_user']; ?>">
                <img src="Icon/user_info.png"> Info Akun
              </a>

              <a class="dropdown-item text-white mt-1 mb-1 p-2 bg-danger" href="logout.php">&nbsp;
                <img src="icon/out_user.png">&nbsp; Logout</a>
              <!-- info kode arsip -->
              <!-- <a class="dropdown-item text-white mt-1 mb-1 p-2 bg-info" href="kode_arsip.php">
                <img src="img/baseline_info_white_18dp.png"> Info Kode Arsip
              </a> -->

              <!-- info bidang -->
              <!-- <a class="dropdown-item text-white mt-1 mb-1 p-2 bg-info" href="bidang.php">
                <img src="img/baseline_info_white_18dp.png"> Info Bidang
              </a> -->

              <!-- File Arsip -->
              <!-- <a class="dropdown-item text-white mt-1 mb-1 p-2 bg-warning" href="berkas.php">
                <img src="img/baseline_info_white_18dp.png"> File Arsip
              </a> -->

            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
  <div class="row">
    <div class="col mb-5 mt-5"></div>
  </div>
</div>