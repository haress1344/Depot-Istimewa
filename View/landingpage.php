<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Iconfy Icon -->
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <!-- CSS Custom -->
    <link rel="stylesheet" href="assets/css/styleku.css" />

    <title>Depot Istimewa Lawang</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar fixed-top navbar-expand-lg p-0 shadow" style="background-color: #f1ba7b">
        <div class="container-fluid p-0">
            <a class="navbar-brand text-light fw-bold fs-5 navlink-depot-istimewa" href="index.html">Depot Istimewa</a>
            <button class="navbar-toggler navbar-light color-click" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="menu.html">
                            <p class="fw-bold">Menu</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="tentangkami.html">
                            <p class="fw-bold">Tentang Kami</p>
                        </a>
                    </li>
                    <div class="vr"></div>
                    <li class="nav-item navlink-konten pt-3">
                        <a class="nav-link color-secondary" href="#">
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
                        <a class="nav-link color-secondary" href="bantuan.html">
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
                        <div class="carousel-caption bottom-50 start-0">
                            <h1>Depot Onde-Onde Istimewa</h1>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <!-- ukuran foto harus lebar 1200px & tinggi 480px-->
                        <img src="assets/img/maxresdefault (compressed) (cropped).jpg" class="d-block w-100 c-img" alt="..." />
                        <div class="carousel-caption">
                            <h5>First slide label</h5>
                            <p>
                                Some representative placeholder content for the first slide.
                            </p>
                        </div>
                    </div>
                    <div class="carousel-item c-item">
                        <!-- ukuran foto harus lebar 1200px & tinggi 480px-->
                        <img src="assets/img/IMG20230520153229 (compresed)(cropped).jpg" class="d-block w-100 c-img" alt="..." />
                        <div class="carousel-caption">
                            <h5>First slide label</h5>
                            <p>
                                Some representative placeholder content for the first slide.
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
                <?php foreach ($data as $ktg) : ?>
                    <div class="col-md mt-3">
                        <div class="card card-primary">
                            <!-- ukuran foto harus lebar 419px & tinggi 258px-->
                            <img src="assets/img/istockphoto-1475388113-612x612(cropped).jpg" class="card-img-top" alt="..." width="419" height="258" />
                            <div class="card-body">
                                <a href="menu.html">
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
                    <div class="card card-primary text-center mb-3">
                        <img src="..." class="card-img-top" alt="..." />
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">
                                This is a wider card with supporting text below as a natural
                                lead-in to additional content. This content is a little bit
                                longer.
                            </p>
                            <div class="row">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <a href="menu.html" class="btn color-primary-button">
                                        <h4>Buat Pesanan</h4>
                                    </a>
                                </div>
                            </div>
                            <p class="card-text">
                                <small class="text-muted">Last updated 3 mins ago</small>
                            </p>
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
                        <p><a href="menu.html">Makanan</a></p>
                        <p><a href="menu.html">Snack</a></p>
                        <p><a href="menu.html">Minuman</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h5 class="mt-4 mb-4">Bantuan</h5>
                    <div class="content-footer fw-bold">
                        <p><a href="">Syarat dan Ketentuan</a></p>
                        <p><a href="">Cara Memesan</a></p>
                        <p><a href="">Kebijakan Privasi</a></p>
                    </div>
                </div>
                <div class="col-md-2">
                    <h5 class="mt-4 mb-4">Kontak Kami</h5>
                    <div class="content-footer fw-bold">
                        <p><a href="">Instagram</a></p>
                        <p><a href="">Facebook</a></p>
                        <p><a href="">082139310634</a></p>
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
                        <h5 class="text-center">Masuk dengan akun untuk mulai pesan</h5>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-11">
                                <form action="../authpelanggan/index.html" method="">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username / Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username / Email" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password" />
                                    </div>
                                    <p class="text-end">
                                        <a href="" class="color-forth">Lupa Password?</a>
                                    </p>
                                    <div class="d-grid">
                                        <button type="submit" class="btn color-primary-button">
                                            <h6>LOGIN AKUN</h6>
                                        </button>
                                        <hr />
                                        <a href="register.html" type="submit" class="btn color-secondary-button mb-3">
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
</body>

</html>