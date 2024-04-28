<?php
session_start();
require_once("../koneksi.php");

if(isset($_POST['delete_post_id']) && isset($_POST['hapus_post'])) {
    $postId = $_POST['delete_post_id'];
    // XML delete report
    $xmlReport = 'deleted_report_history.xml';
    // XML delete post
    $xmlPost = 'deleted_post_history.xml';
    
    $id_report = "";

    $selectSql = "SELECT * FROM report WHERE id_post = $postId";
    $result = $conn->query($selectSql);

    $id_post = "";
    $id_reporter = "";
    $message = "";
    $reportDate = "";

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();  
        
        $id_report = $row['id'];
        $id_post = $row['id_post'];
        $id_reporter = $row['id_fans'];
        $message = $row['message'];
        $reportDate = $row['report_date'];
    }

    // masukinn data ke XML delete report
    if (file_exists($xmlReport) && filesize($xmlReport) > 0) {
        $xml1 = simplexml_load_file($xmlReport);
    } else {
        $xml1 = new SimpleXMLElement('<deleted_reports></deleted_reports>');
    }
    $report = $xml1->addChild('deleted_report');
    $report->addChild('reportId', $id_report);
    $report->addChild('postId', $id_post);
    $report->addChild('reporter_id', $id_reporter);
    $report->addChild('reason', $message);
    $report->addChild('reportDate', $reportDate);

    
    // masukin data ke XML delete post
    if (file_exists($xmlPost) && filesize($xmlPost) > 0) {
        $xml = simplexml_load_file($xmlPost);
    } else {
        $xml = new SimpleXMLElement('<deleted_posts></deleted_posts>');
    }
    $post = $xml->addChild('deleted_post');
    $post->addChild('reportId', $id_report);
    $post->addChild('postId', $id_post);
    $post->addChild('reporter_id', $id_reporter);
    $post->addChild('reason', $message);
    $post->addChild('reportDate', $reportDate);

    $xml1->asXML($xmlReport);
    chmod($xmlReport, 0666);

    $xml->asXML($xmlPost);
    chmod($xmlPost, 0666);

    // hapus report dan post dari tabel database
    $deleteReportSql = "DELETE FROM report WHERE id_post = $postId";
    if ($conn->query($deleteReportSql) === TRUE) {

        $deleteLike = "DELETE FROM like_post WHERE id_post = $postId";
        $deleteComment= "DELETE FROM comments WHERE id_post = $postId";
        
        if ($conn->query($deleteLike) === TRUE && $conn->query($deleteComment) === TRUE) {
            $deletePostSql = "DELETE FROM post WHERE id = $postId";
            
            if ($conn->query($deletePostSql) === TRUE) {
                echo "Post and related reports deleted successfully.";
                echo "<br><a href='../adminMain.html'>Back to Main Menu</a>";
            } else {
                echo "Error deleting post: " . $conn->error;
            }
        } else {
            echo "Gagal menghapus like atau comment post";
        }
    } else {
        echo "Error deleting reports: " . $conn->error;
    }
}
?>
