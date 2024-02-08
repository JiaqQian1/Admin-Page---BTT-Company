<?php
// Database configuration
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "musicshow"; 

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
function getMembers($conn) {
    $query = "SELECT * FROM adminmember";
    $result = mysqli_query($conn, $query);
    $members = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $members[] = $row;
        }
    }
    return $members;
}

if(isset($_POST['addMember'])) {
    $memberID = $_POST['memberID'];
    $memberName = $_POST['memberName'];
    $memberLevel = $_POST['memberLevel'];
    $date = $_POST['date'];

    $query = "INSERT INTO adminmember (member_id, member_name, member_level, subscription_date) 
              VALUES ('$memberID', '$memberName', '$memberLevel', '$date')";

    if(mysqli_query($conn, $query)) {
        echo "Member added successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Edit member
if(isset($_POST['editMember'])) {
    $editedmemberID = $_POST['editmemberID'];
    $editedmemberName = $_POST['editmemberName'];
    $editedmemberLevel = $_POST['editmemberLevel'];
    $editedDate = $_POST['editdate'];

    $query = "UPDATE adminmember 
              SET member_name = '$editedmemberName', member_level = '$editedmemberLevel', subscription_date = '$editedDate' 
              WHERE member_id = '$editedmemberID'";

    if(mysqli_query($conn, $query)) {
        echo "Member updated successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Delete member
if(isset($_POST['deleteMember'])) {
    $memberID = $_POST['memberID'];

    $query = "DELETE FROM adminmember WHERE member_id = '$memberID'";

    if(mysqli_query($conn, $query)) {
        echo "Member deleted successfully!";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

if(isset($_POST['viewMember'])) {
    $memberID = $_POST['memberID'];

    $query = "SELECT * FROM adminmember WHERE member_id = '$memberID'";
    $result = mysqli_query($conn, $query);
    if($result) {
        $member = mysqli_fetch_assoc($result);
        echo "<script>";
        echo "alert('Member Details\\n\\n";
        echo "ID: " . $member['member_id'] . "\\n";
        echo "Name: " . $member['member_name'] . "\\n";
        echo "Level: " . $member['member_level'] . "\\n";
        echo "Date Subscription: " . $member['subscription_date'] . "');";
        echo "</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Shows Booking Ticket</title>
    <link rel="stylesheet" href="./css/manageMember.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <nav>
            <ul>    
                <li><a href="#" class="logo">
                    <img src="./images/logo.png">
                    <span class="nav-item">Admin</span>
                </a></li>

                <li>
                    <a href="./adminDashboard.html">
                        <i class="fa fa-tachometer" aria-hidden="true"></i>
                        <span class="nav-item">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="./manage staff.html">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="nav-item">Manage Staff</span>
                    </a>
                </li>

                <li>
                    <a href="./manageMemberpg.html">
                        <i class="fa fa-id-card" aria-hidden="true"></i>
                        <span class="nav-item">Manage Member</span>
                    </a>
                </li>

                <li>
                    <a href="./manage cus.html">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span class="nav-item">Manage Customer</span>
                    </a>
                </li>

                
        

            <li>
                <a href="./manageMemberpg.php">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="nav-item">Member</span>
                </a>
            </li>

            <li>
                <a href="./manageCategorypg.html">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                    <span class="nav-item">Categories</span>
                </a>
            </li>

            
            <li>
                <a href="./manageorderpg.html">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                    <span class="nav-item">Order</span>
                </a>
            </li>

            <li>
                <a href="./print.html">
                    <i class="fa fa-database" aria-hidden="true"></i>
                    <span class="nav-item">Report</span>
                </a>
            </li>

            <li>
                <a href="./adminloginfrm.html" class="logout">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span class="nav-item">Log Out</span>
                </a>
            </li>

        </ul>


        </nav>

        <section class="main">
            <div class="main-top">
                <h1>Member</h1> 
                <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>


            <div class="main-box">
                <div class="box">
                    <div class="box-inner">
                        <h3>BASE</h3>
                    </div>
                    <h1>Plan RM59.90</h1>
                </div>
                
                <div class="box">
                    <div class="box-inner">
                        <h3>Standard</h3>
                    </div>
                    <h1>Plan RM99.90</h1>
                </div>
    
                <div class="box">
                    <div class="box-inner">
                        <h3>Premium</h3>
                    </div>
                    <h1>Plan RM129.90</h1>
                </div>
            </div>
        
        <section class="Member">
            <div class="Member-list">
                <div class="add-button-container">
                    <button class="add-button" onclick="openAddMemberModal()">ADD</button>
                </div>
                <h1>Membership List</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Membership Name</th>
                            <th>Level</th>
                            <th>Date Subscription</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php
            // Fetch members from the database and display in the table
            $members = getMembers($conn);
            foreach ($members as $member) {
                echo "<tr>";
                echo "<td>" . $member['member_id'] . "</td>";
                echo "<td>" . $member['member_name'] . "</td>";
                echo "<td>" . $member['member_level'] . "</td>";
                echo "<td>" . $member['subscription_date'] . "</td>";
                echo "<td>";
                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                echo "<input type='hidden' name='memberID' value='" . $member['member_id'] . "'>";
                echo "<div class='button-grp'>";
                echo "<button type='submit' name='viewMember' class='view-button'>VIEW</button>";
                echo "</form>";
                echo "<button type='button' class='edit-button' onclick=\"openEditModal('" . $member['member_id'] . "', '" . $member['member_name'] . "', '" . $member['member_level'] . "', '" . $member['subscription_date'] . "')\">EDIT</button>";
                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                echo "<input type='hidden' name='memberID' value='" . $member['member_id'] . "'>";
                echo "<button type='submit' name='deleteMember' class='delete-button'>DELETE</button>";
                echo "</div>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
                    </tbody>
                </table>

            </div>
        </section>


    </div>


    <div id="addMemberModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('addMemberModal')">&times;</span>
            <h2>Add New Member</h2>
            <br>
            <form id="addMemberForm" action="" method="post" >
                <label for="memberID">ID:</label>
                <input type="text" id="memberID" name="memberID" required>
                <br>
                <label for="memberName">Member Name:</label>
                <input type="text" id="memberName" name="memberName" required>
                <br>
                <label for="memberLevel">Level:</label>
                <input type="text" id="memberLevel" name="memberLevel" required>
                <br>
                <label for="date">Date:</label>
                <input type="text" id="date" name="date" required>
               <br>
               <br>
                <button type="submit" name="addMember" >Add Member</button>
            </form>
        </div>
    </div>

    <div id="editMemberModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editMemberModal')">&times;</span>
        <h2>Edit Member</h2>
        <form id="editMemberForm" action="" method="post">
            <input type="hidden" id="editmemberID" name="editmemberID" required>
            <label for="editmemberName">Member Name:</label>
            <input type="text" id="editmemberName" name="editmemberName" required>
            <label for="editmemberLevel">Level:</label>
            <input type="text" id="editmemberLevel" name="editmemberLevel" required>
            <label for="editdate">Date:</label>
            <input type="text" id="editdate" name="editdate" required>
            <button type="submit" name="editMember">Save Changes</button>
        </form>
    </div>
</div>



    <script src="./js/manageMember.js"></script>
    
</body>
</html>

<?php 
     mysqli_close($conn); // Close the database connection
     ?>