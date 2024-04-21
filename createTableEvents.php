<?php    
    $con = mysqli_connect("localhost", "root","", "login_regist"); 
	if (mysqli_connect_errno()) {
	    echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
	$sql = "CREATE TABLE events(
	    id_event INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
		event_name VARCHAR(100) NOT NULL,
		date_time Datetime NOT NULL,
		location VARCHAR(100) Not Null,
		event_desc Varchar(300) Not Null,
		ticket VARCHAR(300) Not null,
		event_poster VARCHAR(255) Null
		);
		";
			
	if (mysqli_query($con, $sql)) {
		echo "Table created successfully";
	} else {
		echo "Error creating database:".mysqli_error($con);
	}
	mysqli_close($con);
?>