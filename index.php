<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ");
}

if (isset($_SESSION['user_id'])) {
    header("Location: fansMain.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NewJeans Forum</title>
    </head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&family=Pixelify+Sans:wght@400..700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Jersey+10&family=Pixelify+Sans:wght@400..700&display=swap');
        *{
            margin:0;
            padding:0;
            text-decoration: none;
        }

        .main{
            width: 100%;
            height: 100vh;
            background-image: url("Picture/dr_2709_HANNI.webp");
            background-size: cover;
            background-position: center;
        }

        .navbar{
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        img{
            width: 35%;
            cursor: pointer;
        }

        .content{
            top: 50%;
            width: 100%;
            text-align: center;
            position: absolute;
            transform: translateY(-50px);
            
        }

        .content h1{
            font-size: 80px;
            margin-top: 80px;
            /* font-family: "Caveat Brush", cursive; */
            font-family: "Pixelify Sans", sans-serif;
            font-weight: 400;
            font-style: normal;
            background: -webkit-linear-gradient(#eee, #9af658);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .content p{
            margin: 20px auto;
            font-weight: 100px;
            line-height: 25px;
            font-size: 50px;
            font-family: "Jersey 10", sans-serif;
            background: -webkit-linear-gradient(#eee, #59c3f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        button{
            width: 100px;
            margin: 20px 10px;
            padding: 15px 0;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            color: white;
            background-color: indigo;
            border: 3px solid white;
            position: relative;
            cursor: pointer;
            border-radius: 10px;
            overflow: hidden;
        }

        span{
            height: 100%;
            width: 0;
            left: 0;
            bottom: 0;
            z-index: -1;
            position: absolute;
            border-radius: green;
            transition: 0.5s;
        }

        button:hover span{
            width: 100%;
        }

        button:hover{
            border:none;
        }

        @keyframes bounce {
            0% {
                transform: translateY(-50px);
            }
            50% {
                transform: translateY(0);
            }
            100% {
                transform: translateY(-50px);
            }
        }

        .content h1, .content p {
            animation: bounce 2s 0.5; /* Mengatur iterasi animasi menjadi 1 kali */
        }
    </style>
    <body>
        <div class="main">
            <div class="navbar">
                <a href="index.html"><img src="Picture/web-logo_052245.png" alt="ga ada gambarnya hehe:>"></a>
                <ul>
                    <a href="Login Regist/login.php"><button type="button">Login</button></a>
                    <a href="Login Regist/register.php"><button type="button">Register</button></a>
                </ul>
            </div>
            <div class="content">
                <h1>Welcome Bunnies</h1>
                <p>"Maybe you could be the one"</p>
            </div>
        </div>
    </body>
</html>
