<?php 
  include_once "php/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .genre-list{
      display: flex;
      flex-wrap: wrap;
      background-color: darkcyan;
      list-style: none;
      width: 190px;
    }
    .genre-list-box{
      margin: 0 2px;
      padding: 0 3px;
      font-size: 13px;
      color: rgb(255, 255, 255);
    }
  </style>
</head>
<body>
    <ul class="genre-list">
      <li class="genre-list-box">ฟฟหฟห</li>
      <?php 
          if(true){
              $sql = mysqli_query($conn, "SELECT movie.movie_name , type_genre.genre_name FROM `movie` 
                                          INNER JOIN `genre_movie` ON movie.movie_id=genre_movie.movie_id 
                                          INNER JOIN `type_genre` ON type_genre.genre_id=genre_movie.genre_id   
                                          WHERE movie.movie_id = 19 ");
              if(mysqli_num_rows($sql) == 1){
                $output .= "No data";
                echo 'assa';
              }elseif(mysqli_num_rows($sql) > 0){
                while($row = mysqli_fetch_assoc($sql)){
                    echo '<li class="genre-list-box">'.$row['genre_name'].'</li>';
                }
              }
          }
      ?>
    </ul>
</body>
</html>