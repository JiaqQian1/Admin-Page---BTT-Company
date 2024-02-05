<?php
        /*require_once('db.php');
        $query = "select * from orderlist";
        $result = mysqli_query($con, $query);
        
        */

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
            <div class="container">
                <nav>
                    <ul>     
                        <li> <a href="#" class="logo">
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
                        <a href="./manageProductpg.html">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            <span class="nav-item">Product</span>
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
                        <h1>Order</h1>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                    </div>
    
    
                <section class="order">
                    <div class="order-list">
                    <div class="add-button-container">
                        <a class="add-button" href="manageorderpg(add).php" onclick="openAddOrder()">ADD</a>
                    </div>

                        <h1>Order List</h1>
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Date</td>
                                    <td>Ticket Details</td>
                                    <td>Seat Number</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id'];?></td>
                                <td><?php echo $row['name'];?></td>
                                <td><?php echo $row['date'];?></td>
                                <td><?php echo $row['ticketdetails'];?></td>
                                <td><?php echo $row['seat number'];?></td>
                                <td>
                                    <button class="view-button" onclick="openViewModal('<?php echo $row['id']; ?>', '<?php echo $row['name']; ?>', '<?php echo $row['date']; ?>', '<?php echo $row['ticketdetails']; ?>', '<?php echo $row['seat number']; ?>')">View</button>
                                        <button class="edit-button" onclick="openEditModal('<?php echo $row['id']; ?>', '<?php echo $row['name']; ?>', '<?php echo $row['date']; ?>', '<?php echo $row['ticketdetails']; ?>', '<?php echo $row['seat number']; ?>')">Edit</button>
                                        <button class="delete-button" onclick="deleteOrder('<?php echo $row['id']; ?>')">Delete</button>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                            
                        <div id="viewOrder" class="List">
                        <div class="order-content">
                            <span class="close" onclick="closeList('viewOrder')">&times;</span>
                            <h2>Order Details</h2>
                            <p><strong>ID:</strong> <span id="viewOrderId"></span></p>
                            <p><strong>Name:</strong> <span id="viewName"></span></p>
                            <p><strong>Date:</strong> <span id="viewOrderDate"></span></p>
                            <p><strong>Ticket Details:</strong> <span id="viewTicketDetails"></span></p>
                            <p><strong>Seat Number:</strong> <span id="viewNumber"></span></p>
                        </div>
                    </div>
                            
    
    
                          
        
            <div id="editOrder" class="List">
                <div class="order-content">
                    <span class="close" onclick="closeList('editOrder')">&times;</span>
                    <h2>Edit</h2>
                    <form id="editOrderForm">
                        <label for="editOrderId">ID:</label>
                        <input type="text" id="editOrderId" name="editOrderId" required>
            
                        <label for="editName">Name:</label>
                        <input type="text" id="editName" name="editName" required>
            
                        <label for="editOrderDate">Date:</label>
                        <input type="text" id="editOrderDate" name="editOrderDate" required>
            
                        <label for="editTicketDetails">Ticket Details:</label>
                        <input type="text" id="editTicketDetails" name="editTicketDetails" required>
    
                        <label for="editNumber">Seat Number:</label>
                        <input type="text" id="editNumber" name="editNumber" required>
            
                        <button type="button" onclick="saveEditedModal()">Save Changes</button>
                    </form>
                </div>
            </div>
            </section>
            </div>
        
               
        
        
            <script src="./js/manageorder.js"></script>
            <div id="viewOrder" class="List">
    <div class="order-content">
        <span class="close" onclick="closeList('viewOrder')">&times;</span>
        <h2>Order Details</h2>
        <p><strong>ID:</strong> <span id="viewOrderId"></span></p>
        <p><strong>Name:</strong> <span id="viewName"></span></p>
        <p><strong>Date:</strong> <span id="viewOrderDate"></span></p>
        <p><strong>Ticket Details:</strong> <span id="viewTicketDetails"></span></p>
        <p><strong>Seat Number:</strong> <span id="viewNumber"></span></p>
    </div>
</div>
    
                                  
        </body>
        
        </html>