<?php
    session_start();
    include_once "config.php";
    $movie_id = $_GET['movie_id'];
    $hide= "off";
    if(!empty($movie_id)){
        $sql = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id ='{$movie_id}'");
        if(mysqli_num_rows($sql) > 0){ //if users credentials matched
            $row = mysqli_fetch_assoc($sql);
            $movie_name = $row['movie_name'];
            mysqli_query($conn, "UPDATE movie SET hide = '$hide' WHERE movie_id ='{$movie_id}'");           
            echo "<script language=\"JavaScript\">";
            echo "alert('Remove data : $movie_name');";
            echo "</script>";          
            // header("location: ../JAVASCRIPT/detaillist.php");
          
        }
        // $sql = mysqli_query($conn, "UPDATE movie SET hide = '$hide' WHERE movie_id ='{$movie_id}'");
    }
?>