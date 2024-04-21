<?php
   require_once('../koneksi.php');
   if (isset($_POST['sub'])) {
      $email = $_POST['email'];
      $sql = "SELECT email FROM users WHERE email = '$email'";
      $result = $conn->query($sql);
      
      if ($result) {
         if ($result->num_rows > 0) {
            $password = $_POST['newpass'];
            if (strlen($password) >= 8) {
               if (preg_match('/[A-Z]/', $password)) {
                   if (preg_match('/[a-z]/', $password)) {
                       if (preg_match('/[0-9]/', $password)) {
                        $sql1 = "Update users Set password = '$password' where email = '$email'";
                        $result1 = $conn->query($sql1);
                        if ($result1) {
                           echo "<script>alert('Password telah diupdate, silahkan Anda melakukan Log In');</script>";
                           echo "<script>window.location='login.php';</script>";
                           exit;
                        } else {
                           echo "Error updating record: " . $conn->error;
                        }
                       }else{
                           echo "<script>alert('Password harus memiliki setidaknya 1 ANGKA');</script>";
                           echo "<script>window.location='newPassword.php';</script>";
                           exit;
                       }
                   }else{
                       echo "<script>alert('Password harus memiliki setidaknya 1 HURUF KECIL');</script>";
                       echo "<script>window.location='newPassword.php';</script>";
                       exit;
                   }
               }else{
                   echo "<script>alert('Password harus memiliki setidaknya 1 HURUF BESAR');</script>";
                   echo "<script>window.location='newPassword.php';</script>";
                   exit;
               }
           }else{
               echo "<script>alert('Password min 8 karakter');</script>";
               echo "<script>window.location='newPassword.php';</script>";
               exit;
           }
         } else {
            echo "<script>alert('Email tidak ditemukan');</script>";
            echo "<script>window.location='newPassword.php';</script>";
            exit;
         }
     } else {
         echo "<script>alert('Terjadi kesalahan dalam eksekusi SQL: ' . $conn->error);</script>";
     }


      $result->close();
   }
?>