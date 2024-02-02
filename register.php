<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = new mysqli('localhost', 'root', '', 'adminmusicshow');
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        } else {
            // Check if the username already exists
            $checkStmt = $conn->prepare("SELECT * FROM login WHERE username = ?");
            $checkStmt->bind_param("s", $username);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                // Username already exists, show error message
                echo '<script>alert("Username already exists. Please choose a different username.");';
                echo 'window.location.href = "adminloginfrm.html";</script>';
            } else {
                // Continue with the registration process
                $stmt = $conn->prepare("INSERT INTO login (username, email, password) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $password);
                $stmt->execute();
                $stmt->close();

                // Redirect to login page after successful registration
                echo '<script>alert("Registration Successfully...");';
                echo 'window.location.href = "adminloginfrm.html";</script>';
            }

            $checkStmt->close();
            $conn->close();
        }
    }
?>
