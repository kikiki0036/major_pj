<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miner Cineplex</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="menu_bar.css">
    <link rel="shortcut icon" type="images/x-icon" href="php/image/icon_m.png">
</head>
<body>
<header >
        <nav class="menu_area">
            <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a id="m1" href="main.php">หน้าหลัก</a></li>
                    <li><a id="m2" href="page2.php">ภาพยนตร์</a></li>
                    <li><a id="m3" href="#">โรงภาพยนตร์</a></li>
                    <li><a id="m4" href="#">ข่าว</a></li>
                    <li><a id="m5" href="#">ป๊อบคอร์น/เครื่องดื่ม</a></li>
                </ul> 
            </div>
            
            <div class="user">
              <p><?php echo $_SESSION['email']; ?></p>
              <a href="profile.php"><i class="fas fa-user-circle" style="color: #ffffff;"></i></a> 
            </div>
        </nav>
</header>