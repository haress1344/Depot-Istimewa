<?php
$format = new transaksiController();
$ulasan = new ulasanController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Fontawesome Icon -->
    <script src="https://kit.fontawesome.com/138f5d579f.js" crossorigin="anonymous"></script>
    <!-- Iconfy Icon -->
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- unicon icon -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" />
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <!-- css bootstrap custom -->
    <link href="assets/css/bootstrap.min.css?v=2" rel="stylesheet">
    <!-- CSS Custom -->
    <link rel="stylesheet" href="assets/css/styleku.css?" />
    <!-- <link rel="stylesheet" href="assets/css/style.css?" /> -->
     <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Rincian Pembelian Depot Istimewa Lawang</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg p-0 shadow" style="background-color: #f1ba7b">
        <div class="container-fluid p-0">
            <a class="navbar-brand text-light fw-bold fs-5 navlink-depot-istimewa" href="index.php?page=pelanggan&aksi=view">Depot Istimewa</a>
            <button class="navbar-toggler navbar-light color-click" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=pelanggan&aksi=menu">
                            <p class="fw-bold">Menu</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=pelanggan&aksi=tentangKami">
                            <p class="fw-bold">Tentang Kami</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=pelanggan&aksi=ikutiKami">
                            <p class="fw-bold">Ikuti Kami</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3 dropdown">
                        <a class="nav-link fw-bold color-secondary dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Akun Saya
                        </a>
                        <ul class="dropdown-menu card-secondary" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item1" href="index.php?page=pelanggan&aksi=profile">Profile Akun</a></li>
                            <li><a class="dropdown-item1" href="index.php?page=keranjang&aksi=view">Keranjang Saya</a></li>
                            <li>
                                <a class="dropdown-item1" href="index.php?page=transaksi&aksi=view">Riwayat Pembelian</a>
                            </li>
                            <li>
                                <a class="dropdown-item1" href="index.php?page=pelanggan&aksi=password">Ubah Password</a>
                            </li>

                            <li>
                                <a class="dropdown-item1 text-danger" href="index.php?page=pelanggan&aksi=logout">Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=pelanggan&aksi=bantuan">
                            <p class="fw-bold">Bantuan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <div class="konten-web hal-profile">
        <div class="container">
            <div class="row justify-content-between">
                <!-- riwayat produk -->
                <div class="col-lg-6">
                    <div class="mb-4">
                        <h2 class="color-secondary">RINCIAN PEMBELIAN</h2>
                    </div>
                    <?php if (isset($_SESSION["success_alert"])) :  ?>
                        <?php if ($_SESSION["success_alert"] === TRUE) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Produk sudah masuk di keranjang anda</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif ($_SESSION["success_alert"] === FALSE) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops, produk yang anda pesan melebihi stok yang tersedia</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    <?php unset($_SESSION["success_alert"]);
                    endif; ?>
                    <?php if (isset($_SESSION["ulasan_alert"])) :  ?>
                        <?php if ($_SESSION["ulasan_alert"] === TRUE) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Terimakasih telah memberikan ulasan pada produk kami</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif ($_SESSION["ulasan_alert"] === FALSE) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Oops, ulasan anda gagal terkirim</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    <?php unset($_SESSION["ulasan_alert"]);
                    endif; ?>
                    <?php foreach ($rincianPembelian as $produk): ?>
                        <div class="card mb-3 card-secondary p-3">
                            <div class="row riwayat-pemb">
                                <div class="col-lg-4 col-md-4 col-sm-3 col-3 text-center">
                                    <img src="assets/img/<?= $produk["gambar_produk"] ?>" class="img-fluid rounded-start mt-4 gambar-produk" alt="..." />
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-7 col-7 align-self-center text-center">
                                    <h4 class="card-title color-secondary mt-3">
                                        <?= $produk["nama_produk"] ?>
                                    </h4>
                                    <p class="color-third harga">Rp <?= $format->formatHarga($produk["harga_produk"]) ?></p>
                                    <form action="index.php?page=keranjang&aksi=storeItem&id=<?= $produk["kode_transaksi"] ?>" method="POST">
                                        <input type="hidden" name="id_produk" value="<?= $produk["id_produk"] ?>">
                                        <?php if ($produk["status_kirim"] == 3 && $ulasan->cekStatusUlasan($produk["id_item"]) == false): ?>
                                            <a href="index.php?page=ulasan&aksi=tambahUlasan&id=<?= $produk["kode_transaksi"] ?>&item=<?= $produk["id_item"] ?>&pdk=<?= $produk["id_produk"] ?>&tgl=<?= $produk["tgl_pemesanan"] ?>" type="button" class="btn color-secondary-button fs-6 pt-0 pb-0 ps-3 pe-3">Beri Ulasan</a>
                                        <?php endif; ?>
                                        <button type="submit" class="btn color-primary-button fs-6 pt-0 pb-0 ps-3 pe-3">Pesan Lagi</button>
                                    </form>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-2 col-2 align-self-center">
                                    <p class="text-center color-secondary mb-3 fs-4">
                                        <?= $produk["jumlah_barang"] ?> Item
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- akhir riwayat produk -->
                <!-- rincian pembelian -->
                <div class="col-lg-5">
                    <div class="card card-secondary pt-3">
                        <div class="card-body">
                            <div class="container">
                                <div class="row justify-content-between card-title">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <h5 class="color-secondary">ID PEMESANAN</h5>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-end">
                                        <h5 class="color-ninth mb-4"><?= $rincianPembelian[0]["kode_transaksi"] ?></h5>
                                    </div>
                                </div>
                                <hr class="mb-4" />
                                <div class="row justify-content-between">
                                    <?php foreach ($rincianPembelian as $row): ?>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                            <p class="color-secondary fs-5"><?= $row["jumlah_barang"] ?> <?= $row["nama_produk"] ?></p>
                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-end">
                                            <p class="color-third fs-5 mb-4">Rp <?= $format->formatHarga($row["total_per_produk"]) ?></p>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <hr class="mb-4" />
                                <div class="row">
                                    <div class="col">
                                        <h6 class="color-secondary">Lokasi Pengiriman</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                        <p class="color-secondary mb-4"><?= $rincianPembelian[0]["alamat_tujuan"] . ", " . $rincianPembelian[0]["kota_tujuan"] ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <h6 class="color-secondary">Permintaan Tiba di Lokasi</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                        <p class="color-secondary mb-4"><?= $format->formatTgl($rincianPembelian[0]["tgl_permintaan"]) ?></p>
                                    </div>
                                </div>
                                <?php if ($rincianPembelian[0]["status_kirim"] == 2 || $rincianPembelian[0]["status_kirim"] == 3): ?>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="color-secondary">Tanggal Kirim</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <p class="color-secondary mb-4"><?= $format->formatTgl($rincianPembelian[0]["tgl_pengiriman"])  ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($rincianPembelian[0]["status_kirim"] == 3): ?>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="color-secondary">Tanggal Diterima</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <p class="color-secondary mb-4"><?= $format->formatTglWaktu($rincianPembelian[0]["tgl_diterima"]) ?> WIB</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($rincianPembelian[0]["status_kirim"] == 2): ?>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="color-secondary">Estimasi Tiba</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <p class="color-secondary mb-4"><?= $format->formatTime($rincianPembelian[0]["estimasi_tiba"]) ?> WIB</p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row justify-content-between">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="color-secondary">Status Pengiriman</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-end">
                                        <?php if ($rincianPembelian[0]["status_kirim"] == 0): ?>
                                            <p class="color-third fw-bold">Belum Dikirim</p>
                                        <?php elseif ($rincianPembelian[0]["status_kirim"] == 1): ?>
                                            <p class="color-third fw-bold">Sedang Disiapkan</p>
                                        <?php elseif ($rincianPembelian[0]["status_kirim"] == 2): ?>
                                            <p class="color-third fw-bold">Sedang Dikirim</p>
                                        <?php elseif ($rincianPembelian[0]["status_kirim"] == 3): ?>
                                            <p class="color-third fw-bold">Sudah Diterima</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row justify-content-between">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="color-secondary">Biaya Kirim</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-end">
                                        <p class="color-third fs-5 mb-4">Rp <?= $format->formatHarga($rincianPembelian[0]["biaya_ongkir"]) ?></p>
                                    </div>
                                </div>

                                <hr class="mb-4" />
                                <div class="row">
                                    <div class="col">
                                        <h6 class="color-secondary">Tanggal Pemesanan</h6>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                        <p class="color-secondary mb-4"><?= $format->formatTgl($rincianPembelian[0]["tgl_pemesanan"]) ?></p>
                                    </div>
                                </div>
                                <?php if ($rincianPembelian[0]["status_transaksi"] == 1): ?>
                                    <div class="row">
                                        <div class="col">
                                            <h6 class="color-secondary">Tanggal Pembayaran</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 col-sm-8 col-8">
                                            <p class="color-secondary mb-4"><?= $format->formatTgl($rincianPembelian[0]["tgl_pembayaran"]) ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="row justify-content-between">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="color-secondary">Status Transaksi</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-end">
                                        <p class="color-third fw-bold mb-4"> <?= ($rincianPembelian[0]["status_transaksi"] == "0") ? "Belum Dibayar" : "Sudah Dibayar" ?></p>
                                    </div>

                                </div>
                                <div class="row justify-content-between">

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                        <p class="color-secondary fs-5">TOTAL BIAYA</p>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-5 text-end">
                                        <p class="color-third fs-5 fw-bold mb-4">Rp <?= $format->formatHarga($rincianPembelian[0]["total_pembayaran"]) ?></p>
                                    </div>

                                </div>
                                <hr class="mb-4" />
                                <?php if ($rincianPembelian[0]["status_kirim"] == 2): ?>
                                    <!-- <form action="index.php?page=pengiriman&aksi=terimaPesanan&id=<?= $_GET["id"] ?>" method="POST"> -->
                                    <div class="d-grid gap-2">
                                        <!-- <input name="id_ongkir" type="hidden" value="<?= $rincianPembelian[0]["id_ongkir"] ?>"> -->
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit" class="btn color-primary-button ps-4 pe-4 mb-3">
                                            DITERIMA
                                        </a>
                                    </div>
                                    <!-- </form> -->
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir rincian pembelian -->
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container pb-4">
            <div class="row justify-content-center text-md-start">
                <div class="col-md-3">
                    <h5 class="mt-4 mb-4">Menu</h5>
                    <div class="content-footer fw-bold">
                        <?php foreach ($kategori as $ktg) : ?>
                            <p><a href="index.php?page=pelanggan&aksi=menu&idkategori=<?= $ktg["id_kategori"] ?>"><?= $ktg["nama_kategori"] ?></a></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mt-4 mb-4">Bantuan</h5>
                    <div class="content-footer fw-bold">
                        <p><a href="index.php?page=pelanggan&aksi=bantuan">Syarat dan Ketentuan</a></p>
                        <p><a href="index.php?page=pelanggan&aksi=bantuan">Cara Memesan</a></p>
                        <p><a href="index.php?page=pelanggan&aksi=bantuan">Kebijakan Privasi</a></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5 class="mt-4 mb-4">Kontak Kami</h5>
                    <div class="content-footer fw-bold">
                        <p><span class="fs-5"><i class="fa-brands fa-instagram"></i></span> <a href="https://www.instagram.com/onde_istimewalawang?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==">Instagram</a></p>
                        <p><span class="fs-5"><i class="fa-brands fa-whatsapp"></i></span> <a href="https://wa.link/b8yqnw">085236897430</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir footer -->

    <!-- copyright -->
    <div class="copyright pt-3 pb-1">
        <div class="container">
            <p class="fw-bold text-center text-light">Copyright Haris</p>
        </div>
    </div>
    <!-- akhir copyright -->

    <!-- modal terima pesanan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h5 class="text-center mb-4">Apakah Anda Yakin Produk Sudah Diterima ?</h5>
                        <div class="row justify-content-center">
                        </div>
                    </div>
                </div>
                <form action="index.php?page=pengiriman&aksi=terimaPesanan&id=<?= $_GET["id"] ?>" method="POST">
                    <input name="id_ongkir" type="hidden" value="<?= $rincianPembelian[0]["id_ongkir"] ?>">
                    <div class="modal-footer">
                        <button type="button" class="btn color-secondary-button" data-bs-dismiss="modal">Belum</button>
                        <button type="submit" class="btn color-primary-button">Sudah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- akhir modal terima pesanan -->

    <!-- modal peringatan -->
    <div class="modal fade" id="terimaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php if (isset($_SESSION["terima_alert"])) : ?>
                        <?php $showModal = TRUE;
                            unset($_SESSION["terima_alert"]);
                        endif;
                        ?>
                        <span id="showModal" style="display: none;"><?= json_encode($showModal) ?></span>
                        <h5 class="text-center mb-4">Terimakasih telah membeli produk kami. Jangan lupa berikan ulasanmu</h5>
                        <div class="row justify-content-center" style="height: 100px; margin: 40px">
                            <div class="col-md-11 text-center">
                                <i class="fa-regular fa-face-smile-beam icon-item-kosong color-fivth"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal peringatan -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="assets/js/rincianPembelian.js"></script>
    <!-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->
    <!-- <script src="assets/js/jsConfProfile.js?v=2"></script> -->
</body>

</html>