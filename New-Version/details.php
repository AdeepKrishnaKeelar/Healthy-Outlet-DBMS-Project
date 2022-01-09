<?php
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
                    <div id="headline">
                        <div id="headline_content">
                            <b>Welcome Guest</b>
                            <b style="color:yellow;">Shopping Cart:</b>
                            <span>- Items: - Price: </span>
                        </div>
                    </div>
                    
                    <div id="product_box">    
                        <?php
                             
                             if(isset($_GET['pro_id'])) {  //product_id linking to a new page with details
                            $product_id=$_GET['pro_id'];
                            
                            $get_products = "select * from products where product_id='$product_id'";

                             $run_products = mysqli_query($db, $get_products);
                             while($row_products=mysqli_fetch_array($run_products)) {
                                 $pro_id = $row_products['product_id'];
                                 $pro_title = $row_products['product_title'];
                                 $pro_cat = $row_products['cat_id'];
                                 $pro_brand = $row_products['brand_id'];
                                 $pro_desc = $row_products['product_desc'];
                                 $pro_price = $row_products['product_price'];
                                 $pro_image1 = $row_products['product_img1'];
                                 $pro_image2 = $row_products['product_img2'];
                                 $pro_image3 = $row_products['product_img3'];
                         
                                 echo "
                                     <div id='single_product'>
                                     <h3>$pro_title</h3>
                                     <img src='admin_area/product_images/$pro_image1' width='180' height='180'/>
                                     <img src='admin_area/product_images/$pro_image2' width='250' height='250'/>
                                     <img src='admin_area/product_images/$pro_image3' width='250' height='250'/>
                                     <p><b>Price: Rs$pro_price/kg </b></p>
                                     <p>$pro_desc</p> 
                                     <a href='index.php' style='float:left'>Go Back</a>
                                     <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
                                     </div>
                                                             
                                     ";
                                   }
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