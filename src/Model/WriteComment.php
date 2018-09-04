<?php
//connect to db
include '../../urls.php';
    global $link,$page_number;

if(!$link){
    echo 'LINK IS BROKEN!';
}

if (isset($_POST)){
    $body = mysqli_real_escape_string($link,$_POST['comment']);
    $user = mysqli_real_escape_string($link,$_POST['username']);
    


    //query
    $sql= "INSERT INTO zed_comments (comment_body, comment_author) VALUES ('$body','$user')";
    $result = mysqli_query($link, $sql);
   //check for errors
    if(!$result){
        echo 'comment was not sent';
    }else {
        $dir = $masterDir.'Articles.php?post=1';
        $dir2 = 'index.php';
        //redirect problems
        header('Location:' .$dir2);
    }
}

?>