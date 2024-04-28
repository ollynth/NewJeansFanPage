<?php
    require_once 'koneksi.php';
    $sql = "CREATE TABLE nj_members(
        id INT PRIMARY KEY AUTO_INCREMENT,
        member_pict varchar(255) Not NULL
    );";

    if (mysqli_query($conn, $sql)) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: ". mysqli_error($conn);
    }
    mysqli_close($conn);
?>