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
    <div class="add-area"> 
        <!-- <header>ADD DATA MOVIE</header> -->
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
                    <!-- <div class="field input"> -->
                        <!-- <label for="genre">Genre :</label> -->
                        <!-- <input type="text" name="genre" placeholder="genre" required> -->
                    <div class="field input">
                        <label for="genre">Genre</label>   
                        <span class="plus" onclick="Fplusgenre()"">&times;</span> 
                        <div class="opt" id="genre1"  style="display:block;">        
                            <!-- <span class="closebtn" onclick="Fgenre('genre1')""></span>  -->
                            <select name="genre1" id="genre01" placeholder="genre" required >
                            <option value="ตลก">ตลก</option>
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="น 15+">น 15+</option>
                            <option value="น 18+">น 18+</option>
                            <option value="ฉ 20+">ฉ 20+</option>
                            <option value="ส ส่งเสริม">ส ส่งเสริม</option>
                            </select>
                        </div>   
                        <div class="opt" id="genre2" style="display:none;">        
                            <span class="closebtn" onclick="Fgenre('genre2')"">&times;</span> 
                            <select name="genre2" id="genre02" placeholder="genre" >
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="น 15+">น 15+</option>
                            <option value="น 18+">น 18+</option>
                            <option value="ฉ 20+">ฉ 20+</option>
                            <option value="ส ส่งเสริม">ส ส่งเสริม</option>
                            </select>
                        </div>   
                        <div class="opt" id="genre3" style="display:none;">        
                            <span class="closebtn" onclick="Fgenre('genre3')"">&times;</span> 
                            <select name="genre3" id="genre3" placeholder="genre" >
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="น 15+">น 15+</option>
                            <option value="น 18+">น 18+</option>
                            <option value="ฉ 20+">ฉ 20+</option>
                            <option value="ส ส่งเสริม">ส ส่งเสริม</option>
                            </select>
                        </div>   
                        <div class="opt" id="genre4" style="display:none;">        
                            <span class="closebtn" onclick="Fgenre('genre4')"">&times;</span> 
                            <select name="genre4" id="genre3" placeholder="genre" >
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="น 15+">น 15+</option>
                            <option value="น 18+">น 18+</option>
                            <option value="ฉ 20+">ฉ 20+</option>
                            <option value="ส ส่งเสริม">ส ส่งเสริม</option>
                            </select>
                        </div>  
                        <div class="opt" id="genre5" style="display:none;">        
                            <span class="closebtn" onclick="Fgenre('genre5')"">&times;</span> 
                            <select name="genre5" id="genre3" placeholder="genre" >
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="สยองขวัญ">สยองขวัญ</option>
                            <option value="น 15+">น 15+</option>
                            <option value="น 18+">น 18+</option>
                            <option value="ฉ 20+">ฉ 20+</option>
                            <option value="ส ส่งเสริม">ส ส่งเสริม</option>
                            </select>
                        </div>  
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
                        <input type="text" name="time" placeholder="time/ms" required>
                    </div>
                </div>
                <script>
                    let genre = ['genre1','genre2','genre3','genre4','genre5'];
                    let genrest = ['on','off','off','off','off'];
                    function Fgenre(e) {
                    if(e!='genre1')
                    {
                        document.getElementById(e).style.display = "none";
                        for(i in genre){
                        if(e==genre[i]){
                            genre[i]='off';
                            break;
                        }
                        }

                    }
                    console.log(genre);
                    }
                    let str='genre';
                    function Fplusgenre() {
                    let nstr;
                    let n=0,m=0;
                    for(i in genre){
                        if('off'== genre[i]){
                            m=n+1;
                            console.log(m);
                            nstr = str+(m); 
                            console.log(nstr);
                            genre[i]= nstr;
                            console.log(genre); 
                            document.getElementById(nstr).style.display = "block";
                            n=0;m=0;
                            break;
                        }
                        n++;
                    }
                    console.log(n);
                    if(n==5){
                        n=0;m=0;
                        for(i in genrest){
                        if('off'==genrest[i]){
                            m=n+1;
                            let strn = str + m;
                            genrest[i]='on';
                            document.getElementById(strn).style.display = "block";
                            n=0;m=0;
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
                    </div>
                    <div class="field image">
                        <label for="fileimage">Image</label>
                        <i class="fas fa-folder-plus"></i>
                        <input type="file" name="image" id="fileimage" accept="image/*" onchange="showPreview(event);" required>
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
                    <input type="submit" name="submit" value="ADD MOVIE">
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
    <script src="JAVASCRIPT/addmovie.js"></script>
    </body>
    <!-- <script>
        $('.new_Btn').click(function() {$('#html_btn').click(); });
     </script> -->
</html>