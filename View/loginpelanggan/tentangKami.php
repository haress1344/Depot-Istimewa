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

        <div class="container-fluid banner card-secondary ">
            <div class="container py-3">
                <div class="row g-4 align-items-center judul-tentangkami">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="fw-normal display-3 color-third">Depot Onde - Onde</h1>
                            <p class=" display-4 text-dark mb-4">Istimewa Lawang</p>
                            <p class="mb-4 text-dark">Sejak 1978, menghadirkan cita rasa autentik dengan bahan- bahan yang
                                berkualitas.</p>
                            <a href="index.php?page=pelanggan&aksi=menu" class="color-primary-button btn border-2 border-white rounded-pill text-white py-3 px-5"><span
                                    class="fw-bold">MULAI PESAN</span></a>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <div class="position-relative">
                            <img src="assets/img/IMG20230520153229 (625x424).jpg" class="img-fluid w-100 rounded" alt="">

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container py-5">

            <!-- keterangan Depot -->
            <div class="row justify-content-evenly mt-4">
                <div class="col-lg-5 mb-4">
                    <div class="card text-white">
                        <img src="assets/img/resep-onde-onde-isi-kacang-hijau.jpeg" class="card-img" alt="..." />
                    </div>
                </div>
                <div class="col-lg-7 align-self-center">
                    <h1 class="text-center mb-4">Tentang Kami</h1>
                    <div class="card card-secondary mb-4">
                        <div class="card-body">
                            <p class="card-text">
                                Diawali keluarga pecinta kuliner yang suka berkreasi dalam masakan, menciptakan Onde-Onde Spesial dengan
                                resep nenek. Menggabungkan bahan tradisional dan isian, Onde-Onde Spesial ala Kami kini menjadi favorit
                                di kalangan keluarga dan teman. Kisah kami menghadirkan cita rasa tradisional dengan sentuhan kreatif
                                kami.
                            </p>
                        </div>
                    </div>
                    <div class="card card-secondary mb-4">
                        <div class="card-body">
                            <p class="card-text">
                                Tak hanya menyajikan Onde-Onde spesial, depot kami juga menyajikan berbagai macam makanan dengan tidak
                                lupa menghadirkan cita rasa tradisional. Dengan resep yang tentunya mampu menggugah selera, karena kami
                                menghadirkan bahan- bahan yang berkualitas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- akhir keterangan Depot -->
        </div>

        <div class="container-fluid banner card-secondary ">
            <div class="container py-3">
                <div class="row g-4 align-items-center pt-5">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="mb-4 fw-normal display-3 color-third">Lokasi <span class="color-secondary">Kami</span> <i class="ps-4 fa-solid fa-location-dot"></i></h1>
                            <p class="fs-5  mb-4 color-secondary">Jl. DR. Cipto No.1441, Sengkkrajan, Bedali, Kec. Lawang, Kabupaten Malang, Jawa
                                Timur 65215</p>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5 text-center">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d506240.38106356544!2d112.36973466068966!3d-7.574652674424188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd62be00a98a0f3%3A0xe524fe4fa5bfe9f3!2sOnde%20Onde%20Istimewa%20Asli%20Lawang!5e0!3m2!1sen!2sid!4v1725201256220!5m2!1sen!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
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
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
</body>

</html>