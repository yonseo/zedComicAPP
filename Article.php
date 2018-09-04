<?php
require_once 'src/common.php';
require_once  'includes/header.php';

// Check user Authentication
CheckAccess(1);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	
	
    </head>
    
    
  <body>
  <div id="wrapper">

		<div id="main>

  
  
  <?php
	if (isset($_GET['post'])){
			
			$vArt = new ViewBlog();
			$vArt->ViewArticle();
			
			
			
			$vCom = new ViewComments();
			$vCom->ShowComments();
			
			
			
			$sCom = new ViewComments();
			$sCom->SendComments();
			
			
	}else {
	
			$vPost = new ViewBlog();
			$vPost->ViewPosts();
			
}
?>
		
								<!-- Pagination -->
							<ul class="actions pagination">
								<li><a href="" class="disabled button big previous">Previous Page</a></li>
								<li><a href="#" class="button big next">Next Page</a></li>
							</ul>
		</div><!-- MAIN DIV-->
		
									<section id="sidebar">

						<!-- Intro -->
							<section id="intro">
								<a href="#" class="logo"><img src="/logo.jpg" alt="" /></a>
								<header>
									<h2>ZED BLOG</h2>
									<p>A blog & comic reader. </p>
								</header>
							</section>
		
		 </div>
    
  </body>
</html>

