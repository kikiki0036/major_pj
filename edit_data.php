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