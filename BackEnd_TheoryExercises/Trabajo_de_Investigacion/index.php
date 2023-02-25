<!DOCTYPE html>
<!--Vegetables store for the pictures and eveything else you might want to know about them-->
<!--https://www.greenlanedelivery.com/products/yellow-potatoes-->
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Report Generator</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <section>
     <?php
     $vegatables = simplexml_load_file("products.xml");
     foreach ($vegatables as $product ) {
        $url = $product-> img_url;
        echo "<div class='asd' id='ShowProduct'>  ";
        echo "<img src='$url' alt='BagOfPotatoes'>";
        echo "<p> $product->description</p> ";
        echo "<p> $product->price</p>";
        echo "</div>";
        
        echo "<br />";

     }
      
     ?>
     </secition>
    </body>
</html>
