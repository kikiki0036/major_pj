<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
  date_default_timezone_set("Asia/Bangkok");
?>
<?php include_once "head.php"; ?>


<?php 
    $Vshowtime_id;
    $Vset_showtime_id;
    $movie_id = $_GET['movie_id'];
    if(!empty($movie_id)){
        $sql = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id ='{$movie_id}'");
        if(mysqli_num_rows($sql) > 0){ 
            $row = mysqli_fetch_assoc($sql);
        }
    }
    $original_date = $row['getindate'];
    $timestamp = strtotime($original_date);
    $new_date = date("d F Y", $timestamp);
    $runtime =  $row['runtime'];
    $h = 0;
    $m = 0;
    while($runtime > 60){
        $runtime -= 60;
        $h++;
    }
    $m = $runtime;

    $genre_all='';
    $m_id = $row['movie_id'];
    if(true){
        $sqlgenre = mysqli_query($conn, "SELECT movie.movie_name , type_genre.genre_name FROM `movie` 
                                    INNER JOIN `genre_movie` ON movie.movie_id=genre_movie.movie_id 
                                    INNER JOIN `type_genre` ON type_genre.genre_id=genre_movie.genre_id   
                                    WHERE movie.movie_id = '{$m_id}' ");
        if(mysqli_num_rows($sqlgenre) == 1 ){
            while($rowgenre = mysqli_fetch_assoc($sqlgenre)){
                $genre_all = $genre_all.$rowgenre['genre_name'];
            }
        }elseif(mysqli_num_rows($sqlgenre) > 0){
            while($rowgenre = mysqli_fetch_assoc($sqlgenre)){
              $genre_all = $genre_all.$rowgenre['genre_name'].' / ';
            }
        }
    }
?>  
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;position: absolute;"></iframe>

    <div class="video_frame">
        <iframe width="100%" height="1000px" src="https://www.youtube.com/embed/<?php echo $row['Teaser'];?>?autoplay=1&mute=1&loop=1&controls=0&&amp;start=18" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="H-name">
        <p><?php echo $row['movie_name'];?></p>
    </div>
    <div class="btn-ticket"  onclick="Fshowbtn_book('area-book-ticket')">
        <p>จอง</p>
    </div>
    <section class="detail_mov">
        <div class="aaa">
            <img src="php/image/<?php echo $row['poster'];?>" alt="">
        </div>
        <div class="bbb">
            <p class="date"><?php echo  $new_date; ?></p>
            <h4 class="name"><?php echo $row['movie_name']; ?></h4>
            <p class="genre"><i class="fa fa-tag" aria-hidden="true" style="margin-right:5px; font-size:10px;"></i><?php echo $genre_all; ?></p>
            <p class="time"><i class="far fa-clock" style="margin-right:5px; font-size:12px; font-weight: 200;"></i><?php echo $h ."  ชม. ". $m." นาที"?></p>
            <p class="rate"><?php echo $row['rate']; ?></p>
            <div class="des_area">
                <h4>เรื่องยอ</h4>
                <p class="des"><?php echo $row['movie_des']; ?></p>
            </div>
        </div>
    </section>
    <div id="area-book-ticket" style="display:none;">
    <div class="ticket">
        <div class="seq">
            <div>
                <nav class="nav1"><p>เลือก รอบภาพยนตร์</p></nav>
                <nav class="nav2"><p>เลือกที่นั่ง</p></nav>
                <nav class="nav3"><p>จองตั๋ว</p></nav> 
            </div>
        </div>
        <div class="date_showtime">
            <div class="today">Today</div>
            <div class="box_slide">
                <?php 
                    // $date_today = curdate();
                    $today = date("Y-m-d");
                    $n_today =  date('d', strtotime($today));
                    $d_today =  date('D', strtotime($today));
                    for($i=0;$i<30;$i++){
                        echo '<div class="box">
                                <p>'.$d_today.'</p>
                                <p>'.$n_today.'</p>
                              </div>';
                        $today = date('Y-m-d', strtotime($today. ' + 1 days'));
                        $n_today =  date('d', strtotime($today));
                        $d_today =  date('D', strtotime($today));
                    }
                ?>
            </div>
       </div>
        <div class="branch_showtime">
            <div class="branch_slide">
                    <?php
                       $movie_name= $row['movie_name'];
                    //    echo $movie_name;
                       $today = date("Y-m-d");
                        $sql_set_of_showtime = mysqli_query($conn, "SELECT *FROM `set_of_showtime` 
                        INNER JOIN `movie` ON movie.movie_id=set_of_showtime.movie_id
                        INNER JOIN `branch` ON branch.branch_id=set_of_showtime.branch_id   
                        INNER JOIN `theatre` ON theatre.theatre_id=set_of_showtime.theatre_id
                        WHERE movie.movie_name = '{$movie_name}' ORDER BY `date` ASC");

                        $d=$today;
                        $mmn = 'box-in-2';
                        $output = "";
                        if(mysqli_num_rows($sql_set_of_showtime) < 0){
                            $output .= "No data";
                        }elseif(mysqli_num_rows($sql_set_of_showtime) > 0){
                            while($row_showtime = mysqli_fetch_assoc($sql_set_of_showtime)){
                                $output_showtime="";
                                if($d != ""){
                                    // echo $d;
                                    $sql_showtime = mysqli_query($conn, "SELECT *FROM `showtime`
                                    INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id=showtime.setshow_id
                                    WHERE showtime.setshow_id = '{$row_showtime['setshow_id']}' AND showtime.date_showtime LIKE '%$d%' ORDER BY `showtime`.`showtime_id` ASC");
                                        
                                    $zzz = mysqli_query($conn, "SELECT *FROM `showtime`
                                    INNER JOIN `set_of_showtime` ON set_of_showtime.setshow_id=showtime.setshow_id
                                    WHERE showtime.setshow_id = '{$row_showtime['setshow_id']}' AND showtime.date_showtime LIKE '%$d%' ORDER BY `showtime`.`showtime_id` ASC");
                                }
                                $a = array();
                                $a2 = array();
                                $row_zzz = mysqli_fetch_assoc($zzz);
                                $date_showtime = $row_zzz['date_showtime'];
                                $new_date;
                                // echo $date_showtime;
                                if(mysqli_num_rows($sql_showtime) < 0){
                                    $output_showtime .= "No data";
                                }elseif(mysqli_num_rows($sql_showtime) > 0){
                                    
                                    while($row_sql_showtime = mysqli_fetch_assoc($sql_showtime)){
                                        $Vshowtime_id = $row_sql_showtime['showtime_id'];
                                        $Vset_showtime_id = $row_showtime['setshow_id'];

                                        $date_showtime_n = $row_sql_showtime['date_showtime'];
                                        if( $date_showtime_n !=  $date_showtime){
                                            // echo "wow"." || ";
                                            array_push($a,$output_showtime);
                                            array_push($a2,$new_date);
                                            $output_showtime='';
                                            $date_showtime = $date_showtime_n;
                                        }
                                        $timestamp = strtotime($date_showtime_n);
                                        $new_date = date("d M Y", $timestamp);

                                        $original_time = $row_sql_showtime['timestart'];
                                        $times = strtotime($original_time);
                                        $new_time = date("H:i", $times);
                                        $output_showtime = $output_showtime.'<li onclick="setshowtime(\''.$row_sql_showtime['showtime_id'].'\',\''.$row_showtime['branch_name'].'\',\''.$row_showtime['theatre_name'].'\',\''.$row_showtime['lang'].'\',\''.$new_time.'\')">'.$new_time.'</li>';
                                        // 
                                    }
                                    // echo " &&& ";
                                    array_push($a,$output_showtime);
                                    array_push($a2,$new_date);
                                }
                                $leg = count($a);
                                for($ii=0; $ii < $leg; $ii++){
                                   
                                    // setshowtime
                                    $output .= '
                                                <div class="box")">
                                                    <nav class="box-in-1">
                                                        <img src="php/image/icon_m.png" alt="">
                                                        <p onclick="Fshowbtn(\''.$row_showtime['branch_name'].''.$row_showtime['lang'].'\')">'.$row_showtime['branch_name'].'</p>
                                                    </nav>
                                                    <div id="'.$row_showtime['branch_name'].''.$row_showtime['lang'].'" style="display:none;">
                                                        <nav class="box-in-2"  >
                                                            <ul class="box-in-2-detail-showtime">
                                                                <li>'.$row_showtime['theatre_name'].'</li>
                                                                <li style=" padding: 0 15px;border-left:1px solid beige ;border-right:1px solid beige ;">'.$row_showtime['lang'].'</li>
                                                                <li>'.$row_showtime['rate'].'</li>
                                                            </ul>
                                                            <ul class="box-in-2-box-showtime">
                                                                 '.$a[$ii].'
                                                            </ul>
                                                        </nav>
                                                    </div>
                                                </div>
                                                ';
                                }           
                            }
                        }
                        echo $output;
                    ?>
            </div>
        </div>

        <div class="seat_area" id="seat_area" style="opacity: 0;">
            <ul class="abc">
                 <?php
                    for($i=77;$i>=68;$i--){
                        echo '<li>'.strtoupper(chr($i)).'</li>';
                    }
                ?>
            </ul>
            <ul class="abc" style="margin-top:330px;">
                 <?php
                    for($i=67;$i>=65;$i--){
                        echo '<li>'.strtoupper(chr($i)).'</li>';
                    }
                ?>
            </ul>
  
            <div class="seat-area">
                <p class="SCREEN">SCREEN</p>
                <div class="seat-area-box">
                    <div class="box-seat-box">
                        <?php 
                            $sql_seat_1 = mysqli_query($conn, "SELECT * FROM `seat` WHERE type_id = 1 ORDER BY `seat_id` ASC");
                            while($row_sql_seat_1 = mysqli_fetch_assoc($sql_seat_1)){
                                echo  '<div class="seat-box" onclick="addseat(\''.$row_sql_seat_1['seat_name'].'\')">
                                                <img src="php/image/seat-n-on.png" alt="" >
                                                <p>'.substr($row_sql_seat_1['seat_name'],1).'</p>
                                                <i class="fas fa-check-circle" id="'.$row_sql_seat_1['seat_name'].'" style="display:none;"></i>
                                        </div>';
                            }
                        ?> 
                    </div>
           
                    <div class="box-seat-box" style="margin-top:10px;">
                    <?php 
                           $sql_seat_2 = mysqli_query($conn, "SELECT * FROM `seat` WHERE type_id = 2 ORDER BY `seat_id` ASC");
                           while($row_sql_seat_2 = mysqli_fetch_assoc($sql_seat_2)){
                               echo  '<div class="seat-box" onclick="addseat(\''.$row_sql_seat_2['seat_name'].'\')">
                                               <img src="php/image/seat-p-on.png" alt="" >
                                               <p>'.substr($row_sql_seat_2['seat_name'],1).'</p>
                                               <i class="fas fa-check-circle" id="'.$row_sql_seat_2['seat_name'].'" style="display:none;"></i>
                                       </div>';
                           }
                        ?> 
                    </div>
                    <div class="detail-seat">
                        <div>
                            <img src="php/image/seat-n-on.png" alt="">
                            <p id="seat_Normal">Normal 160</p>
                        </div>
                        <div>
                            <img src="php/image/seat-p-on.png" alt="">
                            <p  id="seat_Premium">Premium 200</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="detail-ticket-area">
                    <div class="detail-movie-ticket">
                        <div class="img-ticket">
                            <img src="php/image/<?php echo $row['poster'];?>" alt="">
                        </div>
                        <ul class="detail-movie-ticket">
                            <li><?php echo $row['movie_name'];?></li>
                            <li id="lang"></li>
                            <li><?php echo $row['runtime'].' นาที';?></li>
                        </ul>
                    </div>
                    <!-- $row_showtime['theatre_name'] -->
                    <ul  class="detail-showtime-ticket">
                        <li id="showtime">รอบฉาย</li>
                        <li id="branch_name"></li>
                        <ul>
                            <li id="time_show"></li>
                            <li id="date_show"><?php echo $d;?></li>
                        </ul>
                        <li id="thea"></li>
                    </ul>
                    <div class="detail-ticket">
                        <ul id="seat">
                            <li>ที่นั่ง :</li>
                            <li id="seat-select"></li>
                        </ul>
                        <ul>
                            <li>ราคา :</li>
                            <li id="price-ticket">0</li>
                        </ul>
                    </div>
                    <div class="btn-detail-ticket" onclick="show('book-area')">
                        <div>
                            <p>ตกลง</p>
                        </div>
                    </div>
            </div>
        </div>
        <div class="book-area" id="book-area" style="opacity: 0;">
            <form action="php/addbook.php" method="POST" enctype="multipart/form-data" autocomplete="off" >
            <!-- target="iframe_target"> -->
                <div class="detail-ticket-area detail-book-ticket">
                <div class="detail-movie-ticket">
                        <div class="img-ticket">
                            <img src="php/image/<?php echo $row['poster'];?>" alt="">
                        </div>
                        <ul class="detail-movie-ticket">
                            <li><?php echo $row['movie_name'];?></li>
                            <li id="lang2"></li>
                            <li><?php echo $row['runtime'].' นาที';?></li>
                        </ul>
                    </div>
                    <!-- $row_showtime['theatre_name'] -->
                    <ul  class="detail-showtime-ticket">
                        <li id="showtime">รอบฉาย</li>
                        <li id="branch_name2"></li>
                        <ul>
                            <li id="time_show2"></li>
                            <li id="date_show2"><?php echo $d;?></li>
                        </ul>
                        <li id="thea2"></li>
                    </ul>
                    <div class="detail-ticket">
                        <ul id="seat">
                            <li>ที่นั่ง :</li>
                            <li id="seat-select2"></li>
                        </ul>
                        <ul>
                            <li>ราคา :</li>
                            <li id="price-ticket2">0</li>
                        </ul>
                    </div>
                </div>
                <div class="detail-book-comboset detail-ticket-area ">
                     <div class="comboset">
                        <p>Concession Pick Up</p>
                     </div>
                     <div class="comboset-box">
                         <?php 
                           $sql_comboset= mysqli_query($conn, "SELECT * FROM `comboset` ORDER BY `combo_price` ASC");
                           while($row_sql_comboset = mysqli_fetch_assoc($sql_comboset)){
                               echo  ' <div class="box-set">
                                            <div class="box-img-set">
                                                <img src="php/image/'.$row_sql_comboset['image'].'" alt="">
                                            </div>
                                            <div class="detail-set" style="font-size: 13px;">
                                                <p>'.$row_sql_comboset['combo_name'].'</p>
                                                <p>'.$row_sql_comboset['combo_price'].' บาท</p>
                                            </div>
                                            <div class="count-set">
                                                <i class="far fa-minus-square" onclick="re(\''.$row_sql_comboset['combo_name'].'\',\''.$row_sql_comboset['combo_price'].'\')"></i>
                                                <input type="text" name="'.$row_sql_comboset['combo_id'].'" value="0" id="'.$row_sql_comboset['combo_name'].'" placeholder="0">
                                                <i class="far fa-plus-square"  onclick="plus(\''.$row_sql_comboset['combo_name'].'\',\''.$row_sql_comboset['combo_price'].'\')"></i>
                                            </div>
                                        </div>';
                            }
                        ?> 
                     </div>
                     <div class="price-all-set">
                          ราคา:<label for="" id="combo_price">0</label>
                              
                     </div>
                </div>
                
                <div class="btn-book  detail-ticket-area detail-book-comboset " >
                    <div class="comboset">
                            <p>BOOK</p>
                        </div>
                        <div class="price-all-set" style="margin-top:20px; margin-left:-300px;">
                            ราคารวมทั้งหมด:<label for="" class="all-p" id="total-price">0</label>
                              
                            <input type="text" id="showtime_id" name="showtime_id" value="" style="opacity: 0;position: absolute;">
                            <input type="text" id="set_of_showtime_id"  name="set_of_showtime_id"  value="<?php echo $Vset_showtime_id;?>" style="opacity: 0;position: absolute;">
                            <input type="text" id="seat_id"  name="seat_id"  value="" style="opacity: 0;position: absolute;">
                            <input type="text" id="email"  name="email"  value="<?php echo $_SESSION['email'];?>" style="opacity: 0;position: absolute;">
                            <input type="text" id="total-price-book"  name="total_price_book"  value="" style="opacity: 0;position: absolute;">
                            <input type="text" id="total_price_ticket"  name="total_price_ticket"  value="" style="opacity: 0;position: absolute;">
                            <input type="text" id="total_price_combo"  name="total_price_combo"  value="" style="opacity: 0;position: absolute;">

                            <div class="btn-book-f"><input type="submit" name="submit" value="จอง"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
   
    <script>
                    

        // seat_Normal seat_Premium combo_price seat-select2
         function book() {
            document.getElementById('seat_id').value = document.getElementById('seat-select2').innerHTML ;
            document.getElementById('total-price-book').value =document.getElementById('total-price').innerHTML;
            document.getElementById('total_price_ticket').value =document.getElementById('price-ticket2').innerHTML;
            document.getElementById('total_price_combo').value =document.getElementById('combo_price').innerHTML;
         }
         function plus(name,price) {
            let count = document.getElementById(name).value;
            document.getElementById(name).value=parseInt(count)+1;
            document.getElementById('combo_price').innerHTML = parseInt(document.getElementById('combo_price').innerHTML)+parseInt(price);
            document.getElementById('total-price').innerHTML = parseFloat(document.getElementById('price-ticket2').innerHTML)+parseFloat(document.getElementById('combo_price').innerHTML)+'.00';
            book();
         }
         function re(name,price) { 
             let count = document.getElementById(name).value;
             if(count!=0){
                document.getElementById(name).value=parseInt(count)-1;
                document.getElementById('combo_price').innerHTML = parseInt(document.getElementById('combo_price').innerHTML)-parseInt(price);
                document.getElementById('total-price').innerHTML = parseFloat(document.getElementById('price-ticket2').innerHTML)+parseFloat(document.getElementById('combo_price').innerHTML)+'.00';
                book();
             }
         }
         function addseat(name) {
            let price = document.getElementById("price-ticket").innerHTML;
            let seat_normal = document.getElementById("seat_Normal").innerHTML;
            let seat_Premium = document.getElementById("seat_Premium").innerHTML;
            
            let str = document.getElementById("seat-select").innerHTML;
            if(str.search(name) == -1){
                // document.getElementById("seat-select").innerHTML =str+" "+name;
                // document.getElementById("seat-select2").innerHTML =document.getElementById("seat-select").innerHTML;
                // document.getElementById(name).style.display = "block";
                // document.getElementById("price-ticket").innerHTML = parseInt(price)+160;
                // document.getElementById("price-ticket2").innerHTML = document.getElementById("price-ticket").innerHTML;
                // document.getElementById('total-price').innerHTML =  document.getElementById("price-ticket2").innerHTML;
                if(name.search('A') == -1  && name.search('B') == -1 && name.search('C') == -1 ) {
                    document.getElementById("seat-select").innerHTML =str+" "+name;
                document.getElementById("seat-select2").innerHTML =document.getElementById("seat-select").innerHTML;
                document.getElementById(name).style.display = "block";
                document.getElementById("price-ticket").innerHTML = parseInt(price)+160;
                document.getElementById("price-ticket2").innerHTML = document.getElementById("price-ticket").innerHTML;
                document.getElementById('total-price').innerHTML =  document.getElementById("price-ticket2").innerHTML+'.00';
                }else{
                    document.getElementById("seat-select").innerHTML =str+" "+name;
                document.getElementById("seat-select2").innerHTML =document.getElementById("seat-select").innerHTML;
                document.getElementById(name).style.display = "block";
                document.getElementById("price-ticket").innerHTML = parseInt(price)+200;
                document.getElementById("price-ticket2").innerHTML = document.getElementById("price-ticket").innerHTML;
                document.getElementById('total-price').innerHTML =  document.getElementById("price-ticket2").innerHTML+'.00';
                }
            }else{
                // newStr = str.replace(name,'');
                // document.getElementById("seat-select").innerHTML = newStr;  
                // document.getElementById("seat-select2").innerHTML =document.getElementById("seat-select").innerHTML;
                // document.getElementById(name).style.display = "none";
                // document.getElementById("price-ticket").innerHTML = parseInt(price)-160;
                // document.getElementById("price-ticket2").innerHTML = document.getElementById("price-ticket").innerHTML;
                // document.getElementById('total-price').innerHTML =  document.getElementById("price-ticket2").innerHTML;

                if(name.search('A') == -1  && name.search('B') == -1 && name.search('C') == -1 ) {
                    newStr = str.replace(name,'');
                    document.getElementById("seat-select").innerHTML = newStr;  
                    document.getElementById("seat-select2").innerHTML =document.getElementById("seat-select").innerHTML;
                    document.getElementById(name).style.display = "none";
                    document.getElementById("price-ticket").innerHTML = parseInt(price)-160;
                    document.getElementById("price-ticket2").innerHTML = document.getElementById("price-ticket").innerHTML;
                    document.getElementById('total-price').innerHTML =  document.getElementById("price-ticket2").innerHTML;
                }else{
                    newStr = str.replace(name,'');
                    document.getElementById("seat-select").innerHTML = newStr;  
                    document.getElementById("seat-select2").innerHTML =document.getElementById("seat-select").innerHTML;
                    document.getElementById(name).style.display = "none";
                    document.getElementById("price-ticket").innerHTML = parseInt(price)-200;
                    document.getElementById("price-ticket2").innerHTML = document.getElementById("price-ticket").innerHTML;
                    document.getElementById('total-price').innerHTML =  document.getElementById("price-ticket2").innerHTML;
                }
            }
         }
        //  "price-ticket
        function priceticket(name) {
            let price = document.getElementById("price-ticket").innerHTML;
            document.getElementById("price-ticket").innerHTML = parseInt(price);
        }
        function show(name) {
            document.getElementById(name).style.opacity = "1";
            window.scrollTo(0,2410);

        }
        function setshowtime(show_id,branch_name,thea,lang,time) {
            window.scrollTo(0,1840);
            document.getElementById('showtime_id').value = show_id ;

            document.getElementById("seat_area").style.opacity = "1";
            document.getElementById("lang").innerHTML = lang;
            document.getElementById("branch_name").innerHTML = branch_name;
            document.getElementById("time_show").innerHTML = time;
            document.getElementById("thea").innerHTML = thea;

            document.getElementById("lang2").innerHTML = lang;
            document.getElementById("branch_name2").innerHTML = branch_name;
            document.getElementById("time_show2").innerHTML = time;
            document.getElementById("thea2").innerHTML = thea;
        }
        function Fshowbtn(e) {
            if(document.getElementById(e).style.display == "block")
            {
                document.getElementById(e).style.display = "none";
            }else{
                document.getElementById(e).style.display = "block";
            }
            
        }
        function Fshowbtn_book(e) {
            document.getElementById(e).style.display = "block";
            // location.href = "#area-book-ticket";
            window.scrollTo(0,1090);
        }
        function Fhidebtn(e1,e2,e3) {
  
          document.getElementById(e1).style.display = "block";
          document.getElementById(e2).style.display = "none"; 
          document.getElementById(e3).style.display = "none";  
        }
    </script>
<?php include_once "footer.php"; ?>
</body>
</html>