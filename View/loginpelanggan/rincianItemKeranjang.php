<?php
$harga = new pelangganController();
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
    <link rel="stylesheet" href="assets/css/styleku.css?=2" />

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Keranjang Depot Istimewa Lawang</title>
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

    <!-- link kategori menu -->
    <section class="main-container">
        <div class="row justify-content-between">
            <div class="col-10">
                <div class="tab-nav-bar">
                    <div class="tab-navigation">
                        <i class="uil uil-angle-left icon-panah-kiri"></i>
                        <i class="uil uil-angle-right icon-panah-kanan"></i>
                        <ul class="tab-menu">
                            <li class="tab-btn">
                                <a href="index.php?page=pelanggan&aksi=menu">
                                    <h4>
                                        <i class="fa-regular fa-star icon-menu-kategori"></i>
                                        Terlaris
                                    </h4>
                                </a>
                            </li>
                            <?php foreach ($kategori as $ktg) : ?>
                                <li class="tab-btn">
                                    <a href="index.php?page=pelanggan&aksi=menu&idkategori=<?= $ktg["id_kategori"] ?>">
                                        <h4>
                                            <i class="<?= $ktg["url_icon"] ?> icon-menu-kategori"></i> <?= $ktg["nama_kategori"] ?>
                                        </h4>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-1 align-self-center mt-5">
                <div class="keranjang-container">
                    <div class="counter-container">
                        <a href="index.php?page=keranjang&aksi=view">
                            <?php if (empty($jumItem)) : ?>
                            <?php else : ?>
                                <span id="counter"><?= $jumItem ?></span>
                            <?php endif; ?>
                            <i class="fa-solid fa-basket-shopping icon-keranjang pt-3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- akhir link kategori menu -->
    <div class="konten-web">
        <div class="container">
            <!-- rincian produk -->
            <div class="row justify-content-between">
                <div class="col-lg-7">
                    <h2 class="mt-3 mb-4 color-secondary">RINCIAN PRODUK</h2>
                    <div class="card mb-3 card-secondary" style="max-width: 850px">
                        <div class="row g-0">
                            <div class="col-lg-8 align-self-center text-center">
                                <div class="card-body">
                                    <h3 class="card-title color-secondary">
                                        <?= $produk[0]["nama_produk"] ?>
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-4 align-self-start text-center">
                                <img
                                    src="assets/img/<?= $produk[0]["gambar_produk"] ?>"
                                    class="img-fluid rounded-start mt-4 gambar-produk"
                                    alt="..." />
                            </div>
                        </div>
                    </div>
                    <!-- akhir rincian produk -->
                    <!-- ulasan produk -->
                    <h2 class="mt-3 mb-4 color-secondary">ULASAN</h2>
                    <div class="card mb-3 card-secondary pt-3" style="max-width: 850px">
                        <div class="ulasan-pelanggan">
                            <div class="row g-0">
                                <?php if (empty($ulasan)): ?>
                                    <div class="row justify-content-center">
                                        <div class="col-lg-6 text-center">
                                            <i class="fa-solid fa-wheat-awn-circle-exclamation icon-item-kosong color-fivth"></i>
                                            <h5 class="display-1">Woops</h5>
                                            <h6 class="mb-4">Produk Masih Belum Memiliki Ulasan</h6>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($ulasan as $row): ?>
                                        <div class="col-md-4 align-self-center">
                                            <div class="icon-pelanggan">
                                                <iconify-icon
                                                    icon="iconamoon:profile-circle"
                                                    style="color: #ec7905"
                                                    width="90"
                                                    height="90"></iconify-icon>
                                            </div>
                                        </div>
                                        <div class="col-md-7 align-self-start">
                                            <div class="card-body">
                                                <div class="container">
                                                    <h4 class="color-secondary p-2"><?= $row["nama_user"] ?></h4>
                                                    <div class="menu-rating text-center ms-2">
                                                        <p class="fs-5">
                                                            <iconify-icon
                                                                icon="ic:round-star"
                                                                style="color: #f24e1e"
                                                                width="22"
                                                                height="19"
                                                                flip="horizontal"></iconify-icon>
                                                            <?= $row["rating"] ?>
                                                        </p>
                                                    </div>
                                                    <hr class="m-2">
                                                </div>
                                                <div class="komentar-pelanggan p-2">
                                                    <p>
                                                        <?= $row["ket_ulasan"] ?>
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <hr />
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <!-- akhir ulasan produk -->
                </div>
                <!-- pesan rincian produk -->
                <div class="col-lg-4">
                    <div class="card card-secondary">
                        <div class="card-body">
                            <h3 class="card-title color-secondary text-center mt-3 mb-4">
                                <?= $produk[0]["nama_produk"] ?>
                            </h3>
                            <hr class="mb-4" />
                            <?php if (empty($produk[0]["ket_produk"])) : ?>

                            <?php else: ?>
                                <div class="container">
                                    <h5 class="color-secondary mb-2">Keterangan Produk</h5>
                                    <ul>
                                        <li><?= $produk[0]["ket_produk"] ?></li>
                                    </ul>
                                </div>
                                <hr class="mt-4 mb-4" />
                            <?php endif; ?>

                            <div class="container">
                                <div class="row justify-content-between mb-4">
                                    <div class="col-lg-4">
                                        <h5 class="color-secondary">HARGA</h5>
                                    </div>
                                    <div class="col-lg-5">
                                        <h5 class="color-third">Rp <?= $harga->harga($produk[0]["harga_produk"]) ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir pesan rincian produk -->
            </div>
        </div>
    </div>

    <!-- footer -->
    <div class="footer">
        <div class="container pb-4">
            <div class="row justify-content-center text-md-start">
                <div class="col-md-3">
                    <h5 class="mt-4 mb-4">Menu</h5>
                    <div class="c-footer fw-bold">
                        <?php foreach ($kategori as $ktg) : ?>
                            <p><a href="index.php?page=pelanggan&aksi=menu&idkategori=<?= $ktg["id_kategori"] ?>"><?= $ktg["nama_kategori"] ?></a></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mt-4 mb-4">Bantuan</h5>
                    <div class="c-footer fw-bold">
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
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
</body>

</html>