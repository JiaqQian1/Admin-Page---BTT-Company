<?php include("db onnection.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Staff</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<?php
include("header(admin).php");
?>

<div style="margin:auto; border: 1px; width: 750px; padding: 10px; border-radius: 10px;">
    <br><h1 style="text-align: center;">Staff List</h1>
    <hr><br>
    <div><?php include("menu_staff.php"); ?></div>
    <table style="width: 100%;">
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Role</th>
        <th>Action</th>
        </tr>

        <?php
        $result = mysqli_query($connect, "select * from staff");
        $count = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td><?php echo $row['staff_id']; ?></td>
                <td><?php echo $row['staff_name']; ?></td>
                <td><?php echo $row['staff_role']; ?></td>
                <td><a href="staff(edit).php?edit&staffid=<?php echo $row['staff_id']; ?>">Edit</a></td>
            </tr>

        <?php
        }
        ?>
    </table>
</div>

</body>
</html>
