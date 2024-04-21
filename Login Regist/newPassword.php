<!DOCTYPE html>
<html>
    <head>
        <link rel = "stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
        <title>NewJeans Forum</title>
    </head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Popins",sans-serif;
        }

        .main{
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url("../Picture/dr_2709_HANNI.webp");
            background-position: center;
            background-attachment: fixed;
            background-size: cover;   
        }

        .wrapper{
            width: 420px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, .2);
            backdrop-filter: blur(20px);
            color: white;
            border-radius: 10px;
            padding: 30px 40px;
        }

        .wrapper h1{
            font-size: 40px;
            text-align: center;
        }

        .wrapper .input-box{
            position: relative;
            width:100%;
            height: 50px;
            margin: 30px 0;
        }

        /* .navbar{
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            align-items: center;
            justify-content: flex-start; 
            background: transparent;
        }    

        img{
            width: 35%; 
            cursor: pointer;
        } */

        .input-box input{
            width: 100%;
            height: 100%;
            right: 20px;
            background: transparent;
            border: none;
            outline: none;
            border: 2px solid rgba(255, 255, 255, .2);
            border-radius: 40px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            font-size: 16px;
            color: white;
            padding: 20px 45px 20px 20px;
        }

        .input-box input::placeholder{
            color: white;
        }

        .input-box i{
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
        }

        .wrapper .btn{
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

        .wrapper .register-link{
            font-size: 14.5px;
            text-align: center;
            margin: 20px 0 15px;
        }

        .register-link p a{
            color: #fff;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link p a:hover{
            text-decoration: underline;
        }

        .toggle-password {
            position: absolute;
            right: 0px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 20px;
            cursor: pointer;
        }

        .toggle-password i {
            font-size: 1.3em;
        }
    </style>
    <body>
        <div class="main">
            <!-- <div class="navbar">
                <a href="index.php"><img src="../Picture/web-logo_052245.png" alt="ga ada gambarnya hehe:>"></a>
            </div> -->
            <div class="wrapper">
                <form action="forgotPassword.php" method = "post">
                    <h1>Forgot Password?</h1>
                    <div class="input-box">
                        <input type="email" placeholder="Email" required name = "email">
                        <i class='bx bxs-envelope'></i>
                    </div>
                    <div class="input-box">
                        <input type="password" placeholder="New Password" required name = "newpass" id = "password">
                        <span toggle="#password" class="toggle-password"><i class='bx bxs-show'></i></span>
                    </div>
                    <button type = "submit" class="btn" name = "sub">Send</button>
                    <div class="register-link">
                        <p>Remember your password? <a href="login.html">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const togglePassword = document.querySelector('.toggle-password');
            const passwordField = document.querySelector('#password');

            togglePassword.addEventListener('click', function () {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.querySelector('i').classList.toggle('bxs-show');
                this.querySelector('i').classList.toggle('bxs-hide');
            });
        </script>
    </body>
</html>