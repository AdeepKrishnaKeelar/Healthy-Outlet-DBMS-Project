<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css" media="all"/>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
            <div class="right">
                <div class="header">
                    <div class="right_right">
                        <h2>Manage Content</h2>
                        <a href="index.php?insert_product">Insert New Product</a>
                        <a href="index.php?view_products">View All Products</a>
                        <a href="index.php?insert_cat">Insert New Category</a>
                        <a href="index.php?view_cats">View All Categories</a>
                        <a href="index.php?insert_brand">Insert New Brand</a>
                        <a href="index.php?view_brands">View All Brands</a>
                        <a href="index.php?view_customers">Customers</a>
                        <a href="index.php?view_orders">View Orders</a>
                        <a href="index.php?view_payments">View Payments</a>
                        <a href="logout.php">Admin Logout</a>
                    </div>
            </div>
            <?php 
                include("includes/db.php");
                if(isset($_GET['insert_product'])) {
                    include("insert_product.php");
                }
                if(isset($_GET['view_products'])) {
                    include("view_products.php");
                }
                if(isset($_GET['edit_pro'])) {
                    include("edit_pro.php");
                }
                if(isset($_GET['insert_cat'])) {
                    include("insert_cat.php");
                }
                if(isset($_GET['view_cats'])) {
                    include("view_cats.php");
                }
                if(isset($_GET['edit_cat'])) {
                    include("edit_cat.php");
                }
                if(isset($_GET['insert_brand'])) {
                    include("insert_brand.php");
                }
                if(isset($_GET['view_brands'])) {
                    include("view_brands.php");
                }
                if(isset($_GET['edit_brand'])) {
                    include("edit_brand.php");
                }
                if(isset($_GET['view_customers'])) {
                    include("view_customers.php");
                }
                if(isset($_GET['view_orders'])) {
                    include("view_orders.php");
                }
                if(isset($_GET['view_payments'])) {
                    include("view_payments.php");
                }
            ?>
        </div>
    </div>
</body>
</html>