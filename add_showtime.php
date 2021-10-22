<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
      <link rel="stylesheet" href="showtime_add.css">
       <style>
         html {
          scroll-behavior: smooth;
        }
         html,body{
           margin:0;
           padding:0;
           width: 4110px;
           height:3rem;
         }
         body{
           display:flex;
         }
       </style>

    </head>
    <body>
         <div class="select-movie" id="section1">

             <div class="search-select-movie">
                <div class="form-search">  
                    <input type="text" name="search"  placeholder="seaech movie name">   
                    <button><i class="fas fa-search"></i> </button>   
                </div>
                <p id="p">SELECT &nbsp; MOVIE &nbsp; TO &nbsp; CREATE &nbsp; SHOWTIME</p>
             </div>

             <div class="movie">
                  <div class="movie-box-area">
                      <!-- <div class="movie-box">
                        <img src="php/image/A Quiet Place Part II.jpg" alt="">
                        <p>A Quiet Place Part II</p>
                      </div>       -->
                  </div>
             </div>

             <div class="next_section">
                <a href="#section2" class="btn-next" ><i class="fas fa-chevron-right"></i></a>
             </div>   

         </div>
         <div class="select-branch" id="section2">
            <div class="search-select-branch">
                <div class="form-search">  
                    <input type="text" name="search" placeholder="seaech branch name">   
                    <button><i class="fas fa-search"></i> </button>   
                </div>
                <p id="p1">SELECT &nbsp; BRANCH &nbsp; TO &nbsp; CREATE &nbsp; SHOWTIME</p>
            </div>
            <div class="branch">
                <div class="branch-box-area">
                    <!-- <div class="branch-box">
                      <img src="php/image/icon_m.png" alt="">
                      <p>เมเจอร์ ซีนีเพล็กซ์ บิ๊กซี </p>
                    </div>  -->
                </div>
            </div>
            <div class="next_section">
              <a href="#section3" class="btn-next" ><i class="fas fa-chevron-right"></i></a>
            </div>         
         </div>
         <div class="create-set-showtime" id="section3">
            <form  action="#" enctype="multipart/form-data" >
                <div class="detail-movie">
                    <div class="box1">
                        <img src="" alt="" id="image">
                    </div>
                    <ul class="box1 text">
                        <li style="font-weight: 400;font-size: 20px;" id="m-name"></li>
                        <li style="" id="genre"></li> 
                        <ul class="box2">
                          <li style="margin-left: -60px;" id="rate"></li>
                          <li style="margin-left: -150px;" id="runtime"></li>
                        </ul>
                    </ul>
                    <p id="date"></p>
                        <div class="field inputdetail" style="" >
                           <div>
                             <select name="lang" id="lang">
                                  <option value="ENG">ENG</option>
                                  <option value="TH">TH</option>
                              </select>
                           </div>
                           <div>
                              <select name="theatre" id="theatre">
                                  <option value="THEATER 1">THEATER 1</option>
                                  <option value="THEATER 2">THEATRE 2</option>
                                  <option value="THEATER 3">THEATRE 3</option>
                                  <option value="THEATER 4">THEATRE 4</option>
                              </select>
                           </div>
                        </div>
                    <div class="field inputidmovie"  >
                        <label>Movie ID</label>
                        <input type="text" name="movie_id" id="movie_id" placeholder="" style=" color: rgb(135, 135, 135);">
                    </div>
                    <div class="field inputidbranch"  >
                        <label>Branch ID</label>
                        <input type="text" name="branch_id" id="branch_id" placeholder="" style=" color: rgb(135, 135, 135);">
                    </div>
                </div>
                <div class="date-showtime">
                    <div class="box-field">
                        <div class="field input" style="margin-top: 40px;" >
                            <label>Date Showtime</label>
                            <input type="date" name="datastart" placeholder="" required>
                            <p style="margin-top: -2px;">-</p>
                            <input type="date" name="dataend" placeholder="" required>
                        </div>

                    </div>
                    <div class="inptshowtime">

                      <div> 
                        <input type="time" step="2" id="time1" name="time1"  min="09:00" max="22:30" required onchange="myFunction('time1')"> <p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2"  id="time1x" name="time1x" >
                      </div>
       
                      <div> 
                        <input type="time" step="2" id="time2" name="time2" min="09:00" max="22:30"  onchange="myFunction('time2')"><p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2" id="time2x" name="time2x" >
                      </div>
    
                      <div> 
                        <input type="time" step="2" id="time3" name="time3" min="09:00" max="22:30"  onchange="myFunction('time3')"><p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2"  id="time3x" name="time3x" >
                      </div>
                      <div> 
                        <input type="time" step="2" id="time4" name="time4" min="09:00" max="22:30"  onchange="myFunction('time4')"><p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2" id="time4x" name="time4x" >
                      </div>
                      <div> 
                        <input type="time" step="2" id="time5" name="time5" min="09:00" max="22:30"  onchange="myFunction('time5')"><p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2" id="time5x" name="time5x" >
                      </div>
                      <div> 
                        <input type="time" step="2" id="time6" name="time6" min="09:00" max="22:30"  onchange="myFunction('time6')"><p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2" id="time6x" name="time6x" >
                      </div>
                      <div>  
                        <input type="time" step="2"  id="time7" name="time7" min="09:00" max="22:30"  onchange="myFunction('time7')"><p> &nbsp;- &nbsp;</p>
                        <input type="time" step="2" id="time7x" name="time7x" >
                      </div>
                    </div>
                </div>
                <div class="field button">
                     <input type="submit" name="submit" value="ADD">
                </div>
            </form>
            <div class="next_section">
              <a href="#section1" class="btn-next" ><i class="fas fa-chevron-right"></i></a>
            </div>
         </div>
         <script>
            let t = 0;
            function myFunction(name,name1=name+'x') {
              let h=0;
              let m=t;
              while(m >= 60){
                m -= 60;
                h += 1; 
              }
              var time = document.getElementById(name);
              var parts = time.value.split(':');
              var hour = parseInt(parts[0]);
              var minute = parseInt(parts[1]);
              let h1=hour;
              let m1=minute;
              if(m1<10)
              {
                m1="0"+m1;
              }
              if(h1<10){
                h1="0"+h1;
              }
              document.getElementById(name).value =  h1 + ':' + m1 +':'+'00';
              hour += h;
              minute += m;
              while(minute >= 60){
                minute -= 60;
                hour += 1; 
              }
              if(minute<10)
              {
                minute="0"+minute;
              }
              if(hour<10){
                hour="0"+hour;
              }
              document.getElementById(name1).value =  hour + ':' + minute;
            }

           function getmovie_id(m_id,m_name,poster,genre,rate,runtime,date){
              t = runtime;
              document.getElementById("date").innerHTML = date;
              document.getElementById("rate").innerHTML = rate;
              document.getElementById("runtime").innerHTML = runtime+" นาที";
              document.getElementById("genre").innerHTML = genre;
              document.getElementById("m-name").innerHTML = m_name;
              document.getElementById("image").src = 'php/image/'+poster;
              document.getElementById("movie_id").value  = m_id ;
              location.href = "#section2";
           }
           function getbranch_id(b_id){
              document.getElementById("branch_id").value  = b_id ;
              location.href = "#section3";
           }
         </script>
         <script src="JAVASCRIPT/datali-showtime-movie.js"></script>
    </body>
</html>