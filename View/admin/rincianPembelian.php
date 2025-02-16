<?php
$format = new transaksiController();
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
                    <li class="sidebar-item active">
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

            <!-- konten rincian pembelian pelanggan -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="mb-3 color-secondary">
                        <strong>Rincian Pembelian <?= $rincianPembelian[0]["nama_user"] ?> </strong>
                    </h1>
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="text-muted fw-bold">Data <?= $rincianPembelian[0]["tgl_transaksi"] ?></h4>
                            <?php if (isset($keyword)) : ?>
                                <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= $kondisiHalaman ?>&keyword=<?= $keyword ?>" type="button" class="btn color-primary-button fs-4 fw-bold ms-2 pt-0 pb-0 ps-4 pe-4 float-end">Kembali</a>
                            <?php else : ?>
                                <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= $kondisiHalaman ?>" type="button" class="btn color-primary-button fs-4 fw-bold ms-2 pt-0 pb-0 ps-4 pe-4 float-end">Kembali</a>
                            <?php endif; ?>
                        </div>
                        <div class="card-body card-secondary">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <!-- produk pembelian pelanggan -->
                                    <div class="col-lg-7 col-sm-12">
                                        <h2 class="mt-3 mb-4 color-secondary">ID PEMESANAN <?= $rincianPembelian[0]["id_pemesanan"] ?></h2>
                                        <?php foreach ($rincianPembelian as $row) : ?>
                                            <div class="card mb-3">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                                                        <img src="assets/img/<?= $row["gambar_produk"] ?>" class="img-fluid rounded-start mt-4 gambar-produk" alt="..." />
                                                    </div>
                                                    <div class="col-lg-5 col-md-5 col-sm-5 align-self-center">
                                                        <div class="card-body">
                                                            <h4 class="card-title color-secondary mb-3 text-center">
                                                                <?= $row["nama_produk"] ?>
                                                            </h4>
                                                            <h6 class="text-center color-third mb-3">Rp <?= $format->formatHarga($row["harga_produk"]) ?></h6>
                                                            <?php if (empty($row["catatan_item"])): ?>
                                                            <?php else: ?>
                                                                <div class="catatan-pelanggan rounded">
                                                                    <div class="row ps-2 m-auto" onclick="toggleFullText(this)">
                                                                        <div class="col-10">
                                                                            <p>
                                                                                <span class="fw-bold">Catatan : </span> <?=$row["catatan_item"]?>
                                                                            </p>
                                                                        </div>
                                                                        <div class="col-1">
                                                                            <i class="fa-solid fa-chevron-down toggle-catatan d-none"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3 col-md-3 col-sm-3 align-self-center">
                                                        <h3 class="text-center color-secondary mb-3">
                                                            <?= $row["jumlah_barang"] ?> Item
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <!-- akhir produk pembelian pelanggan -->

                                    <!-- rincian pembayaran pelanggan -->
                                    <div class="col-lg-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="container">
                                                    <h3 class="card-title color-secondary mt-3 mb-4"><?= count($rincianPembelian) ?> PRODUK</h3>
                                                    <hr class="mb-4" />
                                                    <div class="mb-3">
                                                        <div class="row justify-content-between mb-4" id="rincian-barang">
                                                            <?php foreach ($rincianPembelian as $row) : ?>
                                                                <div class="col-lg-5">
                                                                    <p class="color-secondary rincian-pdk" id="rincian-pdk">
                                                                        <?= $row["jumlah_barang"] ?> <?= $row["nama_produk"] ?>
                                                                    </p>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <p class="color-third">Rp <?= $format->formatHarga($row["total_per_produk"]) ?></p>
                                                                </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <hr class="mt-4 mb-4" />
                                                        <h5 class="color-secondary">Atas Nama</h5>
                                                        <p class="color-secondary">
                                                            <?= $rincianPembelian[0]["nama_user"] ?>
                                                        </p>
                                                        <h5 class="color-secondary mb-2">Lokasi Pengiriman</h5>
                                                        <p class="color-secondary">
                                                            <?= (isset($rincianPembelian[0]["alamat_tujuan"])) ? $rincianPembelian[0]["alamat_tujuan"] : "(tidak ada alamat tujuan)" ?>
                                                        </p>
                                                        <p class="color-seventh">
                                                            Rp <?= (isset($rincianPembelian[0]["biaya_ongkir"])) ? $format->formatHarga($rincianPembelian[0]["biaya_ongkir"]) : "0" ?> +
                                                        </p>
                                                    </div>
                                                    <!-- <div class="mb-3">
                                                        <h5 class="color-secondary mb-2">Metode Pembayaran</h5>
                                                        <p class="color-secondary">via ATM BCA</p>
                                                    </div> -->
                                                    <hr class="mt-4 mb-4" />
                                                    <div class="row justify-content-between mb-4">
                                                        <div class="col-lg-4">
                                                            <h5 class="color-secondary">TOTAL</h5>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <h5 class="color-third">Rp <?= $format->formatHarga($rincianPembelian[0]["total_pembayaran"]) ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- akhir rincian pembayaran pelanggan -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- akhir konten rincian pembelian pelanggan -->

            <!-- footer -->
            <div class="copyright pt-3 pb-1">
                <div class="container">
                    <p class="fw-bold text-center text-light">Copyright Haris</p>
                </div>
            </div>
            <!-- akhir footer -->
        </div>
    </div>

    <script>
        function toggleFullText(element) {
            element.classList.toggle('expanded'); // Tambah/hapus kelas 'expanded' untuk mengubah gaya
        }
        // Fungsi untuk memeriksa apakah teks overflow
        function checkOverflow() {
            const rows = document.querySelectorAll('.catatan-pelanggan .row');

            rows.forEach(row => {
                const textElement = row.querySelector('p');
                const icon = row.querySelector('.toggle-catatan');

                // Periksa apakah teks overflow
                if (textElement.scrollWidth > textElement.clientWidth) {
                    icon.classList.remove('d-none'); // Tampilkan ikon jika overflow
                } else {
                    icon.classList.add('d-none'); // Sembunyikan ikon jika tidak overflow
                }
            });
        }

        // Fungsi untuk toggle teks dan ikon
        function toggleFullText(element) {
            const row = element.closest('.row');
            row.classList.toggle('expanded');
        }

        // Jalankan pemeriksaan overflow setelah halaman dimuat
        window.onload = checkOverflow;

        // Jalankan pemeriksaan ulang jika ukuran layar berubah
        window.onresize = checkOverflow;
    </script>

</body>

</html>