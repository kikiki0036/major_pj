<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<?php include_once "head.php"; ?>
<?php 
$email = $_SESSION['email'];
    if(!empty($email)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email ='{$email}'");
        if(mysqli_num_rows($sql) > 0){ 
            $row = mysqli_fetch_assoc($sql);
        }
    }
?>
    <div class="profile-area" style="margin-top: 110px;margin-bottom:42px;"><p>Profile</p></div>
    <iframe id="iframe_target" name="iframe_target" src="#" style="width:0;height:0;border:0px solid #fff;position: absolute;"></iframe>
    <div class="profile-detail"  style="margin-top: -510px;margin-bottom:11px;">
        <form action="php/edit.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="box-detail detail-edit" target="iframe_target"><p>User name : </p>
                <input type="text" value="<?php echo $row['username'];?>" id="username" name="username" disabled>
                <div style="display:none;" id="save-name" ">
                    <i class="fas fa-save" ></i>
                    <input type="submit" name="submit" id="btn" value="">
                </div>
                <i class="fas fa-window-close"  onclick="Fhidebtn('save-name','cancel-name','edit-name','username')" style="display:none;" id="cancel-name"></i>
                <i class="fas fa-edit" onclick="Fshowbtn('save-name','cancel-name','edit-name','username')"style="display:block;" id="edit-name"></i>
        </form>

        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off"  class="box-detail detail-edit" target="iframe_target"><p>Email : </p>
                <input type="text" value="<?php echo $row['email'];?>" id="email" name="email" disabled>
                <!-- <div style="display:none;" id="save-name" ">
                    <i class="fas fa-save" style="display:none;" id="save-email"></i>                    
                    <input type="submit" name="submit" id="btn" value="">
                </div>
                <i class="fas fa-window-close"  style="display:none;" id="cancel-email"></i>
                <i class="fas fa-edit"  style="display:block;" id="edit-email"></i> -->
        </form>

        <form action="php/edit3.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="box-detail detail-edit" target="iframe_target"><p>Phone : </p>
                <input type="text" value="<?php echo $row['phone'];?>" id="phone" name="phone" disabled>
                <div style="display:none;" id="save-phone" ">
                    <i class="fas fa-save" ></i>
                    <input type="submit" name="submit" id="btn" value="">
                </div>
                <i class="fas fa-window-close"onclick="Fhidebtn('save-phone','cancel-phone','edit-phone','phone')"  style="display:none;" id="cancel-phone"></i>
                <i class="fas fa-edit" onclick="Fshowbtn('save-phone','cancel-phone','edit-phone','phone')"style="display:block;" id="edit-phone"></i>
        </form>

        <form action="php/edit4.php" method="POST" enctype="multipart/form-data" autocomplete="off" class="box-detail detail-edit" target="iframe_target"><p>Password : </p>
                <input type="password" value="<?php echo $row['pwd'];?>" id="pwd" name="pwd" disabled>
                <div style="display:none;" id="save-pwd" ">
                    <i class="fas fa-save" ></i>
                    <input type="submit" name="submit" id="btn" value="">
                </div>
                <i class="fas fa-window-close" onclick="Fhidebtn('save-pwd','cancel-pwd','edit-pwd','pwd')" style="display:none;" id="cancel-pwd"></i>
                <i class="fas fa-edit" onclick="Fshowbtn('save-pwd','cancel-pwd','edit-pwd','pwd')" style="display:block;" id="edit-pwd"></i>
        </form>
        <div class="box-detail out"><a href="php/logout.php"><i class="fas fa-sign-out-alt"></i><p>Sign out</p></a></div>
    </div>

    <script>
        document.getElementById("username").disabled = true;
        document.getElementById("phone").disabled = true;
        document.getElementById("pwd").disabled = true;
       
       
        
        function Fshowbtn(e1,e2,e3,name) {
            document.getElementById(name).disabled = false;
            document.getElementById(name).style.color = "#f5f5f5";
            document.getElementById(name).focus();
            document.getElementById(e1).style.display = "block"; 
            document.getElementById(e2).style.display = "block";
            document.getElementById(e3).style.display = "none";  
            if(name=="pwd"){
                document.getElementById("pwd").type = "text";
            }
            
        }
        function Fhidebtn(e1,e2,e3,name) {
            document.getElementById(name).style.color = "#969595";
            document.getElementById(name).disabled = true;
            document.getElementById(e1).style.display = "none"; 
            document.getElementById(e2).style.display = "none";
            document.getElementById(e3).style.display = "block"; 
            if(name=="pwd"){
                document.getElementById("pwd").type = "password"; 
            }
        }
    </script>
<!-- <?php include_once "footer.php"; ?> -->
</body>
</html>
<!-- <!DOCTYPE html>
<html>
<body>

Name: <input type="text" id="myText">

<p>Click the button to disable the text field.</p>

<button onclick="myFunction()">Disable Text field</button>
<button onclick="myFunction1()">visable Text field</button>

<script>
function myFunction() {
  document.getElementById("myText").disabled = true;
}
function myFunction1() {
  document.getElementById("myText").disabled = false;
}
</script>

</body>
</html> -->

