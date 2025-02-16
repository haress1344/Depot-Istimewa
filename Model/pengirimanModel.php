<?php

class pengirimanModel
{
    private $koneksi, $key, $cityUrl, $costUrl;

    public function __construct()
    {
        $this->koneksi = new koneksi();
        $this->key = "6d521eb21909f1facd7ac5b47102aa2f";
        $this->cityUrl = "https://api.rajaongkir.com/starter/city";
        $this->costUrl = "https://api.rajaongkir.com/starter/cost";
    }

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
                "key: {$this->key}"
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
                "key: {$this->key}"
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
        $alamat = $data["tujuanPengiriman"];
        $idKeranjang = $data["idKeranjang"];
        $biaya = $data["biayaOngkir"];

        //query utk cek apakah ada data pengiriman sebelumnya
        $queryCekPengiriman = "SELECT id_ongkir FROM ongkir WHERE id_keranjang = $idKeranjang";
        $result = mysqli_query($db, $queryCekPengiriman);
        // cek apakah ada data pengiriman sebelumnya
        if (mysqli_num_rows($result) > 0) {
            //jika ada maka data post diperuntukan sbg data utk update data pengiriman sebelumnya
            $query = "UPDATE ongkir SET alamat_tujuan = '$alamat', biaya_ongkir = $biaya WHERE id_keranjang = $idKeranjang";
            mysqli_query($db, $query);
        } else {
            $query = "INSERT INTO ongkir(id_keranjang, alamat_tujuan, biaya_ongkir) VALUES($idKeranjang, '$alamat', $biaya)";
            mysqli_query($db, $query);
        }

        return mysqli_affected_rows($db);
    }

    public function formatting($ongkir)
    {
        $formatOngkir = number_format($ongkir, 2, ",", ".");
        return $formatOngkir;
    }
}
