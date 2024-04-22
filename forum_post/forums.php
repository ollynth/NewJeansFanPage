<!DOCTYPE html>
<html>
  <head>
    <title>Forum Grup Idol</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="../css/forums.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
      .gbr_post {
        width: 100%; 
        max-width: 600px; 
        height: auto; 
        margin: 0 auto; 
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

      .main {
        display: flex;
        align-items: flex-start;
        flex-direction: column; 
      }

      .post-header {
        display: flex;
        align-items: center;
        flex-grow: 1;
      }

      .post-buttons {
        margin-left: auto;
      }

      .like-button {
        display: inline-block;
        width: 16px;
        height: 16px;
        background-image: url('../assets/button/heart-filled-white.png');
        background-size: cover;
        cursor: pointer;
      }

      .liked {
        background-image: url('../assets/button/heart-filled-red.png');
      }

      .comment-button {
        display: inline-block;
        width: 16px;
        height: 16px;
        background-image: url('../assets/button/comment.png');
        background-size: cover;
        cursor: pointer;
      }

      .report-button {
        display: inline-block;
        width: 16px;
        height: 16px;
        background-image: url('../assets/button/warning.png');
        background-size: cover;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <header>
      <nav>
          <a href="../fansMain.php"><img id="nav-logo" src="../assets/logo/web-logo.png"></a>
          <ul>
              <li class="nav-menu"><a href="../fansMain.php">HOME</a></li>
              <li class="nav-menu"><a href="../html/members.html">MEMBERS</a>  
                  <ul class = "nj-members">
                      <li><a href = "../html/member.html?member=minji">Kim Minji</a></li>
                      <li><a href = "../html/member.html?member=hanni">Pham Hanni</a></li>
                      <li><a href = "../html/member.html?member=haerin">Kang Haerin</a></li>
                      <li><a href = "../html/member.html?member=danielle">Danielle Marsh</a></li>
                      <li><a href = "../html/member.html?member=hyein">Lee Hyein</a></li>
                  </ul></li>
              <li class="nav-menu"><a href="forums.php">FORUMS</a></li> 
              <li class="nav-menu"><a href="../Event/showEvent.php">EVENTS</a></li>
              <li class="nav-menu"><a href="../profile/updateProfile.php">PROFILE</a></li>
          </ul>
      </nav>
    </header>

    <main>
      <div class="container">
        <h1>Selamat datang di Forum Grup Idol</h1>
   
        <h2>Buat Posting Baru</h2>
        <form action="../forum_post/addPostForum.php" method="post" enctype="multipart/form-data">
          <label for="judul">Judul:</label>
          <input type="text" id="judul" name="judul" /><br /><br />
          <label for="isi">Isi Posting:</label><br />
          <textarea id="isi" name="isi" rows="4" cols="50"></textarea><br /><br />
          <input type="file" name="gambar"><br><br>
          <input type="submit" name="addPost" value="Tambahkan Posting" />
        </form>
  
        <h2>Posting Terkini</h2>
        <!-- get all postingan dari db -->
        <?php
          require_once("../koneksi.php");
          $sql = "SELECT u.id as user_id, u.username, p.id as post_id , p.post_title, p.post_desc, p.post_pict
                  FROM post p
                  JOIN users u 
                  WHERE u.id = p.id_fans;";
          $result = $conn->query($sql);
          if ($result) {
            while($row = mysqli_fetch_assoc($result)){
              $postIndex = $row['post_id'];
                echo "<div class='main'>
                    <div class='gbr_post'> <img src = 'Forum_Upload/".$row['post_pict']."' alt = 'hehe'>
                   
                    <div class='text-container'>
                        <div class='post-header'>
                          <p class='post_title'> ".$row['post_title']."</p>
                          <div class='post-buttons'>
                            <a href='javascript:void(0);' class='like-button' id='like-button-".$postIndex."' onclick='toggleLike(".$postIndex.")'></a>
                            // todo :
                            <a href='#' class='comment-button' data-post-id='" . $postIndex ."' onclick='loadComments(" .$postIndex . ")'></a>
                            <a href='report_post.php?postId=".$postIndex."' class='report-button'></a>

                          </div>
                      </div>
                        <p class='post_desc'> ".$row['post_desc']."</p>
                        <p class='username'> @".$row['username']."</p>
                    </div>

                    </div>
                </div> <br>";
            }
          }
        ?>
      </div>
      <!-- comment pop up -->
      <div id="commentPopup" class="commentPopup">
        <div class="modal-content">
            <span class="close" onclick="closeCommentPopup()">&times;</span>
            <div id="commentContainer"></div>
        </div>
    </div>
    </main>

    <footer>
      <p><a href = "https://www.youtube.com/@NewJeans_official">Newjeans Official YouTube Channel</a></p>
      <p>&copy; Copyright 2023</p>
    </footer>

    <script src="../js/jquery-3.7.1.js"></script>
  </body>
</html>
<script>
$(document).ready(function() {
    function toggleLike(postId) {
        var likeButton = $('#like-button-' + postId);
        var userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;
        
        $.ajax({
            url: 'record_like.php',
            method: 'POST',
            data: { postId: postId, userId: userId },
            success: function(response) {
                if (response === 'Like recorded successfully') {
                    likeButton.addClass('liked');
                } else if (response === 'Unlike recorded successfully') {
                    likeButton.removeClass('liked');
                }
            },
            error: function(xhr, status, error) {
                console.error(error); 
            }
        });
    }

});
</script>
