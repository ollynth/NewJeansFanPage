
<?php
    require_once('../koneksi.php');
    session_start(); // Start the session first
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['name'];
        $password = $_POST['pass'];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['passwords'] === $password) {
                    $_SESSION['user_id'] = $row['id'];
                    setcookie('username', $row['username'], time() + (3600 * 5), "");
                    setcookie('uid', $row['id'], time() + (3600 * 5), "");
                    if ($row['role'] === 'A') {
                        echo "<script>alert('Anda adalah Admin dan Akun Anda ditemukan');</script>";
                        header("Location: ../adminMain.html");
                    }else{
                        echo "<script>alert('Anda adalah User dan Akun Anda ditemukan');</script>";
                        // echo "<script>window.location='../fansMain.php';</script>";
                        header("Location: ../fansMain.php");
                        exit();
                    }
                } else {
                    echo "<script>alert('Password tidak cocok');</script>";
                    echo "<script>window.location='login.html';</script>";
                    exit;
                }
            } else {
                echo "<script>alert('Username tidak ditemukan');</script>";
                echo "<script>window.location='login.html';</script>";
                exit;
            }
        } else {
            echo "<script>alert('Terjadi kesalahan dalam eksekusi SQL: ' . $conn->error);</script>";
        }
    }
?>
