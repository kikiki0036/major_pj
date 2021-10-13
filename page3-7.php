<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['email'])){
    header("location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
      <link rel="stylesheet" href="page3css.css">
    </head>
    <body>
        <script>
            document.getElementById("m3").style.color = "#ffcc00";
        </script>
        <div class="page3"> 
            <div  class="containerpage3"  style="margin-left: 60px;">
                 <div class="area-branch">    

                 </div>
            </div>
        </div>
      <script src="javascript/page3-7.js"></script>
    </body>
</html>
