
<html>
  <head>
		<?php
		require_once 'src/common.php';
		require_once  'includes/header.php';

		// Check user Authentication
		CheckAccess(0);

		?>

  </head>
  <body>



         <!-- SIDEBAR END -->





      <div class="slider">
          <h2>HELLO HOLIKA TEASER</h2>
          <h2>now available</h2>

      </div>




       <div class="row">
    <div class="column"><div class="card">C1</div></div>
    <div class="column"><div class="card">C2</div></div>
    <div class="column"><div class="card">C3</div></div>
    <div class="column"><div class="card">C4</div></div>
        </div>


     <!-- Body Container -->
   <div class="gridy">

         <div class="row">
            <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/cover.jpg"><h2>Comics</h2> Read the latest!</div></div>
    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/cover.jpg"><h2>Shop</h2> for currency in donuts</div></div>
    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/cover.jpg"><h2>Volunteer</h2> helping hand</div></div>
    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/cover.jpg"><h2>FAQ</h2> got a question?</div></div>
        </div>

   </div>






    <footer>
    <div class="footer-back">
     <div class="footer-end">
        <div class="footer-box">
             <h3>ABOUT</h3>
             <p>Lorem Ipsum Dolor Asec</p>
        </div>
        <div class="footer-box">
             <ul>
                 <li><h3>Title</h3></li>
                 <li>- Link</li>
                 <li>- Link</li>
                 <li>- Link</li>
             </ul>
        </div>
        <div class="footer-box">
             <ul>
                 <li><h3>Title</h3></li>
                 <li>- Link</li>
                 <li>- Link</li>
                 <li>- Link</li>
             </ul>
        </div>
     </div>
     </div>

      <p>TWICE TOWN &copy; 2018</p>
    </footer>

  </div><!-- Wrapper Ends -->

  <script>
  function funkToggle() {
    var x = document.getElementById("sidebar-box");
    if (x.style.display === "none") {
        x.style.display = "block";

    } else {
        x.style.display = "none";
    }
}

  </script>

  </body>
</html>
