<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    $sql = mysqli_query($conn, "SELECT * FROM movie  WHERE hide = '{$hide}' ORDER BY `movie`.`getindate` DESC") ;
    include_once "data_movie _showtime.php";
?>
