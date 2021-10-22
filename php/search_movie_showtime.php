<?php
    session_start();
    include_once "config.php";
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    // $arr = explode('|',$searchTerm);
    // $m = $arr[0];
    // $g = $arr[1];
    $hide = 'on';
    if(strlen($searchTerm)==1){
        $sql = mysqli_query($conn, "SELECT * FROM `movie` 
        WHERE movie_name LIKE '$searchTerm%' AND hide = '{$hide}' ORDER BY `getindate` DESC");

    }else{
        $sql = mysqli_query($conn, "SELECT * FROM `movie` 
        WHERE hide = '{$hide}' AND movie_name LIKE '%$searchTerm%' ORDER BY `getindate` DESC");
    }
       
    include_once "data_movie _showtime.php";
?>
