<?php 
  session_start();
  include_once "php/config.php";
  if($_SESSION['email']!="admin@email.com"){
    header("location: login.php");
  }else if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "headadmin.php"; ?>
<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;" ></iframe>
<script>
    document.getElementById("m2").style.color = "#ffcc00";
</script>
<div class="area_main" style="margin-top: 120px;padding-bottom:5px;" >
    <p style="margin-top: -50px;font-size: 40px;font-weight: 500;">MANAGE SHOWTIME</p>
    
     <div name="frmMain"class="form" style="margin-top: -45px;margin-left:700px;">  
        <label for="searchdate">Date :</label>
        <input id="searchdate"  type="text" name="searchdate" placeholder="YYYY-MM-DD" style="width:100px;">
        <div class="filter"> 
            <div class="input-select-genre">
                  <label for="Year">Region :</label>
                  <select name="Year" id="Year">
                    <option value=""></option>
                    <?php  
                          $sql = mysqli_query($conn, "SELECT region_name FROM `region`");
                          if(mysqli_num_rows($sql) < 0){     
                              echo 'No data';
                          }elseif(mysqli_num_rows($sql) > 0){
                              while($row = mysqli_fetch_assoc($sql)){
                                  echo '<option value="'.$row['region_name'].'">'.$row['region_name'].'</option>';
                              }
                          }
                    ?>
                  </select>
            </div>
        </div>
        <input id="searchbranch" type="text" name="search" placeholder="search branch name" >   
        <button><i class="fas fa-search"></i> </button>   
    </div>

    <ul class="ul">
      <li style="padding:0 125px;">Movie</li>
      <li style="padding:0 22px;">Get in date</li>
      <li style="padding:0 20px;">Rate</li>
      <li style="padding:0 100px;">Genre</li>
      <li style="padding:0 62px;">Runtime</li>
    </ul>
    <div class="table" >
      <div class="showtime-list">    
      <!-- ////////////////////////// -->
      <!-- <div class="showtime-box">
         <div class="box1-movie">
            <div class="poster">
                <img src="php/image/Eternals.jpg" alt="">
            </div>
            <div class="detail-showtime">
                <div class="text-box title"><p>'.$row['movie_name'].'</p></div>
                <div class="text-box">
                    <ul>
                    <li>ENG</li>
                    <li>132 นาที</li>
                    <li>น 13+</li>
                    <li>17 OCT 2022</li>
                    </ul>
                </div>
                <div class="timeshow">
                    <ul>
                    <li>17:30</li>
                    <li>17:30</li>
                    <li>17:30</li>
                    <li>17:30</li>
                    <li>17:30</li>
                    
                    </ul>
                </div>
            </div>
            </div>
            <div class="box2-branch">
                <div style="margin-top:35px;"><i class="fas fa-map-marker-alt"></i>เมเจอร์ ซีนีเพล็กซ์ โลตัส พิบูลมังสาหาร</div>
                <div style="margin-left:20px;margin-top:-5px;">THEATRE 1</div>
            </div>
        </div> -->
        <!-- //////////////////// -->
      </div>
    </div>   
</div>
<div class="add-btndown" id="down" style="display:none;"><p>CLOSE</p><i class="fas fa-chevron-down" onclick="Fhidebtn('up','iframe_add_showtime','down')"></i></div>
<div class="add-btnup" id="up" style="display:block;"><i class="fas fa-chevron-up" onclick="Fshowbtn('down','iframe_add_showtime','up')" ></i><p>ADD SHOWTIME</p></div>
<iframe class="iframe_add_showtime" id="iframe_add_showtime" name="iframe_add_showtime" src="add_showtime.php" style="display:none;" scrolling="no"></iframe>
<!-- onclick="Fhidebtn('save-pwd','cancel-pwd','edit-pwd','pwd')" -->
<script>
        function Fshowbtn(e1,e2,e3) {
  
            document.getElementById(e1).style.display = "block";
            document.getElementById(e2).style.display = "block"; 
            document.getElementById(e3).style.display = "none";  
        }
        function Fhidebtn(e1,e2,e3) {
  
          document.getElementById(e1).style.display = "block";
          document.getElementById(e2).style.display = "none"; 
          document.getElementById(e3).style.display = "none";  
        }
      
</script>
<!-- <?php include_once "footer.php"; ?> -->
<script src="JAVASCRIPT/datalistshowtime.js"></script>
</body>
</html>