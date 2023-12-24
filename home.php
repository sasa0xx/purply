<?php
 session_start();
 if(!isset($_COOKIE['id'])){
  header("Location:/website/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Document</title>
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    <div class="header">
      <div class="left">

      </div>
      <div class="right">
        <img src="nothing.jpg" alt="img" class="img">

        <?php
          $conn = mysqli_connect('localhost','root','','purply');
          $id = $_COOKIE['id'];
          $sql_1 = "SELECT * FROM user WHERE id = $id";
          $user = mysqli_query($conn,$sql_1)->fetch_assoc();
          $username = $user['username'];
          echo"<div class='username'>$username</div>";
        ?>
      </div>
    </div>
  </body>
</html>