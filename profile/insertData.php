<html> 
    <h1>User Profile</h1>

<?php
    session_start();

    $username = $_SESSION['name'];
    include_once("config.php");

    if(isset($_SESSION["name"])){
        
        $id = "SELECT id_fans FROM profil WHERE username = '$username'";
        $queryID = mysqli_query($conn,$id);
        $row = mysqli_fetch_assoc($queryID);

        $sql = "SELECT * FROM profil WHERE id_fans = '$row[id_fans]'";
        
        $result = mysqli_query($conn,$sql);
        
        while($row = mysqli_fetch_assoc($result)){
            $profile = $row['profile_picture'];
            echo "<img src='profil/$profile' width = 60px height=50px;>" ."<br>";
            echo "username : " . ($row['username'] ?? '-') . "<br>";
            echo "Email : " .($row['email'] ?? '-') . "<br>";
            echo "Phone Number : " .($row['phoneNum'] ?? '-') . "<br>";
            echo "Gender : " .($row['gender'] ?? '-') . "<br>";
            echo "Password : " .($row['password'] ?? '0') . "<br>";         
        }
        echo "<a href = 'updateProfile.php?id=$id'>Update your profile</a>";     
    }
    
?>

</html>