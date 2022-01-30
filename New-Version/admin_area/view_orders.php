<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        tr, th {
            border: 2px dashed black;
        }
    </style>
</head>
<body>
    <table width="794" align="center" bgcolor="lightskyblue">
        <tr align="center">
            <td colspan="8"><h2>View All Orders</h2></td>
        </tr>
        <tr align="center">
            <th>Order Number</th>
            <th>Customer</th>
            <th>Invoice Number</th>
            <th>Product ID</th>
            <th>QTY</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
        <?php
            include("includes/db.php");
            $get_orders = "select * from pending_orders";
            $run_orders = mysqli_query($con,$get_orders);
            $i=0;
            while($row_orders=mysqli_fetch_array($run_orders)) {
                $order_id=$row_orders['order_id'];
                $c_id=$row_orders['customer_id'];
                $invoice=$row_orders['invoice_no'];
                $p_id=$row_orders['product_id'];
                $qty=$row_orders['qty'];
                $status=$row_orders['order_status'];
                $i++;
            }
        ?>
        <tr align="center">
            <td><?php echo $i;?></td>
            <td><?php 
                $get_customer = "select * from customers where customer_id='$c_id'";
                $run_customer = mysqli_query($con,$get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_email = $row_customer['customer_email'];
                echo $customer_email;
            ?>
            </td>
            <td><?php echo $invoice; ?></td>
            <td><?php echo $p_id; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php 
                if($status=='Pending') {
                    echo $status='Pending';
                }
                else {
                    echo $status='Complete';
                }
            ?>
            </td>
            <td><a href="delete_order.php?delete_order=<?php echo $order_id; ?>">Delete</a></td>
        </tr>
    </table>
</body>
</html>