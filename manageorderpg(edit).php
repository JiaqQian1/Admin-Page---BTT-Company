<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Show Ticket Booking</title>
    <link rel="shortcut icon" href="./images/adminicon.png">
    <link rel="stylesheet" href="./css/manageorderpage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
<body>
    <?php
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'musicshow');

    $id = $_POST['id'];

    $query = "SELECT * FROM orderlist WHERE id=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_array($result)) {
    ?>
        <div class="container">
            <div class="jumbotron">
                <h2>Edit Order</h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']?>">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control" name="name" value="<?php echo $row['name']?>" required>

                    <label for="date">Date</label>
                    <input type="date" id="date" class="form-control" name="date" value="<?php echo $row['date']?>" required>

                    <label for="ticketdetails">Ticket Details</label>
                    <input type="text" id="ticketdetails" class="form-control" name="ticketdetails" value="<?php echo $row['ticketdetails']?>" required>

                    <label for="seat_number">Seat Number</label>
                    <input type="text" id="seat_number" class="form-control" name="seat_number" value="<?php echo $row['seat number']?>" required>

                    <button type="submit" name="edit" class="edit-button">Edit Order</button>

                    <a href="manageorderpg.php" class="button">Cancel</a>
                </form>
            </div>
        </div>

        <?php
        if (isset($_POST['edit'])) {
            $name = $_POST['name'];
            $date = $_POST['date'];
            $ticketdetails = $_POST['ticketdetails'];
            $seatnumber = $_POST['seat_number'];

            $query = "UPDATE orderlist SET name=?, date=?, ticketdetails=?, `seat number`=? WHERE id=?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "ssssi", $name, $date, $ticketdetails, $seatnumber, $id);

            if (mysqli_stmt_execute($stmt)) {
                echo '<script>alert("Edit order successfully!!!");</script>';
                header("location: manageorderpg.php");
            } else {
                echo '<script>alert("Error updating record: ' . mysqli_error($connection) . '");</script>';
                header("location: manageorderpg.php");
            }

            mysqli_stmt_close($stmt);
        }
    } else {
        echo '<script>alert("No record found!!!");</script>';
    }
    ?>
</body>
</html>
