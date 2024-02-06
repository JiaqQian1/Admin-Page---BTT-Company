<?php
include("db.php");

if (isset($_GET["edit"])) {
    $id = $_GET["id"];
    $result = mysqli_query($connect, "select * from orderlist where id = $id");
    $row = mysqli_fetch_assoc($result);
}
?>

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

        <?php
        if (isset($_GET["edit"])) {
        ?>
            <h1>Edit Order</h1>

            <form name="addfrm" method="post" action="">
                <p><label>Name</label><input type="text" name="username" size="80" value="<?php echo $row['username']; ?>"></p>
                <p><label>Date</label><input type="text" name="date" size="10" value="<?php echo $row['date']; ?>"></p>
                <p><label>Ticket Details</label><textarea cols="60" rows="4" name="ticketdetails"><?php echo $row['ticketdetails']; ?></textarea></p>
                <p><label>Seat Number</label><input type="text" name="seatnumber" value="<?php echo $row['seat number']; ?>"></p>
                <p><input type="submit" name="savebtn" value="UPDATE Order"></p>
            </form>
        <?php
        }
        ?>
    </div>

</div>

</body>
</html>

<?php
if (isset($_POST["savebtn"])) {
    $id = $_GET["id"];
    $username = $_POST["username"];
    $date = $_POST["date"];
    $ticket = $_POST["ticketdetails"];
    $seat = $_POST["seatnumber"];

    mysqli_query($connect, "update orderlist set username='$username', date='$date', ticketdetails='$ticket', `seat number`='$seat' where id=$id");
    ?>
    <script type="text/javascript">
        alert("Order Updated");
    </script>
    <?php
    header("refresh:0.5; url=manageorder(edit).php");
}
?>
