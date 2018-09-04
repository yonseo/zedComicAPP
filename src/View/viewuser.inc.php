<?php

// extend to User to get data from User class
class ViewUser extends User{


    //view files should be public functions
    public function ViewAllUsers(){
        $datas = $this->getAllUsers();
        foreach ($datas as $data) {
            echo $data['user_name']."</br>";
            echo $data['user_email'];
        }
    }//end showAllUsers

    public function LoginUser(){

        //execute function to loing user
        $user_login = new User();
        $user_login->loginAuth();

        //if there are any errors display them
        if(!isset($errors)){
            }else if (count($errors) > 0) :
          echo '<div class="error">';
          foreach ($errors as $error) :
             $error;
            endforeach;
                endif;
          echo '</div>';

    }

    public function RegisterUser(){

        //execute function to register user
        $user_register = new User();
        $user_register->RegisterAuth();

        //if there are any errors display them
        if(!isset($errors)){
            }else if (count($errors) > 0) :
          echo '<div class="error">';
          foreach ($errors as $error) :
             $error;
            endforeach;
                endif;
          echo '</div>';

    }//end RegisterUser


}// end ViewUser object
?>
