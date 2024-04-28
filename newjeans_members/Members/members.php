<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin Members</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        h1 {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        a {
            color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            color: black;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #555;
        }

        td img{
            width: 300px;
        }

        .styling{
            text-align: center;
        }

        h3{

            text-align: center;
        }

        h3 a{
            text-decoration: none;
            color: #333;
        }

        h3 a:hover{
            text-decoration: underline;
        }

        td a{
            text-decoration: none;
            color: #333;
        }

        td a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1><a href="../library_picture.php">Admin Members</a></h1>
    <h3><a href="addMembers.php" class = 'styling'>Add New</a></h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Picture</th>
            <th>Option</th>
        </tr>
        <?php
            session_start();
            require_once 'koneksi.php';
            $sql = " SELECT * FROM nj_members";
            $result = $conn->query($sql);
            if ($result){
                while ($row = $result->fetch_assoc()){
                    echo "
                        <tr>
                            <td>".$row['id']."</td>
                            <td><img src = 'Members_Upload/" . $row['member_pict'] . "' alt = 'hehe'></td>
                            <td><a href = 'editMembers.php?id=".$row['id']."' class = 'styling'>Edit</a> <a href = 'deleteMembers.php?id=".$row['id']."' class = 'styling'>Delete</a></td>
                        </tr>
                    ";
                }
            }
        ?>
    </table>
    <br><a href='../library_picture.php'>Back to Home</a>
</body>
</html>