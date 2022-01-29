<?php
include("includes/db.php");
//getting specific product from table
if(isset($_GET['edit_pro'])) {
    $edit_id = $_GET['edit_pro'];
    $get_edit = "select * from products where product_id ='$edit_id'";
    $run_edit = mysqli_query($con,$get_edit);
    $row_edit = mysqli_fetch_array($run_edit);
    
    $p_title = $row_edit['product_title'];
    $cat_id = $row_edit['cat_id'];
    $brand_id = $row_edit['brand_id'];
    $p_image1 = $row_edit['product_img1'];
    $p_image2 = $row_edit['product_img2'];
    $p_image3 = $row_edit['product_img3'];
    $p_price = $row_edit['product_price'];
    $p_desc = $row_edit['product_desc'];
    $p_keywords = $row_edit['product_keywords'];
}
    //getting revelant category
    $get_cat = "select * from categories where cat_id='$cat_id'";
    $run_cat = mysqli_query($con, $get_cat);
    $cat_row = mysqli_fetch_array($run_cat);
    $cat_edit_title = $cat_row['cat_title'];

    //getting relevant brand
    $get_brand = "select * from brands where brand_id='$brand_id'";
    $run_brand = mysqli_query($con, $get_brand);
    $brand_row = mysqli_fetch_array($run_brand);
    $brand_edit_title = $brand_row['brand_title'];
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

<form method="post" action="" enctype="multipart/form-data">

    <table width="794" align="center" border="1" bgcolor="lightskyblue">

            <tr align="center">
                <td colspan="2"><h2>Update or Edit a Product:</h2></td>
            </tr>

            <tr>
                <td align="right"><b>Product Title</b></td>
                <td><input type="text" name="product_title" size="50" value="<?php echo $p_title; ?>"> </td>
            </tr>

            <tr>
            <td align="right"><b>Product Category</b></td>
                <td>
                    <select name="product_cart">
                        <option value="<?php echo $cat_id;?>"><?php echo $cat_edit_title;?></option>
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
                            <option value="<?php echo $brand_id;?>"><?php echo $brand_edit_title;?></option>
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
                <td><input type="file" name="product_img1"><br><img src="product_images/<?php echo $p_image1;?>" width="80" height="80"/></td>
            </tr>

            <tr>
                <td align="right"><b>Product Image 2</b></td>
                <td><input type="file" name="product_img2"><br><img src="product_images/<?php echo $p_image2;?>" width="80" height="80"/></td>
            </tr>

            <tr>
                <td align="right"><b>Product Image 3</b></td>
                <td><input type="file" name="product_img3"><br><img src="product_images/<?php echo $p_image3;?>" width="80" height="80"/></td>
            </tr>

            <tr>
                <td align="right"><b>Product Price</b></td>
                <td><input type="text" name="product_price" value="<?php echo $p_price;?>"> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Description</b></td>
                <td><textarea name="product_desc" id="" cols="35" rows="15"><?php echo $p_desc;?></textarea> </td>
            </tr>

            <tr>
                <td align="right"><b>Product Keywords</b></td>
                <td><input type="text" name="product_keywords" size="50" value="<?php echo $p_keywords;?>"> </td>
            </tr>

            <tr align="center">
                <td colspan="2"><input type="submit" name="update_product" value="Update Product"> </td>
            </tr>

    </table>

</form>


</body>
</html>
<?php

            if(isset($_POST['insert_product'])) {

                //text data variables
                $product_title = $_POST['product_title'];
                $product_cat = $_POST['product_cart'];
                $product_brand = $_POST['product_brand'];
                $product_price = $_POST['product_price'];
                $product_desc = $_POST['product_desc'];
                $status = 'on';
                $product_keywords = $_POST['product_keywords'];

                //image names
                $product_img1 = $_FILES['product_img1']['name'];
                $product_img2 = $_FILES['product_img2']['name'];
                $product_img3 = $_FILES['product_img3']['name'];

                //Image temp names 
                $temp_name1 = $_FILES['product_img1']['tmp_name'];
                $temp_name2 = $_FILES['product_img2']['tmp_name'];
                $temp_name3 = $_FILES['product_img3']['tmp_name'];

                if($product_title=='' OR $product_cat=='' OR $product_price=='' OR $product_brand=='' OR $product_desc=='' OR $product_keywords=='' OR $product_img1=='' OR $product_img2=='' OR $product_img3=='') {
                        echo "<script>alert('Please fill all the fields!')</script>";
                        exit();
                }
                else { 
                //uploading image to its folder
                move_uploaded_file($temp_name1,"product_images/$product_img1");
                move_uploaded_file($temp_name2,"product_images/$product_img2");
                move_uploaded_file($temp_name3,"product_images/$product_img3");
                $insert_product = "insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_desc,status) values('$product_cat','$product_brand',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$status')";

                $run_product = mysqli_query($con, $insert_product);

                if($run_product) {
                    echo"<script>alert('Product Inserted Successfully!')</script>";
                    echo "<script>window.alert('índex.php?insert_product','_self')</script>";
                }
                }

            }

?>