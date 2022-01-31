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
                    <li><a href="customer/my_account.php">My Account</a></li>
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
                            <span>- Total Items: <?php items(); ?> - Total Price: <?php total_price(); ?> - <a href="index.php" style="color:yellow;"> Back to Shopping </a>
                            
                            &nbsp;<?php
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
                        <form action="cart.php" method="post" enctype="multipart/form-data"><br>
                            <table width="750" align="center" bgcolor="#0099CC">
                                <tr>
                                    <td><b>Remove</b></td>
                                    <td><b>Product(s)</b></td>
                                    <td><b>Quantity</b></td>
                                    <td><b>Total Price</b></td>
                                </tr>
                                <?php
                                $ip_add = getRealIPAddr();
                                $total = 0;
                                $sel_price = "select * from cart where ip_add='1'";
                                $run_price = mysqli_query($db,$sel_price);
                                while($record=mysqli_fetch_array($run_price)) {
                                    $pro_id = $record['p_id'];
                                    $pro_price = "select * from products where product_id='$pro_id'";
                                    $run_pro_price = mysqli_query($con,$pro_price);
                                    while($p_price=mysqli_fetch_array($run_pro_price)) {
                                        $product_price = array($p_price['product_price']);
                                        $product_title = $p_price['product_title'];
                                        $product_image = $p_price['product_img1'];
                                        $only_price = $p_price['product_price'];
                                        $values = array_sum($product_price);
                                        $total+=$values;
                                ?>   
                                <tr>
                                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                    <td><?php echo $product_title?><br><img src="admin_area/product_images/<?php echo $product_image;?>" alt="image" height="80" width="80"></td>
                                    <td><input type="text" name="qty" value="" size="3"/></td>
                                    <?php
                                        global $con;
                                        if(isset($_POST['update'])) {
                                            $qty = $_POST['qty'];
                                            $insert_qty="update cart set qty='$qty' where ip_add='1'";
                                            $run_qty = mysqli_query($con,$insert_qty);
                                            $total = $total*(integer)$qty;
                                        }
                                    ?>
                                    <td><?php echo $only_price; ?></td>
                                </tr>
                                <?php }} ?>

                                <tr>
                                    <td colspan="3" align="right"><b>Sub-Total:</b></td>
                                    <td><b><?php echo $total;?></b></td>
                                </tr>
                                <tr align="center"></tr>
                                <tr>
                                    <td colspan="2"><input type="submit" name="update" value="Update Cart"/></td>
                                    <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                                    <td><button><a href="checkout.php" style="text-decoration:none; color:#000;">CheckOut</a></button></td>
                                </tr>
                            </table>
                        </form>     
                        
                        <?php
                            function updatecart() {
                            global $con;
                            if(isset($_POST['update'])) {
                                foreach($_POST['remove'] as $remove_id) {
                                    $delete_products = "delete from cart where p_id='$remove_id'";
                                    $run_delete = mysqli_query($con,$delete_products);
                                    if($run_delete) {
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }
                                }
    
                        }
                        if(isset($_POST['continue'])) {
                            echo "<script>window.open('index.php','_self')</script>";
                        }
                    }

                    echo @$up_cart = updatecart();

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