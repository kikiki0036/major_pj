<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Major</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="menu_bar.css">
</head>
<body>
<header >
        <nav class="menu_area">
            <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a href="main.php#">หน้าหลัก</a></li>
                    <li><a href="page2.php">ภาพยนตร์</a></li>
                    <li><a href="#">โรงภาพยนตร์</a></li>
                    <li><a href="#">ข่าว</a></li>
                    <li><a href="#">ป๊อบคอร์น/เครื่องดื่ม</a></li>
                </ul> 
            </div>
            
            <div class="user">
              <p><?php echo $_SESSION['email']; ?></p>
              <a href="php/logout.php"><i class="fas fa-user-circle" style="color: #ffffff;"></i></a> 
            </div>
        </nav>
</header>