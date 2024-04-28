<?php
require '../koneksi.php';

session_start();
$user_id = $_SESSION['user_id']; // Ambil user_id dari session yang sudah login

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $post_id = $_POST["id_post"];
    $content = $_POST["postDesc"];

    $sql = "INSERT INTO comments (id_post, id_fans, comment) VALUES ('$post_id', '$user_id', '$content')";
    if ($conn->query($sql) === TRUE) {
        header("Location: comment.php?id_post=$post_id");
        header("Location: forums.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
