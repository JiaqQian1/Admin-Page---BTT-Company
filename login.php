<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $con = new mysqli("localhost", "root", "", "adminmusicshow");

    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $con->prepare("SELECT * FROM login WHERE email = ?");
    
    if (!$stmt) {
        die("Error in prepare statement: " . $con->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();

    // Get result set from the executed statement
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $data['password'])) {
            // Successful login
            echo '<script>alert("Login Successfully...");';
            echo 'window.location.href = "adminloginfrm.html";</script>';
        } else {
            // Incorrect password
            echo '<script>alert("Invalid Email or Password");';
            echo 'window.location.href = "adminloginfrm.html";</script>';
        }
    } else {
        // Email not found
        echo '<script>alert("Invalid Email or Password");';
        echo 'window.location.href = "adminloginfrm.html";</script>';
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $con->close();
}
?>