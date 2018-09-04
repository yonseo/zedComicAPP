<?php
require_once 'src/common.php';
require_once  'includes/header.php';

// Check user Authentication
CheckAccess(0);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	
	
    </head>
    
    
  <body>
  <div id="wrapper">

		

  
  
  <?php
	if (isset($_GET['post'])){
			
			$vArt = new ViewBlog();
			$vArt->ViewArticle();
			
			
			
			$vCom = new ViewComments();
			$vCom->ShowComments();
			
			
			
			$sCom = new ViewComments();
			$sCom->SendComments();
			
			
	}else {
		echo '<div id="main>';
			$vPost = new ViewBlog();
			$vPost->ViewPosts();
			echo '</div>';
				echo '<section id="sidebar">';
		
						//Intro 
							echo '<section id="intro">';
								echo '<a href="#" class="logo"><img src="/logo.jpg" alt="" /></a>';
								echo '<header>';
									echo '<h2>ZED BLOG</h2>';
									echo '<p>A blog & comic reader. </p>';
								echo '</header>';
							echo '</section>';
		
		 echo '</div>';
			
}
?>

		

		
    
  </body>
</html>

