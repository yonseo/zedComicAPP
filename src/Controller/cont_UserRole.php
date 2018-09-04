<?php

class Role extends Kon{

    protected function UserRole(){
        
        //check if user is logged in. If user is not logged in then redirect to homepage.
        $active_check = (isset($_SESSION['username']));
        if($active_check == 1){
            $active_user = $_SESSION['username'];
            $link = $this->dbconnect();
            $sql = "SELECT user_role FROM zed_users WHERE user_name = '$active_user'";
            $result = mysqli_query($link,$sql);
            while ($row = mysqli_fetch_assoc($result)){
                $active_user = $row['user_role'];
                
            }
            return $active_user;
        }else if($active_user == 0){
            $active_role = "guest";
            return $active_role;
            //redirect
            //header('Location: ');
        }      
    }// end RoleType method
    
    //check for comment role
    
    //check for comic role
    
}//end Role class

?>