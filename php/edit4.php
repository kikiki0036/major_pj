<?php
    session_start();
    $email = $_SESSION['email'];
    include_once "config.php";
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    if(!empty($pwd)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE pwd ='{$pwd}' AND email='{$email}'");
        if(mysqli_num_rows($sql) == 0){ 
            mysqli_query($conn, "UPDATE users SET pwd = '$pwd' WHERE email ='{$email}'");  
            echo "<script language=\"JavaScript\">";
            echo "alert('edit pwd : $pwd');";
            echo "</script>";
        }
    }
?>