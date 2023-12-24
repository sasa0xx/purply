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

    <form action="index.php" method="post">
      <div class="form">
        <div class="text-magenta title">Sigin</div>
        <div class="in-grid-2col">
            <input type="text" name="username" class="text-box" placeholder="Username">
            <input type="password" name="password" class="text-box" placeholder="Password">
        </div>
          <input type="text" name="email" class="text-box" placeholder="Email">
        <button type="submit" name="log" class="button">Signin</button>
        <a href="login.php" class="link">Already have an account ?</a>
      </div>
    </form>

  </body>
</html>

<?php
  $conn = mysqli_connect('localhost','root','','purply');

  $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_SPECIAL_CHARS);
  $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
  $hash = password_hash($password,PASSWORD_DEFAULT);
  if(isset($_POST["log"])){
    if(!empty($username) && !empty($password) && !empty($email)){
      mysqli_query($conn,"INSERT INTO user (email , username , password)
       VALUES('$email','$username','$hash')");
      setcookie("id",$row["id"],time()+(60*60*24*365*50));
      header("Location:/website/home.php");
    }
    else{
    echo '<div class="error">please fill your data</div>';
    }
  }
?>
<script>
</script>