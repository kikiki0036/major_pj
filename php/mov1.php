<?php
    session_start();
    include_once "config.php";
    // SELECT * FROM table WHERE curdate()<date_add(date_field,interval 5 day)
    $sql = mysqli_query($conn, "SELECT * FROM movie  WHERE curdate()>=getindate");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="#">
                            <div class="content">
                                <div class="details">
                                    <img src="'. $row['poster'] .'" alt="">
                                </div>
                                <div class="movbutton">
                                    <input type="button" value="view" style="background:rgb(255, 255, 255)">
                                    <input type="button" value="book" style="background:rgb(206, 165, 0); color: #ffffff;">
                                </div>
                            </div>
                        </a>';
        }
    }
    echo $output;
?>