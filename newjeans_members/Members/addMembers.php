<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <title>NewJeans Forum</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Popins", sans-serif;
        }

        .main {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-image: url("dr_2709_HANNI.webp");
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
<div class="main">
    <div class="wrapper">
        <form action="postMembers.php" method="post" enctype="multipart/form-data">
            <h1>Add Members</h1>
            <div class="input-box">
                <input type="file" required name="pict">
            </div>
            <button type="submit" class="btn" name="sub">Post</button>
        </form>
    </div>
</div>
</body>
</html>
