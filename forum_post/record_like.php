<?php
require_once("koneksi.php");

$userID = $_SESSION['userId'];
$postID = $_POST['postId'];

$sql = "SELECT * FROM like_post WHERE id_fans = $userID AND id_post = $postID";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    $insertSql = "INSERT INTO like_post (id_fans, id_post, stats) VALUES ($userID, $postID, TRUE)";
    if ($conn->query($insertSql) === TRUE) {
        echo "Like recorded successfully";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $deleteSql = "DELETE FROM like_post WHERE id_fans = $userID AND id_post = $postID";
    if ($conn->query($deleteSql) === TRUE) {
        echo "Unlike recorded successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
