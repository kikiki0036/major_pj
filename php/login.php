<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    if(!empty($email) && !empty($pwd)){
        //let's check users entered email & password matched to database any table row email and password
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}' AND pwd = '{$pwd}'");
        if(mysqli_num_rows($sql) > 0){ //if users credentials matched
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['email'] = $row['email']; // using this session we user unique_id in other php file
            echo "success";
        }else{
            echo "Email or Password is incorrect";
        }
    }else{
        echo "ALL input fields are required!";
    }
?>