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
<?php 
    $movie_id = $_GET['movie_id'];
    if(!empty($movie_id)){
        $sql = mysqli_query($conn, "SELECT * FROM movie WHERE movie_id ='{$movie_id}'");
        if(mysqli_num_rows($sql) > 0){ 
            $row = mysqli_fetch_assoc($sql);
        }
    }
    $rate = $row['rate'];
    $teaser =  $row['Teaser'];
    $runtime = $row['runtime'];


?>
    <div class="add-area"> 
        <!-- <header>ADD DATA MOVIE</header> -->
        <section class="form add editform">
           
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="box-input">
                    <div class="field input">
                      
                        <input type="text" name="m_id" value="<?php echo $movie_id;?>" style="display:none;">
                        <label style="width: 23%;">Movie name</label>
                        <input style="width: 39%;" type="text" name="mname" placeholder="movie name" value="<?php echo $row['movie_name'];?>" required >
                        <label style="width: 20%;">Short name</label>
                        <input style="width: 15%;" type="text" name="sname" placeholder="name" value="<?php echo $row['movie_Sname'];?>" required>
                    </div>
                    <div class="field input">
                        <label>Synopsis</label>
                        <input type="text" name="synopsis" value="<?php echo $row['movie_des'];?>" placeholder="synopsis" required>
                    </div>
                </div>
                <div class="box-input"> 
                    <div class="field input"  >
                        <label style="width: 80px;">Get in date</label>
                        <input style="color: rgb(255, 255, 255);" type="date" name="getindate"  value="<?php echo $row['getindate'];?>"  placeholder="get in date" required>
                    </div>
                    
                    <div class="field input">
                        <label style="width: 90px;">Get out date</label>
                        <input style="color: rgb(255, 255, 255);" type="date" name="getoutdate"   value="<?php echo $row['getoutdate'];?>"  placeholder="get out date" required class="date">
                    </div>
                </div>
                <div class="box-input genre-box">
                    <!-- <div class="field input"> -->
                    <!-- <label for="genre">Genre :</label> -->
                    <!-- <input type="text" name="genre" placeholder="genre" required> -->
                    <div class="field input genre-area">
                            <label for="genre">Genre</label>
                            <span class="plus" onclick="Fplusgenre()"">&plus;</span> 
                            <div class="opt" id="genre" style="display:block;">
                                <!-- <span class="closebtn" onclick="Fgenre('genre1')""></span>  -->
                                <select name="genre" id="genre01" placeholder="genre" required>

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
                            <div class="opt" id="genre2" style="display:none;">        
                                <span class="closebtn" onclick="Fgenre('genre2')">&times;</span> 
                                <select name="genre2" id="genre02" placeholder="genre" >
                                        <option value="null"></option>

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
                            <div class="opt" id="genre3" style="display:none;">        
                                    <span class="closebtn" onclick="Fgenre('genre3')">&times;</span> 
                                    <select name="genre3" id="genre3" placeholder="genre" >
                                        <option value="null"></option>
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
                                <div class="opt" id="genre4" style="display:none;">        
                                    <span class="closebtn" onclick="Fgenre('genre4')">&times;</span> 
                                    <select name="genre4" id="genre4" placeholder="genre" >
                                        <option value="null"></option>
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
                                <div class="opt" id="genre5" style="display:none;">        
                                    <span class="closebtn" onclick="Fgenre('genre5')">&times;</span> 
                                    <select name="genre5" id="genre5" placeholder="genre" >
                                        <option value="null"></option>
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


                                <!-- <button onclick="myFunction()">Try it</button>
                                        <button onclick="myFunctionss()">Tss</button>
                                        <div id="myDIV">
                                            <button onclick="myFunction()">Try it</button>
                                            This is my DIV element.
                                        </div> -->

                        </div>
                        <div class="field input">
                        <label>Time</label>
                        <input type="text" name="time" value="<?php echo $runtime;?>"  placeholder="time/ms" required>
                        </div>
                    </div>
            <script>

           
                let genre = ['genre', 'genre2', 'genre3', 'genre4', 'genre5'];
                let genrest = ['on', 'off', 'off', 'off', 'off'];
                function Fgenre(e) {
                    if (e != 'genre1') {
                        document.getElementById(e).style.display = "none";
                        for (i in genre) {
                        if (e == genre[i]) {
                            genre[i] = 'off';
                            break;
                        }
                        }

                    }
                    console.log(genre);
                }
                let str = 'genre';
                function Fplusgenre() {
                    let nstr;
                    let n = 0, m = 0;
                    for (i in genre) {
                        if ('off' == genre[i]) {
                            m = n + 1;
                            console.log(m);
                            nstr = str + (m);
                            console.log(nstr);
                            genre[i] = nstr;
                            console.log(genre);
                            document.getElementById(nstr).style.display = "block";
                            n = 0; m = 0;
                            break;
                        }
                        n++;
                        }
                        console.log(n);
                        if (n == 5) {
                            n = 0; m = 0;
                            for (i in genrest) {
                                if ('off' == genrest[i]) {
                                    m = n + 1;
                                    let strn = str + m;
                                    genrest[i] = 'on';
                                    document.getElementById(strn).style.display = "block";
                                    n = 0; m = 0;
                                    console.log(genrest);
                                    break;
                                }
                                n++;
                            }
                        }
                        console.log(genrest);
                }
            </script>
                <div class="box-input"> 
                    <div class="box2">
                        <div class="field input">
                            <label>Teaser ID</label>
                            <input type="text" name="teaser_id" value="<?php echo $teaser;?>"  placeholder="teaser_id" required>
                        </div>
                        <div class="field input rate">
                            <label for="rate">Rate :</label>
                            <select name="rate" id="rate"  placeholder="rate" required>
                                    <option value="<?php echo $rate;?>"><?php echo $rate;?></option>'
                                         <?php 
                                           
                                            $sql = mysqli_query($conn, "SELECT rate FROM `rate` ORDER BY `rate_id` ASC");
                                            if(mysqli_num_rows($sql) < 0){     
                                                echo 'No data';
                                            }elseif(mysqli_num_rows($sql) > 0){
                                                while($row = mysqli_fetch_assoc($sql)){
                                                    echo '<option value="'.$row['rate'].'">'.$row['rate'].'</option>';
                                                }
                                            }
                                            
                                        ?>

                                <!-- <option value="ท ทั่วไป">ท ทั่วไป</option>
                                <option value="น 13+">น 13+</option>
                                <option value="น 15+">น 15+</option>
                                <option value="น 18+">น 18+</option>
                                <option value="ฉ 20+">ฉ 20+</option>
                                <option value="ส ส่งเสริม">ส ส่งเสริม</option> -->
                            </select>
                            <!-- <input type="text" name="rate" placeholder="rate" required> -->
                        </div>
                    </div>
                    <div class="field image">
                        <label for="fileimage">Image</label>
                        <i class="fas fa-folder-plus"></i>
                        <input type="file" name="image" id="fileimage"  accept="image/*" onchange="showPreview(event);" >
                    </div>
                    <div class="preview">
                        <img id="filepreview"  ">

                    </div>
                    <script>
                        function showPreview(event) {
                            if (event.target.files.length > 0) {
                                var src = URL.createObjectURL(event.target.files[0]);
                                var preview = document.getElementById("filepreview");
                                preview.src = src;
                                preview.style.display = "block";
                            }
                        }
                    </script>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="EDIT DATA">
                </div>
            </form>
        </section>
    </div>
    <!-- <?php include_once "footer.php"; ?> -->
    <script>
        function myFunction() {
        document.getElementById("myDIV").style.display = "none";
        }
        function myFunctionss() {
        document.getElementById("myDIV").style.display = "block";
        }
    </script>
    <script src="JAVASCRIPT/editmovie.js"></script>
    </body>
    <!-- <script>
        $('.new_Btn').click(function() {$('#html_btn').click(); });
     </script> -->
</html>