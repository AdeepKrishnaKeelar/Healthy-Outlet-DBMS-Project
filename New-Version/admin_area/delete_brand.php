<?php
    include("includes/db.php");
    if(isset($_GET['delete_brand'])) {
        $delete_id = $_GET['delete_brand'];
        $delete_pro = "delete from brands where brand_id='$delete_id'";
        $run_delete = mysqli_query($con, $delete_pro);
        if($run_delete) {
            echo "<script>alert('One Brand has been deleted!')</script>";
            echo "<script>window.open('index.php?view_brands','_self')</script>";
        } 
    }

?>