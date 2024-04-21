<?php
require_once("../koneksi.php");
if (isset($_POST['sub'])) {
    if ($_FILES['poster1']['error'] === UPLOAD_ERR_OK) {
        $post = $_FILES['poster1']['name'];
        $title = $_POST['title'];
        $dateTime = $_POST['date&time'];
        $location = $_POST['location'];
        $desc = $_POST['desc'];
        $ticket = $_POST['ticket'];
        
        $target_dir = "Upload/";
        $target_file = $target_dir . basename($_FILES["poster1"]["name"]);
        
        if (file_exists($target_file)) {
            echo "<script>alert('Maaf, file sudah ada.');</script>";
        } else {
            if (move_uploaded_file($_FILES["poster1"]["tmp_name"], $target_file)) {
                $sql = "INSERT into events(event_poster,event_name,date_time,location,event_desc,ticket) values ('$post','$title','$dateTime','$location','$desc','$ticket');";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<script>alert('Jadwal Baru berhasil ditambahkan');</script>";
                    echo "<script>window.location='showEvent.php';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert(Maaf, terjadi kesalahan saat mengunggah file.');</script>";
            }
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file: " . $_FILES['poster1']['error'];
    }
}
?>
