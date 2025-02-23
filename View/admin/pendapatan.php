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
    <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">
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
                    <li class="sidebar-item active">
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

            <!-- konten pendapatan -->
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="card flex-fill">
                        <div class="card-body card-secondary">
                            <div class="container">
                                <h3 class="fw-bold">Grafik Pendapatan</h3>
                                <!-- form filter tahun -->
                                <form action="" method="post">
                                    <div class="">
                                        <label for="TahunGrafik" class="form-label">Filter Tahun Grafik</label>
                                    </div>
                                    <div class="row justify-content-between">
                                        <form action="index.php?page=transaksi&page=pendapatan" method="post">
                                            <div class="col-4 mt-1">
                                                <input name="keyword" type="number" min="1900" max="2100" class="form-control" id="TahunGrafik" placeholder="Tahun" value="<?= $keyword ?>" required />
                                            </div>
                                            <div class="col align-self-center">
                                                <button href="" type="submit" name="year" class="btn color-primary-button fs-5 fw-bold ms-2 float-end">
                                                    Tampilkan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                                <!-- akhir form filter tahun -->
                            </div>
                        </div>
                    </div>
                    <!-- grafik pendapatan -->
                    <div class="card flex-fill w-100">
                        <div class="card-header">
                            <h5 class="text-center card-title">Tahun
                                <?=
                                (isset($keyword)) ? $keyword : date('Y') ?>
                            </h5>
                        </div>
                        <div class="card-body pt-0">
                            <h5 class="card-title mb-3">Pendapatan (Rp)</h5>
                            <div class="chart chart-sm">
                                <canvas id="chartjs-dashboard-line"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- akhir grafik pendapatan -->
                    <div class="card flex-fill">
                        <div class="card-body card-secondary">
                            <div class="container">
                                <h3 class="fw-bold">Filter Laporan Pendapatan</h3>
                                <!-- form filter laporan pendapatan -->
                                <form action="index.php?page=transaksi&aksi=pendapatan" method="post">
                                    <div class="row">
                                        <div class="col-3 mt-1">
                                            <label for="TanggalMulai" class="form-label">Mulai Tanggal</label>
                                        </div>
                                        <div class="col-4 mt-1">
                                            <label for="TanggalTerakhir" class="form-label">Sampai Tanggal</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 mt-1">
                                            <input name="tglMulai" type="date" class="form-control" id="TanggalMulai" value="" required />
                                        </div>
                                        <div class="col-3 mt-1">
                                            <input name="tglAkhir" type="date" class="form-control" id="TanggalTerakhir" required />
                                        </div>
                                        <div class="col align-self-center">
                                            <button href="" type="submit" name="cari" class="btn color-primary-button fw-bold fs-5 ms-2 float-end">
                                                Tampilkan
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- akhir filter laporan pendapatan -->
                            </div>
                        </div>
                    </div>
                    <!-- tabel laporan pendapatan -->
                    <div class="card flex-fill">
                        <div class="card-header">
                            <h4 class="text-muted fw-bold">Data Total Pendapatan</h4>
                            <h5 class="text-muted fw-bold"><?= (isset($_SESSION["tglMulai"]) && isset($_SESSION["tglAkhir"])) ?  $_SESSION["tglMulai"] . " Sampai " . $_SESSION["tglAkhir"] : date('Y M') ?></h5>
                        </div>
                        <div class="card-body card-secondary">
                            <div class="container">
                                <table class="table table-bordered table-hover table-striped table-light mt-3">
                                    <thead>
                                        <tr>
                                            <th class="d-none d-xl-table-cell">No</th>
                                            <th>Tanggal</th>
                                            <th>Total Pendapatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($rowsData as $row) : ?>
                                            <tr>
                                                <td class="d-none d-xl-table-cell"><?= $i ?></td>
                                                <td><?= $format->formatTgl($row["tgl_pemesanan"]) ?></td>
                                                <td>Rp <?= $format->formatHarga($row["pendapatan"]) ?></td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- akhir tabel laporan pendapatan -->
                </div>
            </main>
            <!-- akhir konten pendapatan -->

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
        document.addEventListener("DOMContentLoaded", function() {
            var ctx = document
                .getElementById("chartjs-dashboard-line")
                .getContext("2d");
            var gradient = ctx.createLinearGradient(0, 0, 0, 225);
            gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
            gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
            // Line chart
            new Chart(document.getElementById("chartjs-dashboard-line"), {
                type: "line",
                data: {
                    labels: [
                        <?php foreach ($rowsGrafik as $row) {
                            echo '"' . $row["bulan"] . '",';
                        } ?>
                    ],
                    datasets: [{
                        label: "Pendapatan (Rp)",
                        fill: true,
                        backgroundColor: gradient,
                        borderColor: window.theme.primary,
                        data: [
                            <?php foreach ($rowsGrafik as $row) {
                                echo '"' . $row["pendapatan"] . '",';
                            } ?>
                        ],
                    }, ],
                },
                options: {
                    maintainAspectRatio: false,
                    legend: {
                        display: false,
                    },
                    tooltips: {
                        intersect: false,
                    },
                    hover: {
                        intersect: true,
                    },
                    plugins: {
                        filler: {
                            propagate: false,
                        },
                    },
                    scales: {
                        xAxes: [{
                            reverse: true,
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                            },
                        }, ],
                        yAxes: [{
                            ticks: {
                                stepSize: 1000,
                            },
                            display: true,
                            borderDash: [3, 3],
                            gridLines: {
                                color: "rgba(0,0,0,0.0)",
                            },
                        }, ],
                    },
                },
            });
        });
    </script>
</body>

</html>