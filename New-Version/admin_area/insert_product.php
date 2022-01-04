<?php
include("includes/db.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>
</head>
<body bgcolor="grey">

<form method="post" action="insert_product.php" enctype="multipart/form-data">

    <table width="700" align="center" border="1" bgcolor="blue">

            <tr align="center">
                <td colspan="2"><h2>Insert New Product:</h2></td>
            </tr>

            <tr>
                <td align="right"><b>Product Title</b></td>
                <td><input type="text" name="product_title" size="50"> </td>
            </tr>

            <tr>
            <td align="right"><b>Product Category</b></td>
                <td>
                    <select name="product_cart">
                        <option value="">Select A Category</option>
                        <?php
                            $get_cats = "select * from categories";

                            $run_cats = mysqli_query($con, $get_cats);

                            while($row_cats=mysqli_fetch_array($run_cats)) {
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];

                                echo "<option value='$cat_id'>$cat_title</option>";
                            }
                        ?>
                    </select>    
                </td>
            </tr>

            <tr>
                <td align="right"><b>Product Brand</b></td>
                <td>
                        <select name="product_brand">
                            <option value="">Select A Brand</option>
                            <?php
                                $get_brands = "select * from brands";

                                $run_brands = mysqli_query($con, $get_brands);
    
                                while($row_brands=mysqli_fetch_array($run_brands)) {
                                    $brand_id = $row_brands['brand_id'];
                                    $brand_title = $row_brands['brand_title'];
    
                                    echo "<option value='$brand_id'>$brand_title</option>";
                                }
                            ?>
                        </select>
                </td>
            </tr>

            <tr>
                <td align="right"><b>Product Image 1</b></td>
                <td><input type="file" name="product_img1"> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Image 2</b></td>
                <td><input type="file" name="product_img2"> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Image 3</b></td>
                <td><input type="file" name="product_img3"> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Price</b></td>
                <td><input type="text" name="product_price"> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Description</b></td>
                <td><textarea name="product_desc" id="" cols="35" rows="15"></textarea> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Keywords</b></td>
                <td><input type="text" name="product_keywords" size="50"> </td>
            </tr>

            <tr align="center">
                <td colspan="2"><input type="submit" name="submit"> </td>
            </tr>

    </table>

</form>


</body>
</html>