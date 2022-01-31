<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        table {
            border: 3px groove black;
        }
        th,tr{
            border:3px dashed #000;
        }
        td{
            border:1px groove #000;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['view_feedback'])) {
    ?>
    <table align="center" width="794" bgcolor="lightskyblue">
        <tr align="center">
            <td colspan="8"><h2>View Customer Feedback</h2></td>
        </tr>
        <tr>
            <th>Feedback ID</th>
            <th>Customer Name</th>
            <th>Email</th>
            <th>Feedback</th>
        </tr>
        <?php
            include("includes/db.php");
            $i=0;
            $get_feed = "select * from feedback";
            $run_feed = mysqli_query($con,$get_feed);
            while($row_feed=mysqli_fetch_array($run_feed)) {
                $f_id=$row_feed['feedback_id'];
                $f_name=$row_feed['f_name'];
                $f_email=$row_feed['f_email'];
                $f_desc=$row_feed['f_feedback'];
                $i++;
        ?>
        <tr align="center">
            <td><?php echo $i; ?></td>
            <td><?php echo $f_name; ?></td>
            <td><?php echo $f_email; ?></td>
            <td><?php echo $f_desc; ?></td>
        </tr>
        <?php } ?>
    </table>
    <?php } ?>
    </body>
</html>            
        
