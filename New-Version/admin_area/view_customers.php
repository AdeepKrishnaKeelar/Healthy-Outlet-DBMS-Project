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
            <td colspan="8"><h2>View All Customers</h2></td>
        </tr>
        <tr align="center">
            <th>Serial Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Image</th>
            <th>Country</th>
            <th>Delete</th>
        </tr>
        <?php
            include("includes/db.php");
            $get_c = "select * from customers";
            $run_c = mysqli_query($con,$get_c);
            $i=0;
            while($row_c=mysqli_fetch_array($run_c)) {
                $c_id=$row_c['customer_id'];
                $c_name=$row_c['customer_name'];
                $c_email=$row_c['customer_email'];
                $c_image=$row_c['customer_image'];
                $c_country=$row_c['customer_country'];
                $i++;
            }
        ?>
        <tr align="center">
            <td><?php echo $i;?></td>
            <td><?php echo $c_name;?></td>
            <td><?php echo $c_email;?></td>
            <td><img src="../customer/customer_photos/<?php echo $c_image; ?>" width="60" height="60"/></td>
            <td><?php echo $c_country;?></td>
            <td><a href="delete_c.php?delete_c=<?php echo $c_id; ?>">Delete</a></td>
        </tr>
    </table>
</body>
</html>