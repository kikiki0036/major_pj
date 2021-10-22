<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="images/x-icon" href="php/image/icon_m.png">

    <title>Minor Cineplex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="menu_bar.css">
    <style>
     
    </style>
</head>
<body>
<header >
        <nav class="menu_area">
            <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a id="m1" href="main.php">หน้าหลัก</a></li>
                    <li><a id="m2" href="page2.php">ภาพยนตร์</a></li>
                    <li><a id="m3" href="page3.php">โรงภาพยนตร์</a></li>
                    <li><a id="m4" href="#">ข่าว</a></li>
                    <li><a id="m5" href="#">ป๊อบคอร์น/เครื่องดื่ม</a></li>
                </ul> 
            </div>
            
            <div class="user">
              <p><?php echo $_SESSION['email']; ?></p>
              <a id="dropmenu" ><i class="fas fa-user-circle" style="color: #ffffff;cursor: pointer;" onclick="dropmenu()"></i></a> 
            </div>
        </nav>
        <div class="containerprofile" id="conp" style="display:none;">
            <ul id="dropp">
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="book.php">TICKET</a></li>
            </ul>
        </div>
        <script>
            let sta = false;
            function dropmenu(){
                if(!sta){
                    document.getElementById("conp").style.transition = "all 20s";
                    document.getElementById("conp").style.display = "block";
                    sta = true;
                }else{
                    document.getElementById("conp").style.display = "none";
                    sta = false;
                }
                
            }
        </script>
</header>