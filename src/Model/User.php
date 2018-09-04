<?php

class User extends Kon{

  public function userInfo(){
    if(isset($_SESSION['username'])){
      //variables
      $c_user = $_SESSION['username'];


    $link = $this->dbconnect();

    $sql = "SELECT * FROM zed_users WHERE user_name = '$c_user'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $useremail = $row["user_email"];

    //get matching user key
    $sql = "SELECT * FROM zed_key WHERE key_email = '$useremail'";
    $result = mysqli_query($link, $sql);
    $row = mysqli_fetch_assoc($result);
    $k_email = $row['key_email'];
    $k_key = $row['key_code'];
    $k_series = $row['key_series'];

    //check for matching series from user and selected series
    $new_string = explode(',', $k_series);

    foreach($new_string as $value){
      $split = explode('_', $value);
      foreach($split as $rrr){

      echo $rrr.'</br>';
      }

    }//end foreach



    echo '<table class="u-full-width">';
    echo '               <thead>
                     <tr>
                       <th>Name</th>
                       <th>Key</th>
                       <th>Series</th>
                       <th>Chapter</th>
                     </tr>
                   </thead>';

    echo ' <tbody>
          <tr>';
    echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo "<td>"."</td>";
    echo '</tr>
          </tbody>';
    echo '</table>';

    }//end user login check
    else{
      //redirect to login page
      header('Location: login.php');
    }

  }//end userInfo

    protected function getAllUsers(){
        $sql = "SELECT * FROM zed_users";
        //get the database connection from Kon and execute query
        $result = $this->dbconnect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0){
            while ($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            //we have an array we can pass on to the next class
            return $data;
        }
    }

    protected function loginAuth(){
        $username ="";
        $email = "";
        $errors = array();
        //new connection
        $link = $this->dbconnect();
      //if login button is clicked
      if(isset($_POST['login_user'])){
        //Sanitize
        $username = mysqli_real_escape_string($link, $_POST['username']);
        $password = mysqli_real_escape_string($link, $_POST['password']);

      //check for errors
      if (empty($username)) {
        array_push($errors, "Username is required");
      }
      if (empty($password)) {
        array_push($errors, "Password is required");
      }

      //if no errors
      if (count($errors) == 0) {
        $password = md5($password);
        $sql = "SELECT * FROM zed_users WHERE user_name='$username' AND user_password='$password'";
        $results = $this->dbconnect()->query($sql);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
            //echo "LOGIN SUCCESS";
        }else {
            array_push($errors, "Wrong username/password combination");
        }
      }//check errors
      }// check submit button
    }// end loginUser

    protected function RegisterAuth(){
        $username ="";
        $email = "";
        $errors = 0;

        //new connection
        $link = $this->dbconnect();
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
            //header('location: index.php');
        }

        }//end isset
    }//end RegisterAuth

}// end USER object
?>
