<?php
include("includes/db.php");

//getting the customer ID
$c = $_SESSION['customer_email'];
$get_c = "select * from customers where customer_email='$c'";
$run_c = mysqli_query($db,$get_c);
$row_c = mysqli_fetch_array($run_c);

$customer_id = $row_c['customer_id'];
?>

<table width="800" align="center" bgcolor="skyblue">
    <tr>
        <th>Order Number</th>
        <th>Due Amount</th>
        <th>Invoice Number</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Paid/Unpaid</th>
        <th>Status</th>
    </tr>

    <h3 align="center"> All Orders Details : </h3>
    <?php
        $i=0;
        $get_orders = "select * from customer_orders where customer_id='$customer_id'";
        $run_orders = mysqli_query($con,$get_orders);
        while($run_orders=mysqli_fetch_array($run_orders)) {
            $order_id = $run_orders['order_id'];
            $due_amount = $run_orders['due_amount'];
            $invoice_no = $run_orders['invoice_no'];
            $products = $run_orders['total_products'];
            $date = $run_orders['order_date'];
            $status=$run_orders['order_status'];
            $i++;

            //$status=='Pending'
            if($status=='0') {
                $status= 'Unpaid';            
            }
            else {
                $status='Paid';
            }

            echo "
             <tr align='center'>
                <td>$i</td>
                <td>$due_amount</td>
                <td>$invoice_no</td>
                <td>$products</td>
                <td>$date</td>
                <td>$status</td>
                <td><a href='confirm.php'>Confirm if Paid</a></td>
             </tr>
            ";
        }
    ?>

</table>
