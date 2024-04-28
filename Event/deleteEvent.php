<?php
require_once("../koneksi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "Delete from events where id = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        echo "<script>alert('Jadwal berhasil dihapus');</script>";
        echo "<script>window.location='addEditDel.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "<script>alert(Maaf, terjadi kesalahan saat mengunggah file.');</script>";
    }

       

?>
