<?php

// use notificationModel;

class notificationController
{
    private $notifikasi;
    public function __construct()
    {
        $notifikasi = new notificationModel();
    }

    public function getNotif()
    {
        $this->notifikasi->notificationHandler();
    }
}
