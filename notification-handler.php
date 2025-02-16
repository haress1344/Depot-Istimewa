<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

// namespace Midtrans;

// require_once dirname(__FILE__) . '/../Midtrans.php';
\Midtrans\Config::$isProduction = false;
\Midtrans\Config::$serverKey = 'secret';

$db= new koneksi();
$db= $db->konek();
$transaksi = new transaksiModel();


// // non-relevant function only used for demo/example purpose

  

try {
    $notif = new \Midtrans\Notification();
}
catch (\Exception $e) {
    exit($e->getMessage());
}


$notif = $notif->getResponse();
$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;
$dataItem = $transaksi->getDataItemTransaksi($order_id);

if ($transaction == 'capture') {
    // For credit card transaction, we need to check whether transaction is challenge by FDS or not
    if ($type == 'credit_card') {
        if ($fraud == 'challenge') {
            // TODO set payment status in merchant's database to 'Challenge by FDS'
            // TODO merchant should decide whether this transaction is authorized or not in MAP
            echo "Transaction order_id: " . $order_id ." is challenged by FDS";
        } else {
            // TODO set payment status in merchant's database to 'Success'
            echo "Transaction order_id: " . $order_id ." successfully captured using " . $type;
        }
    }
} else if ($transaction == 'settlement') {
    // TODO set payment status in merchant's database to 'Settlement'
    $query = "UPDATE transaksi SET status_transaksi = 1 WHERE id_pemesanan = $order_id";
        mysqli_query($db, $query);
    
    foreach ($dataItem as $data) {
        $idProduk = $data["id_produk"];
        $jumProduk = $data["jumlah_barang"];
        $queryStokProduk = "SELECT jumlah_stok FROM produk WHERE id_produk = $idProduk";
        $resultStokProduk = mysqli_query($db, $queryStokProduk);
        $rowStokProduk = [];
        while ($row = mysqli_fetch_assoc($resultStokProduk)) {
            $rowStokProduk[] = $row;
        }
        $stokProduk = $rowStokProduk[0]["jumlah_stok"];

        $queryKurangiStok = "UPDATE produk SET jumlah_stok = ($stokProduk - $jumProduk) WHERE id_produk = $idProduk";
        mysqli_query($db, $queryKurangiStok);
    }
    
    echo "Transaction order_id: " . $order_id ." successfully transfered using " . $type;
} else if ($transaction == 'pending') {
    // TODO set payment status in merchant's database to 'Pending'
    echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
} else if ($transaction == 'deny') {
    // TODO set payment status in merchant's database to 'Denied'
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
} else if ($transaction == 'expire') {
    // TODO set payment status in merchant's database to 'expire'
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
} else if ($transaction == 'cancel') {
    // TODO set payment status in merchant's database to 'Denied'
    echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is canceled.";
}

function printExampleWarningMessage() {
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(\Midtrans\Config::$serverKey, 'your ') != false ) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<your server key>\';');
        die();
    }   
}