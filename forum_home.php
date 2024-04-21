<?php
require 'koneksi.php';

$sql_posts = "SELECT * FROM post";
$result_posts = $conn->query($sql_posts);

session_start();
$id_fans = $_SESSION['user_id'];

$sql_user = "SELECT * FROM users WHERE id = '$id_fans'";
$result_user = mysqli_query($conn, $sql_user);
$profile = $result_user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>newJeans Fanpage Forum</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&family=Pixelify+Sans:wght@400..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&family=Pixelify+Sans:wght@400..700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
        }

        .navbar {
            display: flex;
            align-items: center;
            background-color: indigo;
            color: #fff;
            padding: 10px 20px;
        }

        .navbar .logo img {
            width: 28%;
        }

        .navbar .menu {
            display: flex;
            align-items: center;
        }

        .navbar .menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin-right: 10px;
            border-radius: 5px;
            transition: background-color 0.2s ease;
        }

        .navbar .menu a:hover {
            background-color: #7519b7;
        }

        .navbar .user-profile {
            display: flex;
            align-items: center;

            position: absolute;
            right: 15px;
        }

        .navbar .user-profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
            cursor: pointer;
            transition: transform 0.2s ease;
        }

        .navbar .user-profile img:hover {
            transform: scale(1.1);
        }

        /* Sidebar Style */
        .sidebar {
            display: none;
            position: fixed;
            top: 0;
            left: 999px;
            height: 100%;
            width: 250px;
            background-color: #333;
            color: #fff;
            padding: 20px;
            transition: transform 0.3s ease;
        }

        .sidebar .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
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

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }

        .post-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* Ubah menjadi dua kolom sejajar */
            grid-gap: 20px;
            /* Tambahkan jarak antara postingan */
        }

        .post {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s ease;
            max-width: 100%;
            width: 100%;
            margin: 0;
        }


        .post:hover {
            max-width: 100%;
            border: 2px solid #59c3f6;
        }

        .post-content {
            padding: 20px;
        }

        .post-content p {
            margin-bottom: 10px;
            color: #333;
        }

        .post img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .post-footer {
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            padding: 10px 20px;
            background-color: #f9f9f9;
            border-top: 1px solid #ccc;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .username {
            font-weight: bold;
            color: #333;
        }

        /*
        .timestamp {
            color: #777;
            font-size: 12px;
        }
        */

        .actions {
            display: flex;
            align-items: center;
        }

        .actions a {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-right: 10px;
            text-decoration: none;
        }

        .actions a:hover {
            background-color: #2980b9;
        }

        /* Desain Pop-up */
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 10% auto;
            padding: 20px;
            border-radius: 8px;
            width: 80%;
            max-width: 600px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Style untuk form postingan */
        .post-form {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            max-width: 100%;
        }

        .post-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .post-form .file-upload {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-bottom: 10px;
        }

        .post-form .file-upload label {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-right: 10px;
        }

        .post-form .file-upload label:hover {
            background-color: #2980b9;
        }

        .post-form .file-upload input[type="file"] {
            display: none;
        }

        .post-form .preview-image {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
            margin: 0 auto;
        }

        .post-form button[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .post-form button[type="submit"]:hover {
            background-color: #2980b9;
        }

        /* Style untuk langkah "Next" */
        .post-form .step-buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 10px;
        }

        .post-form .step-buttons button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .post-form .step-buttons button:hover {
            background-color: #2980b9;
        }

        .post-form .step-buttons button:last-child {
            background-color: #ccc;
        }

        .post-form .step-buttons button:last-child:hover {
            background-color: #bbb;
        }

        .header {
            margin-top: 20px;
            text-transform: uppercase;
            color: #2980b9;
            text-shadow: 1px 2px grey;
        }
    </style>


    <script>
        function loadComments(postId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'comment.php?id_post=' + postId, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var response = xhr.responseText;
                    document.getElementById('commentPopup_' + postId).innerHTML = response;
                    document.getElementById('commentPopup_' + postId).style.display = 'block';
                } else {
                    console.error('Request error: ' + xhr.status);
                }
            };

            xhr.onerror = function() {
                console.error('Request error.');
            };

            xhr.send();
        }
    </script>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="Picture/web-logo_052245.png" alt="newJeans Logo">
        </div>

        <div class="menu">
            <a href="#">HOME</a>
            <a href="#">FORUM</a>
            <a href="#">EVENT</a>
        </div>

        <div class="user-profile" id="userProfile" onclick="toggleSidebar()">
            <img src='<?php echo ($profile['profile_picture'] != null) ? "uploads/" . $profile['profile_picture'] : "Picture/image16.jpg"; ?>' alt="Profile Picture">
        </div>



    </div>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">&times;</span>
        <div class="profile">
            <img src="profile.jpg" alt="Profile Picture">
            <div class="username">Username</div>
        </div>
        <div class="menu-item">
            <a href="#">Edit Profile</a>
        </div>
        <div class="menu-item">
            <a href="#">Log Out</a>
        </div>
    </div>

    <div class="header">
        <h1>Welcome to newJeans Fanpage Forum</h1>
        <button id="openPostModal">Create Post</button>
    </div>

    <div class="container">
        <div class="post-grid">
            <?php
            while ($row_posts = $result_posts->fetch_assoc()) {
                $id = $row_posts['id_fans'];
                $sql = "SELECT * FROM users WHERE id_fans = " . $id;
                $result = mysqli_query($conn, $sql);
                $user = mysqli_fetch_assoc($result);

                echo "<div class='post'>";
                echo "<div class='post-content'>";
                echo "<div class='avatar'><img src='" . (($user['profile_picture'] != null) ? 'uploads/' . $user['profile_picture'] : 'Picture/image16.jpg') . "' alt='Avatar'></div><br>";

                echo "<div class='username'>" . $user['username'] . "</div><br><br>";
                // echo "<div class='timestamp'>" . $row_posts['timestamp'] . "</div>";
                echo "<img style='margin:0 25%; width: 250px;' src='uploads/" . $row_posts['postPic'] . "' alt='Post Image'>";
                echo "<p style='text-align:center;'>" . $row_posts['postDesc'] . "</p>";
                echo "</div>";
                echo "<div class='post-footer'>";
                echo "<div class='actions'>";
                echo "<a href='#'>Like</a>";
                echo "<a href='#' class='commentLink' data-post-id='" . $row_posts['id_post'] . "' onclick='loadComments(" . $row_posts['id_post'] . ")'>Comment</a>";

                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            ?>
        </div>
    </div>

    <!-- Pop-up untuk membuat postingan -->
    <div id="postModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closePostModal">&times;</span>
            <form class="post-form" action="upload_post.php" method="post" enctype="multipart/form-data">
                <div id="step1">
                    <h2>Silahkan pilih foto/gambar yang ingin di-post</h2>
                    <div class="file-upload">
                        <label for="file-upload" class="custom-file-upload">
                            <i class="fa fa-cloud-upload"></i> Choose File
                        </label>
                        <input id="file-upload" type="file" onchange="previewImage(event)" name="image">
                    </div>
                    <img id="image-preview" class="preview-image" src="#" alt="Preview Image" style="display: none;width:50%;">
                    <div class="step-buttons">
                        <button type="button" onclick="nextStep()">Next</button>
                    </div>
                </div>
                <div id="step2" style="display: none;">
                    <textarea name="content" placeholder="Write your post here"></textarea>
                    <div class="step-buttons">
                        <button type="button" onclick="prevStep()">Back</button>
                        <button type="submit">Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="commentPopup" class="commentPopup">
        <div class="modal-content">
            <span class="close" onclick="closeCommentPopup()">&times;</span>
            <div id="commentContainer"></div>
        </div>
    </div>


    <script>
        function loadComments(postId) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'comment.php?id_post=' + postId, true);

            xhr.onload = function() {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var response = xhr.responseText;
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
            commentPopup.style.display = 'none';
        }



        // Fungsi untuk menampilkan pop-up
        var modal = document.getElementById('postModal');
        var openBtn = document.getElementById('openPostModal');
        var closeBtn = document.getElementById('closePostModal');

        openBtn.onclick = function() {
            modal.style.display = 'block';
        }

        closeBtn.onclick = function() {
            modal.style.display = 'none';
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
                document.getElementById('step1').style.display = 'block';
                document.getElementById('step2').style.display = 'none';
            }
        }

        // Fungsi untuk pratinjau gambar sebelum diunggah
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('image-preview');
                output.style.display = 'block';
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        // Fungsi untuk langkah "Next" dan "Back"
        function nextStep() {
            var imagePreview = document.getElementById('image-preview');
            if (imagePreview.style.display === 'none' || imagePreview.src === '') {
                alert('Please upload an image first.');
            } else {
                document.getElementById('step1').style.display = 'none';
                document.getElementById('step2').style.display = 'block';
            }
        }

        function prevStep() {
            document.getElementById('step1').style.display = 'block';
            document.getElementById('step2').style.display = 'none';
        }

        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var isOpen = sidebar.style.display === 'block';

            var start = null;

            function animate(timestamp) {
                if (!start) start = timestamp;
                var progress = timestamp - start;
                var sidebarWidth = isOpen ? progress / 10 : 250 - progress / 10;
                sidebar.style.width = sidebarWidth + 'px';
                if (progress < 250) {
                    requestAnimationFrame(animate);
                } else {
                    sidebar.style.display = isOpen ? 'none' : 'block';
                }
            }

            if (isOpen) {
                requestAnimationFrame(animate());
            } else {
                sidebar.style.display = 'block';
                requestAnimationFrame(animate);
            }
        }

        var userProfile = document.getElementById('userProfile');
        userProfile.onclick = function() {
            toggleSidebar();
        };
    </script>
</body>

</html>