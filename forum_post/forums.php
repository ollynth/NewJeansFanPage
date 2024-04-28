<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
}

?>

<?php
require '../koneksi.php';
$id_fans = $_SESSION['user_id'];

$sql_user = "SELECT * FROM fans WHERE id = '$id_fans'";
$result_user = mysqli_query($conn, $sql_user);
$profile = $result_user->fetch_assoc();
?>

<?php
require_once("../koneksi.php");
$uid = $_SESSION['user_id'];

$sql = "SELECT
            f.id AS 'id_fans',
            u.username,
            u.passwords,
            f.email,
            f.gender,
            f.phone_number,
            f.profile_picture
            FROM
                fans f
            JOIN users u ON f.id = u.id
            WHERE f.id = '$uid'";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>




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

    .username,
    .post_desc {
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

    .sidebar {
      display: none;
      position: fixed;
      top: 80px;
      left: 400px;
      height: 75%;
      width: 10px;
      background-color: #333;
      color: #fff;
      padding: 20px;
      transition: transform 0.3s ease;
      z-index: 3;
      border-radius: 1%;
      overflow: scroll;
      overflow-x: hidden;
    }

    .sidebar .close-btn {
      position: absolute;
      top: 10px;
      right: 5px;
      color: #fff;
      font-size: 24px;
      cursor: pointer;
    }

    .sidebar .profile {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-bottom: 20px;
    }

    .sidebar .profile img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      margin-bottom: 10px;
    }

    .sidebar .profile .username {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
      color: white;
    }

    .sidebar .menu-item {
      padding: 10px 0;
      border-bottom: 1px solid #555;
    }

    .sidebar .menu-item:last-child {
      border-bottom: none;
    }

    .sidebar .menu-item a {
      color: #fff;
      text-decoration: none;
      transition: color 0.2s ease;
    }

    .sidebar .menu-item a:hover {
      color: #3498db;
    }


    .user-profile {
      display: inline-block;
      /* align-items: center; */
      position: absolute;
      right: 15px;
      top: 5px;
    }

    .user-profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 10px;
      cursor: pointer;
      transition: transform 0.2s ease;
    }

    .user-profile img:hover {
      transform: scale(1.1);
    }

    .inputan {
      background-color: #f2f2f2;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      color: black;
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
    }

    .logout-form,
    .inputan {
      max-width: 400px;
      margin: 0 auto;
      padding: 20px;
    }

    input[type="text"],
    input[type="password"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .update-button,
    .logout-button {
      width: 100%;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .inputan .update-button {
      background-color: #4CAF50;
    }

    .logout-form .logout-button {
      background-color: red;
    }

    .update-button:hover {
      background-color: #45a049;
    }

    .logout-button:hover {
      background-color: #ff3333;
    }

    .foto-lama img {
      display: block;
      margin: 0 auto;
      border-radius: 50%;
      width: 160px;
      height: 160px;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .foto-lama img {
      display: block;
      margin: 0 auto;
      border-radius: 50%;
      width: 160px;
      height: 160px;
      object-fit: cover;
      margin-bottom: 15px;
    }











    .commentPopup {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .commentPopup .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 550px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .commentPopup .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .commentPopup .close:hover,
        .commentPopup .close:focus {
            color: black;
            text-decoration: none;
        }

        .commentPopup #commentContainer {
            max-height: 400px;
            overflow-y: auto;
        }

        .commentPopup .comment {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: lightgray;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .commentPopup .comment .user {
            font-weight: bold;
            color: #333;
        }

        .commentPopup .comment .content {
            color: #333;
            margin-top: 5px;
        }

        .commentPopup .comment .timestamp {
            color: #999;
            font-size: 12px;
            margin-top: 5px;
        }

        .commentPopup .comment .actions {
            margin-top: 10px;
        }

        .commentPopup .comment .actions a {
            color: #3498db;
            text-decoration: none;
            margin-right: 10px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .commentPopup .comment .actions a:hover {
            color: #2980b9;
        }
    
    
    
    
    
    
    
    
    
    
    
        .reportPopup {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .reportPopup .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 550px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .reportPopup .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .reportPopup .close:hover,
        .reportPopup .close:focus {
            color: black;
            text-decoration: none;
        }

        .reportPopup #reportContainer {
            max-height: 400px;
            overflow-y: auto;
        }

        .reportPopup .report {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            background-color: lightgray;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .reportPopup .report .user {
            font-weight: bold;
            color: #333;
        }

        .reportPopup .report .content {
            color: #333;
            margin-top: 5px;
        }

        .reportPopup .report .timestamp {
            color: #999;
            font-size: 12px;
            margin-top: 5px;
        }

        .reportPopup .report .actions {
            margin-top: 10px;
        }

        .reportPopup .report .actions a {
            color: #3498db;
            text-decoration: none;
            margin-right: 10px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .reportPopup .report .actions a:hover {
            color: #2980b9;
        }
  </style>
</head>

<body>
  <header>
    <nav class="navbar">
      <a href="../fansMain.php"><img id="nav-logo" src="../assets/logo/web-logo.png"></a>
      <ul>
        <li class="nav-menu"><a href="../fansMain.php">HOME</a></li>
        <li class="nav-menu"><a href="../html/members.php">MEMBERS</a>
          <ul class="nj-members">
            <li><a href="../html/member.php?member=minji">Kim Minji</a></li>
            <li><a href="../html/member.php?member=hanni">Pham Hanni</a></li>
            <li><a href="../html/member.php?member=haerin">Kang Haerin</a></li>
            <li><a href="../html/member.php?member=danielle">Danielle Marsh</a></li>
            <li><a href="../html/member.php?member=hyein">Lee Hyein</a></li>
          </ul>
        </li>
        <li class="nav-menu"><a href="../forum_post/forums.php">FORUMS</a></li>
        <li class="nav-menu"><a href="../Event/showEvent.php">EVENTS</a></li>
      </ul>
      <div class="user-profile" id="userProfile" onclick="toggleSidebar()">
        <img src='<?php echo ($profile['profile_picture'] != null) ? "../profile/upload_profile/" . $profile['profile_picture'] : "profile/upload_profile/unknown.jpg"; ?>' alt="Profile Picture">
      </div>
    </nav>
  </header>


  <!-- Sidebar -->
  <div class="sidebar" id="sidebar">
    <span class="close-btn" onclick="toggleSidebar()">&times;</span>
    <form class="inputan" method="post" action="../profile/updated.php" enctype="multipart/form-data">
      <?php echo " <div class='foto-lama'><img src='" . (($row['profile_picture'] != null) ? "../profile/upload_profile/" . $row['profile_picture'] : "../profile/upload_profile/unknown.jpg"). "' alt = 'profile picture'></div> " ?><br>
      <input type="hidden" name="id" value=<?php echo $row['id_fans'] ?>>
      Username:
      <input type="text" name="username" value=<?php echo $row['username'] ?>><br>
      email : <br>
      <input type="text" name="email" value=<?php echo $row['email'] ?>><br>
      Phone number : <br>
      <input type="text" name="phone" value=<?php echo $row['phone_number'] ?>><br>
      Gender : <br>
      <input type="text" name="gender" value=<?php echo $row['gender'] ?>><br>
      Password : <br>
      <input type="text" name="password" value=<?php echo $row['passwords'] ?>><br>
      Profile picture : <br>
      <input type="file" name="image" id="image"><br>
      <input type="hidden" name="profile_picture" value="<?= $row['profile_picture'] ?>"><br>
      <input class="update-button" type="submit" name="update" value="Update Profile"> <br>
    </form>
    <form class="logout-form" method="post" action="../Login Regist/logout.php" enctype="multipart/form-data">
      <input class="logout-button" type="submit" name="logout" value="Log Out"> <br>
    </form>
  </div>

  <main id="all">
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
        while ($row = mysqli_fetch_assoc($result)) {
          $postIndex = $row['post_id'];
          echo "<div class='main'>
                    <div class='gbr_post'> <img src = 'Forum_Upload/" . $row['post_pict'] . "' alt = 'hehe'>
                   
                    <div class='text-container'>
                        <div class='post-header'>
                          <p class='post_title'> " . $row['post_title'] . "</p>
                          <div class='post-buttons'>
                            <a href='#' class='like-button' id='like-button-" . $postIndex . "' onclick='toggleLike(" . $postIndex . ")'></a>
                            <a href='#' class='comment-button' onclick='loadComments(" . $row['post_id'] . ")'></a>
                            <a href='#' class='report-button onclick='loadReports(" . $row['post_id'] . ")'></a>

                          </div>
                      </div>
                        <p class='post_desc'> " . $row['post_desc'] . "</p>
                        <p class='username'> @" . $row['username'] . "</p>
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
    
    <!-- report pop up -->
    <div id="reportPopup" class="reportPopup">
      <div class="modal-content">
        <span class="close">&times;</span>
        <div id="reportContainer"></div>
      </div>
    </div>
  </main>

  <footer>
    <p><a href="https://www.youtube.com/@NewJeans_official">Newjeans Official YouTube Channel</a></p>
    <p>&copy; Copyright 2024</p>
  </footer>

  <script src="../js/jquery-3.7.1.js"></script>
</body>

</html>
<script>
  function loadComments(postId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'comment.php?id_post=' + postId, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var response = xhr.responseText;
                    document.getElementById('commentContainer').style.display = 'block';
                    document.getElementById('commentContainer').innerHTML = response;
                    openCommentPopup();
                } else {
                    console.error('Request error: ' + xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error('Request error.');
            };

            xhr.send();
        }


  function openCommentPopup() {
    var commentPopup = document.getElementById('commentPopup');
    commentPopup.style.display = 'block';
  }

  function closeCommentPopup() {
    var commentPopup = document.getElementById('commentPopup');
    var commentContainer = document.getElementById('commentContainer');
    commentPopup.style.display = 'none';
    commentContainer.style.display = 'none';
    commentContainer.innerHTML = '';

  }
  
  
  // Variabel global untuk menyimpan status konten laporan
var reportLoaded = false;

// Fungsi untuk memuat laporan menggunakan AJAX
function loadReports(postId) {
            var xhr2 = new XMLHttpRequest();
            xhr2.open('GET', 'report_post.php?postId=' + postId, true);

            xhr2.onload = function() {
                if (xhr2.status >= 200 && xhr2.status < 400) {
                    var response2 = xhr2.responseText;
                    document.getElementById('reportContainer').style.display = 'block';
                    document.getElementById('reportContainer').innerHTML = response2;
                    openReportPopup();
                } else {
                    console.error('Request error: ' + xhr2.status);
                }
            };

            xhr2.onerror = function() {
                console.error('Request error.');
            };

            xhr2.send();
        }

// Fungsi untuk membuka popup laporan
function openReportPopup() {
    var reportPopup = document.getElementById('reportPopup');
    var reportContainer = document.getElementById('reportContainer');

    // Periksa apakah konten laporan sudah dimuat sebelumnya
    if (!reportLoaded) {
        loadReports(); // Jika belum dimuat, muat konten laporan menggunakan AJAX
    } else {
        reportPopup.style.display = 'block'; // Jika sudah dimuat, langsung buka popup
    }
}

// Fungsi untuk menutup popup laporan
function closeReportPopup() {
    var reportPopup = document.getElementById('reportPopup');
    var reportContainer = document.getElementById('reportContainer');
    reportPopup.style.display = 'none';
    reportContainer.style.display = 'none';
    reportContainer.innerHTML = '';
    reportLoaded = false; // Set status konten laporan menjadi belum dimuat
}

// Fungsi untuk memuat laporan ketika tag <a> report di klik
$('.report-button').on('click', function(e) {
    e.preventDefault(); // Menghentikan default action dari tag <a>
    var postId = $(this).closest('.main').find('.like-button').attr('id').split('-')[2];
    loadReports(postId); // Memanggil fungsi untuk memuat laporan menggunakan AJAX
});


// Fungsi untuk menutup popup laporan ketika tombol close di klik
$('.close').on('click', function(e) {
    e.preventDefault(); // Menghentikan default action dari tag <a>
    closeReportPopup(); // Memanggil fungsi untuk menutup popup laporan
});



  function openReportPopup() {
    var reportPopup = document.getElementById('reportPopup');
    reportPopup.style.display = 'block';
  }

  function closeReportPopup() {
    var reportPopup = document.getElementById('reportPopup');
    var reportContainer = document.getElementById('reportContainer');
    reportPopup.style.display = 'none';
    reportContainer.style.display = 'none';
    reportContainer.innerHTML = '';

  }

  document.addEventListener("DOMContentLoaded", function() {
  var likedPosts = JSON.parse(localStorage.getItem('likedPosts')) || [];

  likedPosts.forEach(function(postId) {
    document.getElementById('like-button-' + postId).classList.add('liked');
  });

  function toggleLike(postIndex) {
    var likeButton = document.getElementById('like-button-' + postIndex);
    likeButton.classList.toggle('liked');

    var index = likedPosts.indexOf(postIndex);
    if (index === -1) {
      likedPosts.push(postIndex);
    } else {
      likedPosts.splice(index, 1);
    }
    localStorage.setItem('likedPosts', JSON.stringify(likedPosts));

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'record_like.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log(xhr.responseText);
      } else if (xhr.readyState === XMLHttpRequest.DONE) {
        console.error('Error:', xhr.status);
      }
    };
    xhr.send('postId=' + postIndex);
  }

  document.querySelectorAll('.like-button').forEach(function(button) {
    button.addEventListener('click', function(event) {
      event.preventDefault(); // Menghentikan perilaku default dari hyperlink
      toggleLike(this.id.split('-')[2]);
    });
  });
});


  function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    var isOpen = sidebar.style.display === 'block';
    var blur = document.getElementById('all');
    var isBlur = blur.style.opacity === '1';

    var start = null;

    function animate(timestamp) {
      blur.style.opacity = isBlur ? '1' : '0.3';
      if (!start) start = timestamp;
      var progress = timestamp - start;
      var sidebarWidth = isOpen ? progress / 10 : 450 - progress / 10;
      sidebar.style.width = sidebarWidth + 'px';
      if (progress < 250) {
        requestAnimationFrame(animate);
      } else {
        sidebar.style.display = isOpen ? 'none' : 'block';
        blur.style.opacity = isOpen ? '1' : '0.3';
      }
    }

    if (isOpen) {
      requestAnimationFrame(animate);
    } else {
      sidebar.style.display = 'block';
      requestAnimationFrame(animate);
    }
  }
</script>