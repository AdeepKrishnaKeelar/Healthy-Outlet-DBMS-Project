<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="insert_product.php" enctype="multipart/form-data">

            <table width="700" align="center">

                <tr>
                    <td><h2>Insert New Product</h2></td>
                </tr>
                <tr>
                    <td><input type="text" name="product_title"/> </td>
                </tr>

                <tr>
                    <select name="product_cart">
                        <option value="">Select a Category</option>
                        <?php
                            $get_cats = "Select * from categories";

                            $run_cats = mysqli_query($con, $get_cats);

                            while($row_cats=mysqli_fetch_array($run_cats)) {
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];

                                echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                            }
                        ?>
                    </select>
                </tr>

                <tr>
                    <td><input type="file" name="product_img1"/> </td>
                </tr>

                <tr>
                    <td><input type="text" name="product_price"/> </td>
                </tr>

                <tr>
                    <td><input type="text" name="product_desc"/> </td>
                </tr>

                <tr>
                    <td><input type="text" name="product_keywords"/> </td>
                </tr>

                <tr>
                    <td><input type="submit" name="submit"/> </td>
                </tr>

            </table>

    </form>
</body>
</html>