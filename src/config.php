<?php

class Kon{
    protected function dbconnect(){
        $host = $this->servername = "localhost";
        $username = $this->username = "root";
        $password = $this->password = "root";
        $db = $this->dbname = "zed_db";

        $link = mysqli_connect($host,$username,$password,$db);
 
      // Check connection
      if (!$link){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();  
      }else if ($link){
        return $link;      
      }
    }//end dbconnect
}// end Kon
?>