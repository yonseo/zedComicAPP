 <html>


  <head>

     <?php
include 'src/common.php';
include 'includes/header.php';

//CheckAccess(0);

$uDonut = new Purchase();
$uDonut->buyDonuts();

?>
  </head>
  <body>



           <!-- Body Container -->
   <div class="gridy">

         <div class="row">

    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/dn.jpg"><h2>5 donuts</h2>
      <form action="<?php $uDonut ?>" method="post">
      <button type="submit" name="buy_press" id="press" value="5" />buy</button><br/>
      </form>
    </div></div>


    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/dn.jpg"><h2>10 donuts</h2>
      <form action="<?php $uDonut ?>" method="post">
      <button type="submit" name="buy_press" id="press" value="10" />buy</button><br/>
      </form>
    </div></div>

    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/dn.jpg"><h2>20 donuts</h2>
      <form action="<?php $uDonut ?>" method="post">
      <button type="submit" name="buy_press" id="press" value="20" />buy</button><br/>
      </form>
    </div></div>

    <div class="column"><div class="card"><img class="c-img" src="http://localhost/zed/themes/blossom/image/dn.jpg"><h2>30 donuts</h2>
      <form action="<?php $uDonut ?>" method="post">
      <button type="submit" name="buy_press" id="press" value="30" />buy</button><br/>
      </form>
    </div></div>

        </div>


        </div>

   </div>










    <footer>
    <div class="footer-back">
     <div class="footer-end">
        <div class="footer-box">
             <h3>ABOUT</h3>
             <p>CRAZZZY</p>
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
      var total = 8;
        var page = 2;
        var url = "http://localhost/zed/themes/blossom/image/page_";
        var ext = ".jpg";



     function changeNext() {
        var image = document.getElementById('start');

         if(page == 2){
             image.src = url+page+ext;
             page = 3;

         }
        else if(page <= total){
            image.src = url+page+ext;
            page = page+1;
        }




    }

    </script>
  <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

 <script>
    // Disable Right Click on Image
    $('img').bind('contextmenu', function(e){
        return false;
    });

    </script>

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
