<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        body {
            background-color: orange;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({selector:'textarea'});
    </script>
    <title>Document</title>
</head>
<body>
    <h2 align="center">Contact Us</h2>
    <p align="center">Any Problems? Any Issues in the site? Any suggestions? Please tell us, we are all ears!</p>

    <form action="" method="post" enctype="multipart/form-data">
    <table align="center" width="600">
        <tr>
            <td colspan="8" align="center"><h2>Go Head, fill this out!</h2></td>
        </tr>
        <tr>
            <td align="right"><b>Name:</b></td>
            <td><input type="text" name="f_name" required/></td>
        </tr>
        <tr>
            <td align="right"><b>Email:</b></td>
            <td><input type="text" name="f_email" required/></td>
        </tr>
        <tr>
                <td align="right"><b>Your Words Here</b></td>
                <td><textarea name="f_feedback" id="" cols="35" rows="15"></textarea> </td>
        </tr>
        <tr align="center">
                <td colspan="2"><input type="submit" name="send_feedback" value="Send"> </td>
        </tr>
</form>
</body>
</html>
<?php 
    if(isset($_POST['send_feedback'])) {
        $feedback_name = $_POST['f_name'];
        $feedback_email = $_POST['f_email'];
        $feedback_feedback = $_POST['f_feedback'];

        $insert_into_feedback = "insert into feedback (f_name, f_email, f_feedback) values ('$feedback_name', '$feedback_email', '$feedback_feedback')";
        $run_feedback = mysqli_query($con, $insert_into_feedback);
        if($run_feedback) {
            echo "<script>alert('Your feedback has been recorded. We shall develop into it... if we find the damn time')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
?>