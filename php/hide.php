
<?php
    session_start();
    include_once "config.php";
    $movie_id = $_GET['movie_id'];
    $hide= "off";
    echo $movie_id;
    if(!empty($movie_id)){
        $sql = mysqli_query($conn, "UPDATE movie SET hide = '$hide' WHERE movie_id ='{$movie_id}'");
        header("location: ../mainadmin.php");
        // header("location: ../JAVASCRIPT/datalist.js");

    }
?>
