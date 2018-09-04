<?php
/***************DO NOT ALLOW DIRECT ACCESS************************************/
if ( stripos( $_SERVER[ 'REQUEST_URI' ], basename( __FILE__ ) ) !== FALSE ) { // TRUE if the script's file name is found in the URL
  header( 'HTTP/1.0 403 Forbidden' );
  die( "<h2>Forbidden! You don't have permission to access this page.</h2>" );
}
/*****************************************************************************/



        $db_host = "localhost";
        $db_username = "root";
        $db_password = "root";
        $db = "zed_db";

        $link = mysqli_connect($db_host,$db_username,$db_password,$db);

	    
        $username ="";
        $email = "";
        $errors = 0; 
        
        //new connection
        //$link = $this->dbconnect();
        //if register button is clicked
    if(isset($_POST['register_user'])){
        $username = mysqli_real_escape_string($link,$_POST['reg_username']);
        $email = mysqli_real_escape_string($link,$_POST['reg_email']);
        $password_1 = mysqli_real_escape_string($link,$_POST['password_1']);
        $password_2 = mysqli_real_escape_string($link,$_POST['password_2']);

        //check for errors
        if (empty($username)){
            $errors++;
            echo "Username is required</br>";
        }
        if (empty($email)){
            $errors++;
            echo "Email is required</br>";
        }
        if (empty($password_1)){
            $errors++;
            echo "Password is required</br>";
        }
        if (empty($password_2)){
            $errors++;
            echo "Please confirm password</br>";
        }else if ($password_1 != $password_2){
            $errors++;
            echo "The two password do not match</br>";
        }
        if (!empty($password_1) && strlen($password_1) < 6){
            $errors++;
            echo "Password must be at least 6 characters</br>";
        }

        //check database if user already exists
          $user_check_query = "SELECT * FROM zed_users WHERE user_name = '$username' OR user_email='$email' LIMIT 1";
          $result = mysqli_query($link, $user_check_query);
          $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['user_name'] === $username) {
                $errors++;
                echo "Username already exists";
            }

            if ($user['user_email'] === $email) {
                $errors++;
                echo "A user with that email already exists";
            }
        }// end if user exists


        // if there are no errors
        if ($errors == 0) {
            //encrypt password
            $password = md5($password_1);
            $sql = "INSERT INTO zed_users (user_name, user_email, user_password) VALUES ('$username','$email','$password')";

            mysqli_query($link,$sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
             echo "REGISTER SUCCESS";
            header('location: login.php');
        }

        }//end isset
	
	
	    
	
	
	
?>