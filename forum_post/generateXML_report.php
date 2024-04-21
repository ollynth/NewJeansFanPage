<?php
    require_once("../koneksi.php");

    $selectSql = "SELECT * FROM report";
    $result = $conn->query($selectSql);

    $xml = new SimpleXMLElement('<reports></reports>');

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $report = $xml->addChild('report');

            $report->addChild('postId', $row['id_post']);
            $report->addChild('reporter_id', $row['id_fans']);
            $report->addChild('reason', $row['message']);
            $report->addChild('reportDate', $row['report_date']);
        }
    }

    $xml->asXML('logReport.xml');

    $conn->close();
?>
