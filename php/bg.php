<?php
    session_start();
    include_once "config.php";

    $hide = "on";
    $sql = mysqli_query($conn, "SELECT * FROM movie") ;
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        $num=0;
        while($row = mysqli_fetch_assoc($sql)  ){
            $output .= '<div class="bgicon"" >               
                            <img src="php/image/'.$row['poster'].'" alt="" >
                        </div>';
            if($num == 29){
                break;
            }
            $num = $num+1;
        }
    }
    echo $output;
?>