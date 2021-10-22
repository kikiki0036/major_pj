<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
    <div class="profile-area" style="margin-top: 110px;margin-bottom:42px;"><p>BOOK</p></div>
        <div class="book">
            <?php 
                $email = $_SESSION['email'];
                $sql = mysqli_query($conn, "SELECT * FROM `booked` 
                        INNER JOIN `showtime` ON showtime.showtime_id  = booked.showtime_id 
                        INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id = showtime.setshow_id 
                        INNER JOIN `movie` ON movie.movie_id  = set_of_showtime.movie_id  WHERE booked.email = '{$email}'");
            
                if(mysqli_num_rows($sql) > 0){ 
                    while($row = mysqli_fetch_assoc($sql)){
                        $original_time = $row['timestart'];
                        $times = strtotime($original_time);
                        $new_time = date("H:i", $times);
                        echo ' <ul>
                                    <li><img src="php/image/'.$row['poster'].'" alt=""></li>
                                    <li>รอบ '.$new_time.'</li>
                                    <li>'.$row['movie_name'].'</li>
                                    <li>'.$row['book_date'].'</li>
                              </ul>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
