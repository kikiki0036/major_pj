<?php
    session_start();
    include_once "config.php";
    date_default_timezone_set("Asia/Bangkok");
    $movie_id = mysqli_real_escape_string($conn, $_POST['movie_id']);
    $branch_id = mysqli_real_escape_string($conn, $_POST['branch_id']);
    $lang = mysqli_real_escape_string($conn, $_POST['lang']);
    $theatre_name = mysqli_real_escape_string($conn, $_POST['theatre']);
    $datastart = mysqli_real_escape_string($conn, $_POST['datastart']);
    $dataend = mysqli_real_escape_string($conn, $_POST['dataend']);
    $theatre = mysqli_real_escape_string($conn, $_POST['dataend']);
    $date = date("Y-m-d h:i:s");
    $time1 = mysqli_real_escape_string($conn, $_POST['time1']);
    $time1x = mysqli_real_escape_string($conn, $_POST['time1x']);
    $time2 = mysqli_real_escape_string($conn, $_POST['time2x']);
    $time2x = mysqli_real_escape_string($conn, $_POST['time2x']);
    $time3 = mysqli_real_escape_string($conn, $_POST['time3']);
    $time3x = mysqli_real_escape_string($conn, $_POST['time3x']);
    $time4 = mysqli_real_escape_string($conn, $_POST['time4']);
    $time4x = mysqli_real_escape_string($conn, $_POST['time4x']);
    $time5 = mysqli_real_escape_string($conn, $_POST['time5']);
    $time5x = mysqli_real_escape_string($conn, $_POST['time5x']);
    $time6 = mysqli_real_escape_string($conn, $_POST['time6']);
    $time6x = mysqli_real_escape_string($conn, $_POST['time6x']);
    $time7 = mysqli_real_escape_string($conn, $_POST['time7']);
    $time7x = mysqli_real_escape_string($conn, $_POST['time7x']);
    $time_arr = array($time1,$time1x,$time2,$time2x,$time3,$time3x,$time4,$time4x,$time5,$time5x,$time6,$time6x,$time7,$time7x);

    // $dataend="2021-10-22";
    // $datastart = "2021-10-20";
    // while($datastart < $dataend) {
    //   $datastart=date('Y-m-d', strtotime($datastart. ' + 1 days'));
    //   echo $datastart." || ";
    // } 
    if(!empty($movie_id)&& !empty($branch_id) && !empty($lang) && !empty($theatre_name) && !empty($datastart)&& !empty($dataend)&& !empty($theatre)&& !empty($data_showtime)&& !empty($time1)&& !empty($time1x));
    {
         $sqlbranch = mysqli_query($conn, "SELECT theatre_id FROM `theatre` WHERE theatre_name = '{$theatre_name}' AND  branch_id = '{$branch_id}'");
         
         if(mysqli_num_rows($sqlbranch) > 0) {
            $row_sqlbranch = mysqli_fetch_assoc($sqlbranch);   
            $theatre_id = $row_sqlbranch['theatre_id'];

            $sql = mysqli_query($conn, "INSERT INTO set_of_showtime (movie_id ,branch_id ,theatre_id ,lang ,date) 
                                        VALUES ('$movie_id','$branch_id', '$theatre_id','$lang','$date')");          

            if($sql){ 
                $sql_showtime = mysqli_query($conn, "SELECT * FROM set_of_showtime WHERE movie_id = '{$movie_id}' AND branch_id = '{$branch_id}' AND theatre_id = '{$theatre_id}' AND lang = '{$lang}'");
               
                if(mysqli_num_rows($sql_showtime) > 0) {
                    $row_sql_showtime = mysqli_fetch_assoc($sql_showtime);
                    $setshow_id = $row_sql_showtime['setshow_id'];

                    while($datastart < $dataend){
                        for( $i=0; $i<14; $i+=2) {
                            if($time_arr[$i] != "" && $time_arr[$i+1] != ""){
                                $time_1 = $time_arr[$i];
                                $time_2 = $time_arr[$i+1];
                                mysqli_query($conn, "INSERT INTO showtime (date_showtime ,timestart ,timeend ,setshow_id) VALUES ('$datastart','$time_1', '$time_2','$setshow_id')");   
                            }
                        }
                        $datastart = date('Y-m-d', strtotime($datastart. ' + 1 days'));
                    }
                    echo "success";
                }
            }
        }
    }
?>