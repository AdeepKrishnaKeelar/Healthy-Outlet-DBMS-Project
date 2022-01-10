<?php
@session_start();
include("includes/db.php");
?>
<div>
    <form action="checkout.php" method="POST">
        <table width="800" bgcolor="#66CCCC" align="center">
        <tr align="center">
            <td colspan="4"><h2>Login or Register </h2></td>
        </tr>
        <tr>
        <td align="right"><b>Your Email:</b></td>
        <td><input type="text" name="c_email"/></td>
        </tr>
        <tr>   
        <td align="right"><b>Your Password:</b></td>
        <td><input type="password" name="c_pass"/></td>
        </tr>
        <tr align="center">
        <td colspan="4"><input type="submit" name="c_login" value="Login"/></td>
        </tr>
        <tr align="center">   
        <td colspan="4"><a href="forget_pass.php">Forgot Password?</a></td>
        </tr>    
    </table>

    </form>
    <h2 style="float:right; padding:10px; text-decoration:none;"><a href="customer_register.php">New Customer? Register Here</a></h2>
</div>

<?php

if(isset($_POST['c_login'])) {
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    $sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($con, $sel_customer);

    if(mysqli_num_rows($run_customer)>0) {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>window.open('index.php','_self')</script>";
    }
    else {
        echo "<script>alert('Email or Password is wrong! Try Again!')</script>";
    }
}

?>