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
            <th>Sold</th>
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
            <td></td>
            <td></td>
            <td><a href="#">Edit</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>