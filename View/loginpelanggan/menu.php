<?php
$harga = new pelangganController();
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
    <link rel="stylesheet" href="assets/css/styleku.css?=2" />
    <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Menu Depot Istimewa Lawang</title>
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
                            <li class="tab-btn <?= (isset($_GET["idkategori"]) || isset($_POST["cari"]) || isset($keyword)) ? '' : 'tab-btn-active' ?>">
                                <a href="index.php?page=pelanggan&aksi=menu">
                                    <h4>
                                        <i class="fa-regular fa-star icon-menu-kategori"></i>
                                        Terlaris
                                    </h4>
                                </a>
                            </li>
                            <?php foreach ($kategori as $ktg) : ?>
                                <li class="tab-btn <?= ($_GET["idkategori"] == $ktg["id_kategori"]) ? 'tab-btn-active' : '' ?>">
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
        <!-- menu -->
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-6">
                    <form action="index.php?page=pelanggan&aksi=menu" method="post">
                        <div class="input-group mb-3">
                            <input name="keyword" type="text" class="form-control" placeholder="Nama produk" aria-describedby="button-addon2">
                            <!-- <span> -->
                            <button name="cari" type="submit" class="btn color-secondary-button border" type="button" id="button-addon2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <!-- </span> -->
                        </div>
                    </form>
                </div>
            </div>
            <?php if (empty($produk)) : ?>
                <!-- menu kosong -->
                <div class="container-fluid py-5">
                    <div class="container py-2 text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <i class="fa-solid fa-wheat-awn-circle-exclamation icon-item-kosong color-fivth"></i>
                                <h1 class="display-1">Woops</h1>
                                <h2 class="mb-4">Produk Masih Kosong</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir menu kosong -->
            <?php else : ?>
                <?php if (isset($_SESSION["success_alert"])) :  ?>
                    <?php if ($_SESSION["success_alert"] === TRUE) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Produk sudah masuk di keranjang anda, silakan checkout di keranjang anda</strong>
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
                <div class="row">
                    <?php foreach ($produk as $pdk) : ?>
                        <div class="col-md-3 col-sm-6 mb-3">
                            <div class="card card-secondary text-center card-shape">
                                <!-- Foto Gambar Harus PNG dengan Width = 1024px & Height = 687px -->
                                <img src="assets/img/<?= $pdk["gambar_produk"] ?>" class="mx-auto card-img-top mt-3" alt="..." style="margin-bottom: 10px; max-width:75%; height: 175px;" />
                                <div class="card-body">
                                    <div class="menu-rating m-auto">
                                        <p class="fs-5">
                                            <iconify-icon icon="ic:round-star" style="color: #f24e1e" width="22" height="19" flip="horizontal"></iconify-icon>
                                            <?= $ulasan->viewRate($pdk["id_produk"]) ?>
                                        </p>
                                    </div>
                                    <h5 class="card-title color-forth fw-bold">
                                        <?= $pdk["nama_produk"] ?>
                                    </h5>
                                    <h6 class="card-title color-fivth fw-bold">Rp <?= $harga->harga($pdk["harga_produk"]) ?> </h6>
                                    <div class="row justify-content-center">
                                        <?php if ($pdk["jumlah_stok"] <= 0) : ?>
                                            <div class="col-md" style="margin-bottom: -10px">
                                                <p class="fs-6 fw-bold" style="color: #F24E1E">Habis</p>
                                            </div>
                                        <?php else : ?>
                                            <div class="col-md" style="margin-bottom: -10px">
                                                <p class="color-sixth fs-6 fw-bold">Tersedia</p>
                                            </div>
                                        <?php endif; ?>
                                        <div class="col-md">
                                            <p class="color-forth fw-bold"><?= $pdk["jumlah_stok"] ?> Items</p>
                                        </div>
                                    </div>
                                    <?php if (isset($_GET["idkategori"])) : ?>
                                        <form action="index.php?page=keranjang&aksi=storeItem&idkategori=<?= $pdk["id_kategori"] ?>" method="post">
                                        <?php elseif (isset($keyword)) : ?>
                                            <form action="index.php?page=keranjang&aksi=storeItem&keyword=<?= $keyword ?>" method="post">
                                            <?php else : ?>
                                                <form action="index.php?page=keranjang&aksi=storeItem" method="post">
                                                <?php endif; ?>
                                                <input name="id_produk" type="hidden" value="<?= $pdk["id_produk"] ?>">
                                                <input name="id_kategori" type="hidden" value="<?= $pdk["id_kategori"] ?>">
                                                <a href="index.php?page=pelanggan&aksi=rincianMenu&pdk=<?= $pdk["id_produk"] ?>" type="button" class="btn color-Third-button pt-0 pb-0 ps-4 pe-4">Rincian</a>

                                                <button type="submit" class="btn color-primary-button pt-0 pb-0 ps-4 pe-4" <?= $pdk["jumlah_stok"] <= 0 ? 'disabled' : '' ?>>Pesan</button>
                                                </form>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- akhir menu -->
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

    <!-- modal login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center color-secondary">
                                <h4 class="modal-title" id="exampleModalLabel">AKSES AKUN</h4>
                                <h4 class="modal-title" id="exampleModalLabel">
                                    KE DEPOT ISTIMEWA
                                </h4>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

            </div>
        </div>
    </div>
    <!-- akhir modal login -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
</body>

</html>