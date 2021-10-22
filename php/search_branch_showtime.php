<?php
    session_start();
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    // $arr = explode('|',$searchTerm);
    // $m = $arr[0];
    // $g = $arr[1];
    if(strlen($searchTerm)==1){
        $sql = mysqli_query($conn, "SELECT * FROM `branch` 
        WHERE branch_name LIKE '$searchTerm%' ORDER BY `region_id` DESC");

    }else{
        $sql = mysqli_query($conn, "SELECT * FROM `branch` 
        WHERE branch_name LIKE '%$searchTerm%' ORDER BY `region_id` DESC");
    }
       
    include_once "data_branch _showtime.php";
?>
