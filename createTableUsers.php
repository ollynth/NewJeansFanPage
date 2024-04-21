<?php    
    $con = mysqli_connect("localhost", "root","", "login_regist"); 
	if (mysqli_connect_errno()) {
	    echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	$sql = "CREATE TABLE Users(
	    id_fans INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		username VARCHAR(255) NOT NULL,
		email VARCHAR(255) NULL,
		phoneNum Int(100) Null,
		gender enum('M','F') Null,
		password VARCHAR(255) NOT NULL,
		profile_picture mediumblob NULL,
		role enum('User','Admin') Not Null
		);
		";
			
	if (mysqli_query($con, $sql)) {
		echo "Table created successfully";
	} else {
		echo "Error creating database:".mysqli_error($con);
	}
	mysqli_close($con);
?>