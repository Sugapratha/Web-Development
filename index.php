<?php 
include('includes/connect.php');
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Art Selling Website</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <script src="animation.js"></script>
  </head>
  
  <body>

  <?php 
    include('includes/navbar.php');
  ?>
    <!--banner--><section class="ban_sec">
		<div class="container">
			<div class="ban_img">
	      <img src="assets\images\banner4.jpg" alt="banner">
				<div class="ban_text">
					<strong>
						<span>Discover Your Next </span><br>Masterpiece
					</strong>
					<p>Artworks That Captivate and Inspire </p>  
				</div>
			</div>
		</div>
	</section>

    <!--products-->
      <div class="product-card-home">
        <div class="prod-container-home">
          <div class="prod-pic-home">
            <img src="assets\images\products\pro3.jpg" class="prod-image-home" />
          </div>
          <div class="product-details-home">
            <p class="prod-title-home">Painting</p>
            <h1 class="prod-name-home">Dark Giraffee</h1>
            <h2 class="prod-amt-home">₹450</h2>
            <div class="cart-buttons-home">
            </div>
          </div>
        </div>
        
        <div class="prod-container-home">
          <div class="prod-pic-home">
            <img src="assets\images\products\pro2.jpg" class="prod-image-home" />
          </div>
          <div class="product-details-home">
            <p class="prod-title-home">Fanart</p>
            <h1 class="prod-name-home">Surya - Aparna</h1>
            <h2 class="prod-amt-home">₹600</h2>
            <div class="cart-buttons-home">
            </div>
          </div>
        </div>

        <div class="prod-container-home">
          <div class="prod-pic-home">
            <img src="assets\images\products\pro1.jpg" class="prod-image-home" />
          </div>
          <div class="product-details-home">
            <p class="prod-title-home">Anime</p>
            <h1 class="prod-name-home">Otakumu</h1>
            <h2 class="prod-amt-home">₹400</h2>
            <div class="cart-buttons-home">
            </div>
          </div>
        </div>

        <div class="prod-container-home">
          <div class="prod-pic-home">
            <img src="assets\images\products\pro4.jpg" class="prod-image-home" />
          </div>
          <div class="product-details-home">
            <p class="prod-title-home">Painitng</p>
            <h1 class="prod-name-home">Scenary</h1>
            <h2 class="prod-amt-home">₹520</h2>
            <div class="cart-buttons-home">
            </div>
          </div>
        </div>

      </div>
    
    <!-- customized work-->
    <h1 class="custom-title">Customized work</h1><br>
    <div class="custom-grid">
      <div class="cust-prod">
        <img src="assets\images\products\pro5.jpg" class="cust-prod-img" />
      </div>
      <div class="cust-prod">
        <img src="assets\images\products\pro7.jpg" class="cust-prod-img" />
      </div>
      <div class="cust-prod">
        <img src="assets\images\products\pro8.jpg" class="cust-prod-img" />
      </div>
      <div class="cust-prod">
        <img src="assets\images\products\pro6.jpg" class="cust-prod-img" />
      </div>
    </div>
    <h3 class="not-for-sale">Not for sale</h3>

    <!-- special offer-->
    <div class="offer-grid">
      <div class="offer-content">
        <h1 class="offer-title">Special offer for</h1>   
        <h3 class="offer-name">Birthday gifts</h3>  
        <h1 class="offer-amount1">₹700</h1>
        <h1 class="offer-amount2">₹400</h1> 
        <h3 class="offer-name"> Art lovers, rejoice! Explore, collect, and save on your favorite pieces today!.</h3> 
      </div>
      <div class="cust-prod-offer">
        <img src="assets\images\products\jimin.jpg" class="cust-prod-img-offer" />
      </div>
    </div>

    <?php 
    include('includes/footer.php');
?> 
  </body>

  

</html>