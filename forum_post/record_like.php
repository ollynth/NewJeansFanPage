<?php
session_start();
require_once("../koneksi.php");

if(isset($_SESSION['user_id']) && isset($_POST['postId'])) {
    $userId = $_SESSION['user_id'];
    $postId = $_POST['postId'];

    // Check if the user has already liked the post
    $checkSql = "SELECT * FROM like_post WHERE id_fans = $userId AND id_post = $postId";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows == 0) {
        // If the user has not liked the post, insert a new like record
        $insertSql = "INSERT INTO like_post (id_fans, id_post, stats) VALUES ($userId, $postId, TRUE)";
        if ($conn->query($insertSql) === TRUE) {
            echo "Like recorded successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        // If the user has already liked the post, delete the like record
        $deleteSql = "DELETE FROM like_post WHERE id_fans = $userId AND id_post = $postId";
        if ($conn->query($deleteSql) === TRUE) {
            echo "Unlike recorded successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    }
} else {
    echo "Error: Session or postId is not set";
}

$conn->close();
?>
