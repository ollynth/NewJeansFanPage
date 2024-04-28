<?php
require_once("../koneksi.php");

if(isset($_POST["update"])){
    $id = $_POST['id'];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $picName = $_POST['profile_picture'];

    
    $sql = "UPDATE users 
            SET username=?, passwords=? 
            WHERE id=?";
    $sql2 = "UPDATE fans 
             SET email=?, phone_number=?, gender=?, profile_picture =?
             WHERE id=?";

    $stmt = mysqli_prepare($conn, $sql);
    $stmt2 = mysqli_prepare($conn, $sql2);

    if ($stmt && $stmt2) {
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newPict = $_FILES['image']['name'];
            $target_dir = "upload_profile/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            mysqli_stmt_bind_param($stmt, "ssi", $username, $password, $id);
            mysqli_stmt_bind_param($stmt2, "ssssi", $email, $phone, $gender, $newPict ,$id);
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                mysqli_stmt_execute($stmt);
                mysqli_stmt_execute($stmt2);
                echo "<script>alert('Kamu Telah Memperbarui Profil');</script>";
                echo "<script>window.location.href='../fansMain.php';</script>";
                exit;
            } else {
                echo "<script>alert('Maaf, terjadi kesalahan saat mengunggah file.');</script>";
            }
        } else {
            mysqli_stmt_bind_param($stmt, "ssi", $username, $password, $id);
            mysqli_stmt_bind_param($stmt2, "ssssi", $email, $phone, $gender, $picName ,$id);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_execute($stmt2);
            echo "<script>alert('Kamu Telah Memperbarui Profil');</script>";
            echo "<script>window.location.href='../fansMain.php';</script>";
            exit;
        }

        mysqli_stmt_close($stmt);
        mysqli_stmt_close($stmt2);
    } else {
        echo "Failed to prepare SQL statements.";
    }
}
?>
