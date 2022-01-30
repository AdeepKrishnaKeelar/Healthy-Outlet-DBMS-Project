<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        tr, th {
            border: 2px dashed black;
        }
    </style>
</head>
<body>
    <table width="794" align="center" bgcolor="lightskyblue">
        <tr align="center">
            <td colspan="8"><h2>View All Payments</h2></td>
        </tr>
        <tr align="center">
            <th>Payment Number</th>
            <th>Invoice Number</th>
            <th>Amount Paid</th>
            <th>Payment Method</th>
            <th>Reference Number</th>
            <th>Code</th>
            <th>Payment Date</th>
        </tr>
        <?php
            include("includes/db.php");
            $get_payments = "select * from payments";
            $run_payments = mysqli_query($con,$get_payments);
            $i=0;
            while($row_payments=mysqli_fetch_array($run_payments)) {
                $payment_id=$row_payments['payment_id'];
                $invoice=$row_payments['invoice_no'];
                $amount=$row_payments['amount'];
                $payment_m=$row_payments['payment_mode'];
                $ref_no=$row_payments['ref_no'];
                $code=$row_payments['code'];
                $date=$row_payments['payment_date'];
                $i++;
            }
        ?>
        <tr align="center">
            <td><?php echo $i;?></td>
            <td><?php echo $invoice;?> </td>
            <td><?php echo $amount; ?></td>
            <td><?php echo $payment_m; ?></td>
            <td><?php echo $ref_no; ?></td>
            <td><?php echo $code; ?></td>
            <td><?php echo $date; ?></td>
        </tr>
    </table>
</body>
</html>