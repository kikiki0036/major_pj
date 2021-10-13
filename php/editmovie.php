<?php
    session_start();
    include_once "config.php";
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
    $getindate = mysqli_real_escape_string($conn, $_POST['getindate']);
    $getoutdate = mysqli_real_escape_string($conn, $_POST['getoutdate']);
    $m_id = mysqli_real_escape_string($conn, $_POST['m_id']);

    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $genre2 = mysqli_real_escape_string($conn, $_POST['genre2']);
    $genre3 = mysqli_real_escape_string($conn, $_POST['genre3']);
    $genre4 = mysqli_real_escape_string($conn, $_POST['genre4']);
    $genre5 = mysqli_real_escape_string($conn, $_POST['genre5']);
    $genre_arr = array($genre,$genre2,$genre3,$genre4,$genre5 );
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $time = mysqli_real_escape_string($conn, $_POST['time']); 
    $teaser = mysqli_real_escape_string($conn, $_POST['teaser_id']);
    if(!empty($mname) && !empty($synopsis) && !empty($getindate) && !empty($getoutdate)&& !empty($genre)&& !empty($time)&& !empty($teaser)&& !empty($rate)&& !empty($sname))
    {
            //let's check that email already exist in the database or no
                $movie_id = $m_id;
                $new_img_name='nofile';
                if(isset($_FILES['image'])){ //if file is upload
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode); //here we get the extension of an user uploaed img file
                    $extensions = ['png', 'jpeg', 'jpg']; //these are some valid img ext and we've store them in array
                    if(in_array($img_ext, $extensions) === true){
                        // $time = time(); 
                        // $random_id = rand(time(), 10000000);
                        $p = preg_replace('/[^\w\s_-]/i','', $mname);
                        $new_img_name = $p.".".$img_ext;
                        move_uploaded_file($tmp_name, "image/".$new_img_name);
                    }
                }
                $original_date = $getindate;
                $timestamp = strtotime($original_date);
                $new_date1 = date("Y-m-d", $timestamp);
                $original_date = $getoutdate;
                $timestamp = strtotime($original_date);
                $new_date2 = date("Y-m-d", $timestamp);

                $hide = "on";
                $sql2 = mysqli_query($conn, "UPDATE movie SET movie_name = '$mname' , movie_des = '$synopsis' , rate = '$rate'
                                                     , runtime = '$time' , getindate = '$new_date1' , getoutdate = '$new_date2'
                                                     , Teaser = '$teaser', movie_Sname = '$sname' WHERE movie_id ='{$movie_id}'");  
                if($new_img_name != 'nofile'){
                    mysqli_query($conn, "UPDATE movie SET poster = '$new_img_name' WHERE movie_id ='{$movie_id}'");  
                }
                // $sql2 = mysqli_query($conn, "INSERT INTO movie (movie_name,movie_des,rate,runtime,getindate,getoutdate,poster,Teaser,hide) 
                //                             VALUES ('$mname','$synopsis', '$rate','$time','$new_date1', '$new_date2', '$new_img_name', '$teaser','$hide')");
                if($sql2){ 
                    mysqli_query($conn, "DELETE FROM genre_movie WHERE movie_id='{$movie_id}'");
                    $sql3 = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id = '{$movie_id}'");
                    if(mysqli_num_rows($sql3) > 0) {
                        $row = mysqli_fetch_assoc($sql3);
                        for( $i=0; $i<5; $i++) {
                            if($genre_arr[$i] != 'null'){
                                $sql_type_genre_name =  mysqli_query($conn, "SELECT * FROM type_genre WHERE genre_name ='{$genre_arr[$i]}'"); 
                                if(mysqli_num_rows($sql_type_genre_name) > 0){ 
                                    $row_type_genre = mysqli_fetch_assoc($sql_type_genre_name);
                                }
                                $movie_id = $row['movie_id'];
                                $genre_id = $row_type_genre['genre_id'];
                                $sqlgenre = mysqli_query($conn, "INSERT INTO genre_movie (movie_id,genre_id) VALUES ('$movie_id','$genre_id')");
                            }
                        }
                        echo "success";
                    }else{
                        
                    }
                }else{
                    echo "Something went wrong!";
                }
    }else{
        echo "All input fields are required!";
    }
?>