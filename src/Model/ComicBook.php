<?php


class Comic extends Kon{

    // functions
    protected function ViewComic(){
        if(isset($_GET['tankobon'])){
            $tanka = $_GET['tankobon'];
        $link = $this->dbconnect();

        //Create a Query
        $sql= "SELECT * FROM zed_tankobon WHERE comic_id = '$tanka'";
        $result = mysqli_query($link, $sql);

        //number of records you want to view on a single page
        $rows_per_page = 1;
        //total number of pages available in the database
        $total_records = mysqli_num_rows($result);
        // determine number of total pages available
        $pages = ceil($total_records / $rows_per_page);


        //determine page number visitor is currently on
        if (!isset($_GET['page'])) {
          $k = 1;
        } else {
          $k = $_GET['page'];
        }

        //determine the sql limit
        $start = ($k-1)*$rows_per_page;
        //retrieve results
        $sql = "SELECT * FROM zed_tankobon LIMIT $start, $rows_per_page";
        $result = mysqli_query($link, $sql);

        //check result
            if (!$result){
             printf("QUERY Failed: %s\n", mysqli_error($link));
            exit();
            mysqli_close($link);
        }

        //fetch results
        echo '<div class="container">';
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['tankobon_id'];
            $desc = $row['tankobon_body'];
            $img = $row['tankobon_image'];
            $show_img = '<img src="uploads/comicbook/c89/'.$img.'" alt="Image not found" class="comic-page" >';


            echo 'page: '.$id;
            echo $show_img;
            echo '<div class="comic-desc">'.$desc.'</div>';
           //echo $desc;
        }

        //display links for page

        echo '<table class="u-full-width"><tbody><tr>';
        for ($k=1;$k <= $pages;$k++){
            echo '<td><a class="button" href="ComicShelf.php?tankobon='.$tanka.';page=' . $k . '">' . $k . '</a></td>';

        }
         echo '</tr></tbody></table></div>';

    }//end tankobon
    } //end of function
    
    protected function ViewCover(){
        $link = $this->dbconnect();
        $sql= 'SELECT * FROM zed_cover';
        $result = mysqli_query($link, $sql);
        $numRows = $result->num_rows;
        while($row = $result->fetch_assoc()){
            $c_id = $row['cover_id'];
            $image  = $row['cover_image'];
            $tank = $c_id;
            
            echo '<a href="ComicShelf.php?tankobon='.$tank.'"><img src="uploads/comicbook/cover/'.$image.'" style="width: 50%" ></a>';
        
        }   

    }
    
    protected function ViewTank(){
        
        if(isset($_GET['tankobon'])){
            
            $link = $this->dbconnect();
            $tanka = $_GET['tankobon'];
            
            $sql = "SELECT * FROM zed_tankobon WHERE comic_id = '$tanka'";
            $result = mysqli_query($link,$sql);
            $numRows = $result->num_rows;
            while($row = $result->fetch_assoc()){
                $tank_img = $row['tankobon_image'];
                
                echo $tank_img;
            }
            
        }else{}
        
    }
    
    
}// end Comic class




?>