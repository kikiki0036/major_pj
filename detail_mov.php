<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>


<?php 
    $movie_id = $_GET['movie_id'];
    if(!empty($movie_id)){
        $sql = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id ='{$movie_id}'");
        if(mysqli_num_rows($sql) > 0){ 
            $row = mysqli_fetch_assoc($sql);
        }
    }
    $original_date = $row['getindate'];
    $timestamp = strtotime($original_date);
    $new_date = date("d F Y", $timestamp);
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
?>
    <div class="video_frame">
        <iframe width="100%" height="1000px" src="https://www.youtube.com/embed/<?php echo $row['Teaser'];?>?autoplay=1&mute=1&loop=1&controls=0&&amp;start=18" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="H-name">
        <p><?php echo $row['movie_name'];?></p>
    </div>
    <section class="detail_mov">
        <div class="aaa">
            <img src="php/image/<?php echo $row['poster'];?>" alt="">
        </div>
        <div class="bbb">
            <p class="date"><?php echo  $new_date; ?></p>
            <h4 class="name"><?php echo $row['movie_name']; ?></h4>
            <p class="genre"><i class="fa fa-tag" aria-hidden="true" style="margin-right:5px; font-size:10px;"></i><?php echo $genre_all; ?></p>
            <p class="time"><i class="far fa-clock" style="margin-right:5px; font-size:12px; font-weight: 200;"></i><?php echo $h ."  ชม. ". $m." นาที"?></p>
            <p class="rate"><?php echo $row['rate']; ?></p>
            <div class="des_area">
                <h4>เรื่องยอ</h4>
                <p class="des"><?php echo $row['movie_des']; ?></p>
            </div>
        </div>
    </section>

<?php include_once "footer.php"; ?>
</body>
</html>