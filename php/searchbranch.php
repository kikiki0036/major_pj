<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    // $search = mysqli_real_escape_string($conn, $_POST['search']);
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $arr = explode('|',$searchTerm);
    $m = $arr[0];
    $g = $arr[1];
    $d = $arr[2];
    // echo $m;
    // echo $g;
    // if(strlen($m)==1){
    if($g != "" && $m == ""){
        $sql_set_of_showtime = mysqli_query($conn, "SELECT *FROM `set_of_showtime` 
        INNER JOIN `movie` ON movie.movie_id=set_of_showtime.movie_id
        INNER JOIN `branch` ON branch.branch_id=set_of_showtime.branch_id
        INNER JOIN `region` ON region.region_id=branch.region_id   
        INNER JOIN `theatre` ON theatre.theatre_id=set_of_showtime.theatre_id WHERE region.region_name LIKE '%$g%'");

    }else if($g != "" && $m != ""){
        $sql_set_of_showtime = mysqli_query($conn, "SELECT *FROM `set_of_showtime` 
        INNER JOIN `movie` ON movie.movie_id=set_of_showtime.movie_id
        INNER JOIN `branch` ON branch.branch_id=set_of_showtime.branch_id 
        INNER JOIN `region` ON region.region_id=branch.region_id  
        INNER JOIN `theatre` ON theatre.theatre_id=set_of_showtime.theatre_id 
        WHERE region.region_name LIKE '%$g%'AND branch_name LIKE '%$m%'");

    }else{
        $sql_set_of_showtime = mysqli_query($conn, "SELECT *FROM `set_of_showtime` 
        INNER JOIN `movie` ON movie.movie_id=set_of_showtime.movie_id
        INNER JOIN `branch` ON branch.branch_id=set_of_showtime.branch_id   
        INNER JOIN `theatre` ON theatre.theatre_id=set_of_showtime.theatre_id 
        WHERE branch_name LIKE '%$m%'  ORDER BY `date` ASC");

    }
       
    include_once "data_showtime.php";
?>
