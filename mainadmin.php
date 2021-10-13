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
<iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>
<script>
    document.getElementById("m1").style.color = "#ffcc00";
</script>
<div class="area_main" style="margin-top: 120px;" >
    <p style="margin-top: -50px;font-size: 40px;font-weight: 500;">DATA MOVIE<a href="addmovie.php" class="list-btn-p" ><i class="fas fa-plus-circle"></i></a></p>
    
    <div name="frmMain"class="form" >  
        <div class="filter"> 
           <!-- <div class="input-select-month">
              <label for="Month">Month :</label>
              <select name="Month" id="Month">
                  <option value=""></option>
                  <option value="Jan">Jan</option>
                  <option value="Feb">Feb</option>
                  <option value="Mar">Mar</option>
                  <option value="Apr">Apr</option>
                  <option value="May">May</option>
                  <option value="Jun">Jun</option>
                  <option value="Jul">Jul</option>
                  <option value="Aug">Aug</option>
                  <option value="Sept">Sept</option>
                  <option value="Oct">Oct</option>
                  <option value="Nov">Nov</option>
                  <option value="Dec">Dec</option>
              </select>
           </div> -->
            <div class="input-select-genre">
                  <label for="genre">Genre :</label>
                  <select name="Year" id="Year">
                    <option value=""></option>
                    <?php  
                          $sql = mysqli_query($conn, "SELECT genre_name FROM `type_genre`");
                          if(mysqli_num_rows($sql) < 0){     
                              echo 'No data';
                          }elseif(mysqli_num_rows($sql) > 0){
                              while($row = mysqli_fetch_assoc($sql)){
                                  echo '<option value="'.$row['genre_name'].'">'.$row['genre_name'].'</option>';
                              }
                          }
                    ?>
                  </select>
            </div>
        </div>
        <input type="text" name="search">   
        <button><i class="fas fa-search"></i> </button>   
    </div>

    <ul class="ul">
      <li style="padding:0 125px;">Movie</li>
      <li style="padding:0 22px;">Get in date</li>
      <li style="padding:0 20px;">Rate</li>
      <li style="padding:0 100px;">Genre</li>
      <li style="padding:0 62px;">Runtime</li>
    </ul>
    <div class="table">
      <div class="table-list">    

      </div>
    </div>   
</div>
                
<!-- <?php include_once "footer.php"; ?> -->
<script src="JAVASCRIPT/datalist.js"></script>
</body>
</html>