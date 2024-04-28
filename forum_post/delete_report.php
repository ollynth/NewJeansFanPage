<?php
session_start();
require_once("../koneksi.php");

if(isset($_POST['delete_post_id']) && isset($_POST['hapus_report'])) {
    $postId = $_POST['delete_post_id'];
    $xmlFileName = 'deleted_report_history.xml';
    
    $selectSql = "SELECT * FROM report WHERE id_post = $postId";
    $result = $conn->query($selectSql);

    $id_report; $id_post; $id_reporter; $message; $reportDate;
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();  
        
        $id_report = $row['id'];
        $id_post = $row['id_post'];
        $id_reporter = $row['id_fans'];
        $message = $row['message'];
        $reportDate = $row['report_date'];
    }


    if (file_exists($xmlFileName) && filesize($xmlFileName) > 0) {
        $xml = simplexml_load_file($xmlFileName);
    } else {
        $xml = new SimpleXMLElement('<deleted_reports></deleted_reports>');
    }
    $report = $xml->addChild('deleted_report');
    $report->addChild('reportId', $id_report);
    $report->addChild('postId', $id_post);
    $report->addChild('reporter_id', $id_reporter);
    $report->addChild('reason', $message);
    $report->addChild('reportDate', $reportDate);

    $xml->asXML($xmlFileName);

    chmod($xmlFileName, 0666);
    
    $deleteReportSql = "DELETE FROM report WHERE id_post = $postId";
    if ($conn->query($deleteReportSql) === TRUE) {
        echo "Reports berhasil dihapus.";
        echo "<br><a href='../adminMain.html'>Back to Home</a>";
    } else {
        echo "Error deleting reports: " . $conn->error;
    }
}
?>
