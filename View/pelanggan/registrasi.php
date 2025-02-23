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
    <link rel="stylesheet" href="assets/css/styleku.css?v=1" />
    <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">

    <title>Daftar Akun Depot Istimewa Lawang</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg p-0 shadow" style="background-color: #f1ba7b">
        <div class="container-fluid p-0">
            <a class="navbar-brand text-light fw-bold fs-5 navlink-depot-istimewa" href="index.php?page=landingpage&aksi=view">Depot Istimewa</a>
            <button class="navbar-toggler navbar-light color-click" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=landingpage&aksi=menu">
                            <p class="fw-bold">Menu</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=landingpage&aksi=tentangKami">
                            <p class="fw-bold">Tentang Kami</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=landingpage&aksi=ikutiKami">
                            <p class="fw-bold">Ikuti Kami</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#">
                            <p class="fw-bold">Login Akun</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="index.php?page=landingpage&aksi=bantuan">
                            <p class="fw-bold">Bantuan</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir navbar -->

    <div class="konten-web">
        <div class="container pb-5">
            <!-- keterangan buat bkun -->
            <div class="ket-buatakun">
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <?php if (isset($_SESSION["alert_regis"])) : ?>
                            <?php if ($_SESSION["alert_regis"] === "Gagal membuat akun") : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?= $_SESSION["alert_regis"] ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        <?php unset($_SESSION["alert_regis"]);
                        endif; ?>
                        <h2 class="color-secondary">BUAT AKUN</h2>
                        <p class="fs-4 pt-2">
                            Dengan membuat akun, anda dapat memesan menu yang tersedia di
                            DEPOT ISTIMEWA
                        </p>
                        <!-- <p class="fs-4" style="margin-top: -18px;">di DEPOT ISTIMEWA</p> -->
                    </div>
                </div>
            </div>
            <!-- akhir keterangan buat bkun -->
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <form action="index.php?page=auth&aksi=storeakun" method="post">
                        <!-- form email-konfirmasi pass -->
                        <input name="role" type="hidden" class="form-control" value="2" />
                        <div class="mb-3">
                            <label for="emailbaru" class="form-label">*Email</label>
                            <?php if (isset($_SESSION["alert_form"])) : ?>
                                <?php if ($_SESSION["alert_form"] === "Email sudah digunakan") : ?>
                                    <p class="text-danger"><?= $_SESSION["alert_form"] ?></p>
                                <?php endif; ?>
                            <?php
                            endif; ?>
                            <?php if (isset($_SESSION["regis_akun"])) : ?>
                                <input name="email" type="email" class="form-control" id="emailbaru" placeholder="username@mail.com" value="<?= $_SESSION["regis_akun"]["email"] ?>" required />
                            <?php else : ?>
                                <input name="email" type="email" class="form-control" id="emailbaru" placeholder="username@mail.com" required />
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="usernamebaru" class="form-label">*Username Baru</label>
                            <?php if (isset($_SESSION["alert_form"])) : ?>
                                <?php if ($_SESSION["alert_form"] === "Username sudah digunakan") : ?>
                                    <p class="text-danger"><?= $_SESSION["alert_form"] ?></p>
                                <?php elseif ($_SESSION["alert_form"] === "Username mengandung unique symbol") : ?>
                                    <p class="text-danger"><?= $_SESSION["alert_form"] ?></p>
                                <?php endif; ?>
                            <?php
                            endif; ?>
                            <?php if (isset($_SESSION["regis_akun"])) : ?>
                                <input name="username" type="text" class="form-control" id="usernamebaru" value="<?= $_SESSION["regis_akun"]["username"] ?>" required />
                            <?php else : ?>
                                <input name="username" type="text" class="form-control" id="usernamebaru" required />
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="passwordbaru" class="form-label">*Password Baru</label>
                            <input name="password" type="password" class="form-control" id="passwordbaru" required />
                        </div>
                        <div class="mb-3">
                            <label for="konfirmasipassword" class="form-label">*Konfirmasi Password</label>
                            <?php if (isset($_SESSION["alert_form"])) : ?>
                                <?php if ($_SESSION["alert_form"] === "Konfirmasi password salah") : ?>
                                    <p class="text-danger"><?= $_SESSION["alert_form"] ?></p>
                                <?php endif; ?>
                            <?php
                            endif; ?>
                            <input name="konfirmpass" type="password" class="form-control" id="konfirmasipassword" required />
                        </div>
                        <!-- akhir form email-konfirmasi pass -->

                        <!-- form identitas pelanggan -->
                        <h2 class="color-secondary mt-5 mb-3">TENTANG ANDA</h2>
                        <div class="mb-3">
                            <label for="namabaru" class="form-label">*Nama Anda</label>
                            <?php if (isset($_SESSION["regis_akun"])) : ?>
                                <input name="nama" type="text" class="form-control" id="namabaru" value="<?= $_SESSION["regis_akun"]["nama"] ?>" required />
                            <?php else : ?>
                                <input name="nama" type="text" class="form-control" id="namabaru" required />
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="nomorbaru" class="form-label">*Nomor Telp</label>
                            <?php if (isset($_SESSION["regis_akun"])) : ?>
                                <input name="nohp" type="text" class="form-control" id="nomorbaru" placeholder="+628130892929" value="<?= $_SESSION["regis_akun"]["HP"] ?>" required />
                            <?php else : ?>
                                <input name="nohp" type="text" class="form-control" id="nomorbaru" placeholder="+628130892929" required />
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="alamatbaru" class="form-label">Alamat</label>
                            <?php if (isset($_SESSION["regis_akun"])) : ?>
                                <input name="alamat" type="text" class="form-control" id="alamatbaru" value="<?= $_SESSION["regis_akun"]["alamat"] ?>" required />
                            <?php else : ?>
                                <input name="alamat" type="text" class="form-control" id="alamatbaru" required />
                            <?php endif; ?>
                        </div>
                        <!-- akhir form identitas pelanggan -->
                        <?php unset($_SESSION["alert_form"]);
                        unset($_SESSION["regis_akun"]); ?>
                        <div class="mt-5 col-md-6">
                            <div class="d-grid">
                                <button type="submit" class="btn fw-bold fs-5 color-primary-button mt-3 pt-3">
                                    <p class="pt-2">DAFTAR AKUN</p>
                                </button>
                            </div>
                        </div>
                    </form>
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
                            <p><a href="index.php?page=landingpage&aksi=menu&idkategori=<?= $ktg["id_kategori"] ?>"><?= $ktg["nama_kategori"] ?></a></p>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mt-4 mb-4">Bantuan</h5>
                    <div class="content-footer fw-bold">
                        <p><a href="index.php?page=landingpage&aksi=bantuan">Syarat dan Ketentuan</a></p>
                        <p><a href="index.php?page=landingpage&aksi=bantuan">Cara Memesan</a></p>
                        <p><a href="index.php?page=landingpage&aksi=bantuan">Kebijakan Privasi</a></p>
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
                <div class="modal-body">
                    <div class="container">
                        <?php if (isset($_SESSION["success_alert"])) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Username / Password Salah</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php $showModal = TRUE;
                            unset($_SESSION["success_alert"]);
                        endif;
                        ?>
                        <span id="showModal" style="display: none;"><?= json_encode($showModal) ?></span>
                        <h5 class="text-center">Masuk dengan akun untuk mulai pesan</h5>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-11">
                                <form action="index.php?page=auth&aksi=login" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username / Email</label>
                                        <input name="username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username / Email" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" />
                                    </div>
                                    <div class="row justify-content-end mb-3">
                                        <div class="col-sm-5">
                                            <a href="index.php?page=auth&aksi=lupapassword" class="nav-link color-forth text-end">Lupa Password?</a>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn color-primary-button">
                                            <h6>LOGIN AKUN</h6>
                                        </button>
                                        <hr />
                                        <a href="index.php?page=auth&aksi=registrasipelanggan" type="submit" class="btn color-secondary-button mb-3">
                                            <h6>DAFTAR AKUN</h6>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal login -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
    <script src="assets/js/jsLandingPage.js?v=2"></script>
</body>

</html>