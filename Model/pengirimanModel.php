<?php

use OpenCage\Geocoder\Geocoder;

class pengirimanModel
{
    private $koneksi, $geocode_key, $raja_ongkir_key, $cityUrl, $costUrl;

    public function __construct()
    {
        $this->koneksi = new koneksi();
        $this->geocode_key = "20aa8475a19d41da80209d98a69fe9aa";
        $this->raja_ongkir_key = "6d521eb21909f1facd7ac5b47102aa2f";
        $this->cityUrl = "https://api.rajaongkir.com/starter/city";
        $this->costUrl = "https://api.rajaongkir.com/starter/cost";
    }

    //function utk mengambil latitude dan longitude suatu kota
    public function get_koordinat($kota)
    {
        $geocoder = new Geocoder($this->geocode_key);
        try {
            $result = $geocoder->geocode($kota . ' , Indonesia');

            if ($result && isset($result['results'][0])) {
                $location = $result['results'][0]['geometry'];
                // echo "Latitude: " . $location['lat'] . "\n";
                // echo "Longitude: " . $location['lng'] . "\n";
                $latitude = $location['lat'];
                $longitude = $location['lng'];
            } else {
                echo "Tidak ada hasil untuk lokasi tersebut.";
            }
        } catch (Exception $e) {
            echo "Terjadi kesalahan: " . $e->getMessage();
        }
        return [
            'latitude' => $latitude,
            'longitude' => $longitude
        ];
    }

    //function untuk mengambil array dari raja ongkir
    public function array_sort_by_column($arr, $col, $dir = SORT_DESC)
    {
        $sort_col = [];
        //sorting kolom
        foreach ($arr as $key => $value) {
            $sort_col[$key] = $value[$col];
        }

        //multi sort
        //sortin berdasarkan directsion
        array_multisort($sort_col, $dir, $arr);
    }

    //function untuk memanggil nama kota dari raja ongkir
    public function get_city()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->cityUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: {$this->raja_ongkir_key}"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    //function untuk memanggil harga ongkir dari raja ongkir
    public function get_cost($id_kota_asal, $id_kota_tujuan, $berat)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->costUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin={$id_kota_asal}&destination={$id_kota_tujuan}&weight={$berat}&courier=jne",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: {$this->raja_ongkir_key}"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function prosesStoreOngkir($data)
    {
        $db = $this->koneksi->konek();
        $kota = $data["kotaTujuan"];
        $alamat = $data["alamatTujuan"];
        $idKeranjang = $data["idKeranjang"];
        $biaya = $data["biayaOngkir"];
        $tgl_permintaan = date("Y-m-d");
        $status = 0;

        //query utk cek apakah ada data pengiriman sebelumnya
        $queryCekPengiriman = "SELECT id_ongkir FROM ongkir WHERE id_keranjang = $idKeranjang";
        $result = mysqli_query($db, $queryCekPengiriman);
        // cek apakah ada data pengiriman sebelumnya
        if (mysqli_num_rows($result) > 0) {
            //jika ada maka data post diperuntukan sbg data utk update data pengiriman sebelumnya
            $query = "UPDATE ongkir SET kota_tujuan = '$kota', alamat_tujuan = '$alamat', biaya_ongkir = $biaya WHERE id_keranjang = $idKeranjang";
            mysqli_query($db, $query);
        } else {
            $query = "INSERT INTO ongkir(id_keranjang, tgl_permintaan, kota_tujuan, alamat_tujuan, biaya_ongkir, status_kirim) VALUES($idKeranjang, '$tgl_permintaan', '$kota', '$alamat', $biaya, $status)";
            mysqli_query($db, $query);
        }

        return mysqli_affected_rows($db);
    }

    public function prosesStoreTglPermintaan($data, $id)
    {
        $db = $this->koneksi->konek();
        $tgl_permintaan = $data["tglPermintaan"];
        $query = "UPDATE ongkir SET tgl_permintaan = '$tgl_permintaan' WHERE id_keranjang = $id";
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }

    public function prosesUpdateTglPermintaan($id)
    {
        $db = $this->koneksi->konek();
        $id_keranjang = $id;
        $queryCek = "SELECT tgl_permintaan FROM ongkir WHERE id_keranjang = $id AND tgl_permintaan < CURDATE()";
        $resultCek = mysqli_query($db, $queryCek);
        if (mysqli_num_rows($resultCek) > 0) {
            $queryUpdate = "UPDATE ongkir SET tgl_permintaan = CURDATE() WHERE id_keranjang = $id";
            return mysqli_query($db, $queryUpdate);
        } else {
            return false;
        }
    }

