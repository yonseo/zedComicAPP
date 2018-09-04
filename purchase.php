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


// check is user has sufficient funds
// subtract donuts from user account
//mark chapter as unlocked for this user


?>
	<div class="gridy">

		<div class="buy-box">
			<?php
			$uBuy = new Purchase();
			$uBuy->buyChapter();
			?>
		</div>


		<div class="buy-box">

			<p>
				<ul>
			<li>Series name: Hello Holika</li>
			<li>Chapter: 1</li>
		</ul>
		</p>
		<h3>Unlock this chapter for</h3>

		 20 donuts
		<button>BUY</button>
		  <form action="<?php $uBuy ?>" method="post">
    <input type="submit" name="buy_press" id="press" value="BUY" /><br/>
</form>

		<h4></h4>
	</div></div>




  </body>
</html>
