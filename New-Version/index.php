<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" media="all">
</head>
<body>
    
    <!-- Main COntainer -->
    <div class="main_wrapper">

        <!--Header -Wrapper-->
            <div class="header_wrapper">
                <img src="images/HO-logo.png" alt="logo" style="float:left;">
            </div>
        <!-- Navigation Bar starts-->
            <div id="navbar">
                <ul id="menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">All Products</a></li>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Sign Up</a></li>
                    <li><a href="#">Shopping Cart</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>

            <div id="form">
                <form method="get" action="results.php">
                    <input type="text" name="user_query" placeholder="Search a product"/>
                    <input type="submit" name="Search" value="search"/>
                </form>
            </div>

            </div>
        <!-- Navigation Bar ends-->

            <div class="content_wrapper">
                <div id="left_sidebar"> 

                    <div id="sidebar_title">Categories</div>
                        <ul id="cats">
                            <li><a href="#">Groceries</a></li>
                            <li><a href="#">Dairy</a></li>
                            <li><a href="#">Essentials</a></li>
                            <li><a href="#">Snacks</a></li>
                            <li><a href="#">Stationary</a></li>
                        </ul>
                </div>

                <div id="right_content"> right content</div>
            </div>
            <div class="footer">
                <h1 style="color=white; padding-top:30px; text-align:center">&copy; 2021 - By Idiot boys</h1>
            </div>
    </div>

</body>
</html>