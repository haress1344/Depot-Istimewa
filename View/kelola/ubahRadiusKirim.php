<?php
$format = new pengirimanController();
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
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link rel="shortcut icon" href="assets/icons/icon-48x48.png" />
    <script src="https://kit.fontawesome.com/138f5d579f.js" crossorigin="anonymous"></script>


    <!-- Select2 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin | Radius Pengiriman</title>

    <link href="assets/css/app.css" rel="stylesheet" />
    <link href="assets/css/styleku.css?v=2" rel="stylesheet" />
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
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="index.php?page=ulasan&aksi=view&idkategori=1">
                            <i class="icon-ulasan"></i>
                            <strong>Ulasan Produk</strong>
                        </a>
                    </li>
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
                    <li class="sidebar-item active">
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

            <!-- konten radius kirim -->
            <main class="content">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <h1 class="mb-3 color-secondary">
                                <strong>Radius Pengiriman</strong>
                            </h1>
                            <div class="card flex-fill">
                                <div class="card-body card-secondary">
                                    <div class="container">
                                        <form action="index.php?page=pengiriman&aksi=updateRadius" method="POST">
                                            <div class="mb-3">
                                                <div class="row g-3 align-items-center">
                                                    <div class="col-auto">
                                                        <label for="radius" class="col-form-label">Tentukan Radius Kirim</label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <input name="radius" value="<?= $ketentuanRadius["radius_km"] ?>" type="number" id="radius" class="form-control radInput" aria-describedby="passwordHelpInline" data-id="1" data>
                                                    </div>
                                                    <div class="col-auto">
                                                        <span class="form-text fs-5">
                                                            Kilometer (Km)
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 mb-3">
                                                <button type="submit" class="btn fs-3 fw-bold color-primary-button ms-2 pt-0 pb-0 ps-4 pe-4">
                                                    Tetapkan
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <h1 class="mb-3 color-secondary">
                                <strong>Rincian Kota dalam Radius</strong>
                            </h1>
                            <div class="card flex-fill">
                                <div class="card-body card-secondary">
                                    <div class="container">
                                        <form action="index.php?page=pengiriman&aksi=lihatKetentuanHargaOngkir" method="POST">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <input name="kotaAsal" id="kotaAsal" type="hidden" value="255">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="kotaTujuan">Pilihan Kota Dalam Radius <?= $ketentuanRadius["radius_km"] ?> Km</label>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group d-flex flex-column flex-lg-row flex-md-row flex-sm-row align-items-center">
                                                            <select name="kotaTujuan" id="kotaTujuan" class="form-control js-example-basic-single">
                                                                <?php foreach ($kota_array["rajaongkir"]["results"] as $index => $kota) : ?>
                                                                    <?php if ($radius[$index]["nama_kota"] == $kota["type"] . " " . $kota["city_name"] && $radius[$index]["jarak"] <= $ketentuanRadius["radius_km"]): ?>
                                                                        <option value="<?= $kota["city_id"] ?>" data-asal="255" data-berat="1000"><?= $kota["type"] ?> <?= $kota["city_name"] ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <?= (isset($cost_array)) ? var_dump($cost_array) : "" ?>
                                            </div> -->
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <input name="berat" id="berat" type="hidden" value="1000">
                                                </div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5 mb-3">
                                                <button type="submit" class="btn fs-3 fw-bold color-primary-button ms-2 pt-0 pb-0 ps-4 pe-4">
                                                    Cek Ongkir
                                                </button>
                                            </div>
                                        </form>
                                        <?php if (isset($biayaOngkir)): ?>
                                            <hr class="pt-3 mb-3" />
                                            <div class="row justify-content-between">
                                                <div class="col">
                                                    <p>Biaya Ongkir Menuju <?= $cityType . " " . $cityName ?> : </p>
                                                </div>
                                                <div class="col text-end color-third">
                                                    <h4 class="fw-bold">Rp <?= $format->formatHarga($biayaOngkir) ?></h4>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- akhir radius kirim -->

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
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>


</body>

</html>