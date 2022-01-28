<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table {
            border: 3px groove black;
        }
        th,tr{
            border:3px dashed #000;
        }
        td{
            border:1px groove #000;
        }
    </style>
</head>
<body>
    <table align="center" width="794" bgcolor="yellow">
        <tr align="center">
            <td colspan="8"><h2>View All Products</h2></td>
        </tr>
        <tr>
            <th>Product ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Total Sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            include("includes/db.php");
            $i=0;
            $get_pro = "select * from products";
            $run_pro = mysqli_query($con,$get_pro);
            while($row_pro=mysqli_fetch_array($run_pro)) {
                $p_id=$row_pro['product_id'];
                $p_title=$row_pro['product_title'];
                $p_img=$row_pro['product_img1'];
                $p_price=$row_pro['product_price'];
                $i++;
        ?>
        <tr align="center">
            <td><?php echo $i; ?></td>
            <td><?php echo $p_title; ?></td>
            <td><img src="product_images/<?php echo $p_img; ?>" width="60" height="60"/></td>
            <td><?php echo $p_price; ?></td>
            <td>
                <?php
                    $get_sold="select * from pending_orders where product_id='$p_id'";
                    $run_sold=mysqli_query($con,$get_sold);
                    $count=mysqli_num_rows($run_sold);
                    echo $count;
                ?>
            </td>
            <td>
            <?php
                    $get_status="select * from products where product_id='$p_id'";
                    $run_status=mysqli_query($con,$get_status);
                    $row_status=mysqli_fetch_array($run_status);
                    $p_status=$row_status['status'];
                    echo $p_status;
                ?>
            </td>
            <td><a href="#">Edit</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>