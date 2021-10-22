<?php
    session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM branch ") ;
    include_once "data_branch _showtime.php";
?>
