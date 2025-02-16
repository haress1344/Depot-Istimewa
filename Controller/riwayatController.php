<?php

class riwayatController
{

    private $riwayat;

    public function __construct()
    {
        $this->riwayat = new riwayatModel();
    }

    public function view()
    {
        require_once("View/admin/riwayatPembaruan.php");
    }
}
