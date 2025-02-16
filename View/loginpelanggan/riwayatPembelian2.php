<?php
$format = new transaksiController();
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
    <link rel="stylesheet" href="assets/css/styleku.css?v=2" />
    <!-- <link rel="stylesheet" href="assets/css/style.css?" /> -->

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Riwayat Pembelian Depot Istimewa Lawang</title>
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
            <div class="row justify-content-around">
                <!-- menu akun -->
                <div class="col-lg-4">
                    <div class="card card-secondary p-3 mb-4">
                        <div class="card-body">
                            <div class="container">
                                <div class="text-center">
                                    <div class="icon-profile"></div>
                                </div>
                                <h4 class="card-title text-center color-secondary pt-3">
                                    <?= $_SESSION["pelanggan"]["nama_user"] ?>
                                </h4>
                                <h6 class="text-muted text-center pb-3">
                                    <?= "@" . $_SESSION["pelanggan"]["username"] ?>
                                </h6>
                                <div class="list-profile pt-2">
                                    <p><a class="color-secondary" href="index.php?page=pelanggan&aksi=profile">Profile Akun</a></p>
                                    <p><a class="color-secondary" href="index.php?page=keranjang&aksi=view">Keranjang Saya</a></p>
                                    <p>
                                        <a class="color-secondary" href="index.php?page=transaksi&aksi=view">Riwayat Pembelian</a>
                                    </p>
                                    <p><a class="color-secondary" href="index.php?page=pelanggan&aksi=password">Ubah Password</a></p>

                                    <p><a class="text-danger" href="index.php?page=pelanggan&aksi=logout">Keluar</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir menu akun -->
                <!-- riwayat pembelian -->
                <div class="col-lg-7">
                    <div class="row justify-content-between">
                        <div class="col-6">
                            <h3 class="color-secondary mb-4">RIWAYAT PEMBELIAN</h3>
                        </div>
                        <div class="col-4">
                            <form action="index.php?page=transaksi&aksi=cariRiwayat" method="POST">
                                <div class="input-group mb-3">
                                    <input name="keyword" type="text" class="form-control" placeholder="Nama produk / id transaksi" aria-describedby="button-addon2">
                                    <!-- <span> -->
                                    <button type="submit" class="btn color-secondary-button border" id="button-addon2">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                    <!-- </span> -->
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php foreach ($riwayatPembelian as $id) : ?>
                        <a href="index.php?page=transaksi&aksi=rincianPembelian&id=<?= $id["kode_transaksi"] ?>">
                            <div class="card mb-3 card-secondary p-3 card-riwayat">
                                <div class="row justify-content-between">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4">
                                        <h5 class="color-secondary"><?= $id["kode_transaksi"] ?></h5>
                                        <p class="color-ninth"><?= $format->formatTgl($id["tgl_pemesanan"]) ?></p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center">
                                        <p class="pb-3 <?= ($id["status_transaksi"] == "0") ? "color-eight" : "color-seventh" ?>"><?= ($id["status_transaksi"] == "0") ? "Belum Dibayar" : "Sudah Dibayar" ?></p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-end">
                                        <?php if ($id["status_kirim"] == 0): ?>
                                            <p class="color-third">Belum Dikirim</p>
                                        <?php elseif ($id["status_kirim"] == 1): ?>
                                            <p class="color-third">Sedang Disiapkan</p>
                                        <?php elseif ($id["status_kirim"] == 2): ?>
                                            <p class="color-third">Sedang Dikirim</p>
                                        <?php elseif ($id["status_kirim"] == 3): ?>
                                            <p class="color-third">Sudah Diterima</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php foreach ($id["items"] as $produk): ?>
                                    <div class="row riwayat-pemb">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3 text-center">
                                            <img src="assets/img/<?= $produk["gambar_produk"] ?>" class="img-fluid rounded-start mt-4 gambar-produk" alt="..." />
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-6 align-self-center">
                                            <h4 class="card-title color-secondary mt-3">
                                                <?= $produk["nama_produk"] ?>
                                            </h4>
                                            <p class="color-ninth"><?= $produk["catatan_item"] ?></p>

                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-3 align-self-center">
                                            <p class="color-third harga">Rp <?= $format->formatHarga($produk["harga_total_produk"]) ?></p>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                                <div class="row justify-content-end">
                                    <div class="col-lg-5 col-md-3 col-sm-5 col-5 text-end color-ninth">
                                        Total : <span class="fw-bold">Rp <?= $format->formatHarga($id["total_pembayaran"]) ?></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
                <!-- akhir riwayat pembelian -->

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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <script src="lib/owlcarousel/owl.carousel.min.js"></script> -->
    <script src="assets/js/jsConfProfile.js?v=2"></script>
</body>

</html>