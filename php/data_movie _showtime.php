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
            $m = $runtime;
        
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
            // <div class="movie-box"  onclick="getmovie_id('.$row['movie_id'].','.$row['movie_name'].','.$row['poster'].','.$genre_all.','.$row['rate'].','.$row['runtime'].','.$new_date.')">

            $output .= '
                        <div class="movie-box"  onclick="getmovie_id('.$row['movie_id'].',\''.$row['movie_name'].'\',\''.$row['poster'].'\',\''.$genre_all.'\',\''.$row['rate'].'\',\''.$row['runtime'].'\',\''.$new_date.'\')">
                            <div class="img-movie">
                                <img src="php/image/'.$row['poster'].'" alt="">
                            </div>
                            <p>'.$row['movie_name'].'</p>
                        </div>    ';
        }
    }
    echo $output;
?>
