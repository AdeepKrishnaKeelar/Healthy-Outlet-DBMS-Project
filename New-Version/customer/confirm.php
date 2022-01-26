<?php
session_start();
include("includes/db.php");

if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body bgcolor="black">
    <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="POST">
        <table width="500" align="center" border="2" bgcolor="#CCCCC">
            <tr align="center">
                <td colspan="5"><h2>Please Confirm your Payment!</h2></td>
            </tr>
            <tr>
                <td align="right">Invoice Number:</td>
                <td><input type="text" name="invoice_number"/></td>
            </tr>
            <tr>
                <td align="right">Amount Sent:</td>
                <td><input type="text" name="amount"/></td>
            </tr>
            <tr>
                <td align="right">Select Payment Method:</td>
                <td>
                    <select name="payment_method">
                        <option>Select Payment</option>
                        <option>Bank Transfer</option>
                        <option>RuPay</option>
                        <option>Google Pay</option>
                        <option>PayPal</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">Bank Code:</td>
                <td><input type="text" name="code"/></td>
            </tr>
            <tr>
                <td align="right">Transaction/Reference ID:</td>
                <td><input type="text" name="tr"/></td>
            </tr>
            <tr>
                <td align="right">Payment Date:</td>
                <td><input type="text" name="date"/></td>
            </tr>
            <tr align="center">
                <td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"></td>
           </tr>
        </table>
    </form>
</body>
</html>

<?php
    if(isset($_POST['confirm'])) {
        $update_id = $_GET['update_id'];
        $invoice = $_POST['invoice_no'];
        $amount = $_POST['amount'];
        $payment_method = $_POST['payment_method'];
        $ref_no = $_POST['tr'];
        $code = $_POST['code'];
        $date = $_POST['date'];
        $complete = 'Complete';

        $insert_payment = "insert into payments(invoice_no,amount,payment_mode,ref_no,code,payment_date) values('$invoice','$amount','$payment_method','$ref_no','$code','$date')";
        $run_payment = mysqli_query($con,$insert_payment);

        $update_order = "update customer_orders set order_status=$complete where order_id='$update_id'";
        $run_order = mysqli_query($con, $update_order);
        if($run_payment) {
            echo "<h2 style='text-align:center; color:white;'>Payment received, your order will be delievered to you shortly!</h2>";
        }
    }
?>