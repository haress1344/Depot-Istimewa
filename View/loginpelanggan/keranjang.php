<?php
$harga = new produkController();
$date = new keranjangController();
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
    <!-- Midtrans Popup -->
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-m411MABtNeB9kt7y"></script>
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
    <link rel="stylesheet" href="assets/css/styleku.css?v=3" />
    <!-- icon -->
    <link rel="shortcut icon" href="assets/img/logo.png">

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
            <div class="row justify-content-between">
                <!-- isi keranjang -->
                <div class="col-lg-7">
                    <h2 class="mb-4 color-secondary">KERANJANG SAYA</h2>
                    <?php if (empty($keranjang)) : ?>
                        <!-- keranjang kosong -->
                        <div class="container-fluid py-1">
                            <div class="container py-2 text-center">
                                <div class="row justify-content-center">
                                    <div class="col-lg-6">
                                        <i class="fa-regular fa-face-smile-beam icon-item-kosong color-fivth"></i>
                                        <h1 class="display-1">Woops</h1>
                                        <h2 class="mb-4">Keranjang Kamu Masih Kosong</h2>
                                        <p class="mb-4">Pesan makanan dulu untuk mengisi keranjang</p>
                                        <a class="btn border-secondary rounded-pill py-3 px-5" href="index.php?page=pelanggan&aksi=menu&idkategori=1">Menu</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- akhir keranjang kosong -->
                    <?php else : ?>
                        <?php if (isset($_SESSION["success_alert"])) :  ?>
                            <?php if ($_SESSION["success_alert"] === FALSE) : ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Oops, produk yang anda pesan melebihi stok yang tersedia</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        <?php unset($_SESSION["success_alert"]);
                        endif; ?>
                        <?php foreach ($keranjang as $krj) : ?>
                            <div class="card mb-3 card-secondary">
                                <div class="row justify-content-center">
                                    <div class="col-lg-4  text-center">
                                        <img src="assets/img/<?= $krj["gambar_produk"] ?>" class="img-top img-fluid rounded-start mt-4 gambar-produk" alt="..." />
                                    </div>
                                    <div class="col-lg-5  align-self-center">
                                        <div class="card-body text-center">
                                            <h4 class="card-title color-secondary mb-3">
                                                <?= $krj["nama_produk"] ?>
                                            </h4>
                                            <h6 class="text-center color-third mb-3">Rp <?= $harga->harga($krj["harga_produk"]) ?></h6>
                                            <div class="row justify-content-center mb-3">
                                                <div class="col-sm-9 col-7 catatan-produk">
                                                <a style="color: #8f8d8d;" data-bs-toggle="modal" data-bs-target="#reqModal" data-id="<?= $krj["id_produk"] ?>" data-catatan="<?=$krj["catatan_item"]?>" href="#"><i class="<?= (empty($krj["catatan_item"])) ? "fa-solid fa-notes-medical me-2" : "fa-solid fa-pencil me-2" ?>"></i> <span style="color: #8f8d8d;"><?= empty($krj["catatan_item"]) ? "Tambahkan Catatan" : $krj["catatan_item"] ?></span></a>
                                                </div>
                                            </div>
                                            <form action="index.php?page=keranjang&aksi=hapusItem" method="post">
                                                <input name="id_produk" type="hidden" value="<?= $krj["id_produk"] ?>">
                                                <a href="index.php?page=keranjang&aksi=rincianItem&pdk=<?= $krj["id_produk"] ?>" type="button" class="btn color-secondary-button pt-0 pb-0 ps-4 pe-4">Rincian</a>
                                                <button type="submit" href="" type="button" class="btn color-primary-button pt-0 pb-0 ps-4 pe-4" onclick="return confirm('Apakah anda yakin untuk menghapus ?')">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 text-center align-self-center">
                                        <div class="mx-auto color-secondary mb-3 input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-minus card-secondary border">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </div>
                                            <input id="arrayData" type="text" class="quantityInput form-control card-secondary form-control-md text-center border-0" value="<?= $krj["jumlah_barang"] ?>" data-id="<?= $krj["id_produk"] ?>" data-nama="<?= $krj["nama_produk"] ?>" data-harga="<?= $krj["harga_produk"] ?>" data-array=<?= json_encode($keranjang) ?>>
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-plus card-secondary border">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- akhir isi keranjang -->
                </div>

                <!-- rincian pemesanan -->
                <div class="col-lg-4">
                    <div class="card card-secondary">
                        <div class="card-body">
                            <div class="container">
                                <h3 class="card-title color-secondary mt-3 mb-4" id="total-produk"><?= $totalProduk[0]["total_produk"] ?> PRODUK</h3>
                                <hr class="mb-4" />
                                <div class="mb-3">
                                    <div class="row justify-content-between mb-4" id="rincian-barang">
                                        <?php foreach ($keranjang as $krj) : ?>
                                            <div class="col-lg-5">
                                                <p class="color-secondary rincian-pdk" id="rincian-pdk" data-ongkir="<?= $keranjang[0]["biaya_ongkir"] ?>" data-idpdk="<?= $krj["id_produk"] ?>" data-jumpdk="<?= $krj["jumlah_barang"] ?>" data-namapdk="<?= $krj["nama_produk"] ?>" data-hargapdk="<?= $krj["harga_produk"] ?>"><?= $krj["jumlah_barang"] ?> <?= $krj["nama_produk"] ?></p>
                                            </div>
                                            <div class="col-lg-5">
                                                <p class="color-third" data-total-pdk="<?= $krj["total_harga"] ?>">Rp <?= $harga->harga($krj["total_harga"]) ?></p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <hr class="mt-4 mb-4" />
                                    <h5 class="color-secondary mb-2">Lokasi Pengiriman</h5>
                                    <p class="color-secondary">
                                        <?= (isset($keranjang[0]["alamat_tujuan"])) ? $keranjang[0]["alamat_tujuan"] . ", " . $keranjang[0]["kota_tujuan"] : "(alamat belum ditentukan)" ?>
                                    </p>
                                    <p class="color-seventh">
                                        Rp <?= (isset($keranjang[0]["biaya_ongkir"])) ? $harga->harga($keranjang[0]["biaya_ongkir"]) : 0 ?> +
                                    </p>
                                    <?php if (isset($keranjang[0]["id_produk"])): ?>
                                        <a href="index.php?page=pengiriman&aksi=pengiriman" type="button" class="btn color-secondary-button pt-0 pb-0 ps-3 pe-3 float-end">Atur</a>
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <br />
                                    <?php if (isset($keranjang[0]["alamat_tujuan"])): ?>
                                        <div class="mb-4"></div>
                                        <h5 class="color-secondary mb-2">Tanggal Pengiriman</h5>
                                        <p class="color-secondary">
                                            <?= $date->formatTgl($keranjang[0]["tgl_permintaan"])  ?>
                                        </p>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#tglModal" ongkir-id="<?= $keranjang[0]["id_ongkir"] ?>" type="button" class="btn color-secondary-button pt-0 pb-0 ps-3 pe-3 float-end">Atur</a>
                                        <br />
                                    <?php endif; ?>
                                </div>
                                <hr class="mt-4 mb-4" />
                                <div class="row justify-content-between mb-4">
                                    <div class="col-lg-4">
                                        <h5 class="color-secondary">HARGA</h5>
                                    </div>
                                    <div class="col-lg-5">
                                        <h5 class="color-third">Rp <?= $harga->harga($totalHarga[0]["total_harga"]) ?></h5>
                                    </div>
                                </div>
                                <div class="d-grid gap-2">
                                    <button id="pay-button" href="" type="button" class="btn color-primary-button ps-4 pe-4 mb-3" <?= (empty($keranjang)) ? 'disabled' : ' ' ?> data-alamat="<?= isset($keranjang[0]["alamat_tujuan"]) ? $keranjang[0]["alamat_tujuan"] . ', ' . $keranjang[0]["kota_tujuan"] : '' ?>">
                                        CHECKOUT
                                    </button>
                                </div>
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

    <!-- modal request -->
    <div class="modal fade" id="reqModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center color-secondary">
                                <h4 class="modal-title" id="exampleModalLabel">Tambahkan Catatan</h4>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h5 class="text-center">Berikan catatan untuk produk pesananmu</h5>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-11">
                                <form action="index.php?page=keranjang&aksi=tambahCatatan" method="post">
                                    <input type="hidden" name="id_produk">
                                    <div class="mb-4">
                                        <div class="form-floating">
                                            <textarea class="form-control" id="floatingTextarea2" name="catatan" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">Catatan</label>
                                        </div>
                                    </div>

                                    <div class="d-grid">
                                        <button type="submit" class="btn color-primary-button">
                                            <h6>SELESAI</h6>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal request -->

    <!-- modal tgl pengiriman -->
    <div class="modal fade" id="tglModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-7 text-center color-secondary">
                                <h4 class="modal-title" id="exampleModalLabel">Tanggal Pengiriman</h4>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h5 class="text-center">Tentukan tanggal pengiriman pesananmu</h5>
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-11">
                                <form action="index.php?page=pengiriman&aksi=storeTglPermintaan" method="post">
                                    <!-- <input type="hidden" name="id_ongkir"> -->
                                    <div class="mb-4">
                                        <input name="tglPermintaan" type="date" class="form-control" id="tglPermintaan" min="" value="<?= $keranjang[0]["tgl_permintaan"] ?>" />
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn color-primary-button">
                                            <h6>SELESAI</h6>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir modal tgl pengiriman -->

    <!-- modal peringatan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content card-secondary">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <span id="showModal" style="display: none;"><?= json_encode($showModal) ?></span>
                        <h5 class="text-center mb-4">Oops, jangan lupa mengatur lokasi alamatmu</h5>
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
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="assets/js/jsMenuKategori.js?v=2"></script>
    <script src="assets/js/jsKeranjang.js?v=15"></script>
</body>

</html>