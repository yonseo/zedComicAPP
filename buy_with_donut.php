<?php
include 'src/common.php';
// if yes button is pressed


    if(isset($_POST['yes_button'])){
    //subtract chapter donut cost from user funds
      //$user = $_SESSION['username'];
      //connect to db
      $link = $this->dbconnect();
      $sql= "SELECT * FROM zed_users WHERE user_name = '$user'";
      $result = mysqli($link, $sql);
      $row = mysqli_fetch_assoc($result);
      $q_donut = $row['donuts'];

      $chap_donut = 20;

      //subtract user funds by chapter donuts cost
      if($q_donut >= $chap_donut){
      $refund = $q_donut - $chap_donut;
      }

      //update database with refund to user funds
      $sql = "UPDATE zed_users SET donuts WHERE user_name = '$user'";
      $result = mysqli($link, $sql);
      header('Location: comic.php');

    }else if(isset($_POST['no_button'])){
    //redirec user back to chapter page
      header('Location: comic.php');

    }//end if


 ?>
