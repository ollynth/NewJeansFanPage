<html>
<head>
    <title>Edit Profile</title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <link rel="stylesheet" href="../css/forums.css">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .inputan {
            background-color: #f2f2f2;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            color: black;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        .logout-form, .inputan {
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

    <?php
        session_start();
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
              <li class="nav-menu"><a href="../forum_post/forums.php">FORUMS</a></li> 
              <li class="nav-menu"><a href="../Event/showEvent.php">EVENTS</a></li>
          </ul>
      </nav>
    </header>

    <form class="inputan" method = "post" action ="updated.php" enctype="multipart/form-data">
        <?php echo" <div class='foto-lama'><img src='upload_profile/".$row['profile_picture']."' alt = 'profile picture'></div> "?><br>
        <input type ="hidden" name="id" value=<?php echo $row['id_fans']?>>
        Username:
        <input type ="text" name ="username" value=<?php echo $row['username']?>><br>
        email : <br> 
        <input type = "text" name="email" value =<?php echo $row['email']?>><br>
        Phone number : <br> 
        <input type = "text" name="phone" value =<?php echo $row['phone_number']?>><br>
        Gender : <br> 
        <input type = "text" name="gender" value =<?php echo $row['gender']?>><br>
        Password : <br> 
        <input type = "text" name="password" value =<?php echo $row['passwords']?>><br>
        Profile picture : <br> 
        <input type = "file" name="image" id="image"><br>
        <input class="update-button" type = "submit" name="update" value ="Update Profile"> <br>
    </form>
    <form class="logout-form" method = "post" action ="../Login Regist/logout.php" enctype="multipart/form-data">
        <input class="logout-button" type = "submit" name="logout" value ="Log Out"> <br>
    </form>


</body>
</html>