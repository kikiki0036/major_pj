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
<div class="area_main" style="margin-top: 170px;" >
    <p style="margin-top: -90px;">DATA MOVIE<a href="addmovie.php" class="list-btn-p" ><i class="fas fa-plus-circle"></i></a></p>
    
    <form name="frmMain" method="post" action="search.php" target="iframe_target">  
       
        <div class="filter"> 
            <label for="Month">Month :</label>
            <select name="Month" id="Month">
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
            <label for="Year">Year :</label>
            <select name="Year" id="Year">
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">3</option>
                <option value="2023">4</option>
            </select>
        </div>
        <input type="text" name="search">      
        <div><i class="fas fa-search"></i><input name="btnsearch" type="submit" value="ค้นหา"></div>  
      
    </form>

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