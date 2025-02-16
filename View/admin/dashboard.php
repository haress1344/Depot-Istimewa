<?php
$format = new adminController();
?>
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
    <script src="https://kit.fontawesome.com/138f5d579f.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="assets/icons/icon-48x48.png" />

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />


    <link href="assets/css/app.css" rel="stylesheet" />
    <link href="assets/css/styleku.css?" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
    <title>Admin | Depot Istimewa</title>
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
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="index.php?page=admin&aksi=view">
                            <i class="align-middle" data-feather="sliders"></i>
                            <strong>Dashboard</strong>
                        </a>
                    </li>
                    <li class="sidebar-item">
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
                    </li> -->
                    <!-- <li class="sidebar-item">
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
                                <a class="dropdown-item" href="index.php?page=admin&aksi=logout">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- akhir navbar -->

            <!-- konten dashboard -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="mb-3 color-secondary"><strong>Dashboard</strong></h1>
                    <div class="row">
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Kategori Produk</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="icon-dashboard ic-kategori"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?= $jumKategori ?> <span class="text-muted fs-4">Kategori</span>
                                    </h1>
                                    <div class="mb-0">
                                        <a href="index.php?page=kelolakategori&aksi=view" class="nav-link color-third d-sm-inline-block"><span>Selengkapnya</span>
                                            <li data-feather="chevron-right"></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Produk</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="icon-dashboard ic-produk"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?= $jumProduk ?> <span class="text-muted fs-4">Produk</span>
                                    </h1>
                                    <div class="mb-0">
                                        <a href="index.php?page=kelolaproduk&aksi=view&idkategori=1" class="nav-link color-third d-sm-inline-block"><span>Selengkapnya</span>
                                            <li data-feather="chevron-right"></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <!-- <h5 class="card-title">Ulasan Produk</h5> -->
                                            <h5 class="card-title">Lihat</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="icon-dashboard ic-ulasan"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <h1 class="mt-1 mb-3">
                                        3 <span class="text-muted fs-4">Ulasan Baru</span>
                                    </h1> -->
                                    <h2 class="mt-1 mb-3">Ulasan Produk</h2>
                                    <div class="mb-0">
                                        <a href="index.php?page=ulasan&aksi=view&idkategori=1" class="nav-link color-third d-sm-inline-block"><span>Selengkapnya</span>
                                            <li data-feather="chevron-right"></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Pendapatan</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="icon-dashboard ic-uang"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        Rp <?= (empty($recentPendapatan)) ? "0" : $format->formatHarga($recentPendapatan[0]["pendapatan"]) ?> <span class="text-muted fs-4">Hari Ini</span>
                                    </h1>
                                    <div class="mb-0">
                                        <a href="index.php?page=transaksi&aksi=pendapatan" class="nav-link color-third d-sm-inline-block"><span>Selengkapnya</span>
                                            <li data-feather="chevron-right"></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Pembelian Pelanggan</h5>
                                        </div>
                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">
                                        <?= $jumPembelian ?> <span class="text-muted fs-4">Pembelian</span>
                                    </h1>
                                    <div class="mb-0">
                                        <a href="index.php?page=transaksi&aksi=pembelianpelanggan" class="nav-link color-third d-sm-inline-block"><span>Selengkapnya</span>
                                            <li data-feather="chevron-right"></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <!-- <h5 class="card-title">Ulasan Produk</h5> -->
                                            <h5 class="card-title">Batas Radius Pengiriman</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="color-third" data-feather="map-pin"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <h1 class="mt-1 mb-3">
                                        3 <span class="text-muted fs-4">Ulasan Baru</span>
                                    </h1> -->
                                    <h1 class="mt-1 mb-3"><?=$ketentuanRadius["radius_km"]?> <span class="text-muted fs-4"> Kilometer</span></h1>
                                    <div class="mb-0">
                                        <a href="index.php?page=pengiriman&aksi=radiusPengiriman" class="nav-link color-third d-sm-inline-block"><span>Selengkapnya</span>
                                            <li data-feather="chevron-right"></li>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- akhir konten dashboard -->
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