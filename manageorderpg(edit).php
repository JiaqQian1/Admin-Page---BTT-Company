<?php
require_once 'db.php';
require_once 'function.php';

$result = display_data();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Shows Booking Ticket</title>
    <link rel="shortcut icon" href="./images/adminicon.png">
    <link rel="stylesheet" href="./css/manageorderpage.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div id="wrapper">

        <div id="left">
            <?php include("manageorderpg.php"); ?>
        </div>

        <div id="right">
            <h1>Edit an Order</h1>

            <?php
            if (isset($_GET["edit"])) {
                $editOrderId = $_GET["edit"];

                $stmt = mysqli_prepare($connect, "SELECT * FROM orderlist WHERE id = ?");
                mysqli_stmt_bind_param($stmt, "i", $editOrderId);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_assoc($result);
            ?>

                <form name="editOrderForm" method="post" action="">

                    <p><label>ID:</label><input type="text" name="editOrderId" size="10" value="<?php echo $row['id']; ?>" readonly>

                    <p><label>Name:</label><input type="text" name="editName" size="80" value="<?php echo $row['name']; ?>">

                    <p><label>Date:</label><input type="text" name="editOrderDate" size="10" value="<?php echo $row['date']; ?>">

                    <p><label>Ticket Details:</label><textarea cols="60" rows="4" name="editTicketDetails"><?php echo $row['ticketdetails']; ?></textarea>

                    <p><label>Seat Number:</label><input type="text" name="editNumber" size="10" value="<?php echo $row['seat number']; ?>">

                    <p><input type="submit" name="savebtn" value="UPDATE ORDER">

                </form>
            <?php
            }
            ?>
        </div>

    </div>

    <?php include("db.php"); ?>

    <?php
    if (isset($_POST["savebtn"])) {
        $editOrderId = $_POST["editOrderId"];
        $editName = $_POST["editName"];
        $editOrderDate = $_POST["editOrderDate"];
        $editTicketDetails = $_POST["editTicketDetails"];
        $editNumber = $_POST["editNumber"];

        $stmt = mysqli_prepare($connect, "UPDATE orderlist SET name=?, date=?, ticketdetails=?, `seat number`=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, "ssssi", $editName, $editOrderDate, $editTicketDetails, $editNumber, $editOrderId);

        if (mysqli_stmt_execute($stmt)) {
            echo "Order Updated Successfully";
        } else {
            echo "Error updating order: " . mysqli_error($connect);
        }

        mysqli_stmt_close($stmt);
    }
    ?>

    <script src="./js/manageorder.js"></script>
</body>

</html>
