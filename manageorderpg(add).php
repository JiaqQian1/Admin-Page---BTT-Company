<?php
require_once 'db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $date = $_POST["date"];
    $ticketDetails = $_POST["ticketdetails"];
    $seatNumber = $_POST["seat_number"];

    $query = "INSERT INTO `orderlist` (`name`, `date`, `ticketdetails`, `seat number`) 
              VALUES ('$name', '$date', '$ticketDetails', '$seatNumber')";
    
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: manageorderpg.php"); 
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order Information</title>
    <link rel="shortcut icon" href="./images/adminicon.png">
    <link rel="stylesheet" href="./css/manageorderpage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            flex-direction: column;
        }

        form {
            width: 300px; 
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
        }

        input {
            margin-bottom: 10px;
            padding: 5px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Add Order Information</h1>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" autocomplete="off" required>

        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required>

        <label for="ticketdetails">Ticket Details:</label>
        <input type="text" id="ticketdetails" name="ticketdetails" autocomplete="off" required>

        <label for="seat_number">Seat Number:</label>
        <input type="text" id="seat_number" name="seat number" autocomplete="off" required>

        <button type="submit">Add Order</button>
    </form>
</body>
</html>

