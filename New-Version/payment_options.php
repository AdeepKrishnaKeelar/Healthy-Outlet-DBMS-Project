<!DOCTYPE html>
<html>
    <head>
        <title>Payment Options</title>
    </head>
    <body>
        <?php
        include("includes/db.php");
        include_once("functions/functions.php");
        ?>
<div align="center" style="padding:20px;">

<h2>Payment Options</h2>
<?php 
$ip = getRealIPAddr();
$get_customer = "select * from customers where customer_ip='$ip'";//$ip 
$run_customer = mysqli_query($con, $get_customer);
$customer = mysqli_fetch_array($run_customer);
$customer_id = $customer['customer_id'];
?>
<b>Pay With &nbsp;</b><a href="https://www.paypal.com"><img src="images/paypal.jfif" alt="paypal" width="200" height="100"></a> <b>Or <a href="order.php?c_id=<?phpecho $customer_id;?>">Pay Offline</a></b>
<br>
<b>If you choose to pay offline, check mail for invoice details.</b>
</div>
</body>
</html>