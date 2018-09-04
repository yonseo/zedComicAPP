<?php

class ViewComic extends Comic{
    
    public function ComicPages(){
        $getcomic = new Comic();
        $getcomic->ViewComic();
        
    }
    
    public function ComicCover(){
        //if tankobon is selected the display the pages. If no selection display comic cover
        if(isset($_GET['tankobon'])){
            
            $vtank = new Comic();
            $vtank->ViewComic();
        }else{
        
        $getCover = new Comic();
        $getCover->ViewCover();
        }
    }
}

?>