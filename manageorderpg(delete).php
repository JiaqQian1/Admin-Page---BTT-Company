<?php

$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, 'musicshow');

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM orderlist WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script> alert("Order deleted successfully");</script>';
        header("location: manageorderpg.php");
    } else {
        echo '<script> alert("Order deletion error");</script>';
        header("location: manageorderpg.php");
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}


?>