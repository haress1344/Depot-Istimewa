<?php
class kategoriController
{
    protected $kategori;
    public function __construct()
    {
        $this->kategori = new kategoriModel();
    }

    //method untuk menampilkan data kategori
    public function view()
    {

        $kategori = $this->kategori->viewAllKategori();
        require_once("View/admin/kelolaKategori.php");
    }

    //method untuk menampilkan halaman tambah kategori
    public function tambahKategori()
    {
        $icon = $this->kategori->viewAllIcon();
        require_once("View/kelola/tambahKategori.php");
    }

    //method untuk menampilkan halaman ubah kategori
    public function ubahKategori()
    {
        $idKategori = $_GET["idkategori"];
        $iconLama = $this->kategori->viewAllIcon();
        $kategoriLama = $this->kategori->viewKategori($idKategori)[0];
        require_once("View/kelola/ubahKategori.php");
    }

    //method untuk mengarahkan data yang akan disimpan ke model dan menampilkan data kategori yang telah disimpan
    public function storeKategori()
    {
        if ($this->kategori->prosesStoreKategori($_POST) > 0) {
            // $this->kategori->storeDummyProduk();
            echo "<script>
                document.location.href= 'index.php?page=kelolakategori&aksi=view';
                alert('data berhasil diinput');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=kelolakategori&aksi=view';
                alert('data gagal diinput, harap mengisi data dengan benar');
            </script>";
        }
    }

    ////method untuk mengarahkan data terbaru yang akan disimpan ke model dan menampilkan data kategori yang telah diperbarui
    public function storeUbahKategori()
    {
        $idKategori = $_GET["idkategori"];
        if ($this->kategori->prosesUbahKategori($_POST, $idKategori) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=kelolakategori&aksi=view';
                alert('data berhasil diperbarui');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=kelolakategori&aksi=view';
            alert('data gagal diperbarui');
        </script>";
        }
    }

    //method untuk mengarahkan data yang akan dihapus
    public function hapusKategori()
    {
        $idKategori = $_GET["idkategori"];
        if ($this->kategori->prosesHapusKategori($idKategori) > 0) {
            echo "<script>
                document.location.href= 'index.php?page=kelolakategori&aksi=view';
                alert('data berhasil dihapus');
            </script>";
        } else {
            echo "<script>
                document.location.href= 'index.php?page=kelolakategori&aksi=view';
                alert('data gagal dihapus');
            </script>";
        }
    }
}
