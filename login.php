<?php
include 'src/common.php';
include 'includes/header.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>title</title>
  </head>
  <body>
  <?php $users = new ViewUser(); 
    $users->ViewAllusers();  
      
      $login = new ViewUser();
      $login->LoginUser();
      ?>
      
      
      
          <center>
    <div class="login-box">
    <form action="<?php $login ?>" method="post">
    <?php //include('errors.php'); ?>
    <label>username </label><input type="text" name="username"/> <br />
    <label>password</label> <input type="password" name="password" rows="5" cols="40">
        <div class="buttony"><button type="submit" value="send" name="login_user">login</button></div>
    
    </form>
    Not a member? <a href="register.php">Register</a>
    </div>
    
    </center>
      
      
      
      
      
  </body>
</html>