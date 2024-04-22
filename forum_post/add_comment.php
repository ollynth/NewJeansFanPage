<?php
require 'Prepare SQL/koneksi.php';

session_start();
$user_id = $_SESSION['id']; // Ambil user_id dari session yang sudah login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["id_post"];
    $content = $_POST["postDesc"];

    $sql = "INSERT INTO comment (id_post, id_fans, comments) VALUES ('$post_id', '$user_id', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: comment.php?id_post=$post_id");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
