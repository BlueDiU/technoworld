<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
  </head>


  <body>
    <!-- Products section -->
    <div class="products-container container">

      <?php
            foreach ($productos as $prod) {

        echo "<article class='card'>";
        echo "<img src='https://www.att.com/idpassets/global/devices/phones/apple/apple-iphone-12/carousel/blue/64gb/6861C-1_carousel.png' alt='producto' />";
        
        echo "<section> <h5>" . $prod->nombre . "</h5> <small class='text-muted'>" . $prod->nombre_categoria. "</small>";

        echo "<div> <b> $" . $prod->precio . "</b></div></section></article> ";
        
      
            }
      ?>

    </div>


  </body>
</html>
