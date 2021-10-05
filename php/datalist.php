<?php
    session_start();
    include_once "config.php";
    $hide = "on";
    $sql = mysqli_query($conn, "SELECT * FROM movie  WHERE hide = '{$hide}' ORDER BY `getindate` ASC") ;
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $btn='';
            // if( $row['hide'] == "on" ){
                $btn = ' <a href="#" class="list-btn1" ><i class="fas fa-minus-circle"></i></a>';
            // }
            // else if($row['hide'] == "off" ){
            //     $btn = ' <a href="#" class="list-btn2" ><i class="fas fa-plus-circle"></i></a>';
            // }
            $original_date = $row['getindate'];
            $timestamp = strtotime($original_date);
            $new_date = date("d M Y", $timestamp);
            $runtime =  $row['runtime'];
            $h = 0;
            $m = 0;
            while($runtime > 60){
                $runtime -= 60;
                $h++;
            }
            $m = $runtime;
            $output .= '
                        <div class="list">
                            <div class="details-img">
                                <img src="php/image/'.$row['movie_name'].'.jpg" alt="">
                            </div>
                            <div class="details">
                                <p style="width: 200px;">'.$row['movie_name'].'</p>
                                <p style="width: 120px;">'.$new_date.'</p>
                                <p style="width: 50px;">'.$row['rate'].'</p>
                                <p style="width: 280px;">'.$row['genre'].'</p>
                                <p style="width: 120px;">'.$h.' ชม. '.$m.' นาที</p>
                            </div>
                            <div class="edit">
                                <a href="detail_mov.php?movie_id='.$row['movie_id'].'" class="list-btn" role="button" ><i class="fas fa-edit"></i></a>
                                <a href="php/hide.php?movie_id='.$row['movie_id'].'" class="list-btn2" ><i class="fas fa-minus-circle"></i></a>
                            </div>
                        </div>';
        }
    }
    echo $output;
?>