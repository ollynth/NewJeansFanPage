<?php
session_start();
require_once("../koneksi.php");

if(isset($_POST['postId']) && isset($_POST['reason']) && isset($_SESSION['user_id'])) {
    $postId = $_POST['postId'];
    $fansId = $_SESSION['user_id'];
    $reason = $_POST['reason'];
    $reportDate = date('Y-m-d H:i:s'); 

    // Insert data ke tabel report
    $insertSql = "INSERT INTO report (id_post, message, report_date, id_fans) VALUES ('$postId', '$reason', '$reportDate', '$fansId')";
    if ($conn->query($insertSql) === TRUE) {
        echo "<script>alert('Berhasil Melaporkan Post, user $fansID');</script>";
        header("Location: forums.php"); // balik ke halaman forum
        include "generateXML_report.php";  // buat xml file
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid data.";
}

?>