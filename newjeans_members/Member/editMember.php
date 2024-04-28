<?php
require_once("koneksi.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * from nj_member where id = '$id'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
           echo "
           <!DOCTYPE html>
            <html>
            <head>
                <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'>
                <title>NewJeans Forum</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                        font-family: 'Popins', sans-serif;
                    }

                    .main {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                        background-image: url('dr_2709_HANNI.webp');
                        background-position: center;
                        background-attachment: fixed;
                        background-size: cover;
                    }

                    .wrapper {
                        width: 450px;
                        background: transparent;
                        border: 2px solid rgba(255, 255, 255, .2);
                        backdrop-filter: blur(20px);
                        color: white;
                        border-radius: 10px;
                        padding: 15px 20px;
                        margin: 20px;
                    }

                    .wrapper h1 {
                        font-size: 30px;
                        text-align: center;
                    }

                    .input-box {
                        position: relative;
                        width: 100%;
                        height: 30px;
                        margin: 30px 0;
                    }

                    .input-box input {
                        width: 100%;
                        height: 100%;
                        background: transparent;
                        border: none;
                        outline: none;
                        border: 2px solid rgba(255, 255, 255, .2);
                        border-radius: 40px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, .2);
                        font-size: 16px;
                        color: white;
                        padding: 20px 35px 20px;
                    }

                    .input-box input::placeholder {
                        color: white;
                    }

                    .input-box i {
                        position: absolute;
                        right: 20px;
                        top: 50%;
                        transform: translateY(-50%);
                        font-size: 20px;
                        color: white;
                        cursor: pointer;
                    }

                    .wrapper .btn {
                        width: 100%;
                        height: 45px;
                        background: #fff;
                        border: none;
                        outline: none;
                        border-radius: 40px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, -1);
                        cursor: pointer;
                        font-size: 16px;
                        color: #333;
                        font-weight: 600;
                    }

                    .apalah{
                        overflow-y: auto;
                    }
                </style>
            </head>
            <body>
            <div class='main'>
                <div class='wrapper'>
                    <form action='' method='post' enctype='multipart/form-data'>
                        <h1>Edit Members</h1>
                        <div class='input-box'>
                            <input type='text' required name='name' placeholder='Member's Name' value = '".$row['name_member']."'>
                            <input type='file' required name='pict' value = '".$row['member_pict']."'>
                        </div>
                        <button type='submit' class='btn' name='edit'>Edit</button>
                    </form>
                </div>
            </div>
            </body>
            </html>
            ";
        }
        
        if (isset($_POST['edit'])) {
            if ($_FILES['pict']['error'] === UPLOAD_ERR_OK) {
                $name = $_POST['name'];
                $edit = $_FILES['pict']['name'];
                
                $target_dir = "Member_Upload/";
                $target_file = $target_dir . basename($_FILES["pict"]["name"]);
                
                if (file_exists($target_file)) {
                    echo "<script>alert('Maaf, file sudah ada.');</script>";
                    echo "<script>window.location='editMember.php';</script>";
                } else {
                    if (move_uploaded_file($_FILES["pict"]["tmp_name"], $target_file)) {
                        $sql = "Update nj_member set member_pict = '$edit', name_member = '$name' where id = '$id'";
                        $result = $conn->query($sql);
                        if ($result) {
                            echo "<script>alert('Foto berhasil diubah');</script>";
                            echo "<script>window.location='member.php';</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    } else {
                        echo "<script>alert(Maaf, terjadi kesalahan saat mengunggah file.');</script>";
                    }
                }
            } else {
                echo "Maaf, terjadi kesalahan saat mengunggah file: " . $_FILES['poster1']['error'];
            }
        }
    }
}
?>
