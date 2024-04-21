<!DOCTYPE html>
<html>
<head>
    <title>Report Post</title>
    <link rel="stylesheet" href="../css/main.css">
    <style>
      .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
      }

      .gbr_post {
        width: 100%; 
        max-width: 600px; 
        height: auto; 
        margin-bottom: 20px; 
      }

      .gbr_post img {
        width: 100%;
        height: auto; 
      }

      .username, .post_desc {
        font-size: 12px;
      }

      .username {
        color: gray;
      }
      
      .post_title {
        font-size: 14px;
        margin-bottom: 0;
        margin-right: 10px;
      }

      .post_desc {
        font-style: oblique;
      }

      .form-container {
        text-align: center;
      }

      .form-container form {
        display: inline-block;
        text-align: left;
      }
    </style>
</head>
<body>
    <h1>Report Post</h1>
    <div class="container">
        <?php
        require_once("../koneksi.php");
        if(isset($_GET['postId'])) {
            $postId = $_GET['postId'];
            $sql = "SELECT u.id as user_id, u.username, p.id as post_id , p.post_title, p.post_desc, p.post_pict
              FROM post p
              JOIN users u 
              WHERE u.id = p.id_fans AND p.id = $postId;";

            $result = $conn->query($sql);
            if ($result) {
                while($row = mysqli_fetch_assoc($result)){
                    $postIndex = $row['post_id'];
                      echo "<div class='gbr_post'> <img src = 'Forum_Upload/".$row['post_pict']."' alt = 'hehe'>
                            <div class='text-container'>
                                <p class='post_title'> ".$row['post_title']."</p>
                                <p class='post_desc'> ".$row['post_desc']."</p>
                                <p class='username'> @".$row['username']."</p>
                            </div>
                        </div>";
                }
            }
        ?>
        <div class="form-container">
            <form action="record_report.php" method="post">
                <input type="hidden" name="postId" value="<?php echo $postId; ?>">
                <label for="reason">Reason for report:</label><br>
                <textarea id="reason" name="reason" rows="4" cols="50"></textarea><br><br>
                <input type="submit" value="Submit Report">
            </form>
        </div>
        <?php
        } else {
            echo "Invalid post ID.";
        }
        ?>
    </div>
</body>
</html>
