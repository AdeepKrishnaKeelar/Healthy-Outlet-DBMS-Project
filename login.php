<?php

$host ="localhost";
$user = "root";
$password = "";
$db = "user";

$data=mysqli_connect($host,$user,$password,$db);
if($data===false) {
    die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $username=$_POST["username"];
    $password=$_POST["password"];

    $sql="select * from login where username= '".$username."' AND password='".$password."'";
    $result=mysqli_query($data,$sql);

    $row=mysqli_fetch_array($result);
    if($row["usertype"]=="Athmeeya") {
        echo "Athmeeya";
    }
    if($row["usertype"]=="Admin") {
        echo "Admin";
    }
    else {
        echo "Username or Password incorrect!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Healthy Outlet</title>
</head>
<body>
    <header>
        <a href="#" class="logo"> Healthy <span> Outlet</span><br><span class="tagline"> Give Life the Best!</span></a>
        <ul class="navigation">
            <li><a href="#">Groceries</a></li>
            <li><a href="#">Dairy</a></li>
            <li><a href="#">Provisions and Cosmetics</a></li>
            <li><a href="#">Snacks</a></li>
        </ul>
    </header>
    <br><br><br><br><br><br><br><br>
    <section class="login-form">
        <form action="#" method="POST">
        <h2>Login Details</h2>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div>
            <input type="submit" value="login">
        </div>
        </form>
    </section>
</body>
</html>