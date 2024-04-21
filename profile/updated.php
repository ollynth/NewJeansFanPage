<?php

    include_once("config.php");
  
   
    if(isset($_POST["update"])){
       
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
        $validImageExtention = ['jpg','jpeg','png'];
        $imageExtention = explode('.', $fileName);
        $imageExtention = strtolower(end($imageExtention));
    
        if(!in_array($imageExtention, $validImageExtention)){
            echo "input gambar jpg,jpeg,png";
        }
        else if ($fileSize > 16000000){
            echo "ukuran file terlalu besar";
        }
    
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtention;
        move_uploaded_file($tmpName,'profil/'.$newImageName);

        $id=$_POST['id'];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone =$_POST["phone"];
        $gender = $_POST["gender"];
        $password = $_POST["password"];
    
        $sql = "UPDATE `profil` SET username='$username', email='$email', phoneNum='$phone', gender='$gender', password='$password', profile_picture='$newImageName' WHERE id_fans='$id'";
        $sql2 = "UPDATE `users` SET username='$username', email='$email', phoneNum='$phone', gender='$gender', password='$password', profile_picture='$newImageName' WHERE id_fans='$id'";
        
        $result = mysqli_query($conn,$sql);
        $result2 = mysqli_query($conn,$sql2);
        if($result && $result2){
            echo "profile anda berasil diupdate";
        } 
        else{
            echo "profile gagal diganti";
        }

        //+30 hari = update profil lagi
        $currdate = new Datetime(date("Y-m-d"));
        $countdown = new Datetime(date("Y/m/d", strtotime("+30 days")));


        $interval = $currdate ->diff($countdown);
        if(($interval->d>30)){
            echo "<script>alert('Silakan cek kembali akun ada');</script>";
        }
        echo "<BR>";
        echo "<a href=insertData.php>Back</a>";
    }
   
?>