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
    <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Ubah Password Depot Istimewa Lawang</title>
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
                <!-- form password akun -->
                <div class="col-lg-7">
                    <h3 class="color-secondary mb-4">UBAH PASSWORD</h3>
                    <?php if (isset($_SESSION["alert_updatePass"])) : ?>
                        <?php if ($_SESSION["alert_updatePass"] === "Berhasil merubah password") : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong><?= $_SESSION["alert_updatePass"] ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php elseif ($_SESSION["alert_updatePass"] === "Gagal merubah password") : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?= $_SESSION["alert_updatePass"] ?></strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <form action="index.php?page=pelanggan&aksi=updatePassword" method="post">
                        <div class="mb-3">
                            <label for="passwordLamaPelanggan" class="form-label">*Password Lama</label>
                            <?php if (isset($_SESSION["form_updatePass"])) : ?>
                                <?php if ($_SESSION["form_updatePass"] === "Password lama salah") : ?>
                                    <p class="text-danger"><?= $_SESSION["form_updatePass"] ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <input name="passLama" type="password" class="form-control" id="passwordLamaPelanggan" required />
                        </div>
                        <div class="mb-3">
                            <label for="passwordBaruPelanggan" class="form-label">*Password Baru</label>
                            <input name="passBaru" type="password" class="form-control" id="passwordBaruPelanggan" required />
                        </div>
                        <div class="mb-3">
                            <label for="konfirmPassword" class="form-label">*Konfirmasi Password</label>
                            <?php if (isset($_SESSION["form_updatePass"])) : ?>
                                <?php if ($_SESSION["form_updatePass"] === "Password konfirmasi salah") : ?>
                                    <p class="text-danger"><?= $_SESSION["form_updatePass"] ?></p>
                                <?php endif; ?>
                            <?php endif; ?>
                            <input name="konfirmPassBaru" type="password" class="form-control" id="konfirmPassword" required />
                        </div>
                        <?php unset($_SESSION["form_updatePass"]);
                        unset($_SESSION["alert_updatePass"]); ?>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-6">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn color-primary-button mt-3 pt-2 fs-4">
                                        Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- akhir form password akun -->
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
    <script src="assets/js/jsConfProfile.js?v=2"></script>
</body>

</html>