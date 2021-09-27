<?php
    session_start();
    echo "out";
    session_unset();
    session_destroy();
    header("location: ../login.php");
         
?>