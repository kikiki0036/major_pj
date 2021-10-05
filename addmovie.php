<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "headadmin.php"; ?>
    <div class="add-area"> 
        <header>ADD DATA MOVIE</header>
        <section class="form add">
           
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="box-input">
                    <div class="field input">
                        <label>Movie name</label>
                        <input type="text" name="mname" placeholder="movie name" required>
                    </div>
                    <div class="field input">
                        <label>Synopsis</label>
                        <input type="text" name="synopsis" placeholder="synopsis" required>
                    </div>
                </div>
                <div class="box-input"> 
                    <div class="field input">
                        <label>Get in date</label>
                        <input type="date" name="getindate" placeholder="get in date" required>
                    </div>
                    
                    <div class="field input">
                        <label>Get out date</label>
                        <input type="date" name="getoutdate" placeholder="get out date" required class="date">
                    </div>
                </div>
                <div class="box-input"> 
                    <div class="field input">
                        <label>Genre</label>
                        <input type="text" name="genre" placeholder="genre" required>
                    </div>
                    <div class="field input">
                        <label>Time</label>
                        <input type="text" name="time" placeholder="time" required>
                    </div>
                </div>
                <div class="box-input"> 
                    <div class="field input">
                        <label>Teaser ID</label>
                        <input type="text" name="teaser_id" placeholder="teaser_id" required>
                    </div>
                    <div class="field image">
                        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                        <div class="new_Btn">Add image</div><br>
                        <input id="html_btn" type='file' " /><br> -->
                        <label>Image</label>
                        <i class="fas fa-folder-plus"></i>
                        <input type="file" name="image" required>
                    </div>
                </div>
                <div class="field button">
                    <input type="submit" name="submit" value="ADD MOVIE">
                </div>
            </form>
        </section>
    </div>
    <?php include_once "footer.php"; ?>
    <script src="JAVASCRIPT/addmovie.js"></script>
    </body>
    <!-- <script>
        $('.new_Btn').click(function() {$('#html_btn').click(); });
     </script> -->
</html>