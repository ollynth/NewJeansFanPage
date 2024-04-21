<?php
    session_start();
    require_once("../koneksi.php");

    // Check if the user is an admin (you might have a different method for this)
    // Example: if ($_SESSION['user_role'] !== 'admin') { header("Location: login.php"); exit; }

    // Check if the user is logged in and is an admin
    if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
        header("Location: login.php"); // Redirect to login page if not logged in as admin
        exit;
    }

    // Delete a reported post
    if(isset($_POST['delete_post_id'])) {
        $postId = $_POST['delete_post_id'];
        
        // Delete the post from the database
        $deleteSql = "DELETE FROM post WHERE id = $postId";
        if ($conn->query($deleteSql) === TRUE) {
            // Record deletion details in deleted_post.xml
            // (You need to implement this part)
        } else {
            echo "Error deleting post: " . $conn->error;
        }
    }

    // Retrieve data from the report table
    $selectSql = "SELECT r.id, r.id_post, r.id_fans, r.message, r.report_date, p.post_title, u.username 
                  FROM report r
                  JOIN post p ON r.id_post = p.id
                  JOIN users u ON r.id_fans = u.id";
    $result = $conn->query($selectSql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Forum</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <h1>Admin Forum</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Post Title</th>
            <th>Reporter</th>
            <th>Report Message</th>
            <th>Report Date</th>
            <th>Action</th>
        </tr>
        <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['post_title'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td>" . $row['report_date'] . "</td>";
                    echo "<td>";
                    echo "<form method='post'>";
                    echo "<input type='hidden' name='delete_post_id' value='" . $row['id_post'] . "'>";
                    echo "<button type='submit'>Delete Post</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No reports found</td></tr>";
            }
        ?>
    </table>
</body>
</html>
