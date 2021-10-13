<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    $sql = mysqli_query($conn, "SELECT * FROM branch WHERE region_id ='south'");
    $output = "";   
    if(mysqli_num_rows($sql) <= 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<div class="area-branch-box">
                            <img src="php/image/icon_m.png" alt="">
                            <a href="">'. $row['branch_name'] .'</a>
                        </div>';
        }
    }
    echo $output;
?>