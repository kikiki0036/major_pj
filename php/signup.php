<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $birth = mysqli_real_escape_string($conn, $_POST['birth']);
    if(!empty($email) && !empty($username) && !empty($pwd) && !empty($birth) ){
        //let's check user email is valid or not
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            //let's check that email already exist in the database or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){ //if file is upload
                echo "$email - This email already exist!";
            }else{
                // $random_id = rand(time(), 10000000);
                // $encrypt_pass = md5($password);
                //let's insert all user data inside table
                $sql2 = mysqli_query($conn, "INSERT INTO users (email,username,phone, pwd,birth) VALUES ('{$email}','{$username}','{$phone}', '{$pwd}', '{$birth}')");
                if($sql2){ //if these data inserted
                     $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                     if(mysqli_num_rows($sql3) > 0) {
                         $row = mysqli_fetch_assoc($sql3);
                         $_SESSION['email'] = $row['email']; //using this session we user unique_id in other php file
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