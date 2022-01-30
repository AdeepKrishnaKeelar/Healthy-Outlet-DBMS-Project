<?php
if(!isset($_SESSION['admin_email'])) {
    echo "<script>window.open('login.php','_self')</script>";
}
else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        form {
            margin:15%;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <b>Insert New Brand</b>
        <input type="text" name="brand_title"/>
        <input type="submit" name="insert_brand" value="Insert Brand"/>
    </form>
    <?php
        include("includes/db.php");
        if(isset($_POST['insert_brand'])) {
            $brand_title = $_POST['brand_title'];
            $insert_brand = "insert into brands (brand_title) values ('$brand_title')";
            $run_brand = mysqli_query($con, $insert_brand);
            if($run_brand) {
                echo "<script>alert('New Brand has been inserted!')</script>";
                echo "<script>window.open('index.php?view_brands','_self')</script>";
            }
        }
    ?>
</body>
</html>
<?php } ?>