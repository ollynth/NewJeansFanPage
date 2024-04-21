<?php
    require_once("../koneksi.php");
   
    if(isset($_POST["update"])){
        $id=$_POST['id'];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $phone =$_POST["phone"];
        $gender = $_POST["gender"];
        $password = $_POST["password"];
        // up gambar
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $newPict = $_FILES['image']['name'];
            
            $target_dir = "upload_profile/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $sql2 = "UPDATE users SET username='$username', passwords='$password' WHERE id='$id'";
                $sql = "UPDATE fans SET email='$email', phone_number='$phone', gender='$gender', profile_picture='$newPict' WHERE id='$id'";
                
                $result = mysqli_query($conn,$sql);
                $result2 = mysqli_query($conn,$sql2);
                if($result && $result2){
                    echo "<script>alert('Kamu Telah Memperbarui Profil');</script>";
                    echo "<script>window.location='updateProfile.php';</script>";
                } 
                else{
                    echo "profile gagal diganti";
                }

                if ($result) {
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert(Maaf, terjadi kesalahan saat mengunggah file.');</script>";
            }
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