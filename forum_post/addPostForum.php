<?php
session_start();
require_once("../koneksi.php");
// echo "Halaaww";
// var_dump($_SESSION);
if (isset($_SESSION['user_id'])) {
    $idFans = $_SESSION['user_id'];
    // echo "Id fans : $idFans";

    if (isset($_POST['addPost'])) {
        if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $idFans ;
            $postPict = $_FILES['gambar']['name'];
            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            
            $target_dir = "Forum_Upload/";
            $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
            
            if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
                $sql = "INSERT into post(id_fans, post_title, post_desc,post_pict) values ('$idFans', '$judul', '$isi' ,'$postPict');";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<script>alert('Kamu Telah Membuat Post baru');</script>";
                    echo "<script>window.location='forums.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert(Maaf, terjadi kesalahan saat mengunggah file.');</script>";
            }
            
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file: " . $_FILES['gambar']['error'];
        }
    }
} else {
    echo "ID not found";
}
?>
