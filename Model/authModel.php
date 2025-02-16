<?php
//inisiasi untuk php mailer yang berfungsi untuk proses verifikasi akun
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


class authModel
{
    private $koneksi;

    public function __construct()
    {
        $this->koneksi = new koneksi();
    }

    //method untuk melakukan authentikasi data user
    public function prosesAuth($username, $pass)
    {
        $db = $this->koneksi->konek();
        $queryUsername = "SELECT * FROM user WHERE username = '$username' OR email = '$username'";
        $result = mysqli_query($db, $queryUsername);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if (password_verify($pass, $row["password"])) {
                $row["status_verif"] = (int)$row["status_verif"];
                if ($row["status_verif"] === 1) {
                    //menentukan id role
                    $_SESSION["role"] = (int)$row["id_role"];
                    //mengatur cookie agar aktif
                    setcookie("set", $row["id_user"], time() + 1800);
                    setcookie("value", hash("sha256", $row["username"]), time() + 1800);
                    return $row;
                } else if ($row["status_verif"] === 0) {
                    $alert = "Email belum diverifikasi, silakan cek kembali email anda";
                    return $alert;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //method untuk menyimpan data pelanggan baru
    public function prosesStoreAkun($data)
    {
        $db = $this->koneksi->konek();
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);
        $role = $data["role"];
        $nama = htmlspecialchars($data["nama"]);
        $_SESSION["regis_akun"]["nama"] = $nama;
        $email = htmlspecialchars($data["email"]);
        $_SESSION["regis_akun"]["email"] = $email;
        $username = htmlspecialchars($data["username"]);
        $_SESSION["regis_akun"]["username"] = $username;
        //function real escape string memungkinkan agar mysql dapat menerima string berbentuk ' ke dalam database
        $password = htmlspecialchars(mysqli_real_escape_string($db, $data["password"]));
        $konfirmPass = htmlspecialchars(mysqli_real_escape_string($db, $data["konfirmpass"]));
        $noHp = htmlspecialchars($data["nohp"]);
        $_SESSION["regis_akun"]["HP"] = $noHp;
        $alamat = htmlspecialchars($data["alamat"]);
        $_SESSION["regis_akun"]["alamat"] = $alamat;
        $cekQueryUsername = "SELECT * FROM user WHERE username = '$username'";
        $cekQueryEmail = "SELECT * FROM user WHERE email = '$email'";

        //cek email sudah tersedia atau belum
        $result = mysqli_query($db, $cekQueryEmail);
        if (mysqli_fetch_assoc($result)) {
            $_SESSION["alert_form"] = "Email sudah digunakan";

            return false;
        }

        //cek apakah username terdapat huruf nonalfabet
        //preg_match digunakan untuk mengembalikan nilai true pada persyaratan di parameter 1
        //nilai yang terdapat pada kurung siku ^ berarti negasi, yang berarti mencocokkan karakter apa pun yang tidak terdapat dalam daftar yang diikuti oleh tanda kurung siku 
        //A-Za-z mencakup semua huruf alfabet besar (A-Z) dan kecil (a-z)
        if (preg_match('/[^A-Za-z\w]/', $username)) {
            $_SESSION["alert_form"] = "Username mengandung unique symbol";
            return false;
        }

        //cek username sudah tersedia atau belum
        $result = mysqli_query($db, $cekQueryUsername);
        if (mysqli_fetch_assoc($result)) {
            $_SESSION["alert_form"] = "Username sudah digunakan";
            return false;
        }


        //cek konfirmasi password
        if ($password !== $konfirmPass) {
            $_SESSION["alert_form"] = "Konfirmasi password salah";
            return false;
        }

        //enkripsi password
        //function password hash berguna untuk mengenkripsi password, PASSWORD_DEFAULT merupakan algoritma bawaan dari php
        $password = password_hash($password, PASSWORD_DEFAULT);
        //enkripsi kode verifikasi email
        $codeVerif = md5($email . date('Y-m-d H:i:s'));
        //proses pengiriman code verifikasi berdasarkan email akun yg didaftarkan
        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'secret';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'harisdwinuralmaas@gmail.com';                     //SMTP username
            $mail->Password   = 'lwaw anqa doeq etyb';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('from@testwebsite.com', 'Depot Onde - Onde Istimewa');
            $mail->addAddress($email, $nama);     //Add a recipient


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Verifikasi Akun Depot Onde - Onde Istimewa';
            $mail->Body    = 'Hai, ' . $nama . ' terimakasih sudah mendaftar akun di depot Onde - Onde Istimewa, <br> silkan VERIFIKASI akun anda!' . '<a
            href="http://localhost:8080/Depot-Istimewa-Skripsi-Fix1/index.php?page=auth&aksi=verifakun&code=' . $codeVerif . '"> Verifikasi</a>';

            //jika email dikirim
            if ($mail->send()) {
                //menambahkan data ke dalam database
                $inputQuery = "INSERT INTO user(nama_user, id_role, email, no_tlp, alamat, username, password, verif_code) VALUES('$nama', $role, '$email', '$noHp', '$alamat', '$username', '$password', '$codeVerif')";
                mysqli_query($db, $inputQuery);
                return mysqli_affected_rows($db);
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    //method untuk melakukan proses verifikasi user
    public function prosesVerifikasiAkun($verifCode)
    {
        $db = $this->koneksi->konek();
        $queryCekUSer = "SELECT * from user WHERE verif_code = '$verifCode'";
        $resultCek = mysqli_query($db, $queryCekUSer);
        $rowUser = mysqli_fetch_assoc($resultCek);
        $statusVerif = (int)$rowUser["status_verif"];
        //cek apakah status verif masih belum diverifikasi atau sudah pernah
        if ($statusVerif === 0) {
            //update untuk merubah status verifikasi user
            $updateQuery = "UPDATE user SET status_verif = 1 WHERE verif_code = '$verifCode'";
            mysqli_query($db, $updateQuery);

            //melihat user berdasarkan code verifikasi 
            $querySelectRole = "SELECT id_user, id_role FROM user WHERE verif_code = '$verifCode'";
            $resultSelectRole = mysqli_query($db, $querySelectRole);
            $row = mysqli_fetch_assoc($resultSelectRole);
            $id = $row["id_user"];
            $role = (int)$row["id_role"];

            //jika kode role user 2, maka akan dibuatkan keranjang
            if ($role === 2) {
                $queryCreateKeranjang = "INSERT INTO keranjang (id_user) VALUES ($id)";
                mysqli_query($db, $queryCreateKeranjang);

                return mysqli_affected_rows($db);
            }

            return mysqli_affected_rows($db);
        } else {
            return false;
        }
    }

    //method untuk melakukan proses update akun
    public function prosesUpdateProfile($data)
    {
        $db = $this->koneksi->konek();
        $id = $_SESSION["pelanggan"]["id_user"];
        $nama = htmlspecialchars($data["nama"]);
        $email = htmlspecialchars($data["email"]);
        $noHp = htmlspecialchars($data["noHp"]);
        $alamat = htmlspecialchars($data["alamat"]);
        // var_dump($alamat);
        // die;
        $pass = htmlspecialchars($data["konfirmPass"]);

        $queryConfirmPass = "SELECT * FROM user WHERE id_user = $id";
        $resultConfirm = mysqli_query($db, $queryConfirmPass);
        $rowUser = mysqli_fetch_assoc($resultConfirm);

        //cek apakah password konfirmasi benar
        if (password_verify($pass, $rowUser["password"])) {

            //cek apakah form nama diisi atau tidak
            if ($nama !== "") {
                $queryUpdateNama = "UPDATE user SET nama_user = '$nama' WHERE id_user = $id";
                mysqli_query($db, $queryUpdateNama);
                $queryId = "SELECT * FROM user WHERE id_user = '$id'";
                $resultId = mysqli_query($db, $queryId);
                $row = mysqli_fetch_assoc($resultId);
            }

            //cek apakah form email diisi atau tidak
            if ($email !== "") {
                //cek email sudah tersedia atau belum
                $cekQueryEmail = "SELECT * FROM user WHERE email = '$email'";
                $result = mysqli_query($db, $cekQueryEmail);
                if (mysqli_fetch_assoc($result)) {
                    $_SESSION["alert_updateAkun"]["fail"] = "Email sudah terpakai";
                } else {
                    $queryUpdateNama = "UPDATE user SET email = '$email' WHERE id_user = $id";
                    mysqli_query($db, $queryUpdateNama);
                    $queryId = "SELECT * FROM user WHERE id_user = '$id'";
                    $resultId = mysqli_query($db, $queryId);
                    $row = mysqli_fetch_assoc($resultId);
                }
            }

            //cek apakah form hp diisi atau tidak
            if ($noHp !== "") {
                $queryUpdateNama = "UPDATE user SET no_tlp = '$noHp' WHERE id_user = $id";
                mysqli_query($db, $queryUpdateNama);
                $queryId = "SELECT * FROM user WHERE id_user = '$id'";
                $resultId = mysqli_query($db, $queryId);
                $row = mysqli_fetch_assoc($resultId);
            }


            //cek apakah form alamat diisi atau tidak
            if ($alamat !== "") {
                $queryUpdateAlamat = "UPDATE user SET alamat = '$alamat' WHERE id_user = $id";
                mysqli_query($db, $queryUpdateAlamat);
                $queryId = "SELECT * FROM user WHERE id_user = '$id'";
                $resultId = mysqli_query($db, $queryId);
                $row = mysqli_fetch_assoc($resultId);
            }
        } else {
            $_SESSION["alert_updateAkun"]["fail"] = "Password konfirmasi salah!";
            return false;
        }
        //jika ada perubahan pada salah satu atau lebih form profile akun
        if (isset($row)) {
            return $row;
        } else {
            return false;
        }
    }

    public function prosesUpdatePassword($data)
    {
        $db = $this->koneksi->konek();
        $username = $_SESSION["pelanggan"]["username"];
        $passDB = $_SESSION["pelanggan"]["password"];
        $passLama = htmlspecialchars($data["passLama"]);
        $passBaru = htmlspecialchars($data["passBaru"]);
        $konfirmPassBaru = htmlspecialchars($data["konfirmPassBaru"]);


        if (password_verify($passLama, $passDB)) {
            if ($passBaru === $konfirmPassBaru) {
                $passBaru = password_hash($passBaru, PASSWORD_DEFAULT);
                $queryUpdate = "UPDATE user SET password = '$passBaru' WHERE username = '$username'";
                mysqli_query($db, $queryUpdate);
                $_SESSION["pelanggan"]["password"] = $passBaru;
                return mysqli_affected_rows($db);
            } else {
                $_SESSION["form_updatePass"] = "Password konfirmasi salah";

                return false;
            }
        } else {
            $_SESSION["form_updatePass"] = "Password lama salah";

            return false;
        }
    }

    public function prosesResetPass($data)
    {
        $db = $this->koneksi->konek();
        $email = $data["email"];
        $username = $data["username"];
        $passBaru = uniqid();
        $mail = new PHPMailer(true);
        // var_dump($email);
        // var_dump($username);
        // var_dump($passBaru);
        // die;
        //query cek email dan username
        $queryCek = "SELECT * FROM user WHERE email = '$email' AND username = '$username'";
        $result = mysqli_query($db, $queryCek);
        // var_dump($result);
        // var_dump(mysqli_num_rows($result));
        // die;
        if (mysqli_num_rows($result) === 1) {
            try {
                //Server settings
                $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'harisdwinuralmaas@gmail.com';                     //SMTP username
                $mail->Password   = 'secret';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('from@testwebsite.com', 'Depot Onde - Onde Istimewa');
                $mail->addAddress($email, $username);     //Add a recipient


                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Reset Password Akun Depot Onde - Onde Istimewa';
                $mail->Body    = 'Hai, ' . $username . '. Kamu telah melakukan reset password, berikut adalah password baru kamu ' . $passBaru . '. <br> JANGAN PERNAH MEMBAGIKAN PASSWORD ANDA KEPADA SIAPAPUN';

                //jika email dikirim
                if ($mail->send()) {
                    //menambahkan data ke dalam database
                    $passBaru = password_hash($passBaru, PASSWORD_DEFAULT);
                    $queryUpdate = "UPDATE user SET password = '$passBaru' WHERE username = '$username'";
                    mysqli_query($db, $queryUpdate);
                    return mysqli_affected_rows($db);
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            return false;
        }
    }

    //method untuk melakukan proses pengecekan data cookie
    public function prosesCookie($data)
    {
        $db = $this->koneksi->konek();
        $id = $data["set"];
        $username = $data["value"];
        $query = "SELECT * FROM user WHERE id_user = $id";
        $result = mysqli_query($db, $query);
        $row = mysqli_fetch_assoc($result);

        //cek cookie dan username
        if ($username === hash("sha256", $row["username"])) {
            $_SESSION['role'] = (int)$row["id_role"];
            if ($_SESSION['role'] === 2) {
                $_SESSION['pelanggan'] = $row;
            } else if ($_SESSION['role'] === 1) {
                $_SESSION['admin'] = $row;
            }
            // $_SESSION['pelanggan'] = $row;
        }
    }

    //method untuk melakukan proses logout
    public function prosesLogout()
    {
        session_unset();
        session_destroy();
        setcookie("set", "", time() - 3600);
        setcookie("value", "", time() - 3600);
    }
}
