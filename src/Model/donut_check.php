<?php
class Donut extends Kon{


  public function keyCheck(){
//check if chapter is locked or unlocked by user
  if(isset($_POST['button_press']) && isset($_SESSION['username']) ){
///=======================================================================VARIABLES
  $sel_chapter = $_POST['button_press'];
  echo 'user selected chapter: '.$sel_chapter.'</br>';
  $user = $_SESSION['username'];
  $ser = 'HelloHolika';
  $c = '_Chapter';
  $sel_series  = $ser.$c.$sel_chapter;
  $error = 0;
  $token = 1;
///=======================================================================VARIABLES END

  echo "selected series name: ".$sel_series."</br>";
  //connect to db
  $link = $this->dbconnect();

  //get user key and email
  $sql = "SELECT * FROM zed_users WHERE user_name = '$user'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result);
  $userkey = $row['user_key'];
  $useremail = $row['user_email'];
  //get matching user key
  $sql = "SELECT * FROM zed_key WHERE key_email = '$useremail'";
  $result = mysqli_query($link, $sql);
  $row = mysqli_fetch_assoc($result);
  $k_email = $row['key_email'];
  $k_key = $row['key_code'];
  $k_series = $row['key_series'];

///=======================================================================LOOP CHECK
  //check for matching series from user and selected series
  $array = explode(',', $k_series);
  $count = count($array);
  $int = 0;

  foreach($array as $value){
    $int++;

    if($value == $sel_series){
      //token is unlocked
      $token = 0;
      break;
    }else{
      //token is locked
      $token = 1;
    }

  }//end foreach loop
  ///=======================================================================LOOP CHECK END

///=======================================================================ERROR CHECK

  //check if token is empty
   if($token != 0 && $token != 1){
     $error++;
   }
  //check email match
  if($useremail !== $k_email){
    $error++;
    echo "no matching email</br>";
  }
///=======================================================================ERROR CHECK END


///======================================================================= RESULTS
  echo "errors found: ".$error."</br>";
  echo "token: ".$token.'</br>';
    //if locked chapter
    if($error > 0 && $token == 1 || $token == 1 && $error == 0){

    echo "You do not have access to this chapter. Would you like to purchase this chapter?</br>";
    echo '<form action="#" method="post"><button type="submit" name="yes_button">YES</button></br>';
    echo '<form action="#" method="post"><button type="submit" name="no_button">NO</button></br>';

    }//end if locked chapter

  //if user key matches chapter key and user is logged in then user has access
    else if($token == 0 && $error == 0){

      // retrieve the selected chapter

?>

<div class="gridy">

 <div class="comic-page">
  <h3>Chapter: #</h3>
 <img class="c-img" src="http://localhost/zed/themes/blossom/image/page_1.jpg" id="start" onclick="changeNext();">
 <h3>Page: #</h3><h3>Total Pages: #</h3>
</div></div>



  <script>
      var total = 8;
        var page = 2;
        var url = "http://localhost/zed/themes/blossom/image/page_";
        var ext = ".jpg";



     function changeNext() {
        var image = document.getElementById('start');

         if(page == 2){
             image.src = url+page+ext;
             page = 3;

         }
        else if(page <= total){
            image.src = url+page+ext;
            page = page+1;
        }

    }

    </script>

  <?php
}// end if no errors


}//end if press button and login
    else{
    //redirect to login page
    header('Location: login.php');
    }//end else
  }// end function
}// class
  ?>
