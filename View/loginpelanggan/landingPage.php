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
    <link rel="stylesheet" href="assets/css/styleku.css?v=4" />

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Depot Istimewa Lawang</title>
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

    <div class="konten-web">
        <!-- carousel -->
        <div class="container">
            <div class="container-carousel">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active c-item">
                            <!-- ukuran foto harus lebar 1200px & tinggi 480px-->
                            <img src="assets/img/resep-onde-onde-isi-kacang-hijau (croped).jpeg" class="d-block w-100 c-img" alt="..." />
                            <div class="carousel-caption top-0 mt-5">
                                <h1 class="mt-5">Depot Onde-Onde Istimewa Lawang</h1>
                                <p>
                                    Sejak 1978, menghadirkan cita rasa autentik dengan bahan- bahan yang berkualitas.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item c-item">
                            <!-- ukuran foto harus lebar 1200px & tinggi 480px-->
                            <img src="assets/img/maxresdefault (compressed) (cropped).jpg" class="d-block w-100 c-img" alt="..." />
                            <div class="carousel-caption mb-5">
                                <h1 class="mt-5">Depot Onde-Onde Istimewa Lawang</h1>
                                <p>
                                    Sejak 1978, menghadirkan cita rasa autentik dengan bahan- bahan yang berkualitas.
                                </p>
                            </div>
                        </div>
                        <div class="carousel-item c-item">
                            <!-- ukuran foto harus lebar 1200px & tinggi 480px-->
                            <img src="assets/img/IMG20230520153229 (compresed)(cropped).jpg" class="d-block w-100 c-img" alt="..." />
                            <div class="carousel-caption top-0 mt-5">
                                <h1 class="mt-5">Depot Onde-Onde Istimewa Lawang</h1>
                                <p>
                                    Sejak 1978, menghadirkan cita rasa autentik dengan bahan- bahan yang berkualitas.
                                </p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- akhir carousel -->
        <!-- produk kami -->
        <div class="container">
            <hr class="color-secondary" />
            <div class="row">
                <div class="col">
                    <h2 class="color-secondary">Produk Kami</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php foreach ($kategori as $ktg) : ?>
                    <div class="col-md mt-3">
                        <div class="card card-primary">
                            <!-- ukuran foto harus lebar 419px & tinggi 258px-->
                            <img src="assets/img/<?= $ktg["gambar_kategori"] ?>" class="card-img-top" alt="..." width="419" height="258" />
                            <div class="card-body">
                                <a href="index.php?page=pelanggan&aksi=menu&idkategori=<?= $ktg["id_kategori"] ?>">
                                    <h2 class="card-title color-third"><?= $ktg["nama_kategori"] ?></h2>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- akhir produk kami -->
        <!-- cara pesan -->
        <div class="container">
            <hr class="color-secondary" />
            <div class="row">
                <div class="col">
                    <h2 class="color-secondary">Cara Pesan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col mt-3">
                    <div class="card card-secondary text-center mb-3">
                        <div class="card-body">
                            <div class="row pb-5 py-3 px-3 g-4 justify-content-center">
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="counter bg-white rounded p-5">
                                        <i class="fa-solid fa-right-to-bracket text-secondary"></i>
                                        <h5>(1)</h5>
                                        <h4>login</h4>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="counter bg-white rounded p-5">
                                        <i class="fa-solid fa-bowl-food text-secondary"></i>
                                        <h5>(2)</h5>
                                        <h4>pilih menu</h4>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="counter bg-white rounded p-5">
                                        <i class="fa-solid fa-basket-shopping text-secondary"></i>
                                        <h5>(3)</h5>
                                        <h4>pesan produk</h4>

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="counter bg-white rounded p-5">
                                        <i class="fa-solid fa-money-bill text-secondary"></i>
                                        <h5>(4)</h5>
                                        <h4>checkout</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="row pb-4">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="index.php?page=pelanggan&aksi=menu&idkategori=<?= $kategori[0]["id_kategori"] ?>" class="btn color-primary-button">
                                        Buat Pesanan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir cara pesan -->
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
                        <p><a href="https://www.instagram.com/onde_istimewalawang?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="><span class="fs-5"><i class="fa-brands fa-instagram"></i></span> Instagram</a></p>
                        <p><a href="https://wa.link/b8yqnw"><span class="fs-5"><i class="fa-brands fa-whatsapp"></i></span> 085236897430</a></p>
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

    <!-- modal berhasil login -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <?php if (isset($_SESSION["success_alert"])) : ?>
                        <?php $showModal = TRUE;
                            unset($_SESSION["success_alert"]);
                        endif;
                        ?>
                        <span id="showModal" style="display: none;"><?= json_encode($showModal) ?></span>
                        <h4 class="text-center mb-4">Yeay! Kamu Berhasil Login</h4>
                        <div class="row justify-content-center" style="height: 100px; margin: 40px">
                            <div class="col-md-11 text-center">
                                <i class="fa-solid fa-cart-shopping icon-item-kosong color-fivth"></i>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-md-11 text-center">
                                <h5 class="mb-4">Selamat Datang, <?= $_SESSION["pelanggan"]["nama_user"] ?></h5>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="button" class="btn color-primary-button" data-bs-dismiss="modal">
                                <h6>Mulai Berbelanja</h6>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal berhasil login -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
    <script src="assets/js/jsLandingPage.js?v=2"></script>
</body>

</html>