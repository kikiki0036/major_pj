<?php 
  session_start();
  if(isset($_SESSION['email'])){
    header("location: main.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="back" ></div>
    <div class="bgform"></div>
    <div class="wrapper">
        <section class="form login">
            <header >Minor</header>
            <form action="#" autocomplete="off">
                <div class="error-txt"></div>
                <div class="field input">
                    <label>Email Address</label>
                    <input type="text"  name="email" placeholder="Enter your email">
                </div>
                <div class="field input">
                    <label>Password</label>
                    <input type="password" name="pwd" placeholder="Enter your password">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" value="Login">
                </div>
            </form>
            <div class="link">Not yet signed up? <a href="index.php"> Signup now</a></div>
        </section>
    </div>
    <script src="JAVASCRIPT/pass-show-hide.js"></script>
    <script src="JAVASCRIPT/login.js"></script>
    <script src="JAVASCRIPT/bg.js"></script>
</body>
</html>