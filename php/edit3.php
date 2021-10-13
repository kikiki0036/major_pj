<?php
    session_start();
    $email = $_SESSION['email'];
    include_once "config.php";
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    if(!empty($phone)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE phone ='{$phone}' AND email='{$email}'");
        if(mysqli_num_rows($sql) == 0){ 
            mysqli_query($conn, "UPDATE users SET phone = '$phone' WHERE email ='{$email}'");  
            echo "<script language=\"JavaScript\">";
            echo "alert('edit phone : $phone');";
            echo "</script>";
        }
    }
?>