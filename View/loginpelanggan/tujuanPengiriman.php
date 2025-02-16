<?php
$formatHarga = new pengirimanController();
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
    <!-- Select2 -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

    <title><?= $_SESSION["pelanggan"]["nama_user"] ?> || Tujuan Pengiriman Depot Istimewa Lawang</title>
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
            <div class="row justify-content-between">
                <!-- Form Pengiriman -->
                <div class="col-lg-7 mb-4">
                    <h2 class="mb-4 color-secondary">TUJUAN PENGIRIMAN</h2>

                    <form id="form-cek-ongkir" action="index.php?page=pengiriman&aksi=cekOngkir" method="post">
                        <div class="mb-3">
                            <div class="form-group">
                                <input name="kotaAsal" id="kotaAsal" type="hidden" value="255">
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <label for="kotaTujuan">Kota Tujuan</label>
                                <select name="kotaTujuan" id="kotaTujuan" class="form-control js-example-basic-single">
                                    <?php foreach ($kota_array["rajaongkir"]["results"] as $index => $kota) : ?>
                                        <?php if ($radius[$index]["nama_kota"] == $kota["type"] . " " . $kota["city_name"] && $radius[$index]["jarak"] <= $ketentuanRadius["radius_km"]): ?>
                                            <option value="<?= $kota["city_id"] ?>"><?= $kota["type"] ?> <?= $kota["city_name"] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-group">
                                <input name="berat" id="berat" type="hidden" value="1000">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notelpPelanggan" class="form-label">Nomor Telepon/WA</label>
                            <input name="noHp" type="text" class="form-control" id="notelpPelanggan" value="<?= $_SESSION["pelanggan"]["no_tlp"] ?>" />
                        </div>
                        <div class="mb-5">
                            <label for="alamatPelanggan" class="form-label">*Alamat (pastikan alamat tujuan benar)</label>
                            <textarea name="alamat" type="text-area" class="form-control" id="alamatPelanggan" required><?= $_SESSION["pelanggan"]["alamat"] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <button id="pay-button" type="submit" class="btn color-primary-button ps-4 pe-4 mb-3">
                                    CEK ONGKIR
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Akhir Form Pengiriman -->

                <!-- rincian pemesanan -->
                <div class="col-lg-4">
                    <div class="card card-secondary">
                        <div class="card-body">
                            <div class="container">
                                <h3 class="card-title color-secondary mt-3 mb-4" id="">BIAYA ONGKIR</h3>
                                <hr class="mb-4" />
                                <form action="index.php?page=pengiriman&aksi=storePengiriman" method="post">

                                    <div class="mb-3">
                                        <h5 class="color-secondary mb-2">Lokasi Depot</h5>
                                        <p class="color-secondary">
                                            Kecamatan Lawang, Kabupaten Malang
                                        </p>

                                    </div>
                                    <div class="mb-3">
                                        <hr class="mt-4 mb-4" />
                                        <h5 class="color-secondary mb-2">Lokasi Tujuan Pengiriman</h5>
                                        <p class="color-secondary">
                                            <?= (isset($cost_array)) ?  $alamat . ', ' . $tipe_kota . ' ' . $nama_kota : "(belum ditentukan)" ?>
                                        </p>
                                        <br />
                                    </div>
                                    <hr class="mt-4 mb-4" />
                                    <div class="row justify-content-between mb-4">
                                        <div class="col-lg-4">
                                            <h5 class="color-secondary">BIAYA</h5>
                                        </div>
                                        <?php if (isset($cost_array)) : ?>
                                            <div class="col-lg-5">
                                                <h5 class="color-third">Rp <?= $formatHarga->formatHarga($biayaOngkir) ?> </h5>
                                                <input name="idKeranjang" type="hidden" value="<?= $idKeranjang ?>">
                                                <input name="biayaOngkir" type="hidden" value="<?= $biayaOngkir ?>">
                                                <input name="kotaTujuan" type="hidden" value="<?= $tipe_kota ?> <?= $nama_kota ?>">
                                                <input name="alamatTujuan" type="hidden" value="<?= $alamat ?>">

                                            </div>
                                        <?php else: ?>
                                            <div class="col-lg-5">
                                                <h5 class="color-third">Rp 0</h5>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button <?= (isset($cost_array)) ? "" : "disabled" ?> id="pay-button" href="" type="submit" class="btn color-primary-button ps-4 pe-4 mb-3">
                                            ATUR PENGIRIMAN
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir rincian pemesanan -->

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

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
    <script src="assets/js/jsConfProfile.js?v=3"></script>

</body>

</html>