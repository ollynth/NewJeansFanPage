<html>

    <?php
       session_start();
       $username = $_SESSION['name'];
       include_once("config.php");
       $id = "SELECT id_fans FROM profil WHERE username = '$username'";
       $queryID = mysqli_query($conn,$id);
       $row = mysqli_fetch_assoc($queryID);

       $sql = "SELECT * FROM profil WHERE id_fans = '$row[id_fans]'";  
       $result = mysqli_query($conn,$sql);
       $row = mysqli_fetch_assoc($result);  
    ?>

    <form method = "post" action ="updated.php" enctype="multipart/form-data">
        <input type ="hidden" name="id" value=<?php echo $row['id_fans']?>>
        Username:
        <input type ="text" name ="username" value=<?php echo $row['username']?>><br>
        email : <br> 
        <input type = "text" name="email" value =<?php echo $row['email']?>><br>
        Phone number : <br> 
        <input type = "text" name="phone" value =<?php echo $row['phoneNum']?>><br>
        Gender : <br> 
        <input type = "text" name="gender" value =<?php echo $row['gender']?>><br>
        Password : <br> 
        <input type = "text" name="password" value =<?php echo $row['password']?>><br>
        Profile picture : <br> 
        <input type = "file" name="image" id="image"><br>
        <input type = "submit" name="update" value ="Update Profile"> <br>
    </form>

</html>