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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/member.css">
    <link rel="stylesheet" href="../css/member_responsive.css">
    <link rel="stylesheet" href="../css/arrow.css">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <title>View Member</title>


    <style>
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

        .update-button {
            background-color: #4CAF50;
        }

        .logout-button {
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
    </style>
</head>

<body>
    <header>
        <nav class="navbar">
            <a href="../fansMain.php"><img id="nav-logo" src="../assets/logo/web-logo.png"></a>
            <ul>
                <li class="nav-menu"><a href="../fansMain.php">HOME</a></li>
                <li class="nav-menu"><a href="members.php">MEMBERS</a>
                    <ul class="nj-members">
                        <li><a href="member.php?member=minji">Kim Minji</a></li>
                        <li><a href="member.php?member=hanni">Pham Hanni</a></li>
                        <li><a href="member.php?member=haerin">Kang Haerin</a></li>
                        <li><a href="member.php?member=danielle">Danielle Marsh</a></li>
                        <li><a href="member.php?member=hyein">Lee Hyein</a></li>
                    </ul>
                </li>
                <li class="nav-menu"><a href="../forum_post/forums.php">FORUMS</a></li>
                <li class="nav-menu"><a href="../Event/showEvent.php">EVENTS</a></li>
                <!-- <li class="nav-menu"><a href="profile/updateProfile.php">PROFILE</li> -->
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
            <?php echo " <div class='foto-lama'><img src='../profile/upload_profile/" . $row['profile_picture'] . "' alt = 'profile picture'></div> " ?><br>
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
        <div id="viewer">
            <div id="photo">
                <div id="prev-img" class="arrow arrow-mirrored">
                    <div class="arrow-top"></div>
                    <div class="arrow-bottom"></div>
                </div>
                <div id="photo-viewer">
                    <img id="mem-img" src="">
                </div>
                <div id="next-img" class="arrow">
                    <div class="arrow-top"></div>
                    <div class="arrow-bottom"></div>
                </div>
            </div>
            <div id="desc">
                <video autoplay muted loop>
                    <source src="" type="video/mp4" id="video-player">
                </video>
                <div id="member-info">
                    <h2 id="mem-name"></h2>
                    <ul>
                        <li>Stage Name: </li>
                        <li>Birth Name: </li>
                        <li>English Name: </li>
                        <li>Position: </li>
                        <li>Birthday: </li>
                        <li>Zodiac Sign: </li>
                        <li>Chinese Zodiac Sign: </li>
                        <li>Height: </li>
                        <li>Weight: </li>
                        <li>Blood Type: </li>
                        <li>MBTI Type: </li>
                        <li>Nationality: </li>
                        <li>Representative Color: </li>
                        <li>Representative Emoji: </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="member-arrow">
            <div id="prev" class="mem-button">
                <p>&#8592; Previous</p>
            </div>
            <div id="next" class="mem-button right">
                <p>Next &rarr;</p>
            </div>
        </div>
    </main>

    <footer>
        <p><a href="https://www.youtube.com/@NewJeans_official">Newjeans Official YouTube Channel</a></p>
        <p>&copy; Copyright 2023</p>
    </footer>

    <script src="../js/jquery-3.7.1.js"></script>
    <script src="../js/member.js"></script>


    <script>
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
</body>

</html>