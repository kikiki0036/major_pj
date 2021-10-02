<?php
    session_start();
    include_once "config.php";
    // SELECT * FROM table WHERE curdate()<date_add(date_field,interval 5 day)
    // where fieldname like concat( '%/',month(now),'/%')
    // SELECT * FROM `movie` ORDER BY `getindate` DESC
    // WHERE  month(getindate) = month(now())
    //month(getindate) = month(now())
    $sql = mysqli_query($conn, "SELECT * FROM movie WHERE month(getindate) != month(now()) AND curdate()>getindate ORDER BY `getindate` DESC") ;//แสงรายการเดือนปัจจุบันแบบเรียงข้อมูลจากรายการเข้าใหม่ไปรายการเก่า
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="#" class="aofmovlist">
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