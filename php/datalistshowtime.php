<?php
    session_start();
    include_once "config.php";
    $sql_set_of_showtime = mysqli_query($conn, "SELECT *FROM `set_of_showtime` 
                                        INNER JOIN `movie` ON movie.movie_id=set_of_showtime.movie_id
                                        INNER JOIN `branch` ON branch.branch_id=set_of_showtime.branch_id   
                                        INNER JOIN `theatre` ON theatre.theatre_id=set_of_showtime.theatre_id ORDER BY `date` ASC");

    $d="";
    // $sql = mysqli_query($conn, "SELECT movie.movie_name,movie.runtime,movie.poster,showtime.date ,showtime.timestart ,showtime.timeend,showtime.lang,branch.branch_name,theatre.theatre_name 
    //                              FROM `showtime`INNER JOIN `movie` ON movie.movie_id=showtime.movie_id INNER JOIN `branch` ON branch.branch_id=showtime.branch_id INNER JOIN `theatre` ON theatre.theatre_id=showtime.theatre_id");
    include_once "data_showtime.php";
?>
