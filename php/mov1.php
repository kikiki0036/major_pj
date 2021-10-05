<?php
    session_start();
    include_once "config.php";
    // SELECT * FROM table WHERE curdate()<date_add(date_field,interval 5 day)
    // where fieldname like concat( '%/',month(now),'/%')
    // SELECT * FROM `movie` ORDER BY `getindate` DESC
    // WHERE  month(getindate) = month(now())
    //month(getindate) = month(now())
    // WHERE month(getindate) = month(now()) AND curdate()>getindate ORDER BY `getindate` DESC") ;//แสงรายการเดือนปัจจุบันแบบเรียงข้อมูลจากรายการเข้าใหม่ไปรายการเก่า
    $hide = "on";
    $sql = mysqli_query($conn, "SELECT * FROM movie WHERE month(getindate) = month(now()) AND curdate()>getindate AND hide='{$hide}' ORDER BY `getindate` DESC") ;//แสงรายการเดือนปัจจุบันแบบเรียงข้อมูลจากรายการเข้าใหม่ไปรายการเก่า");
    $output = "";

    if(mysqli_num_rows($sql) == 1){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $original_date = $row['getindate'];
            $timestamp = strtotime($original_date);
            $new_date = date("d M Y", $timestamp);
            // $today = date("d M Y"."2020-05-12");  
            // echo $new_date;
            $runtime =  $row['runtime'];
            $h = 0;
            $m = 0;
            while($runtime > 60){
                $runtime -= 60;
                $h++;
            }
            $m = $runtime;
            $output .= '<style>
                            
                        </style>
                        <a href="detail_mov.php?movie_id='.$row['movie_id'].'" class="aofmovlist" style="height: 342px;width:235px;">
                            <div class="mlbc-hover" style="
                                border-radius: 10px;  
                                color: beige;">
                                <div class="mlbc-name">'. $row['movie_name'] .'</div>
                                <div class="mlbc-cate"><i class="fa fa-tag" aria-hidden="true" style="margin-right:5px; font-size:0.001px;"></i>'. $row['genre'] .'</div>
                                <div class="mlbc-time"><i class="far fa-clock" style="margin-right:5px; font-size:10px; font-weight: 200;"></i>'.$h.' ชม. '.$m.' นาที</div>
                                <div class="mlbc-sound" style="font-size: 11px;"><i class="fa fa-volume-off" aria-hidden="true" style="margin-right:5px ;font-size:13px;"> </i> ENG / SUBTITLE</div>
                                <div class="mlbc-cate"  style="font-size: 16px;text-transform: uppercase;color: #f018e9;text-shadow: 0 1px 1px rgba(0, 0, 0, 0.8);"><i class="fa fa-calendar-o" aria-hidden="true" style="margin-right:10px ;font-size:15px;color:#fff;"> </i>'. $new_date .' </div>
                            </div>
                            <div class="content">
                                <div class="details">
                                <img src="php/image/'.$row['movie_name'].'.jpg" alt="">

                                </div>
                                <div class="movbutton"> </div>
                            </div>
                            <div class="mlbc-btn">
                                <a href="detail_mov.php?movie_id='.$row['movie_id'].'" class="mlbc-btn-mi" role="button" >ดูเพิ่มเติม</a>
                                <a href="#" class="mlbc-btn-bn" >จอง</a>
                            </div>   
                        </a>';
        }
    }
    echo $output;
?>