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
                <form method="get" action="results.php">
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
                <div id="sidebar_title">Brands </div>
                        <ul id="cats">
                            <?php
                                getBrands();
                            ?>
                        </ul>
                </div>

                <div id="right_content"> 
                    <div id="headline">
                        <div id="headline_content">
                            <b>Welcome Guest</b>
                            <b style="color:yellow;">Shopping Cart:</b>
                            <span>- Items: - Price: 
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
                    
                    <div id="product_box">    
                        <?php
                            $get_products = "select * from products";

                            $run_products = mysqli_query($con, $get_products);
                            while($row_products=mysqli_fetch_array($run_products)) {
                                $pro_id = $row_products['product_id'];
                                $pro_title = $row_products['product_title'];
                                $pro_cat = $row_products['cat_id'];
                                $pro_brand = $row_products['brand_id'];
                                $pro_desc = $row_products['product_desc'];
                                $pro_price = $row_products['product_price'];
                                $pro_image = $row_products['product_img1'];
                        
                                echo "
                                    <div id='single_product'>
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_images/$pro_image' width='180' height='180'/>
                                    <p><b>Price: Rs$pro_price/kg </b></p>
                                    <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
                                    <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
                                    </div>
                                                            
                                    ";
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