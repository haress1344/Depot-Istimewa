<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5" />
    <meta name="author" content="AdminKit" />
    <meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web" />
    <script src="assets/js/app.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="assets/icons/icon-48x48.png" />
    <script src="https://kit.fontawesome.com/138f5d579f.js" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin | Tambah Kategori</title>

    <link href="assets/css/app.css" rel="stylesheet" />
    <link href="assets/css/styleku.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">
        <!-- sidebar -->
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar border border-dark">
                <a class="sidebar-brand" href="index.php?page=admin&aksi=view">
                    <p class="fs-1 color-secondary">Panel Depot Istimewa</p>
                </a>
                <div class="row justify-content-around">
                    <div class="col-3">
                        <span class="icon-profile-admin1"></span>
                    </div>
                    <div class="col-7 align-self-center">
                        <p class="color-secondary fs-4">
                            <strong>Selamat Datang, Owner</strong>
                        </p>
                    </div>
                </div>
                <hr />
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=admin&aksi=view">
                            <i class="align-middle" data-feather="sliders"></i>
                            <strong>Dashboard</strong>
                        </a>
                    </li>
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="index.php?page=kelolakategori&aksi=view">
                            <i class="icon-kategori-produk"></i>
                            <strong>Kategori Produk</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=kelolaproduk&aksi=view&idkategori=1">
                            <i class="icon-produk"></i>
                            <strong>Produk</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=ulasan&aksi=view&idkategori=1">
                            <i class="icon-ulasan"></i>
                            <strong>Ulasan Produk</strong>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <i class="icon-pembayaran"></i>
                            <strong>Metode Pembayaran</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <i class="icon-map"></i>
                            <strong>Radius Pembayaran</strong>
                        </a>
                    </li> -->
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=transaksi&aksi=pendapatan">
                            <i class="icon-uang"></i>
                            <strong>Pendapatan</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=transaksi&aksi=pembelianpelanggan">
                            <i class="color-third" data-feather="shopping-cart"></i>
                            <strong>Pembelian Pelanggan</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=pengiriman&aksi=radiusPengiriman">
                            <i class="color-third" data-feather="map-pin"></i>
                            <strong>Radius Pengiriman</strong>
                        </a>
                    </li>
                    <!-- <li class="sidebar-item">
                        <a class="sidebar-link" href="index.html">
                            <i class="icon-bantuan"></i>
                            <strong>Kelola Bantuan</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=riwayatPembaruan&aksi=view">
                            <i class="icon-riwayat"></i>
                            <strong>Riwayat Pembaruan</strong>
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>
        <!-- akhir sidebar -->

        <div class="main">
            <!-- navbar -->
            <nav class="navbar navbar-expand navbar-light navbar-bg border border-start-0 border-dark">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align-left">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                                <i class="align-middle" data-feather="settings"></i>
                            </a>

                            <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown"><strong class="fs-3">Halo, Owner</strong>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- akhir navbar -->

            <!-- konten Tambah Kategori Menu -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="mb-3 color-secondary">
                        <strong>Tambah Kategori Produk</strong>
                    </h1>
                    <div class="card flex-fill">
                        <div class="card-body card-secondary">
                            <div class="container">
                                <form action="index.php?page=kelolakategori&aksi=storekategori" method="post" enctype="multipart/form-data">
                                    <!-- form email-konfirmasi pass -->
                                    <div class="mb-3">
                                        <label for="namakategori" class="form-label">*Nama Kategori</label>
                                        <input name="namakategori" type="text" class="form-control" id="namakategori" required />
                                    </div>
                                    <div class="mb-3">

                                        <label class="mb-2">*Pilih Icon Kategori</label>

                                        <?php foreach ($icon as $row) : ?>
                                            <div class="form-check pb-2">
                                                <input name="id_icon" class="form-check-input ms-1 " type="radio"
                                                    value="<?= $row["id_icon"] ?>" <?= ($row["id_icon"] == 1) ? "checked" : "" ?>>
                                                <label class="form-check-label ps-3" for="flexRadioDefault2">
                                                    <?= $row["nama_icon"] ?> <i class="<?= $row["url_icon"] ?> icon-menu-kategori"></i>
                                                </label>
                                            </div>
                                        <?php endforeach; ?>

                                    </div>

                                    <div class="mb-3">
                                        <label for="gambarkategori" class="form-label">*File Gambar Kategori (lebar 419px & tinggi
                                            258px) (ekstensi file .jpeg)</label>
                                        <input name="gambarkategori" class="form-control" type="file" id="gambarkategori" />
                                    </div>

                                    <div class="d-grid gap-2 d-md-block mt-5 mb-3">
                                        <a href="index.php?page=kelolakategori&aksi=view" type="button" class="btn color-secondary-button fs-3 fw-bold ms-2 pt-0 pb-0 ps-4 pe-4">Kembali</a>
                                        <button type="submit" class="btn fs-3 fw-bold color-primary-button ms-2 pt-0 pb-0 ps-4 pe-4">
                                            Simpan
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- akhir konten Tambah kategori menu -->
            <!-- footer -->
            <div class="copyright pt-3 pb-1">
                <div class="container">
                    <p class="fw-bold text-center text-light">Copyright Haris</p>
                </div>
            </div>
            <!-- akhir footer -->
        </div>
    </div>
</body>

</html>