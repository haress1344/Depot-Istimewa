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

            <!-- konten pembelian pelanggan -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="mb-3 color-secondary">
                        <strong>Pembelian Pelanggan</strong>
                    </h1>
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="text-muted fw-bold">Data Pembelian Pelanggan</h4>
                        </div>
                        <div class="card-body card-secondary">
                            <div class="container">
                                <!-- form filter tahun -->
                                <form action="index.php?page=transaksi&aksi=pembelianpelanggan" method="post">
                                    <div class="">
                                        <label for="pencarian" class="form-label"><strong>Pencarian</strong></label>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-4 mt-1">
                                            <input name="keyword" type="text" class="form-control" id="pencarian" placeholder="keyword" />
                                        </div>
                                        <div class="col align-self-center">
                                            <button type="submit" name="cari" class="btn color-primary-button fs-5 fw-bold ms-2 float-end">
                                                Tampilkan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- akhir form filter tahun -->
                                <table class="table table-bordered table-hover table-striped table-light mt-3">
                                    <thead>
                                        <tr>
                                            <th class="d-none d-xl-table-cell">Username</th>
                                            <th class=>Id Transaksi</th>
                                            <th class="d-none d-xl-table-cell">Tgl Transaksi</th>
                                            <th class="d-none d-xl-table-cell">Total Biaya</th>
                                            <th class="d-none d-xl-table-cell">Status Transaksi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($rows as $row) : ?>
                                            <tr>
                                                <td class="d-none d-xl-table-cell"><?= $row["username"] ?></td>
                                                <td class=""><?= $row["id_pemesanan"] ?></td>
                                                <td class="d-none d-xl-table-cell"><?= $row["tgl_transaksi"] ?></td>
                                                <td class="d-none d-xl-table-cell">Rp <?= $format->formatHarga($row["total_pembayaran"]) ?></td>
                                                <td class="d-none d-xl-table-cell <?=($row["status_transaksi"] == "0") ? "text-danger" : "text-success"?>"><?= ($row["status_transaksi"] == 0) ? "Belum Dibayar" : "Sudah Dibayar"?></td>
                                                <td>
                                                    <?php if (isset($keyword)) : ?>
                                                        <div class="text-center">
                                                            <a href="index.php?page=transaksi&aksi=rincianpembelian&id=<?= $row["id_transaksi"] ?>&p=<?= $kondisiHalaman ?>&keyword=<?= $keyword ?>" type="button" class="btn color-primary-button ms-1 pt-0 pb-0 ps-3 pe-3">Lihat Rincian</a>
                                                        </div>
                                                    <?php else : ?>
                                                        <div class="text-center">
                                                            <a href="index.php?page=transaksi&aksi=rincianpembelian&id=<?= $row["id_transaksi"] ?>&p=<?= $kondisiHalaman ?>" type="button" class="btn color-primary-button ms-1 pt-0 pb-0 ps-3 pe-3">Lihat Rincian</a>
                                                        </div>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pagination d-flex justify-content-center mt-5">
                    <?php if ($kondisiHalaman == 1) : ?>
                    <?php else : ?>
                        <?php if (isset($keyword)) : ?>
                            <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= (int)$kondisiHalaman - 1 ?>&keyword=<?= $keyword ?>" class="rounded">&laquo;</a>
                        <?php else : ?>
                            <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= (int)$kondisiHalaman - 1 ?>" class="rounded">&laquo;</a>
                        <?php endif ?>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= $jumHalaman; $i++) : ?>
                        <?php if (isset($keyword)) : ?>
                            <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= $i ?>&keyword=<?= $keyword ?>" class="rounded <?= ($i == $kondisiHalaman) ? 'active' : '' ?>"><?= $i ?></a>
                        <?php else : ?>
                            <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= $i ?>" class="rounded <?= ($i == $kondisiHalaman) ? 'active' : '' ?>"><?= $i ?></a>
                        <?php endif ?>
                    <?php endfor; ?>
                    <?php if ($kondisiHalaman == $jumHalaman) : ?>
                    <?php else : ?>
                        <?php if (isset($keyword)) : ?>
                            <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= (int)$kondisiHalaman + 1 ?>&keyword=<?= $keyword ?>" class="rounded">&raquo;</a>
                        <?php else : ?>
                            <a href="index.php?page=transaksi&aksi=pembelianpelanggan&p=<?= (int)$kondisiHalaman + 1 ?>" class="rounded">&raquo;</a>
                        <?php endif ?>
                    <?php endif; ?>
                </div>
            </main>
            <!-- akhir konten pembelian pelanggan -->

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