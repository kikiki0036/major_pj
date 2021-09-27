<?php 
  session_start();
  if(isset($_SESSION['member_id'])){
    header("location: main.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form signup">
      <header>Register</header>
      <form action="#" enctype="multipart/form-data">
        <div class="error-txt"></div>
          <div class="field input">
            <label>User Name</label>
            <input type="text" name="member_name" placeholder="User name" required>
          </div>
          <div class="field input">
            <label>Phone</label>
            <input type="text" name="phone" placeholder="Phone" required>
          </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Create Account">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>
    <script src="JAVASCRIPT/pass-show-hide.js"></script>
    <script src="JAVASCRIPT/signup.js"></script>
</body>
</html>