    public function prosesUpdateStatusKirim($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $db = $this->koneksi->konek();
        $tgl_pengiriman = date("Y-m-d");
        $id = $data["id_ongkir"];
        $tujuan = $data["tujuan_kirim"];
        $koordinat = $this->get_koordinat($tujuan);
        // var_dump($koordinat);
        // die;
        $latitudeAsal = -7.8353;
        $longitudeAsal = 112.6947;
        $latitudeTujuan = $koordinat["latitude"];
        $longitudeTujuan = $koordinat["longitude"];
        $jarak = $this->prosesHitungRadius($latitudeAsal, $longitudeAsal, $latitudeTujuan, $longitudeTujuan);
        $waktuPerjalanan = $this->hitungWaktuPerjalanan($jarak);
        // $estimasiSampai = $waktuPerjalanan["jam"] . " Jam " . $waktuPerjalanan["menit"] . " Menit ";
        $estHours = $waktuPerjalanan['jam'];
        $estMinutes = $waktuPerjalanan['menit'];
        $estSec = $waktuPerjalanan['detik'];
        $now = new DateTime();
        $now->modify("+$estHours hours +$estMinutes minutes +$estSec seconds");
        $updateTime = $now->format("H:i:s");
        // echo "estimasi waktu " . $estimasiSampai . "</br>";
        // echo "perkiraan sampai " . $updateTime . "</br>";
        // die;
        $queryUpdateKirim = "UPDATE ongkir SET tgl_pengiriman = '$tgl_pengiriman', estimasi_tiba = '$updateTime', status_kirim = 2 WHERE id_ongkir = $id";
        return mysqli_query($db, $queryUpdateKirim);
    }

    public function prosesTerimaPesanan($data)
    {
        date_default_timezone_set('Asia/Jakarta');
        $db = $this->koneksi->konek();
        $tgl_diterima = date("Y-m-d H:i:s");
        $id = $data["id_ongkir"];
        $queryTerimaPesanan = "UPDATE ongkir SET tgl_diterima = '$tgl_diterima', status_kirim = 3 WHERE id_ongkir = $id";
        return mysqli_query($db, $queryTerimaPesanan);
    }

    public function prosesStoreLocalCity($id, $kota, $lat, $long)
    {
        $db = $this->koneksi->konek();
        $query = "UPDATE local_city SET nama_kota = '$kota', latitude = $lat, longitude = $long WHERE id_kota = $id";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    public function getLocalCity()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT * FROM local_city";
        $result = mysqli_query($db, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // public function getDataOngkir()
    // {
    //     $db = $this->koneksi->konek();
    //     $query = "SELECT ongkir.id_ongkir, ongkir.id_keranjang, ongkir.tgl_permintaan, 
    //             ongkir.tgl_diterima, ongkir.kota_tujuan, ongkir.alamat_tujuan, ongkir.biaya_ongkir, 
    //             ongkir.status_kirim FROM ongkir 
    //             JOIN keranjang ON ongkir.id_keranjang = keranjang.id_keranjang 
    // 	        JOIN user ON keranjang.id_user = user.id_user
    // 	        WHERE keranjang.id_keranjang = 85 AND user.id_user = 62";
    //     $result = mysqli_query($db, $query);
    //     $rows = [];
    //     while ($row = mysqli_fetch_assoc($result)){
    //         $rows[] = $row;
    //     }
    //     return $rows;
    // }

    public function prosesHitungRadius($lat1, $lon1, $lat2, $lon2)
    {
        $radius = 6371; // Radius Bumi dalam kilometer

        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);

        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);

        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distance = $radius * $c;

        return $distance; // Jarak dalam kilometer
    }

    public function getBatasRadius()
    {
        $kota_local = $this->getLocalCity();
        $radius = [];
        foreach ($kota_local as $kota) {
            $lat1 = -8.1047982;
            $lon1 = 112.6879872;
            $lat2 = $kota["latitude"];
            $lon2 = $kota["longitude"];
            $jarak = $this->prosesHitungRadius($lat1, $lon1, $lat2, $lon2);
            $radius[] = [
                "nama_kota" => $kota["nama_kota"],
                "jarak" => $jarak,
            ];
            // $pesan = "Radius Kabupaten Malang Menuju " . $kota["nama_kota"] . " = " . $jarak . " KM </br>";
        }
        return $radius;
    }

    public function getKetentuanRadius()
    {
        $db = $this->koneksi->konek();
        $query = "SELECT radius_km FROM radius_kirim";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);
        return $row;
    }

    public function prosesUpdateKetentuanRad($data)
    {
        $db = $this->koneksi->konek();
        $radius = $data["radius"];
        $query = "UPDATE radius_kirim SET radius_km = $radius WHERE id_radius = 1";
        mysqli_query($db, $query);
        return mysqli_affected_rows($db);
    }

    public function hitungWaktuPerjalanan($jarak)
    {

        $kecepatan = 40;

        // Jarak dalam kilometer, kecepatan dalam km/jam
        // if ($kecepatan <= 0) {
        //     return "Kecepatan harus lebih besar dari 0";
        // }

        // Menghitung waktu dalam jam
        $waktuDalamJam = $jarak / $kecepatan;

        // Konversi ke detik
        $waktuDalamDetik = $waktuDalamJam * 3600;

        // Format waktu ke jam, menit, dan detik
        $jam = floor($waktuDalamDetik / 3600);
        $menit = floor(($waktuDalamDetik % 3600) / 60);
        $detik = $waktuDalamDetik % 60;

        return [
            'jam' => $jam,
            'menit' => $menit,
            'detik' => $detik
        ];
    }

    public function formatting($ongkir)
    {
        $formatOngkir = number_format($ongkir, 0, ",", ".");
        return $formatOngkir;
    }

    public function timeFormatting($data)
    {
        $waktu = new DateTime($data);
        $waktu = $waktu->format('H:i');
        return $waktu;
    }
}
