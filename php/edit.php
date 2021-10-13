<?php
    session_start();
    $email = $_SESSION['email'];
    include_once "config.php";
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    if(!empty($username)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE username ='{$username}' AND email='{$email}'");
        if(mysqli_num_rows($sql) == 0){ 
            mysqli_query($conn, "UPDATE users SET username = '$username' WHERE email ='{$email}'");  
            echo "<script language=\"JavaScript\">";
            echo "alert('edit username : $username');";
            echo "</script>";
        }
    }
?>