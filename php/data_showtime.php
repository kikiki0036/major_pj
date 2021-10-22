<?php
    $output = "";
    
    if(mysqli_num_rows($sql_set_of_showtime) < 0){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql_set_of_showtime) > 0){
        while($row = mysqli_fetch_assoc($sql_set_of_showtime)){
            $output_showtime="";
            if($d != ""){
                // echo $d;
                $sql_showtime = mysqli_query($conn, "SELECT *FROM `showtime`
                INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id=showtime.setshow_id
                WHERE showtime.setshow_id = '{$row['setshow_id']}' AND showtime.date_showtime LIKE '%$d%' ORDER BY `showtime`.`showtime_id` ASC");
                
                $zzz = mysqli_query($conn, "SELECT *FROM `showtime`
                INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id=showtime.setshow_id
                WHERE showtime.setshow_id = '{$row['setshow_id']}' AND showtime.date_showtime LIKE '%$d%' ORDER BY `showtime`.`showtime_id` ASC");
            }else{
                $sql_showtime = mysqli_query($conn, "SELECT *FROM `showtime`
                INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id=showtime.setshow_id
                WHERE showtime.setshow_id = '{$row['setshow_id']}'ORDER BY `showtime`.`showtime_id` ASC");
                $zzz = mysqli_query($conn, "SELECT *FROM `showtime`
                INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id=showtime.setshow_id
                WHERE showtime.setshow_id = '{$row['setshow_id']}'ORDER BY `showtime`.`showtime_id` ASC");
            }
           
            $a = array();
            $a2 = array();
            $row_zzz = mysqli_fetch_assoc($zzz);
            $date_showtime = $row_zzz['date_showtime'];
            $new_date;
            // echo $date_showtime;
            if(mysqli_num_rows($sql_showtime) < 0){
                $output_showtime .= "No data";
            }elseif(mysqli_num_rows($sql_showtime) > 0){
                
                while($row_sql_showtime = mysqli_fetch_assoc($sql_showtime)){
                    $date_showtime_n = $row_sql_showtime['date_showtime'];
                    if( $date_showtime_n !=  $date_showtime){
                        // echo "wow"." || ";
                        array_push($a,$output_showtime);
                        array_push($a2,$new_date);
                        $output_showtime='';
                        $date_showtime = $date_showtime_n;
                    }
                    $timestamp = strtotime($date_showtime_n);
                    $new_date = date("d M Y", $timestamp);

                    $original_time = $row_sql_showtime['timestart'];
                    $times = strtotime($original_time);
                    $new_time = date("H:i", $times);
                    $output_showtime = $output_showtime.'<li>'.$new_time.'</li>';
                    
                }
                // echo " &&& ";
                array_push($a,$output_showtime);
                array_push($a2,$new_date);
            }

            
           
            // $runtime =  $row['runtime'];
            // $h = 0;
            // $m = 0;
            // while($runtime > 60){
            //     $runtime -= 60;
            //     $h++;
            // }
            // $m = $runtime;
            $leg = count($a);
            for($ii=0; $ii < $leg; $ii++){
                // echo $a[$ii]." |x| ".$a2[$ii]."---";
                $output .= ' <div class="showtime-box">
                            <div class="box1-movie">
                            <div class="poster">
                                <img src="php/image/'.$row['poster'].'" alt="">
                            </div>
                            <div class="detail-showtime">
                                <div class="text-box title"><p>'.$row['movie_name'].'</p></div>
                                <div class="text-box">
                                    <ul>
                                        <li>'.$row['lang'].'</li>
                                        <li>'.$row['runtime'].' นาที</li>
                                        <li>'.$row['rate'].'</li>
                                        <li>'.$a2[$ii].'</li>
                                    </ul>
                                </div>
                                <div class="timeshow">
                                    <ul>
                                        '.$a[$ii].'
                                    </ul>
                                </div>
                            </div>
                            
                            </div>
                            <div class="box2-branch">
                                <div style="margin-top:35px;"><i class="fas fa-map-marker-alt"></i>'.$row['branch_name'].'</div>
                                <div style="margin-left:20px;margin-top:-5px;">'.$row['theatre_name'].'</div>
                            </div>
                        </div>';
            }
                                 
        }
    }
    echo $output;
?>

