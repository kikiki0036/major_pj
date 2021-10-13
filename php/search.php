<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    // $search = mysqli_real_escape_string($conn, $_POST['search']);
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $arr = explode('|',$searchTerm);
    $m = $arr[0];
    $g = $arr[1];
    // echo $m;
    // echo $g;
    if($g != "" && $m == ""){
        $sql = mysqli_query($conn, "SELECT * FROM `movie` 
                                    INNER JOIN `genre_movie` ON movie.movie_id=genre_movie.movie_id 
                                    INNER JOIN `type_genre` ON type_genre.genre_id=genre_movie.genre_id   
                                    WHERE type_genre.genre_name = '{$g}' ");
    }else if($g != "" && $m != ""){
                if(strlen($m)==1){
                    $sql = mysqli_query($conn, "SELECT * FROM `movie` 
                    INNER JOIN `genre_movie` ON movie.movie_id=genre_movie.movie_id 
                    INNER JOIN `type_genre` ON type_genre.genre_id=genre_movie.genre_id   
                    WHERE type_genre.genre_name = '{$g}' AND movie_name LIKE '$m%'");
                }else{
                    $sql = mysqli_query($conn, "SELECT * FROM `movie` 
                    INNER JOIN `genre_movie` ON movie.movie_id=genre_movie.movie_id 
                    INNER JOIN `type_genre` ON type_genre.genre_id=genre_movie.genre_id   
                    WHERE type_genre.genre_name = '{$g}' AND movie_name LIKE '%$m%'");
                }
    }else if(strlen($m)==1){
       $sql = mysqli_query($conn, "SELECT * FROM `movie` 
                                   WHERE movie_name LIKE '%$m%' AND hide = '{$hide}' ORDER BY `getindate` ASC");
    }else{
       $sql = mysqli_query($conn, "SELECT * FROM `movie` 
                                   WHERE hide = '{$hide}' AND movie_name LIKE '%$m%' OR rate LIKE '%$m%' ORDER BY `getindate` ASC");
    }
    include_once "data_movie.php";
?>
