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


        .styling{
            text-align: center;
            
        }

        th a{
            text-decoration: none;
            color: white;
        }

        th a:hover{
            text-decoration: underline;
        }

        
    </style>
</head>
<body>
    <h1>Admin Members</h1>
    <table >
        <tr>
            <th colspan = "2"  class = 'styling'>PICTURE</th>
        </tr>
        <tr>
            <th class = 'styling'><a href="Members/members.php">Members</a></th>
            <th class = 'styling'><a href="Member/member.php">Member</a></th>
        </tr>
    </table>
    <br><a href='../adminMain.html' class = 'apalah'>Back to Home</a>
</body>
</html>