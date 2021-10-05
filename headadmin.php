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
    <style>
                           /* <div class="table">
                <div class="table-list">    
                ------------------------------------------
                    <div class="list">
                        <div class="details-img">
                            <img src="php/image/'.$row['movie_name'].'.jpg" alt="">
                        </div>
                        <div class="details">
                            <p>'.$row['movie_name'].'</p>
                            <p>'.$new_date.'</p>
                            <p>'.$row['rate'].'</p>
                            <p>'.$row['genre'].'</p>
                            <p>'.$h.' ชม. '.$m.' นาที</p>
                        </div>
                    </div>
                --------------------------------------------     
                </div>
            </div> */
            .table{
                width: 100%;
                display: flex;
                justify-content: center;
                margin-top: 20px;
            }
            .table .edit{
                margin-left: -140px;
                display: flex;
            }
            .table .edit a{
                margin-right: 20px;
                text-shadow: 1px 0px 1px rgba(72, 72, 72, 0.8);
                color: rgb(68, 68, 68);
                font-size: 20px;
                cursor: pointer;
            }
            .table .edit .list-btn1{
                color: rgb(232, 25, 25);
            }
            .table .edit .list-btn2{
                color: rgb(17, 157, 57);
            }
            .table .edit a:hover{
                color: rgb(167, 30, 162);
                text-shadow: 0 0 10px rgba(230, 92, 195, 0.8);

            }
            .table-list{
                display: flex;
                flex-direction: column;
                align-items: center;
                /* justify-content: center; */
                width: 90%;
                height: 800px;
                /* padding-top:100%; */
                overflow:  auto;

            }
            :is(.table-list)::-webkit-scrollbar{
                display: none;
                width: 0px;
            }
            .list img{
                width: 55px;
                height:70px ;
                margin-top: 5px;
                border-radius:3px;
                box-shadow:  0px 0px 5px rgba(0,0,0,0.9);
                /* border: 1px solid ; */
                box-shadow:inset  0px 0px 50px rgba(39, 39, 39, 0.9);
                box-shadow: 0px 0px 5px rgba(39, 39, 39, 0.9);


                
            }
            .details-img{
                /* background-color: cyan; */
                margin-left: 20px;
            }
            .details p{
                color: black;
                font-size: 15px;
                /* background-color: rgb(0, 255, 85); */
                /* margin-top: -8px; */
                margin-right: -80px;
                margin-top: 25px;
                text-align: center;
                text-shadow: none;
                
            }
            .list{
                background-color:rgb(223, 223, 223) ;
                display: flex;
                align-items: center;
                justify-content: space-around;
                margin-bottom: 2px;
                width: 90%;
                height: 80px;
                box-shadow:inset  0px 0px 25px rgba(255, 255, 255, 0.9);
                border: 1px solid rgb(99, 99, 99);
                border-radius: 3px;
                opacity: 0.87;
            }
            .details{
                display: flex;
                justify-content: center;
                height: 90%;
                margin-left:-100px;
                object-fit: cover;
                width:70%;
                margin-right: 270px;

            }
            .box-hide{
                height: 100px;
                width: 81.05%;
                margin-left: 130px;
                opacity: 0.7;
                background: linear-gradient(#85428b 20%, #4f004f 70%);
                margin-top: -90px;

            }
            .list-btn-p{
                margin-left: 20px;
                color: #dfdfdf;
            }
            .list-btn-p:hover{
                margin-left: 20px;
                color: #eb1de4;
                text-shadow: 0 0 10px rgba(230, 92, 195, 0.8);
            }
            .ul {
                display: flex;
                color: rgb(165, 165, 165);
                margin-left: 170px;
                margin-bottom: -10px;
                margin-top: 25px;
                font-size: 12px;
            }
            .ul li{
                margin-left: 5px;
            }
            .add-area {
                background:none;
                width: 90%;
                border-radius: 16px;
                box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),0 32px 64px -48px rgba(0,0,0,0.5);
                /* position: absolute; */
                /* opacity: 0.2; */
                margin-left: 60px;
                margin-top: 100px;
                padding: 50px 20px;
                background-color: #131111;
                opacity: 0.8;
                border: 2px solid rgb(238, 225, 210);
            }
            .form{
                margin-top: 10px;
            }
            .add-area header{
                margin-left: -500pxs;
                padding:0px -100px ;
                width: 100%;
                font-size: 25px;
                position: static;
                color: rgb(225, 61, 240);
            }
            .form form{
                display: flex;
                flex-direction: column;
                align-items: center;
        
            }
            .field{
                height: 80px;
                margin-bottom: 5px;
                border-radius: 10px;
                padding: 10px 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 47%;
                color: rgb(255, 255, 255);
                font-size: 15px;
                font-weight: 400;
                text-shadow: none;
                background-color: rgb(29, 26, 26);

            }
            .field:hover{
                color: rgb(186, 50, 186);
            }
            .field input{
                width: 75%;
                padding: 10px 15px;
                border: none;
                border-radius: 5px;
                font-weight: 500;
                color: rgb(255, 255, 255);
                background-color: rgb(29, 26, 26);
            }
            .image{
                display: flex;
                /* align-items: center;
                justify-content: center;
                padding-left: 15px; */
            }
            .new_Btn {
                background-color: rgb(36, 36, 36);
                cursor: pointer; 
                padding: 5px 10px;
              }
            input[type="file"]::-webkit-file-upload-button {
                /* filter: invert(10%); */
                background-color: rgb(75, 75, 75);
                color: rgb(255, 255, 255);
                border-radius: 3px;
                border: none;
                padding: 5px 10px;
                margin-left: -20px;
                cursor: pointer;


                opacity: 0;
            }
            .image input{
                padding: 5px 10px;
                border: none;
                color: rgb(135, 135, 135);
                /* border: 1px dashed #BBB; */
                text-align: center;
                /* background-color: #DDD; */
                cursor: pointer;
                margin-right: 20px;
                /* display: none; */
            }
            .image i{
                margin-right:  -150px;
                position: relative;
                color: rgb(253, 253, 253);
                font-size: 20px;
                text-shadow: 1px 1px 5px rgba(34, 34, 34, 0.8);


            }
            .button{
                padding-left: 130px;
                background: none;
            }
            .button input{
                color: rgb(255, 255, 255);
                background: rgb(177, 13, 136);
                cursor: pointer;
            
            }
            .box-input{
                display: flex;
                width: 100%;
                justify-content: space-around;
            }
            input[type="date"] {
                background: transparent;
                color: rgb(135, 135, 135);
            }
            input[type="date"]::-webkit-calendar-picker-indicator {
                filter: invert(100%);
            }

    </style>
</head>
<body>
<header >
        <nav class="menu_area">
            <div class="logo"><a href="#"><img src="php/image/icon_m.png" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a id="m1" href="mainadmin.php">MANAGE DATA</a></li>
                    <li><a id="m2" href="#">MANAGE SHOWTIME</a></li>
                    <li><a id="m3" href="#">ADD PROMOTION</a></li>
                    <li><a id="m4" href="#">ADD NEWS</a></li>
                    <!-- <li><a id="m5" href="#">ป๊อบคอร์น/เครื่องดื่ม</a></li> -->
                </ul> 
            </div>
            
            <div class="user admin">
              <p><?php echo $_SESSION['email']; ?></p>
              <a href="profile1.php"><i class="fas fa-user-circle" style="color: #ffffff;"></i></a> 
            </div>
        </nav>
</header>