<?php
require_once("koneksi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "Delete from nj_member where id = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script>alert('Foto berhasil dihapus');</script>";
        echo "<script>window.location='member.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert(Maaf, terjadi kesalahan saat mengunggah file.');</script>";
    }
?>
