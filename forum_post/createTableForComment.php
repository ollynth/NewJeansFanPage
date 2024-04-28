<?php
require '../koneksi.php';

$sql_post = "CREATE TABLE IF NOT EXISTS comment(
    id_comment INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(id_comment),
    id_post INT NOT NULL,
    comments VARCHAR(255),
    id_fans INT NOT NULL
    );";

if ($conn->query($sql_post)) {
    echo "Tabel Comment berhasil dibuat!";
}else{
    echo "Tabel Comment gagal dibuat!";
}
?>