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
        <td colspan="4"><a href="checkout.php?forgot_pass">Forgot Password?</a></td>
        </tr>    
    </table>

    </form>
    <?php
        if(isset($_GET['forgot_pass'])) {
            echo "
                <div align='center'>
                    <b>Enter your email below, we'll send your password to your email</b><br>
                    <form action='' method='post'>
                    <input type='text' name='c_email' placeholder='Enter your email' required/> <br>
                    <input type='submit' name='forgot_pass' value='Send me Password'/>
                    </form>
                </div>
            ";
            if(isset($_POST['forgot_pass'])) {
                $c_email = $_POST['c_email'];
                $sel_c = "select * from customers where customer_email = '$c_email'";
                $run_c=mysqli_query($con,$sel_c);
                $check_c = mysqli_num_rows($run_c);
                $row_c = mysqli_fetch_array($run_c);
                $c_name = $row_c['customer_name'];
                $c_pass = $row_c['customer_pass'];
                if($check_c==0) {
                    echo "<script>alert('This email does not exist in our database,sorry!')</script>";
                    exit();
                }
                else {
                    $from = 'admin@mysite.com';
                    $subject = 'Your password';
                    $message = "
                    <html>
                        <h3> Dear $c_name </h3>
                        <p> You requested your password! </p>
                        <b> Your password is:</b><span style='color:red;'>$c_pass</span>
                        <h3> Cheers! </h3>
                    </html>
                    ";
                    mail($c_email,$subject,$message,$from);
                    echo "<script>alert('Password has been forwarded to your mail, check it out!')</script>";
                    echo "<script>window.open('checkout.php','_self')</script>";
                }
            }
        }
    ?>
    <h2 style="float:right; padding:10px; text-decoration:none;"><a href="customer_register.php">New Customer? Register Here</a></h2>
</div>

<?php

if(isset($_POST['c_login'])) {
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];

    $sel_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($con, $sel_customer);
    $check_customer = mysqli_num_rows($run_customer);
    $get_ip = getRealIPAddr();
    $sel_cart = "select * from cart where ip_add='1'";
    $run_cart = mysqli_query($con, $sel_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0) {
        echo "<script>alert('Password or Email Incorrect, try again!')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0) {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>window.open('customer/my_account.php','_self')</script>";
    }
    else {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>window.alert('You successfully logged in!')</script>";
        include("payment_options.php");
    }
}

?>