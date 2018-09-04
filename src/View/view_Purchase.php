<?php
class Purchase extends Kon {
///= Script used for user to purchase chapters of comic =///
  //buy donuts as currency to unlock chapters
    public function buyDonuts(){
      //variables
      $a_donuts = 6;
      $b_donuts = 10;
      $c_donuts = 20;
      $d_donuts = 50;



      //if user clicked buttomn and is logged in
      if(isset($_POST['buy_press']) && isset($_SESSION['username'])){
        $buy_button = $_POST['buy_press'];
        $buy_username = $_SESSION['username'];
        //connect to db
        $link = $this->dbconnect();

        $sql = "SELECT * FROM zed_users WHERE user_name = '$buy_username'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_donuts = $row["donuts"];

        //add purchase of donuts to user funds
        $receipt = $buy_button + $user_donuts;
        $sql = "UPDATE zed_users SET donuts = $receipt WHERE user_name = '$buy_username'";
        $result = mysqli_query($link, $sql);

        $sql = "SELECT * FROM zed_users WHERE user_name = '$buy_username'";
        $result = mysqli_query($link, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_donuts = $row["donuts"];
        echo "Your receipt: ".$user_donuts;


      }// end button press and log in check

    }


  //retrieve the selected chapter and series name
  public function buySeries(){
    $series_name = "";
    $series_chapter = "";
    $chapter_cost = "";

    $link = $this->dbconnect();

    $sql = "SELECT * FROM zed_tankobon WHERE tankobon_title = '$series_name'";
    $result = mysqli_query($link, $sql);
    $return_array = mysqli_fetch_assoc($result);
  }


//check if user is logged in if not redirect to login page


  //change to protected function
  public function buyChapter(){
    //if buy button is clicked and user is logged in
    if(isset($_POST['buy_press']) && isset($_SESSION['username'])){
      //variables
      $buy_button = $_POST['buy_press'];
      $buy_username = $_SESSION['username'];
      $buy_amount = 20;
      echo "username: " .$buy_username;
      echo "\n";
      echo "donuts:" .$buy_amount;

      //new connection
      $link = $this->dbconnect();

      $sql = "SELECT * FROM zed_users WHERE user_name = '$buy_username'";
      $result = mysqli_query($link, $sql);
      $row = mysqli_fetch_assoc($result);

      if($row){
        $q_username = $row["user_name"];
        $q_donuts = $row["donuts"];

        echo $q_username;
        echo $q_donuts;

        //subtract the cost of chapter by the total amount of user funds

        $receipt = $q_donuts - $buy_amount;

        //check if user has enough funds
          if($buy_amount <= $q_donuts){
          //update database
          $sql = "UPDATE zed_users SET donuts = $receipt WHERE user_name = '$buy_username'";
          $result = mysqli_query($link, $sql);

          $sql = "SELECT * FROM zed_users WHERE user_name = '$buy_username'";
          $result = mysqli_query($link, $sql);
          $row = mysqli_fetch_assoc($result);
          $qu_donuts = $row["donuts"];

          echo "Your receipt: ".$qu_donuts;
          }// end user funds check
            else if($q_donuts < $chapter_cost){
              echo "You do not have enough funds to buy this chapter.";
          }


      }// end if $row returns with result

    }// end if buy button is pressed

  }// end buychapter function

}// end object Purchase


 ?>
