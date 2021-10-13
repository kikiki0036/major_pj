<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    $sql = mysqli_query($conn, "SELECT * FROM movie  WHERE hide = '{$hide}' ORDER BY `getindate` ASC") ;
    include_once "data_movie.php";
?>
