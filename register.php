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
  <?php 
      $register = new ViewUser();
      $register->RegisterUser();
      ?>
      
      
      
          <center>
            <div class="wrapper">
    <div class="register-box">
    <form action="register_auth.php" method="post">
    <!-- display validation errors -->
    <?php //include('errors.php'); ?>
    <label>username </label><input type="text" name="reg_username"/> <br />
    <label>email</label> <input type="email" name="reg_email"/> <br />
    <label>password</label> <input type="password" name="password_1" rows="5" cols="40">
    <label>confirm password</label> <input type="password" name="password_2" rows="5" cols="40">
        <div class="buttony"><button type="submit" value="send" name="register_user">register</button></div>
    
    </form>
    Already a member? <a href="login.php">Sign in</a>
    </div>
    </div>
    
    </center>
      
      
      
      
      
  </body>
</html>