<?php 
     $sql = mysqli_query($conn, "SELECT * FROM movie WHERE month(getindate) = month(now()) AND curdate()>getindate ORDER BY `getindate` DESC") ;//แสงรายการเดือนปัจจุบันแบบเรียงข้อมูลจากรายการเข้าใหม่ไปรายการเก่า");
     $output = "";
     if(mysqli_num_rows($sql) == 1){
         $output .= "No data";
     }elseif(mysqli_num_rows($sql) > 0){
         while($row = mysqli_fetch_assoc($sql)){
             $original_date = $row['getindate'];
             $timestamp = strtotime($original_date);
             $new_date = date("d M Y", $timestamp);
             echo '<div style="height: 500px; width: 100%;  ">
                <div class="video_list">
                    <iframe width="1000%" height="1000px" src="https://www.youtube.com/embed/'. $row['Teaser'] .'?autoplay=1&mute=1&loop=1&controls=0&&amp;start=18" frameborder="0" allowfullscreen></iframe>
                </div>
                <div class="list_mov">
                    <p>'. $row['movie_name'] .'</p>
                </div>
             </div>';

         }
     }
?>
