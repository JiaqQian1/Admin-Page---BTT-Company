<?php 
$con = mysqli_connect("localhost", "root", "", "musicshow");

if(!$con) {
   die("Connection error: " . mysqli_connect_error());
}

// Add Category function
if(isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];
    $productNames = $_POST['productNames'];

    // Insert category into database
    $sql = "INSERT INTO categories (categoryName, productNames) VALUES ('$categoryName', '$productNames')";
    if (mysqli_query($con, $sql)) {
        echo "Category added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Edit Category function
if(isset($_POST['editCategory'])){
    $categoryId = $_POST['categoryID'];
    $categoryName = $_POST['categoryName'];
    $productNames = $_POST['productNames'];

    // Update category in the database
    $sql = "UPDATE categories SET categoryName='$categoryName', productNames='$productNames' WHERE categoryID='$categoryId'";
    if (mysqli_query($con, $sql)) {
        echo "Category updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}



// Delete Category function
if(isset($_POST['deleteCategory'])) {
    $categoryID = $_POST['categoryID'];

    // Delete category from database
    $sql = "DELETE FROM categories WHERE categoryID='$categoryID'";
    if (mysqli_query($con, $sql)) {
        echo "Category deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Function to retrieve categories from the database
function getCategories($con) {
    $query = "SELECT * FROM categories ";
    $result = mysqli_query($con, $query);
    $categories = [];

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $categories[] = $row;
        }
    }
    return $categories;
}

// Get categories after actions
$category = getCategories($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Shows Booking Ticket</title>
    <link rel="shortcut icon" href="./images/adminicon.png">
    <link rel="stylesheet" href="./css/manageCategory.css">
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
                    <a href="./manageMemberpg.php">
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
                <a href="./manageProductpg.html">
                    <i class="fa fa-archive" aria-hidden="true"></i>
                    <span class="nav-item">Product</span>
                </a>
            </li>

            <li>
                <a href="./manageCategorypg.php">
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
                <h1>Category</h1> 
                <i class="fa fa-cogs" aria-hidden="true"></i>
            </div>
        
  
        <section class="category">
            <div class="category-list">
                <h1>Category List</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Product Name(s)</th>
                            <th>Action</th>
                        </tr>
                    </thead>


                    <tbody>
                    <?php
                      // Display categories
                        foreach ($category as $categories) {
                        echo "<tr>";
                        echo "<td class='CategoryId'>" . $categories["categoryID"] . "</td>";
                        echo "<td class='categoryName'>" . $categories["categoryName"] . "</td>";
                        echo "<td class='productName'>" . $categories["productNames"] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action=''>";
                        echo "<input type='hidden' name='categoryID' value='" . $categories["categoryID"] . "'>";
                        echo "<input type='hidden' name='categoryName' value='" . $categories["categoryName"] . "'>";
                        echo "<input type='hidden' name='productNames' value='" . $categories["productNames"] . "'>";
                        echo "<button type='button' onclick='editCategory(" . $categories["categoryID"] . ", \"" . $categories["categoryName"] . "\", \"" . $categories["productNames"] . "\")'>Edit</button>";
                        echo "<button type='submit' name='deleteCategory'>Delete</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                      }
                        ?>

                    </tbody>
                </table>
           


                <form id="addCategoryForm" method="post" action="">
                        <input type="hidden" name="addCategory" value="true">
                        <label for="categoryName">Category Name:</label>
                        <input type="text" id="categoryName" name="categoryName" required>
                        <label for="productNames">Product Name(s) (eg:Pencil,Eraser):</label>
                        <input type="text" id="productNames" name="productNames" required>
                        <button type="submit" onclick="addCategory()">Add Category</button>
                </form>
         </div>
        </section>
        </section>





    <script src="./js/manageCategory.js"></script>
</div>
</body>
</html>

<?php 
     mysqli_close($con); // Close the database connection
     ?>