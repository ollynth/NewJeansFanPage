<?php
require_once("koneksi.php");
if (isset($_POST['sub'])) {
    if ($_FILES['pict']['error'] === UPLOAD_ERR_OK) {
        $post = $_FILES['pict']['name'];
        
        $target_dir = "Members_Upload/";
        $target_file = $target_dir . basename($_FILES["pict"]["name"]);
        
        if (file_exists($target_file)) {
            echo "<script>alert('Maaf, file sudah ada.');</script>";
            echo "<script>window.location='addMembers.php';</script>";
        } else {
            if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
                $sql = "INSERT into nj_members(member_pict) values ('$post');";
                $result = $conn->query($sql);
                if ($result) {
                    echo "<script>alert('Foto Baru NewJeans ditambahkan');</script>";
                    echo "<script>window.location='members.php';</script>";
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
