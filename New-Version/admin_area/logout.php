<?php
    session_start();

    session_destroy();

    echo "<script type='text/javascript'>window.open('login.php?logout=You successfully logged out, don't forget us','_self')</script>";

?>