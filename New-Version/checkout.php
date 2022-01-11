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
            <a href="index.php"><img src="images/HO-logo.png" alt="logo" style="float:left;"></a>
            </div>
        <!-- Navigation Bar starts-->
            <div id="navbar">
                <ul id="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="user_register.php">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                </ul>

            <div id="form">
                <form method="get" action="results.php" enctype="multipart/form-data">

                    <input type="text" name="user_query" placeholder="Search a product"/>
                    <input type="submit" name="Search" value="search"/>
                </form>
            </div>

            </div>
        <!-- Navigation Bar ends-->

            <div class="content_wrapper">
                <div id="left_sidebar"> 

                    <div id="sidebar_title">Categories</div>
                        <ul id="cats">
                            <?php
                                getCats();
                            ?>
                        </ul>
                <div id="sidebar_title">Brands</div>
                        <ul id="cats">
                            <?php
                                getBrands();
                            ?>
                        </ul>
                </div>

                <div id="right_content"> 
                    <?php
                        cart();
                    ?>
                    <div id="headline">
                        <div id="headline_content">
                        <?php
                                if(!isset($_SESSION['customer_email'])) {
                                    echo "<b>Welcome Guest!</b> <b style='color:yellow;'>Shopping Cart:</b>";
                                }
                                else {
                                    echo "<b>Welcome:" ."<span style='color:skyblue;'>".$_SESSION['customer_email'] ."</span" . "</b>" . "<b style='color:yellow;'> Your Shopping Cart:</b>";
                                }
                            ?>
                            <span>- Total Items: <?php items(); ?> - Total Price: <?php total_price(); ?> - <a href="cart.php" style="color:yellow;"> Go to Cart </a>
                            <?php
                            if(!isset($_SESSION['customer_email'])) {
                               echo "<a href='checkout.php' style='color:orange;'>Login</a>";
                            }
                            else {
                                echo "<a href='logout.php' style='color:orange;'>Logout</a>";
                            }
                            ?>
                        </span>
                        </div>
                    </div>
                    
                    
                    <div>    
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                include("customer/customer_login.php");
                            }
                            else {
                                include("payment_options.php");
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