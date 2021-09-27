<?php
    session_start();
    include_once "config.php";
    $member_name = mysqli_real_escape_string($conn, $_POST['member_name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($member_name) && !empty($phone) && !empty($email) && !empty($password)){
        //let's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //let's check that email already exist in the database or not
            $sql = mysqli_query($conn, "SELECT email FROM member WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //if file is upload
                echo "$email - This email already exist!";
            }else{
                // $random_id = rand(time(), 10000000);
                // $encrypt_pass = md5($password);
                //let's insert all user data inside table
                $sql2 = mysqli_query($conn, "INSERT INTO member (member_name,phone,email, password) VALUES ('{$member_name}','{$phone}','{$email}', '{$password}')");
                if($sql2){ //if these data inserted
                     $sql3 = mysqli_query($conn, "SELECT * FROM member WHERE email = '{$email}'");
                     if(mysqli_num_rows($sql3) > 0) {
                         $row = mysqli_fetch_assoc($sql3);
                         $_SESSION['member_id'] = $row['member_id']; //using this session we user unique_id in other php file
                         echo "success";
                     }
                 }else{
                     echo "Something went wrong!";
                 }
            }
        }else{
            echo "$email - This is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>