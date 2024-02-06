<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'musicshow');

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM orderlist WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);



?>