<?php

class ViewComments extends Comments{
    
    public function ShowComments(){
        $comment = new Comments();
        $comment->GetComments();
    }
    
    public function SendComments(){
        $send_comment = new Comments();
        $send_comment->PostComments();
    }
}

?>