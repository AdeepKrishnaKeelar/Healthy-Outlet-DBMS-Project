<?php

include("includes/db.php");
include("functions/functions.php");
if(isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
    $c_email = "select * from customers where customer_id='$customer_id'";
    $run_email=mysqli_query($con,$c_email);    
    $row_email = mysqli_fetch_array($run_email);
    $customer_email = $row_email['customer_email'];
}

//Getting customer_id
if(isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
}
//Getting the price of the products and total number of products
//$ip_add = getRealIPAddr();
    $ip_add=1;
    $i=0;
    $total = 0;
    $sel_price = "select * from cart where ip_add='1'";
    $run_price = mysqli_query($db,$sel_price);
    $status = 'Pending';
    $invoice_no = mt_rand();
    $count_pro = mysqli_num_rows($run_price);
    while($record=mysqli_fetch_array($run_price)) {
        $pro_id = $record['p_id'];
        $pro_price = "select * from products where product_id='$pro_id'";
        $run_pro_price = mysqli_query($db,$pro_price);
        while($p_price=mysqli_fetch_array($run_pro_price)) {
            $product_name = $p_price['product_title'];
            $product_price = array($p_price['product_price']);
            $values = array_sum($product_price);
            $total+=$values;
            $i++;
        }
    }

    //Getting quantity from the cart
$get_cart = "select * from cart where ip_add='1'";
$run_cart = mysqli_query($con, $get_cart);
$get_qty = mysqli_fetch_array($run_cart);
$qty = $get_qty['qty'];
if($qty==0) {
    $qty=1;
    $sub_total=$total;
}
else {
    $qty=$qty;
    $sub_total = $total * $qty;
}
    $insert_order = "insert into customer_orders (customer_id, due_amount, invoice_no, total_products, order_date, order_status) values('$customer_id','$sub_total','$invoice_no','$count_pro','NOW()','$status')";
    $run_order = mysqli_query($con, $insert_order);
    echo "<script>alert('Order successfully submitted,Thanks!')</script>";
    echo "<script>window.open('customer/my_account.php','_self')</script>";

    $insert_to_pending_orders = "insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status) values('$customer_id','$invoice_no','$pro_id','$qty','$status')";
    $run_pending_order = mysqli_query($con,$insert_to_pending_orders);

    $empty_cart = "delete from cart where ip_add = '$ip_add'";
    $run_empty = mysqli_query($con, $empty_cart);

    $from='mysite@academy.com';
    $subject='Order Details';

    $message= "
        <html>
            <P> Hello, here are your order details!</p>
            <table width='600' align='center' bgcolor='lightskyblue' border='2'>
                <tr><td><h2>Your Orders</h2></td></tr>
                <tr>    
                    <td><b>Sl No</b></td>
                    <td><b>Product Name</b></td>
                    <td><b>Quantity</b></td>
                    <td><b>Total Price</b></td>
                    <td><b>Invoice</b></td>
                </tr>

                <tr>
                    <td>$i</td>
                    <td>$product_name</td>
                    <td>$qty</td>
                    <td>$sub_total</td>
                    <td>$invoice_no</td>
                </tr>
            </table>
            <h3> Cheers </h3>
        </html>
    ";

    mail($customer_email,$subject,$message,$from);

?>