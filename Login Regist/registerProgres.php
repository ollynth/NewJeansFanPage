<?php
   session_start();
   if(isset($_POST['sub'])){
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['password'] = $_POST['password'];

    header("Location: registerProgresPart2.php");
    exit();
   }
?>