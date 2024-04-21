<?php
    session_start();
    require_once("../koneksi.php");

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
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin Forum</title>
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
                    
                    echo "<form method='post' action='delete_post.php'>";
                    echo "<input type='hidden' name='delete_post_id' value='" . $row['id_post'] . "'>";
                    echo "<button type='submit' name='hapus'>Delete Post</button>";
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
