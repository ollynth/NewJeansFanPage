<?php
require '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_post'])) {
    $post_id = $_GET['id_post'];

    // Query untuk mendapatkan informasi postingan berdasarkan post_id
    $sql_post = "SELECT * FROM post WHERE id = '$post_id'";
    $result_post = $conn->query($sql_post);
    $row_post = $result_post->fetch_assoc();

    // Query untuk mendapatkan semua komentar pada postingan ini
    $sql_comments = "SELECT * FROM comments WHERE id_post = '$post_id'";
    $result_comments = $conn->query($sql_comments);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        .profile img{
            border: 1px solid transparent;
            border-radius: 100% 100%;
            width: 30px;
            height: 30px;
            margin: 5px;
        }
        .profile span{
            display: flex;
        }
        .container{
            color: black;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Comment</h2>
        <form action="add_comment.php" method="post" onsubmit="loadComments(<?=$post_id?>);">
            <input type="hidden" name="id_post" value="<?php echo $post_id; ?>">
            <textarea name="postDesc" placeholder="Write your comment"></textarea>
            <button type="submit">Comment</button>
        </form>

        <h2>Comments</h2>
        <div class="comments">
            <?php
            while ($row_comment = $result_comments->fetch_assoc()) {
                $id = $row_comment['id_fans'];
                $sql = "SELECT * FROM fans WHERE id = " . $id;
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc($result);
                
                $sql2 = "SELECT * FROM users WHERE id = " . $id;
                $result2 = mysqli_query($conn, $sql2);
                $user_name = mysqli_fetch_assoc($result2);

                echo "<div class='comment'>";
                echo "<p>" . $row_comment['comment'] . "</p>";
                echo "<small>Commented by <div class='profile'><img src='" . (($user['profile_picture'] != null) ? '../profile/upload_profile/' . $user['profile_picture'] : '../profile/upload_profile/unknown.jpg') . "' alt='Avatar'><span>". $user_name['username']. "<span></div></small>";
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
