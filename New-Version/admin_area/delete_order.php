<?php
    include("includes/db.php");
    if(isset($_GET['delete_order'])) {
        $delete_id = $_GET['delete_order'];
        $delete_order = "delete from pending_orders where order_id='$delete_id'";
        $run_delete = mysqli_query($con, $delete_order);
        if($run_delete) {
            echo "<script type='text/javascript'>alert('Customer has been deleted!')</script>";
            echo "<script type='text/javascript'>window.open('index.php?view_customers','_self')</script>";
        } 
    }

?>