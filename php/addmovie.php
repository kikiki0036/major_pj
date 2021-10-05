<?php
    session_start();
    include_once "config.php";
    $mname = mysqli_real_escape_string($conn, $_POST['mname']);
    $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
    $getindate = mysqli_real_escape_string($conn, $_POST['getindate']);
    $getoutdate = mysqli_real_escape_string($conn, $_POST['getoutdate']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $rate = "น 15+";
    $time = mysqli_real_escape_string($conn, $_POST['time']); 
    $teaser = mysqli_real_escape_string($conn, $_POST['teaser_id']);
    if(!empty($mname) && !empty($synopsis) && !empty($getindate) && !empty($getoutdate)&& !empty($genre)&& !empty($time)&& !empty($teaser))
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
                        $new_img_name = $mname.".".$img_ext;
                        $original_date = $getindate;
                        $timestamp = strtotime($original_date);
                        $new_date1 = date("Y-m-d", $timestamp);
                        $original_date = $getoutdate;
                        $timestamp = strtotime($original_date);
                        $new_date2 = date("Y-m-d", $timestamp);

                        if(move_uploaded_file($tmp_name, "image/".$new_img_name)){
                            $hide = "on";
                            $sql2 = mysqli_query($conn, "INSERT INTO movie (movie_name,movie_des,genre,rate,runtime,getindate,getoutdate,poster,Teaser,hide) 
                                                        VALUES ('$mname','$synopsis','$genre', '$rate','$time','$new_date1', '$new_date2', '$new_img_name', '$teaser','$hide')");
                            if($sql2){ 
                                $sql3 = mysqli_query($conn, "SELECT * FROM movie WHERE movie_name = '{$mname}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
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