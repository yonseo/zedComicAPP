<?php

//require_once __DIR__.'/config.php';

class Blog extends Role{

    protected function getPosts(){
    //check the user role
    $active_role = $this->UserRole();
    
        
    if($active_role){
        
        //connect to database
        $link = $this->dbconnect();
        
        //get all articles from user role and guest
        $sql = "SELECT * FROM zed_posts WHERE post_role IN ('$active_role', 'guest') AND post_status ='published'";
        $result = mysqli_query($link,$sql);

            if(!$result){
                echo "Failed Query: ";
            }

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['post_id'];
            $author = $row['post_author'];
            $time = $row['post_time'];
            $desc = $row['post_description'];
            $body = $row['post_body'];
            $title = $row['post_title'];
            $post_type = $row['post_role'];
            $av = $row['post_avatar'];
            $avatar = '<img src="uploads/avatar/'.$av.'" alt="no image" style="width: 50px">';
            $thumb = $row['post_thumb'];
            $thumbnail = '<img src="uploads/images/featured/'.$thumb.'" alt="no image" >';

            echo '<article class="post">';
            echo '<header><div class="title"><h3>'.$title.'</h3></div>';
            echo '<div class="meta">';
            echo '<time class="published" >' . $time . '</time>';
            echo '<span class="name">' . $author . '</span>';
            echo $avatar;
            echo '</div></header>';
            echo '<div class="image featured">' . $thumbnail . '</div>';
            echo '<p>' . $desc . '</p>';
            echo '<footer><ul class="actions">';
            echo '<li><a href="index.php?post='.$id.'" class="button big">Read More</a></li></ul>';
            echo '<ul class="stats"><li>' . $post_type . '</li>';
            echo '</ul></footer>';
            echo '</article>';
        }
    }//end check if user role matches post role
    }//end GetPosts method

    protected function getArticle(){
    //check the user role
    $active_role = $this->UserRole();
        
    if($active_role){
        
    $link = $this->dbconnect();

        //k is selected article post number
        $k = $_GET['post'];
        if(isset($k)){
            $id =  mysqli_real_escape_string($link,$_GET['post']);

            $sql = "SELECT * FROM zed_posts WHERE post_id = $id AND post_role IN ('$active_role', 'guest') AND post_status ='published' ";
            $result = mysqli_query($link, $sql);

            if(!$result){
                echo "Failed Query: ";
            }
        }

        while($row = mysqli_fetch_assoc($result)){
            $id = $row['post_id'];
            $post_type = $row['post_role'];
            $author = $row['post_author'];
            $time = $row['post_time'];
            $desc = $row['post_description'];
            $body = $row['post_body'];
            $title = $row['post_title'];
            $av = $row['post_avatar'];
            $avatar = '<img src="uploads/avatar/'.$av.'" alt="no image" style="width: 50px">';
            $thumb = $row['post_thumb'];
            $thumbnail = '<img src="uploads/images/featured/'.$thumb.'" alt="no image" >';

            //if article matches k
            if($id == $k){
            echo '<article class="post article">';
            echo '<header><div class="title"><h3>'.$title.'</h3></div>';
            echo '<div class="meta">';
            echo '<time class="published" >' . $time . '</time>';
            echo '<span class="name">' . $author . '</span>';
            echo $avatar;
            echo '</div></header>';
            echo '<div class="image featured">' . $thumbnail . '</div>';
            echo '<p>' . $desc . '</p>';
            $k = $id;
            echo '<footer><ul class="actions">';
            echo '<li><a href="#" class="button big">Next</a></li></ul>';
            echo '<ul class="stats"><li>' . $post_type . '</li>';
            echo '</ul></footer>';
            echo '</article>';
            
            echo '</div>';
            $page_number = $id;
            }
        }
    }//end check if user role matches post role
    }//end GetArticle method
    
}//end class Blog

?>