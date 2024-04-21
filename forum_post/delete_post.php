<?php
session_start();
require_once("../koneksi.php");

if(isset($_POST['delete_post_id']) && isset($_POST['hapus'])) {
    $postId = $_POST['delete_post_id'];
    
    $selectSql = "SELECT * FROM report WHERE id_post = $postId";
    $result = $conn->query($selectSql);

    $xml = new SimpleXMLElement('<deleted_posts></deleted_posts>');

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $report = $xml->addChild('deleted_post');
            $report->addChild('reportId', $row['id']);
            $report->addChild('postId', $row['id_post']);
            $report->addChild('reporter_id', $row['id_fans']);
            $report->addChild('reason', $row['message']);
            $report->addChild('reportDate', $row['report_date']);
        }
    }

    $xml->asXML('deleted_history.xml');

    // hapus report dan post
    $deleteReportSql = "DELETE FROM report WHERE id_post = $postId";
    if ($conn->query($deleteReportSql) === TRUE) {

        $deletePostSql = "DELETE FROM post WHERE id = $postId";

        if ($conn->query($deletePostSql) === TRUE) {
            echo "Post and related reports deleted successfully.";
            echo "<a href='../adminMain.html'>Back to Main Menu</a>";
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    } else {
        echo "Error deleting reports: " . $conn->error;
    }
}
?>
