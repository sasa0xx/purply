<?php 
session_start();
if(isset($_COOKIE['id'])){
  header("Location:/website/home.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Purply</title>
    <link rel="stylesheet" href="css/signin.css">
  </head>
  <body>

    <form action="login.php" method="post">
      <div class="form">
        <div class="text-magenta title">Login</div>
          <input type="text" name="email" class="text-box" placeholder="Email">
          <input type="password" name="password" class="text-box" placeholder="Password">
        <button type="submit" name="log" class="button">login</button>
        <a href="index.php" class="link">Create an account</a>
      </div>
    </form>

  </body>
</html>

<?php
  $conn = mysqli_connect('localhost','root','','purply');

  $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
  if(isset($_POST["log"])){
    if(!empty($email) && !empty($password)){
      $sql = " SELECT * FROM user WHERE email = '$email'";
      $result = mysqli_query($conn,$sql);
      
      $row = $result->fetch_assoc();
      if($row){
        if(password_verify($password,$row["password"])){
          setcookie("id",$row["id"],time()+(60*60*24*365*50));
          header("Location:/website/home.php");
        }
        else{
          echo '<div class="error">Wrong password</div>';
        }
      }
      else{
        echo'<div class="error">Cannot find that email</div>';
      }

    }
    else{
      echo '<div class="error">please write your email/password</div>';
    }
  }
?>