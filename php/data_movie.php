<?php
    $output = "";
    if(mysqli_num_rows($sql) < 0){
        $output .= "No data";
    }elseif(mysqli_num_rows($sql) > 0){
        while($row = mysqli_fetch_assoc($sql)){

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

            $genre_all='';
            $m_id = $row['movie_id'];
            if(true){
                $sqlgenre = mysqli_query($conn, "SELECT movie.movie_name , type_genre.genre_name FROM `movie` 
                                            INNER JOIN `genre_movie` ON movie.movie_id=genre_movie.movie_id 
                                            INNER JOIN `type_genre` ON type_genre.genre_id=genre_movie.genre_id   
                                            WHERE movie.movie_id = '{$m_id}' ");
                if(mysqli_num_rows($sqlgenre) == 1 ){
                    while($rowgenre = mysqli_fetch_assoc($sqlgenre)){
                        $genre_all = $genre_all.$rowgenre['genre_name'];
                    }
                }elseif(mysqli_num_rows($sqlgenre) > 0){
                    while($rowgenre = mysqli_fetch_assoc($sqlgenre)){
                      $genre_all = $genre_all.$rowgenre['genre_name'].' / ';
                    }
                }
            }

            $m = $runtime;
            $output .= '
                        <div class="list">
                            <div class="details-img">
                                <img src="php/image/'.$row['poster'].'" alt="">
                            </div>
                            <div class="details">
                                <p style="font-weight: 400;">'.$row['movie_name'].'</p>
                                <p style="font-weight: 400;font-size: 15px;">'.$new_date.'</p>
                                <p class="d_rate" style="font-size: 12px; margin-top:-14px;">'.$row['rate'].'</p>
                                <p style="font-size: 12px;">'.$genre_all.'</p>
                                <p style="font-size: 12px;">'.$h.' ชม. '.$m.' นาที</p>
                            </div>
                            <div class="edit">
                                <a href="editmovie.php?movie_id='.$row['movie_id'].'" class="list-btn" role="button"><i class="fas fa-edit"></i></a>
                                <a href="php/hide.php?movie_id='.$row['movie_id'].'" class="list-btn2" role="button" target="iframe_target"><i class="fas fa-minus-circle"></i></a>
                            </div>
                          
                        </div>';
        }
    }
    echo $output;
?>
