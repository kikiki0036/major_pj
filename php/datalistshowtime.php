<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    // $sql = mysqli_query($conn, "SELECT showtime.date ,showtime.timestart ,showtime.timeend,showtime.lang,branch.branch_name,branch.branch_name,theatre.theatre_name 
    //                             FROM `showtime` INNER JOIN `branch` ON branch.branch_id=showtime.branch_id INNER JOIN `theatre` ON theatre.theatre_id=showtime.theatre_id");

    $sql = mysqli_query($conn, "SELECT * FROM showtime  WHERE hide = '{$hide}'") ;
    include_once "data_showtime.php";
?>
