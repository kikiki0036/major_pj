<?php
    session_start();
    include_once "config.php";
    date_default_timezone_set("Asia/Bangkok");

// name="showtime_id" 
// name="set_of_showtime_id" 
// name="seat_id"  
// name="email"  
// name="total-price-book" 

    $showtime_id = mysqli_real_escape_string($conn, $_POST['showtime_id']);
    $set_of_showtime_id = mysqli_real_escape_string($conn, $_POST['set_of_showtime_id']);
    $seat_id = mysqli_real_escape_string($conn, $_POST['seat_id']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $total_price_book = mysqli_real_escape_string($conn, $_POST['total_price_book']);
    $total_price_ticket = mysqli_real_escape_string($conn, $_POST['total_price_ticket']);
    $total_price_combo = mysqli_real_escape_string($conn, $_POST['total_price_combo']);
    

    $date = date("Y-m-d h:i:s");
    $SET14 = mysqli_real_escape_string($conn, $_POST['14']);
    $SET15 = mysqli_real_escape_string($conn, $_POST['15']);
    $SET16 = mysqli_real_escape_string($conn, $_POST['16']);
    $SET17 = mysqli_real_escape_string($conn, $_POST['17']);
    $SET19 = mysqli_real_escape_string($conn, $_POST['19']);


    $SET_arr = array($SET14,$SET15,$SET16,$SET17,$SET19);
    $SET_arr_id  = array(14,15,16,17,19);
    if(!empty($showtime_id)&& !empty($set_of_showtime_id) && !empty($seat_id) && !empty($email) && !empty($total_price_book)&& !empty($total_price_book))
    {
        $sql = mysqli_query($conn, "INSERT INTO `booked` (total_price,book_date,email,showtime_id) VALUES ('{$total_price_book}','{$date}','{$email}','{$showtime_id}')");   
        if($sql){
            $sql2 = mysqli_query($conn, "SELECT * FROM `booked` WHERE email = '{$email}' AND book_date = '{$date}'");
            $row = mysqli_fetch_assoc($sql2);
            $seat_arr =  explode(" ",$seat_id);
            $count = count($seat_arr);
            for($i=1;$i<$count;$i++){
                echo $seat_arr[$i]."|";
                $seat_name = $seat_arr[$i];
                $sql_check_id= mysqli_query($conn, " SELECT * FROM `seat` WHERE seat_name = '{$seat_name}' ORDER BY `seat_id` ASC");
                if(mysqli_num_rows($sql_check_id) > 0){ 
                      $row_check_id = mysqli_fetch_assoc($sql_check_id);
                      $seat_id_n = $row_check_id['seat_id'];
                      $book_id = $row['book_id'];
                      $sql_ticket = mysqli_query($conn, "INSERT INTO ticket (seat_id ,book_id,showtime_id) 
                                               VALUES ('$seat_id_n', 
                                               '$book_id', 
                                               '$showtime_id')");  
                }else{
                    echo "non seat id";
                }
            }        
            for($i=0;$i<5;$i++){
                if($SET_arr[$i] != "" && $SET_arr[$i] != "0"){
                    $book_id = $row['book_id'];
                    $sql_combo = mysqli_query($conn, "INSERT INTO `order_list` (book_id,combo_id,qty) 
                                               VALUES ('$book_id','$SET_arr_id[$i]','$SET_arr[$i]')");
                     echo "win comboset";
                }else{
                    echo "non comboset";
                }
                 
            }
            header("location: ../main.php");

       
        }else{
            echo "non data";
        }
 
    }else{
        echo "non";
    }
?>