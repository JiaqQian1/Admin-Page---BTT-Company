<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicshow";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection error!!! " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $adminemail = $_POST["adminemail"];
    $newadminpassword = $_POST["newadminpassword"];


    $checkEmailQuery = "SELECT * FROM adminloginp WHERE adminemail = '$adminemail'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows > 0) {

        $sql = "UPDATE adminloginp SET adminpassword = '$newadminpassword' WHERE adminemail = '$adminemail'";

        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Reset Password Successfully!!!");';
            echo 'window.location.href = "adminloginfrm.html";</script>';
        } else {
            echo '<script>alert("Reset Password Failed...");';
            echo 'window.location.href = "loginform.html";</script>';
        }
    } else {

        echo '<script>alert("Invalid Email. Please enter a valid email address.");';
        echo 'window.location.href = "resetpass.php";</script>';
    }
}

$conn->close();
?>
