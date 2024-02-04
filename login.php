<?php
     $email = $_POST['adminemail'];
     $password = $_POST['adminpassword'];

     $con = new mysqli("localhost", "root", "", "musicshow");

     if($con->connect_error)
     {
        die("Failed to connect: ".$con->connect_error);
     }
     else
     {
        $stmt = $con->prepare("select * from adminloginp where adminemail = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0)
        {
            $data = $stmt_result->fetch_assoc();    
            if($data['adminpassword'] === $password)
            {
                echo '<script>alert("Login Successfully!!!");';
                echo 'window.location.href = "index.html";</script>';
            }
            else
            {
                echo '<script>alert("Invalid username and password...");';
                echo 'window.location.href = "adminloginfrm.html";</script>';
            }
        }
        else{
            echo '<script>alert("Invalid username and password...");';
                echo 'window.location.href = "loginform.html";</script>';
        }
     }
?>