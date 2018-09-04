<?php
//require_once __DIR__ .'/BlogRead.php';

class ViewBlog extends Blog{
    
    //include constructor for database connection
    
    public function ViewPosts(){
        
        $this->GetPosts();
       
    }
    
    public function ViewArticle(){
        
        $ShowArticle = new Blog();
        $ShowArticle->GetArticle();
    }
    
    
    
    
    
}


?>