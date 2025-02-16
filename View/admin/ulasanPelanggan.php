<?php
$ulasan = new ulasanController();

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

    <title>Admin | Ulasan Produk</title>

    <link href="assets/css/app.css" rel="stylesheet" />
    <link href="assets/css/styleku.css?" rel="stylesheet" />
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
                    <li class="sidebar-item active">
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
                    </li>
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
                    <ul class="navbar-nav navbar-align-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><strong class="fs-3">Pilih Kategori Produk</strong>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <?php foreach ($kategori as $ktg) : ?>
                                    <a class="dropdown-item" href="index.php?page=ulasan&aksi=view&idkategori=<?= $ktg["id_kategori"] ?>"><?= $ktg["nama_kategori"] ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                    </ul>
                </div>
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

            <!-- konten ulasan produk -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="mb-3 color-secondary"><strong>Ulasan Produk <?= $nKategori[0]["nama_kategori"] ?></strong></h1>
                    <?php if (empty($produk)): ?>
                        <div class="container-fluid py-5">
                            <div class="container py-2 text-center">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <i class="fa-solid fa-wheat-awn-circle-exclamation icon-item-kosong color-fivth"></i>
                                        <h1 class="display-1">Woops</h1>
                                        <h2 class="mb-4">Belum Ada Produk yang Diulas</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <?php foreach ($produk as $pdk) : ?>
                                <div class="col-sm-6">
                                    <div class="card pb-4 card-secondary">
                                        <div class="container mt-5">
                                            <!-- <hr class="ms-3 me-3" /> -->
                                            <div class="card ms-3 me-3">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                                                            <!-- Foto Gambar Harus PNG dengan Width = 1024px & Height = 687px -->
                                                            <img src="assets/img/<?= $pdk["gambar_produk"] ?>" class="mx-auto card-img-top mt-3" alt="..." style="margin-bottom: 10px; max-width:80%; height: 150px;"
                                                                alt="..." />
                                                        </div>
                                                        <div class="col-8 align-self-center">
                                                            <h3 class="fw-bold ms-5"><?= $pdk["nama_produk"] ?></h3>
                                                            <div class="col-7">
                                                                <h5 class="ms-5 p-1 mb-3 border border-dark m-auto text-center rounded-5">
                                                                    <?= $ulasan->viewRate($pdk["id_produk"]) ?> <span class="icon-rating"></span>
                                                                </h5>
                                                                <h5 class="ms-5 m-auto rounded-5 text-muted">
                                                                    <?=$pdk["total_ulasan"]?> Ulasan
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <hr />
                                                        <div class="mt-1 mb-0">
                                                            <a href="index.php?page=ulasan&aksi=rincianUlasan&pdk=<?= $pdk["id_produk"] ?>"
                                                                class="nav-link color-third d-sm-inline-block float-end"><span>Lihat Ulasan</span>
                                                                <li data-feather="chevron-right"></li>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
            <!-- akhir konten ulasan produk -->
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