<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    
    <!-- Main COntainer -->
    <div class="main_wrapper">

        <!--Header -Wrapper-->
            <div class="header_wrapper">
            <a href="../index.php"><img src="../images/HO-logo.png" alt="logo" style="float:left;"></a>
            </div>
        <!-- Navigation Bar starts-->
            <div id="navbar">
                <ul id="menu">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <?php 
                        if(isset($_SESSION['customer_email'])) {
                            echo "<span style='display:none;'<li><a href='../user_register.php'>Sign Up</a></li></span>";
                        }
                        else {
                            echo "<li><a href='../user_register.php'>Sign Up</a></li>";
                        }
                    ?>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact_us.php">Contact Us</a></li>
                </ul>

            <div id="form">
                <form method="get" action="../results.php" enctype="multipart/form-data">

                    <input type="text" name="user_query" placeholder="Search a product"/>
                    <input type="submit" name="Search" value="search"/>
                </form>
            </div>

            </div>
        <!-- Navigation Bar ends-->

            <div class="content_wrapper">
                <div id="left_sidebar"> 

                    <div id="sidebar_title">Manage Account</div>
                        <ul id="cats">
                            <?php
                                if(isset($_SESSION['customer_email'])) {

                                    $customer_session = $_SESSION['customer_email'];
                                    $get_customer_pic = "select * from customers where customer_email='$customer_session'";
                                    $run_customer = mysqli_query($con, $get_customer_pic);
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    $customer_pic = $row_customer['customer_image'];
                                    echo "<img src='customer_photos/$customer_pic' width='150' height='150'/> <br><a href='change_pic.php'>Change Photo</a>";

                                }
                            ?>
                            <li><a href="my_account.php?my_orders">My Orders</a></li>
                            <li><a href="my_account.php?edit_account">Edit Account</a></li>
                            <li><a href="my_account.php?change_pass">Change Password</a></li>
                            <li><a href="my_account.php?delete_account">Delete Account</a></li>
                            <li><a href="../logout.php">Logout</a></li>
                        </ul>
                </div>

                <div id="right_content"> 
                    <?php
                        cart();
                    ?>
                    <div id="headline">
                        <div id="headline_content">
                            <?php
                                if(isset($_SESSION['customer_email'])) {
                                    echo "<b> Welcome: </b>". "<b style='color:yellow;'>" . $_SESSION['customer_email']. "</b>";
                                }
                            ?>
                            <?php
                            if(!isset($_SESSION['customer_email'])) {
                               echo "<a href='../checkout.php' style='color:orange;'>Login</a>";
                            }
                            else {
                                echo "<a href='../logout.php' style='color:orange;'>Logout</a>";
                            }
                            ?>
                        </span>
                        </div>
                    </div>
                    
                    
                    <div>    
                        <h2 style="background: #000; color:#FC9; text-align:center; border-top:2px solid white; padding:20px;">Manage Your Account Here</h2> 
                        <?php
                            getDefault();
                        ?>
                        <?php
                            if(isset($_GET['my_orders'])) {
                                include("my_orders.php");
                            }
                            if(isset($_GET['edit_account'])) {
                                include("edit_account.php");
                            }
                            if(isset($_GET['change_pass'])) {
                                include("change_pass.php");
                            }
                        ?>
                    </div>

                </div>
            </div>
            
            
            <div class="footer">
                <h1 style="color=white; padding-top:30px; text-align:center">&copy; 2021 - By Idiot boys</h1>
            </div>
    </div>

</body>
</html>