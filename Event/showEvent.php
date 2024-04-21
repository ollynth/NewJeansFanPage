<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <title>NewJeans Forum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            text-decoration: none;
            box-sizing: border-box;
        }

        body {
            background-image: url("../Picture/image16.jpg");
            background-repeat: repeat;
            background-size: 25%;
            color: white;
            text-align: center;
            font-family: "Popins", sans-serif;
        }

        h1 {
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .content {
            margin: 0 auto 20px;
            padding: 30px 20px;
            border: 2px solid white;
            width: 60%;
            max-width: 800px; 
            display: flex; 
            align-items: center; 
            backdrop-filter: blur(20px);
        }

        img {
            width: 40%;
            height: 40%;
            padding-right: 20px;
        }

        .text-container {
            display: flex;
            flex-direction: column; 
            text-align: left; 
        }

        p {
            color: white;
            margin: 10px 0; 
        }

        h2{
            color: white;
        }

        h2:hover{
            color: #20c937;
        }

        .ticket {
            font-size: 15px;
            color: white;
            text-decoration: none;
        }

        .ticket:hover{
            color: #20c937;
            text-decoration: underline;
        }


        @font-face {
            font-family: robotoSlab;
            src: url("../assets/fonts/static/RobotoSlab-Regular.ttf") format("truetype");
        }

        /* nav start */
        #nav-logo {
            float: left;
            margin-left: 5px;
            margin-top: 1px;
            height: 45px;
            max-width: 10vw;
        }

        .nav-menu {
            list-style-type: none;
            display: inline-block;
            color: white;
        }

        nav {
            font-family: robotoSlab;
            background-color: black;
            width: 100%;
            height: 50px;
            text-align: center;
        }

        nav ul {
            display: inline-block;
            word-spacing: 10vw;
            margin-bottom: 10px;
        }
        nav ul li{
            position: relative;
            height: 60px;
            width: 60px;
            padding-top: 10px;
            margin-top: 4px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
        }

        nav ul li a:hover {
            text-shadow: 6px 2px 10px #ffffff ;
        }

        nav ul ul{
            position: absolute;
            margin-top: 10px;
            padding-left: 5px;
            background-color:  black;
            width: 120px;
            z-index: 1;
        }

        nav ul li ul{
            position: absolute;
            background-color: black;
            width: 150px;
            transition: .6s;
            opacity: 0;
            visibility: hidden;
            left: -45px;
        }

        nav ul li:hover > ul{
            opacity: 1;
            visibility: visible;
            left: -45px;
        }

        nav ul li ul li{
            width: 100%;
            
        }

        nav ul ul li{
            list-style-type: none;
            text-align: center;
            word-spacing: 2px;
            padding-top: 10px;
        }

        nav ul li ul li a{
            font-size: 14px;
            text-transform: uppercase;
        }

        nav ul ul li:hover{
            background-image: linear-gradient(120deg, black, grey );
        }
        /* nav end */

        /* footer start */
        footer {
            background-color: black;
            height: 110px;
            width: 100%;
            display: inline-block;
            text-align: center;
            padding: 10px 0;
        }

        footer p a{
            color: white;
            text-decoration: none;
        }

        footer a:hover{
            text-shadow: 6px 2px 10px #ffffff ;
        }
        /* footer end */

        main, .border, .swiper, .swiper-wrapper, .swiper-slide {
            max-width: 100%;
            overflow-y: visible;
            height: 100%;
        }

        @media screen and (max-width: 640px) {
            nav ul li {
                right: 25px;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <?php
            echo "
            <a href='../fansMain.php'><img id='nav-logo' src='../assets/logo/web-logo.png'></a>
            <ul>
                <li class='nav-menu'><a href='../fansMain.php'>HOME</a></li>
                    <li class='nav-menu'><a href='../html/members.html'>MEMBERS</a>  
                    <ul class = 'nj-members'>
                        <li><a href = '../html/member.html?member=minji'>Kim Minji</a></li>
                        <li><a href = '../html/member.html?member=hanni'>Pham Hanni</a></li>
                        <li><a href = '../html/member.html?member=haerin'>Kang Haerin</a></li>
                        <li><a href = '../html/member.html?member=danielle'>Danielle Marsh</a></li>
                        <li><a href = '../html/member.html?member=hyein'>Lee Hyein</a></li>
                    </ul></li>
                    <li class='nav-menu'><a href='../forum_post/forums.php'>FORUMS</a></li>
                    <li class='nav-menu'><a href='showEvent.php'>EVENTS</a></li>";
                ?>
            </ul>
        </nav>
    </header>
    <h1>Event Schedule</h1> 
    <?php
        require_once('../koneksi.php');
        $sql = "SELECT * from events";
        $result = $conn->query($sql);
        if ($result) {
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='main'>
                    <div class='content'>
                        <img src = 'Upload/".$row['event_poster']."' alt = 'hehe'>
                        <div class='text-container'>
                            <p> ".$row['event_name']." </p>
                            <p><i class='bx bx-calendar-star'></i> ".$row['date_time']."</p>
                            <p><i class='bx bxs-building'></i> ".$row['location']."</p>
                            <p><i class='bx bxs-notepad'></i> ".$row['event_desc']."</p>
                            <div class = 'ticket'>
                                "."<a class = 'ticket' href = '".$row['ticket']."'>"."<h2>Ticket Available On Here!!</h2></a>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        }
        ?>
    <footer>
        <p><a href = "https://www.youtube.com/@NewJeans_official">Newjeans Official YouTube Channel</a></p>
        <p>&copy; Copyright 2023</p>
    </footer>
</body>
</html>


