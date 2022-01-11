<?php
//Establishing connection
$db = mysqli_connect("localhost","root","","mygrocery");

//function for getting the IP Address of the User 
function getRealIPAddr() {
    //checking for shared net
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    //checking if ip is pass from proxy
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
} 

//Script for the Cart
function cart() {
    if(isset($_GET['add_cart'])) {
        global $db;
        $ip_add = getRealIPAddr();
        $p_id = $_GET['add_cart'];
        $check_pro = "select * from cart where ip_add='$ip_add' AND p_id='$p_id'";
        $run_check = mysqli_query($db,$check_pro);
        if(mysqli_num_rows($run_check)>0) {
            echo "";
        }
        else {
            $q = "insert into cart (p_id,ip_add) values ('$p_id','1')";
            $run_q=mysqli_query($db,$q);
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

//getting the number of items from the cart
//ip reset to 1 again for working purpose.
function items() {
    if(isset($_GET['add_cart'])) {
        global $db;
        $ip_add = getRealIPAddr();
        $get_items = "select * from cart where ip_add='1'";
        $run_items = mysqli_query($db,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    else {
        global $db;
        $ip_add = getRealIPAddr();
        $get_items = "select * from cart where ip_add='1'";
        $run_items = mysqli_query($db,$get_items);
        $count_items = mysqli_num_rows($run_items);
    }
    echo $count_items;
}


//getting products
function getPro()  {
    global $db;

    if(!isset($_GET['cat'])) {
        if(!isset($_GET['brand'])) {

    $get_products = "select * from products order by rand() LIMIT 0,10";

    $run_products = mysqli_query($db, $get_products);
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
            <p><b>Price: Rs$pro_price/- </b></p>
            <a href='details.php?pro_id=$pro_id' style='float:left'>Details</a>
            <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>
            </div>
                                    
            ";
          }
        }
    }
}

//Getting the total price of the items from the cart
//change IP accordingly otherwise set to 1 for reference working mode only
function total_price() {
    $ip_add = getRealIPAddr();
    global $db;
    $total = 0;
    $sel_price = "select * from cart where ip_add='1'";
    $run_price = mysqli_query($db,$sel_price);
    while($record=mysqli_fetch_array($run_price)) {
        $pro_id = $record['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price = mysqli_query($db,$pro_price);
        while($p_price=mysqli_fetch_array($run_pro_price)) {
            $product_price = array($p_price['product_price']);
            $values = array_sum($product_price);
            $total+=$values;
        }
    }
    echo $total;
}

//This function matches those who ID of same types and when called in various categories of the webpage, it filters out the specific details
function getCatPro()  {
    global $db;
    if(isset($_GET['cat'])) {
    $cat_id = $_GET['cat'];
    $get_cat_pro = "select * from products where cat_id='$cat_id'";
    $run_cat_pro = mysqli_query($db, $get_cat_pro);
    $count = mysqli_num_rows($run_cat_pro);
    if($count==0) {
        echo "<h2>No Products Found in this category!</h2>"; 
    }

    while($row_cat_pro =mysqli_fetch_array($run_cat_pro)) {
        $pro_id = $row_cat_pro['product_id'];
        $pro_title = $row_cat_pro['product_title'];
        $pro_cat = $row_cat_pro['cat_id'];
        $pro_brand = $row_cat_pro['brand_id'];
        $pro_desc = $row_cat_pro['product_desc'];
        $pro_price = $row_cat_pro['product_price'];
        $pro_image = $row_cat_pro['product_img1'];

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
    }
}

//This function matches those who ID of same types and when called in various brands of the webpage, it filters out the specific details
function getBrandPro()  {
    global $db;
    if(isset($_GET['brand'])) {
    $brand_id = $_GET['brand'];
    $get_brand_pro = "select * from products where brand_id='$brand_id'";
    $run_brand_pro = mysqli_query($db, $get_brand_pro);
    $count = mysqli_num_rows($run_brand_pro);
    if($count==0) {
        echo "<h2>No Products Found for this Brand!</h2>"; 
    }

    while($row_brand_pro=mysqli_fetch_array($run_brand_pro)) {
        $pro_id = $row_brand_pro['product_id'];
        $pro_title = $row_brand_pro['product_title'];
        $pro_cat = $row_brand_pro['cat_id'];
        $pro_brand = $row_brand_pro['brand_id'];
        $pro_desc = $row_brand_pro['product_desc'];
        $pro_price = $row_brand_pro['product_price'];
        $pro_image = $row_brand_pro['product_img1'];

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
    }
}
//getting brands display info
function getBrands() {
        global $db;
        $get_bran = "select * from brands";

        $run_bran = mysqli_query($db, $get_bran);
    
        while($row_bran=mysqli_fetch_array($run_bran)) {
            $brand_id = $row_bran['brand_id'];
            $brand_title = $row_bran['brand_title'];
    
            echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
        }
    }

//getting categories display 
function getCats() {
        global $db;
        $get_cats = "select * from categories";

        $run_cats = mysqli_query($db, $get_cats);

        while($row_cats=mysqli_fetch_array($run_cats)) {
            $cat_id = $row_cats['cat_id'];
            $cat_title = $row_cats['cat_title'];

            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
        }
    }
?>