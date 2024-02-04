<?php include("dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>
        ul.nav{
            padding-left: 0px;
            background-color: #3d99ce;
            text-align: center;
            font-size: larger;
            font-weight: bold;
        }
        ul.nav > li{
            display: inline-block;
            padding: 15px 35px;
        }
        ul.nav > li:hover{
            background-color: #2779bf;
        }
        ul.nav > li > a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <ul class="nav">
        <li><a href="min_minDashboard.php">Admin page</a></li>
        <li><a href="admin.php">Manage Product</a></li>
        <li><a href="admin(order).php">Manage Order</a></li>
        <li><a href="admin(user).php">Manage User</a></li>
        <li><a href="manage staff.php">Manage Staff</a></li>
    </ul>
</body>
</html>