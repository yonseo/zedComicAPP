<?php 

// Zed CMS v.1
// Credits: 
// https://yonseo.com
// http://getskeleton.com/
//
//
//
require_once 'includes/header.php';
require_once 'src/common.php';


?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">


    </head>
    
    <center><h2>MY WEBSITE</h2></center>
    
<body>
  <?php
    
    echo '<div class="container main-box">';
    $vArt = new ViewComic();
    $vArt->ComicCover();
    echo '</div>';
    
    echo '<div class="container main-box">';
    $vArt = new ViewComic();
    $vArt->ComicPages();
    echo '</div>';
    
    echo '<div class="container">';
    $vCom = new ViewComments();
    $vCom->ShowComments();
    echo '</div>';
    
    echo '<div class="container main-box">';
    $sCom = new ViewComments();
    $sCom->SendComments();
    echo '</div>';
    
?>
		
</body>
</html>