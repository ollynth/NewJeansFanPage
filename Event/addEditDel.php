<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
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
        .main{
            border: 2px solid white;
            width: 60%;
            max-width: 800px; 
            margin: 20px auto;
            padding: 20px;
            backdrop-filter: blur(20px);
        }
        .content {
            margin: 0 auto;
            padding: 30px 20px;
            display: flex;
            align-items: center;
            justify-content:center ; 
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
            margin-bottom: 20px;
        }

        h2:hover{
            color: #20c937;
        }

        a {
            font-size: 15px;
            color: white;
            text-decoration: none;
        }

        a:hover{
            color: #20c937;
            text-decoration: underline;
        }

        a .admin{
            font-size: 55px;
        }
        .admin{
            font-size: 25px;
            margin-left: 50px;
            margin-right: 60px;
            border: 3px solid white;
            background-color: indigo;
           
        }

        .admin:hover{
            color: #20c937;
        }
    </style>
</head>
<body>
    <?php
        require_once('../koneksi.php');
        $sql = "SELECT * from events";
        $result = $conn->query($sql);
        if ($result) {
            echo "<h1>Event Schedule</h1> <a href = 'inputEvent.php' class = 'admin' >Add</a>";
            // echo "<table><tr><th>Title<th><th>Date & Time<th><th>Location<th><th>Description<th><th>Poster<th><th>Ticket Link<th><th>Delete<th><th>Edit<th></tr>";
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='main'>
                    <div class='content'>
                        <img src = 'Upload/".$row['event_poster']."' alt = 'hehe'>
                        <div class='text-container'>
                            <p> ".$row['event_name']." </p>
                            <p><i class='bx bx-calendar-star'></i> ".$row['date_time']."</p>
                            <p><i class='bx bxs-building'></i> ".$row['location']."</p>
                            <p><i class='bx bxs-notepad'></i> ".$row['event_desc']."</p>
                        </div>
                    </div>
                    <div>
                        <a href = '".$row['ticket']."'>"."<h2>Ticket Available On Here!!</h2></a>
                        <a href = 'editEvent.php?id=".$row['id']."' class = 'admin'>Edit</a>
                        <a href = 'deleteEvent.php?id=".$row['id']."' class = 'admin'>Delete</a>
                    </div>
                </div>";
            }
        }
    ?>
</body>
</html>


