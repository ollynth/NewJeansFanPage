<?php
   session_start();
   require_once('../koneksi.php');
   if(isset($_SESSION['username'])){
       $username = $_SESSION['username'];
       $email = $_SESSION['email'];
       $password = $_SESSION['password'];

       $sql = "SELECT username From users Where username = '$username'";
       $result = $conn->query($sql);

       if ($result) {
            if ($result->num_rows < 1) {
                // $sql1 = "SELECT email From users Where email = '$email'";
                $sql1 = "SELECT email From fans Where email = '$email'";
                $result1 = $conn->query($sql1);
                if ($result1) {
                    if ($result1->num_rows < 1) {
                        if (strlen($password) >= 8) {
                            if (preg_match('/[A-Z]/', $password)) {
                                if (preg_match('/[a-z]/', $password)) {
                                    if (preg_match('/[0-9]/', $password)) {
                                        // $sql2 = "INSERT INTO users(username, email, password, role) VALUES ('$username','$email','$password','User');";
                                        $sql2 = "INSERT INTO users(username, passwords) VALUES ('$username','$password');";
                                        
                                        $result2 = $conn->query($sql2);
                                        if($result2){
                                            $userId = $conn->insert_id;                            
                
                                            $sql3 = "INSERT INTO fans(id, email) VALUES ('$userId', '$email')";
                                            $result3 = $conn->query($sql3);
                                            
                                            if ($result3) {
                                                echo "<script>alert('Akun berhasil ditambahkan');</script>";
                                            } else {
                                                echo "<script>alert('Gagal membuat akun');</script>";
                                            }

                                            echo "<script>alert('Akun berhasil ditambahkan');</script>";
                                            header("Location : login.html");
                                            exit();
                                        }
                                    }else{
                                        echo "<script>alert('Password harus memiliki setidaknya 1 ANGKA');</script>";
                                        echo "<script>window.location='register.html';</script>";
                                        exit;
                                    }
                                }else{
                                    echo "<script>alert('Password harus memiliki setidaknya 1 HURUF KECIL');</script>";
                                    echo "<script>window.location='register.html';</script>";
                                    exit;
                                }
                            }else{
                                echo "<script>alert('Password harus memiliki setidaknya 1 HURUF BESAR');</script>";
                                echo "<script>window.location='register.html';</script>";
                                exit;
                            }
                        }else{
                            echo "<script>alert('Password min 8 karakter');</script>";
                            echo "<script>window.location='register.html';</script>";
                            exit;
                        }
                    }else{
                        echo "<script>alert('Email yang diinput sudah digunakan');</script>";
                        echo "<script>window.location='register.html';</script>";
                        exit;
                    }
                }
            }else{
                echo "<script>alert('Username yang diinput sudah digunakan');</script>";
                echo "<script>window.location='register.html';</script>";
                exit;
            }
        }else {
            echo "<script>alert('Terjadi kesalahan dalam eksekusi SQL: ' . $conn->error);</script>";
        }
    }
    $result->close();
       
?>