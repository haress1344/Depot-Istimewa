<?php
$harga = new produkController();
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

    <title>Admin | Produk</title>

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
                    <li class="sidebar-item active">
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
                    <ul class="navbar-nav navbar-align-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-sm-inline-block" href="#" data-bs-toggle="dropdown"><strong class="fs-3">Pilih Kategori Produk</strong>
                            </a>
                            <div class="dropdown-menu dropdown-menu-start">
                                <?php foreach ($kategori as $ktg) : ?>
                                    <a class="dropdown-item" href="index.php?page=kelolaproduk&aksi=view&idkategori=<?= $ktg["id_kategori"] ?>"><?= $ktg["nama_kategori"] ?></a>
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

            <!-- konten kelola produk -->
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-body card-secondary">
                            <div class="container">
                                <div class="row">
                                    <?php foreach ($nKategori as $nktg) : ?>
                                        <div class="col mt-1">
                                            <h3 class="fw-bold">Produk <?= $nktg["nama_kategori"] ?></h3>
                                        </div>
                                        <div class="col-auto">
                                            <a href="index.php?page=kelolaproduk&aksi=tambahproduk&idkategori=<?= $nktg["id_kategori"] ?>" type="button" class="btn color-primary-button fs-3 fw-bold ms-2 pt-0 pb-0 ps-4 pe-4 float-end">Tambah</a>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($produk as $pdk) : ?>
                            <div class="col-sm-6">
                                <div class="card pb-4 card-secondary">
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5 col-sm-5 text-center">
                                            <!-- Foto Gambar Harus PNG dengan Width = 1024px & Height = 687px -->
                                            <img src="assets/img/<?= $pdk["gambar_produk"] ?>"  class="mx-auto card-img-top mt-3" alt="..." style="margin-bottom: 10px; max-width:75%; height: 175px;" />
                                        </div>
                                        <div class="col-lg-7 col-md-7 col-sm-7 align-self-center">
                                            <div class="card-body">
                                                <h3 class="color-secondary pb-3 fw-bold">
                                                    <?= $pdk["nama_produk"] ?>
                                                </h3>
                                                <h4 class="color-third pb-1">Rp <?= $harga->harga($pdk["harga_produk"]) ?></h4>
                                                <h4 class="color-secondary pt-1"><?= $pdk["jumlah_stok"] ?> Items</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <h4 class="ps-4 pt-4">Keterangan Produk</h4>
                                        
                                        <ul class="ps-5 pt-3 text-muted">
                                            <li>
                                                <h4 class=""><?= $pdk["ket_produk"] ?></h4>
                                            </li>
                                        </ul>
                                        <div class="row">
                                            <div class="col-sm-5 align-self-start text-muted">

                                            </div>
                                            <div class="col-sm-7 align-self-end pt-5">
                                                <div class="text-center">
                                                    <a href="index.php?page=kelolaproduk&aksi=hapusproduk&idproduk=<?= $pdk["id_produk"] ?>&idkategori=<?= $pdk["id_kategori"] ?>" type="button" class="btn color-secondary-button fs-4 fw-bold me-1 pt-0 pb-0 ps-3 pe-3">Hapus</a>
                                                    <a href="index.php?page=kelolaproduk&aksi=ubahproduk&idproduk=<?= $pdk["id_produk"] ?>" type="button" class="btn color-primary-button fs-4 fw-bold ms-1 pt-0 pb-0 ps-3 pe-3">Ubah</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </main>
            <!-- akhir konten kelola produk -->

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