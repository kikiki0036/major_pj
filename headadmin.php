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
        .table {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 15px;
            padding-bottom: 8px;

        }

        .table-list {
            display: flex;
            flex-wrap: wrap;
            width: 90%;
            height: 455px;
            overflow: scroll;
        }

        .table .edit {
            margin-left: -180px;
            margin-top: 165px;
            display: flex;
            width: 65px;
        }

        .table .edit a {
            margin-right: 20px;
            text-shadow: 1px 0px 1px rgba(72, 72, 72, 0.8);
            color: rgb(255, 255, 255);
            font-size: 20px;
            cursor: pointer;
            position: relative;
        }

        .table .edit .list-btn1 {
            color: rgb(232, 25, 25);
        }

        .table .edit .list-btn2 {
            /* color: rgb(17, 157, 57); */
        }

        .table .edit .list-btn2:hover {
            color: rgb(255, 99, 99);
            text-shadow: 0 0 10px rgb(255, 15, 15);
        }

        .table .edit .list-btn:hover {
            color: rgb(255, 62, 223);
            text-shadow: 0 0 10px rgb(255, 15, 195);
        }

        :is(.table-list)::-webkit-scrollbar {
            display: none;
            width: 0px;
        }


        .list img {
            width: 135px;
            height: 190px;
            margin-top: 5px;
            margin-right: -60px;
            border-radius: 3px;
            box-shadow: inset 0px 0px 50px rgba(0, 0, 0, 0.9);
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.9);
        }

        .details-img {
            margin-left: 20px;
        }

        .details p {
            /* color: rgb(61, 61, 61); */
            color: rgb(244, 244, 244);
            font-size: 15px;
            margin-right: -150px;
            text-shadow: none;
            width: 195px;
        }

        .list:hover {
            /* box-shadow: inset 0px 0px 400px rgb(194, 194, 194); */

            box-shadow: inset 0px 0px 400px rgb(0, 0, 0);
            border: 2px solid rgb(255, 0, 212);
        }

        .list {
            /* background-color: rgb(253, 253, 253);
            box-shadow: inset 0px 0px 25px rgba(199, 199, 199, 0.9);
            border: 2px solid rgb(255, 255, 255); */
        
            background-color: rgba(19, 19, 19, 0.816); 
            box-shadow: inset 0px 0px 25px rgba(0, 0, 0, 0.9);
            border: 2px solid rgb(21, 20, 20);
           
            display: flex;
            align-items: center;
            margin: 5px 5px 3px 5px;
            width: 32.3333%;
            height: 220px;
        
            border-radius: 8px;
            opacity: 0.87;
        }

        .details .d_rate {
            position: static;
            margin-left: 180px;
            margin-top: -18px;
        }

        .details {
            display: flex;
            flex-direction: column;
            height: 70%;
            margin-bottom: 70px;
            object-fit: cover;
            width: 40%;
            margin-right: 240px;

        }

        .box-hide {
            height: 100px;
            width: 81.05%;
            margin-left: 130px;
            opacity: 0.7;
            background: linear-gradient(#85428b 20%, #4f004f 70%);
            margin-top: -90px;
        }


        /* ///////////////////////////////////////  */
        .ul {
            display: flex;
            color: rgb(165, 165, 165);
            margin-left: 170px;
            margin-bottom: -10px;
            margin-top: 25px;
            font-size: 12px;
            background-color: #e4740b;
            display: none;
        }

        .ul li {
            margin-left: 5px;
        }

        .add-area {
            background: none;
            width: 90%;
            border-radius: 16px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1), 0 32px 64px -48px rgba(0, 0, 0, 0.5);
            /* position: absolute; */
            /* opacity: 0.2; */
            margin-left: 60px;
            margin-top: 100px;
            margin-bottom: 43px;
            padding: 10px 20px 0px 20px;
            background-color: #131111;
            opacity: 0.8;
            border: 2px solid rgb(238, 225, 210);
        }

        .form {
            margin-top: 10px;
            height: 490px;
            
        }

        .add-area header {
            margin-left: -500pxs;
            padding: 0px -100px;
            width: 100%;
            font-size: 25px;
            position: static;
            color: rgb(225, 61, 240);
        }

        .form form {
            display: flex;
            flex-direction: column;
            align-items: center;

        }

        .field {
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

        .field:hover {
            color: rgb(119, 119, 119);
        }

        .field input {
            width: 75%;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            color: rgb(255, 255, 255);
            background-color: rgb(29, 26, 26);
            outline: none
        }

        /* <div class="box2">
                            <div class="field input">
                                <label>Teaser ID</label>
                                <input type="text" name="teaser_id" placeholder="teaser_id" required>
                            </div>
                            <div class="field input rate">
                                <label for="rate">Rate :</label>
                                <select name="rate" id="rate" placeholder="rate" required>
                                    <option value="ท ทั่วไป">ท ทั่วไป</option>
                                    <option value="น 13+">น 13+</option>
                                    <option value="น 15+">น 15+</option>
                                    <option value="น 18+">น 18+</option>
                                    <option value="ฉ 20+">ฉ 20+</option>
                                    <option value="ส ส่งเสริม">ส ส่งเสริม</option>
                                </select>
                                <!-- <input type="text" name="rate" placeholder="rate" required> -->
                            </div>
                        </div> */


        .image {
            display: flex;
            /* align-items: center;
                    justify-content: center;
                    padding-left: 15px; */
            height: 164px;
        }

        .box2 .rate select {
            width: 120px;
            margin-right: 245px;
            outline: none;
            border: none;
            color: rgb(255, 255, 255);
            background: none;
        }

        .box2 .rate select option {
            background-color: rgb(255, 255, 255);
            color: #000000;
            border-radius: 15px;
            text-align: left;
        }


        /* upload image  */
        /*  <div class="field image">
                        <label for="fileimage">Image</label>
                        <i class="fas fa-folder-plus"></i>
                        <input type="file" id="fileimage" accept="image/*" onchange="showPreview(event);" required>
                    </div>
                    <div class="preview">
                        <img id="filepreview"  ">
                    </div> */
        .preview {
            position: absolute;
            height: 135px;
            width: 100px;
            margin: 15px 0 0 950px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.9);
            border-radius: 5px;
            border: none;
        }

        .preview img {
            height: 135px;
            width: 100px;
            box-shadow: inset 0px 0px 15px rgba(0, 0, 0, 0.9);
            border-radius: 5px;

        }

        .box2 {
            width: 47%;
        }

        .box2 .input {
            width: 100%;

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
            margin-left: 10px;
            cursor: pointer;

            opacity: 0;
        }

        .image input {
            padding: 5px 10px;
            border: none;
            color: rgb(135, 135, 135);
            /* border: 1px dashed #BBB; */
            text-align: center;
            /* background-color: #DDD; */
            cursor: pointer;
            margin-right: 50px;
            /* display: none; */
        }

        .image i {
            margin-right: -150px;
            position: relative;
            color: rgb(253, 253, 253);
            font-size: 20px;
            text-shadow: 1px 1px 5px rgba(34, 34, 34, 0.8);


        }

        .button {
            padding-left: 130px;
            background: none;
            height: 60px;

        }

        .button input {
            color: rgb(255, 255, 255);
            background: rgb(177, 13, 136);
            cursor: pointer;
            margin: 0px 0 0 0;


        }

        .box-input {
            display: flex;
            width: 100%;
            justify-content: space-around;
        }

        input[type="date"] {
            /* background: transparent; */
            /* background: rgb(177, 13, 136); */
            color: rgb(135, 135, 135);
            width: 75%;
            
        }

        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(100%);
            cursor: pointer;
        }


       

        .genre-box {
        }

        .genre-area {
            display: flex;
            align-items: center;
            justify-content: left;
        }

        /* ///////select input////////// */
        .plus{
            background-color: rgb(255, 255, 255);
            box-shadow:1px 1px 5px rgba(38, 38, 38, 0.8);
            text-shadow: 1px 1px 1px rgba(121, 121, 121, 0.8);
            font-size: 25px;
            color: rgb(119, 119, 119);
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 10px;
            border-radius: 10px;
            padding-bottom: 3.7px;
            padding-left: 0px;
            cursor: pointer;
        }
        .plus:hover{
            color: rgb(255, 0, 204);
            text-shadow: 1px 1px 1px rgba(121, 121, 121, 0.8);
        }

        .closebtn:hover{
            color: rgb(255, 11, 202);
        }
        .closebtn{
            color: rgb(119, 119, 119);
            background-color: rgb(255, 255, 255);
            font-weight: 900;
            font-size: 20px;
            width: 20px;
            height: 20px;    
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow:1px 1px 1px rgba(158, 158, 158, 0.8);
            text-shadow: 1px 1px 1px rgba(121, 121, 121, 0.8);
            /* background: none; */
            cursor: pointer;
            position: absolute;
            border-radius: 10px;
            margin-top: -5px;
            margin-bottom: 10px;
            padding-bottom: 2.5px;
            margin-left: -3px;
        }
        .area_main .form {
            position: static;
            margin-top: 0px;
            margin-left: 905px;
            background-color: rgb(255, 255, 255);
            width: fit-content;
            height: fit-content;
            padding: 2px 10px;
            padding-left: 17px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            }

            .area_main .form input {
            padding: 0px 5px;
            border: none;
            outline: none;
            margin: 0 5px;
            height: fit-content;

            }
            .area_main button{
            position: relative;
            z-index: 1;
            /* width: 47px; */
            /* height: 10px; */
            font-size: 17px;
            cursor: pointer;
            border: none;
            background: #fff;
            color: #333;
            outline: none;
            border-radius: 0 5px 5px 0;
            transition: all 0.2s ease;

            }
            .area_main .form i {
            margin-right: 0px;
            font-size: 15px;
            }

            .area_main .form div {
            color: rgb(77, 77, 77);
            text-shadow: 1px 1px 2px rgba(34, 34, 34, 0.8);
            }

            .area_main .form div:hover {
                color: rgb(119, 119, 119);
            }

            .area_main .form input[type="button"] {
            background-color: blue;
            opacity: 0;
            width: 20px;
            cursor: pointer;
            }


            .area_main .form .filter {
                display:flex;
            }

            .area_main .form .filter select {
            height: 20px;
            margin-right: 10px;
            border: none;
            outline: none;
            font-weight: 400;
            }

            .area_main .form .filter label {
            font-size: 15px;
            color: rgb(21, 21, 21);
            text-shadow: none;
            font-weight: 400;
            }

            .field {
            display: flex;
            align-items: center;
            }

            .field label {
            width: 70px;
            height: fit-content;
            margin-right: 10px;
            }

            .field select {
            height: 33px;
            padding: 0 4px;
            width: 57px;
            text-align: center;
            outline: none;
            border: none;
            border-radius: 15px;
            font-weight: 400;
            color: #ff00ea;
            background-color: rgb(255, 255, 255);
            text-shadow: 1px 1px 1px rgba(186, 186, 186, 0.8);
            margin-left: 10px;
            margin-right: 5px;
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
                    <li><a id="m2" href="showtime.php">MANAGE SHOWTIME</a></li>
                    <li><a id="m3" href="#">ADD PROMOTION</a></li>
                    <li><a id="m4" href="#">ADD NEWS</a></li>
                    <!-- <li><a id="m5" href="#">ป๊อบคอร์น/เครื่องดื่ม</a></li> -->
                </ul> 
            </div>
            
            <div class="user admin">
              <p><?php echo $_SESSION['email']; ?></p>
              <a href="profile1.php"><i class="fas fa-user-circle" style="color: #ffffff; cursor: pointer;"></i></a> 
            </div>
        </nav>
</header>