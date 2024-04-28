<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ");
}
?>

<?php
require 'koneksi.php';
$id_fans = $_SESSION['user_id'];

$sql_user = "SELECT * FROM fans WHERE id = '$id_fans'";
$result_user = mysqli_query($conn, $sql_user);
$profile = $result_user->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/history.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/background_video.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <title>NewJeans Forum</title>

    <style>
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

        .muteBtn {
            filter: drop-shadow(3px 2px 5px white);

        }
    </style>
</head>

<body class="all">
    <header>
        <nav class="navbar">
            <a href="fansMain.php"><img id="nav-logo" src="assets/logo/web-logo.png"></a>
            <ul>
                <li class="nav-menu"><a href="fansMain.php">HOME</a></li>
                <li class="nav-menu"><a href="html/members.php">MEMBERS</a>
                    <ul class="nj-members">
                        <li><a href="html/member.php?member=minji">Kim Minji</a></li>
                        <li><a href="html/member.php?member=hanni">Pham Hanni</a></li>
                        <li><a href="html/member.php?member=haerin">Kang Haerin</a></li>
                        <li><a href="html/member.php?member=danielle">Danielle Marsh</a></li>
                        <li><a href="html/member.php?member=hyein">Lee Hyein</a></li>
                    </ul>
                </li>
                <li class="nav-menu"><a href="forum_post/forums.php">FORUMS</a></li>
                <li class="nav-menu"><a href="Event/showEvent.php">EVENTS</a></li>
                <!-- <li class="nav-menu"><a href="profile/updateProfile.php">PROFILE</li> -->
            </ul>
            <div class="user-profile" id="userProfile" onclick="toggleSidebar()">
                <img src='<?php echo ($profile['profile_picture'] != null) ? "profile/upload_profile/" . $profile['profile_picture'] : "profile/upload_profile/unknown.jpg"; ?>' alt="Profile Picture">
            </div>

        </nav>
    </header>


    <!-- Sidebar -->

    <?php
    require_once("koneksi.php");

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


    <div class="sidebar" id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">&times;</span>
        <form class="inputan" method="post" action="profile/updated.php" enctype="multipart/form-data">
            <?php echo " <div class='foto-lama'><img src='profile/upload_profile/" . $row['profile_picture'] . "' alt = 'profile picture'></div> " ?><br>
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
        <form class="logout-form" method="post" action="Login Regist/logout.php" enctype="multipart/form-data">
            <input class="logout-button" type="submit" name="logout" value="Log Out"> <br>
        </form>
    </div>

    <main id="all">
        <div class="welcome">
            <video autoplay loop id="videoBackground" muted>
                <source src="assets/videos/bgvideo_home.mp4" type="video/mp4">
            </video>
            <div id="muteButton">
                <img src="" alt="tombol" id="mtbtn" class="muteBtn">
            </div>
        </div>

        <h1>LATEST RELEASE</h1>
        <section class="banner-container">
            <div class="banner">
                <button class="button next">&#8677;</button>
                <button class="button prev">&#8676;</button>
                <div class="content">
                    <iframe src="https://www.youtube.com/embed/qyNIxxJ1FWU?si=LNO3ZNgaitXKNRfB" name="player" id="iFrame"> </iframe>
                </div>
            </div>
            </div>

            <div class="slide-dots">
                <p class="k1"> </p>
                <p> </p>
                <p> </p>
            </div>

            <div class="slide-text">
                <p>Watch HANNI's amazing performance as he covers the song 'Best Part' by Daniel Caesar & H.E.R. with full emotion and authenticity! 🎤🌟 Listen to her beautiful vocals and simple yet stunning musical accompaniment, as she delivers a personal interpretation that touches the heart. With captivating visuals, this video not only entertains, but also evokes deep feelings and amazes the audience with the beauty of the music!"</p>
            </div>
        </section>

        <div class="border">
            <div class="swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <h1>NAMING</h1>
                        <p>The name NewJeans has two meanings. Firstly, it emphasizes that jeans are a timeless fashion, reflecting the group's desire to create a timeless image. Second, as a play on the words "new gen" refers to their role as ushers in a new generation of pop music.</p>
                    </div>
                    <div class="swiper-slide">
                        <h1>PRE-DEBUT ACTIVITIES</h1>
                        <p>It is a surprising fact that long before Newjeans was formed, several group members were already active in the entertainment industry. Danielle is a regular member of tvN's Rainbow Kindergarten, a variety show that aired in 2011.Hyein debuted as a member of children's music group U.SSO Girl in November 2017 under the stage name U.Jeong, before departing from the group one year later. In December 2020, he joined the music group and YouTube collective Play With Me Club formed by PocketTV, and graduated from the group on May 3, 2021. Hanni and Minji made a cameo in BTS's 2021 music video for "Permission to Dance</p>
                    </div>
                    <div class="swiper-slide">
                        <h1>NEWJEANS GROUP FORMATION</h1>
                        <h2>2019 - 2020 :</h2>
                        <p>Preparations for the new girl group resulting from the collaboration between Big Hit Entertainment and Source Music began in early 2019 under the direction of Min Hee-Jin who joined the company as CBO the same year and is widely known for her art direction as visual director at SM Entertainment. Global auditions took place between September and October 2019 and group casting began in early 2020.</p>
                        <h2>2021 - 2022 :</h2>
                        <p>Newjeans was scheduled to launch, but was postponed due to the Covid-19 pandemic and the project was moved to Hybe's newly founded independent label ADOR, after Min was appointed CEO of the label. The second round of global auditions was held between December 2021 and January 2022, and the group lineup was finalized in March 2022.</p>
                    </div>
                    <div class="swiper-slide">
                        <h1>DEBUT PROCESS</h1>
                        <p>Their debut process began with the release of three animated videos on July 1, 2022, followed by the release of their debut single "Attention" on July 22 followed by the announcement of their upcoming debut Mini Album, which will contain four songs, including two additional singles. Their four-song debut EP received a positive response, with pre-orders exceeding 444,000 copies in three days. Their debut album sold over one million copies, becoming the best-selling debut album by a K-pop female artist in South Korea since 2011. The group won numerous newcomer awards and debuted on various charts. Their latest song, "Ditto," achieved huge success and became their first entry on the Billboard Hot 100. Their first album, "OMG," achieved further success with its retro-style theme and debuted at number one on the Circle Album Chart.</p>
                    </div>
                    <div class="swiper-slide">
                        <h1>LATEST SUCCESSFUL JOURNEY 2023</h1>
                        <p>In April 2023, NewJeans released a collaboration with Coca-Cola for "Zero." The second single, "Be Who You Are (Real Magic)," was released in May 2023, co-produced by Coca-Cola with Jon Batiste, JID, and Camilo. Their first fan meeting, Bunnies Camp, was held on July 1-2, 2023. Their second mini-album, "Get Up," was released on July 21, 2023, placing second on the Circle Album Chart. The album sold 1.65 million copies in its first week of release, becoming the group's third consecutive album to sell more than one million copies. The single "Super Shy" dominated the charts, bringing NewJeans to first place on the Billboard Emerging Artists chart. The group performed at major festivals such as Lollapalooza and Summer Sonic Festival in the United States.</p>
                    </div>
                </div>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <script>
                const swiper = new Swiper('.swiper', {
                    loop: true,

                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            </script>
        </div>
        <audio src="assets/sounds/NewJeans - OMG (Instrumental).mp3" loop id="bg-audio"></audio>
    </main>

    <footer>
        <p><a href="https://www.youtube.com/@NewJeans_official">Newjeans Official YouTube Channel</a></p>
        <p>&copy; Copyright 2024</p>
    </footer>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/background_video.js"></script>
    <script src="js/nav-bar.js"></script>
    <script src="js/banner.js"></script>
    <script src="/profile/sidebar.js"></script>

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