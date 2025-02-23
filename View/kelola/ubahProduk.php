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

    <link rel="canonical" href="https://demo-basic.adminkit.io/" />

    <title>Admin | Ubah Produk</title>

    <link href="assets/css/app.css" rel="stylesheet" />
    <link href="assets/css/styleku.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
    <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">
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

            <!-- konten kelola produk -->
            <main class="content">
                <div class="container-fluid p-0">
                    <h1 class="mb-3 color-secondary">
                        <strong>Perbarui Produk</strong>
                    </h1>
                    <div class="card flex-fill">
                        <div class="card-body card-secondary">
                            <div class="container">
                                <form action="index.php?page=kelolaproduk&aksi=storeubahproduk&idproduk=<?= $produkLama["id_produk"] ?>&idkategori=<?= $produkLama["id_kategori"] ?>" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <input name="gambarproduk" type="hidden" class="form-control" value="<?= $produkLama["gambar_produk"] ?>" />
                                        <label for="namaproduk" class="form-label">*Nama Produk</label>
                                        <input name="namaproduk" type="text" class="form-control" id="namaproduk" value="<?= $produkLama["nama_produk"] ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="jumlahstok" class="form-label">*Jumlah Stok</label>
                                        <input name="jmlstok" type="number" class="form-control" id="jumlahstok" value="<?= $produkLama["jumlah_stok"] ?>" />
                                    </div>
                                    <label for="hargaproduk" class="form-label">*Harga Produk</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="rupiah">Rp</span>
                                        <input name="hargaproduk" type="number" class="form-control" id="hargaproduk" value="<?= $produkLama["harga_produk"] ?>" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="gambarproduk" class="form-label">*File Gambar Produk.png (lebar 1024px & tinggi
                                            687px)</label>
                                        <h6 class="text-muted">
                                            Gambar yang Ditampilkan Saat Ini
                                        </h6>
                                        <img src="assets/img/<?= $produkLama["gambar_produk"] ?>" width="100" alt="" class="mb-2" />
                                        <label for="gambarproduk" class="form-label"></label>
                                        <input name="gambarproduk" class="form-control" type="file" id="gambarproduk" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="ketproduk" class="form-label">*Keterangan Produk</label>
                                        <textarea name="ketproduk" class="form-control" type="text" id="ketproduk"><?= $produkLama["ket_produk"] ?></textarea>
                                    </div>

                                    <div class="d-grid gap-2 d-md-block mt-5 mb-3">
                                        <a href="index.php?page=kelolaproduk&aksi=view&idkategori=<?= $produkLama["id_kategori"] ?>" type="button" class="btn color-secondary-button fs-3 fw-bold ms-2 pt-0 pb-0 ps-4 pe-4">Kembali</a>
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