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
        <b>Insert New Category</b>
        <input type="text" name="cat_title"/>
        <input type="submit" name="insert_cat" value="Insert Category"/>
    </form>
    <?php
        include("includes/db.php");
        if(isset($_POST['insert_cat'])) {
            $cat_title = $_POST['cat_title'];
            $insert_cat = "insert into categories (cat_title) values ('$cat_title')";
            $run_cat = mysqli_query($con, $insert_cat);
            if($run_cat) {
                echo "<script>alert('New Category has been inserted!')</script>";
                echo "<script>window.open('index.php?view_cats','_self')</script>";
            }
        }
    ?>
</body>
</html>