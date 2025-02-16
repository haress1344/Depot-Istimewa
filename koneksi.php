<?php

class koneksi
{
    private $koneksi;
    public function konek()
    {
        return $this->koneksi = mysqli_connect("localhost", "root", "", "dbtest2_depotistimewa");
    }
}
