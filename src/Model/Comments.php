<?php

class Comments extends Kon{

    protected function SetComments(){
        $link = $this->dbconnect();

        $user ="";
        $body = "";
        $errors = array(); 
        
        $active_user = (isset($_SESSION['username']));
        $comment_sent = (isset($_POST['commentSubmit']));
        //check if comment is submitted and user is logged in
        if ($comment_sent == 1 && $active_user == 1){
            $body = mysqli_real_escape_string($link,$_POST['comment']);
            $current_user = $_SESSION['username'];
            
                $sql = "SELECT user_avatar FROM zed_users WHERE user_name = '$current_user'";
                $result = mysqli_query($link, $sql);
                if(!$result){echo "NO AVATAR IMAGE FOUND";}

                while($row = mysqli_fetch_assoc($result)){
                    $av = $row['user_avatar'];
                }
            
        }// end comment submit and login user
        
        //check for errors
        if (empty($current_user)) {
          array_push($errors, "You need to log in to write a comment");
        }
        if (empty($body)) {
          array_push($errors, "Comment is required");
        }
    

        if (count($errors) == 0) {
        //query
        $sql= "INSERT INTO zed_comments (comment_body, comment_author, comment_avatar) VALUES ('$body','$current_user', '$av')";
        $result = mysqli_query($link, $sql);
       //check for errors
        if(!$result){
            echo 'comment was not sent';
        }else {
            //header('Location: ');
        }

        }
        }//end setComments function
    

    protected function PostComments(){
        $setComments = new Comments();
        $set = $setComments->SetComments();

        echo '<center><div class"container">';
        echo '<form action="' . $set . '" method="post">';
        include('errors.php');
        //echo '<input type="text" name="username" placeholder="Name" class="zed-input"/> <br />';
        echo '<textarea name="comment" placeholder="Leave a Comment" class="zed-form" rows="5" cols="40"></textarea>';
        echo '<button type="submit" value="SEND" name="commentSubmit">SEND</button></form>';
        echo '</div></center>';
    }


    protected function GetComments(){
        $link = $this->dbconnect();
        
        //query
        $sql= 'SELECT * FROM zed_comments ORDER BY comment_id DESC';
        $result = mysqli_query($link, $sql);

        //determine the total number of comments in db
        $total = mysqli_num_rows($result);


        echo '<center><div class"container">';
        while ($row = mysqli_fetch_assoc($result)){
            $user = $row['comment_author'];
            $body = $row['comment_body'];
            $time = $row['comment_time'];
            $img = $row['comment_avatar'];
            $show_img = '<img class="av" src="uploads/avatar/'.$img.'" alt="Image not found" style="width: 50px">';

            echo '<div class="comment-box">';
            echo $show_img.'</br>';
            echo $user.'</br>';
            echo $time.'</br>';
            echo $body.'</br>';
            echo '</div>';
        }
        echo '</div></center>';

    }// end of function

}// end Comments

?>