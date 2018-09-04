<?php
class Tanko extends Kon {

  public function viewTanko(){
    if(isset($_SESSION['username'])){ $user = $_SESSION['username']; }else{$user = '';}
    $sel_tanko = "HelloHolika";
    $ext = '_Chapter';
    //$sel_series = $sel_tanko.$ext.$int;
    $token = 'locked';

    $link = $this->dbconnect();

    //get user logged in and retreive lock/unlock chapter status
    $sql = "SELECT * FROM zed_users WHERE user_name = '$user'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    $q_email = $row['user_email'];
    //check for chapter lock/unlock status
    $sql = "SELECT * FROM zed_key WHERE key_email = '$q_email'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    $k_series = $row['key_series'];


    $sql = "SELECT * FROM zed_tankobon WHERE tankobon_title = '$sel_tanko'";
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_assoc($result);
    $title = $row['tankobon_title'];
    $desc = $row['tankobon_desc'];
    $chap = $row['tankobon_chapters'];
    $img = $row['tankobon_image'];
    $url = "uploads/comicbook/cover/";
    $donutCheck = '';

    echo $title;
    echo 'Chapters: '.$chap.'</br>';
    echo '<img src="'.$url.$img.'">';
    echo '<div class="c-text">'.$desc.'</div>';

    $num = 0;
    while ($num < $chap) {
      $num++;
      $sel_series = $sel_tanko.$ext.$num;

      //loop
      $array = explode(',',$k_series);
      foreach ($array as $value) {
        // code...
        if($value == $sel_series){
          //unlocked
          $token = 'unlocked';
          break;
        }else if($value != $sel_series){
          //locked
          $token = 'locked';
        }
      }//end foreach


      echo '<div class="card">';
      echo 'Chapter: '.$num.'</br>';
      echo '<form action="'.$donutCheck.'" method="post">';
      echo '<button type="submit" value="'.$num.'" name="button_press"/>read</button> </form></br>';
      echo $token.'</br>';
      echo 'donut cost: #';
      echo "</div>";



    }//end while loop


  }//end method



}//end class



 ?>
