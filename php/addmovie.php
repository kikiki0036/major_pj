<?php
    session_start();
    include_once "config.php";
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $sname = mysqli_real_escape_string($conn, $_POST['sname']);
    $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
    $getindate = mysqli_real_escape_string($conn, $_POST['getindate']);
    $getoutdate = mysqli_real_escape_string($conn, $_POST['getoutdate']);
    // input genre
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $genre2 = mysqli_real_escape_string($conn, $_POST['genre2']);
    $genre3 = mysqli_real_escape_string($conn, $_POST['genre3']);
    $genre4 = mysqli_real_escape_string($conn, $_POST['genre4']);
    $genre5 = mysqli_real_escape_string($conn, $_POST['genre5']);
    // genre plus
    // $mix = $genre;
    // if($genre2 != 'null'){
    //     $mix = $mix.' , '.$genre2 ;
    // }
    // if($genre3 != 'null'){
    //     $mix = $mix.' , '.$genre3 ;
    // }
    // if($genre4 != 'null'){
    //     $mix = $mix.' , '.$genre4 ;
    // }
    // if($genre5 != 'null'){
    //     $mix = $mix.' , '.$genre5 ;
    // }
    
    $genre_arr = array($genre,$genre2,$genre3,$genre4,$genre5 );
  
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $time = mysqli_real_escape_string($conn, $_POST['time']); 
    $teaser = mysqli_real_escape_string($conn, $_POST['teaser_id']);
    if(!empty($mname)&& !empty($sname) && !empty($synopsis) && !empty($getindate) && !empty($getoutdate)&& !empty($genre)&& !empty($time)&& !empty($teaser)&& !empty($rate))
    {
            //let's check that email already exist in the database or not
            $sql = mysqli_query($conn, "SELECT movie_name FROM movie WHERE movie_name = '{$mname}'");
             
            if(mysqli_num_rows($sql) > 0){ //if file is upload
                echo "$mname - This name already exist!";
            }else{
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
                        $original_date = $getindate;
                        $timestamp = strtotime($original_date);
                        $new_date1 = date("Y-m-d", $timestamp);
                        $original_date = $getoutdate;
                        $timestamp = strtotime($original_date);
                        $new_date2 = date("Y-m-d", $timestamp);


                        if(move_uploaded_file($tmp_name, "image/".$new_img_name)){
                            $hide = "on";
                            $sql2 = mysqli_query($conn, "INSERT INTO movie (movie_name,movie_Sname,movie_des,rate,runtime,getindate,getoutdate,poster,Teaser,hide) 
                                                        VALUES ('$mname','$sname','$synopsis', '$rate','$time','$new_date1', '$new_date2', '$new_img_name', '$teaser','$hide')");
                           if($sql2){ 
                                $sql3 = mysqli_query($conn, "SELECT * FROM movie WHERE movie_name = '{$mname}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    // for( $i=0; $i<5; $i++) {
                                    //     if($genre_arr[$i] !='null'){
                                    //         echo $genre_arr[$i];
                                    //     }else{
                                    //        echo $genre_arr[$i].'+';
                                    //     }
                                        
                                    // }
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
                        }                       
                    }else{
                        echo "Please select an Image file - jpeg, jpg, png!";
                    }
                }else{
                    echo "Please select an Image file";
                }
            }
    }else{
        echo "All input fields are required!";
    }
?>