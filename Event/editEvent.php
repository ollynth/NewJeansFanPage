<?php
require_once("../koneksi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "Select * from events where id = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
           echo "
           <!DOCTYPE html>
           <html>
           <head>
               <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
               <title>NewJeans Forum</title>
               <style>
                   * {
                       margin: 0;
                       padding: 0;
                       box-sizing: border-box;
                       font-family: 'Popins', sans-serif;
                   }
           
                   .main {
                       display: flex;
                       justify-content: center;
                       align-items: center;
                       min-height: 100vh;
                       background-image: url('../Picture/dr_2709_HANNI.webp');
                       background-position: center;
                       background-attachment: fixed;
                       background-size: cover;
                   }
           
                   .wrapper {
                       width: 600px;
                       background: transparent;
                       border: 2px solid rgba(255, 255, 255, .2);
                       backdrop-filter: blur(20px);
                       color: white;
                       border-radius: 10px;
                       padding: 30px 40px;
                   }
           
                   .wrapper h1 {
                       font-size: 40px;
                       text-align: center;
                   }
           
                   .input-box {
                       position: relative;
                       width: 100%;
                       height: 50px;
                       margin: 30px 0;
                   }
           
                   .input-box input {
                       width: 100%;
                       height: 100%;
                       background: transparent;
                       border: none;
                       outline: none;
                       border: 2px solid rgba(255, 255, 255, .2);
                       border-radius: 40px;
                       box-shadow: 0 0 10px rgba(0, 0, 0, .2);
                       font-size: 16px;
                       color: white;
                       padding: 20px 45px 20px 20px;
                   }
           
                   .input-box input::placeholder {
                       color: white;
                   }
           
                   .input-box i {
                       position: absolute;
                       right: 20px;
                       top: 50%;
                       transform: translateY(-50%);
                       font-size: 20px;
                       color: white;
                       cursor: pointer;
                   }
           
                   .wrapper .btn {
                       width: 100%;
                       height: 45px;
                       background: #fff;
                       border: none;
                       outline: none;
                       border-radius: 40px;
                       box-shadow: 0 0 10px rgba(0, 0, 0, -1);
                       cursor: pointer;
                       font-size: 16px;
                       color: #333;
                       font-weight: 600;
                   }
           
                   .apalah{
                       overflow-y: auto;
                   }
               </style>
           </head>
           <body>
           <div class='main'>
               <div class='wrapper'>
                   <form action='postEvent.php' method='post' enctype='multipart/form-data'>
                       <h1>Edit Event</h1>
                       <div class='input-box'>
                           <input type='file' required name='poster1' value = '".$row['event_poster']."'>
                       </div>
                       <div class='input-box'>
                           <input type='text' placeholder='Title' required name='title' value = '".$row['event_name']."'>
                       </div>
                       <div class='input-box'>
                           <input type='datetime-local' required name='date&time' value = '".$row['date_time']."'>
                       </div>
                       <div class='input-box'>
                           <input type='text' placeholder='Location' required name='location' value = '".$row['location']."'>
                       </div>
                       <div class='input-box'>
                           <input type='text' placeholder='Description' required name='desc' class = 'apalah' value = '".$row['event_desc']."'>
                       </div>
                       <div class='input-box'>
                           <input type='text' placeholder='Ticket Link' required name='ticket' value = '".$row['ticket']."'>
                       </div>
                       <button type='submit' class='btn' name='edit'>Edit</button>
                   </form>
               </div>
           </div>
           </body>
           </html>
           ";
        }
    }
}
?>
