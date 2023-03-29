<?php
//Cargando el archivo de clase   
spl_autoload_register(function ($classname) { 
    include_once 'class/' . $classname . '.class.php';     
 }); 

 //Creando los objetos para cada tipo de auto. Notar que se están    
 //asignando a elementos de una matriz que tendrá por nombre $movil 
 $producto[0] = new producto("12 Pack agua embotellada", "Cascada", "700 ml","2.30","Antes: $2.55 Ahora: $2.30", "img/agua.jpg","Bebidas");
 $producto[1] = new producto("6 Pack jugo nectar", "Del monte", "200 ml","2.11","Sin oferta", "img/jugonectar.jpg","Bebidas");
 $producto[2] = new producto("Beb alcohol naranja", "MGSpirit", "275 ml","1.95","Lleve 3 por $4.50", "img/mgspirit.jpg","Bebidas");
 $producto[3] = new producto("Bebida Té sabor a durazno", "Lipton", "2.5 L","1.75","Antes:$2.00 Ahorro:$0.25", "img/lipton.jpg","Bebidas");
 $producto[4] = new producto("Manzana roja", "Gala #150", "Libra","1.25","Antes:$1.45 Ahorro:$0.20", "img/manzana.jpg","Frutas");
 $producto[5] = new producto("Aguacate", "Hass", "Libra","1.30","Antes:$1.45 Ahorro:$0.15", "img/aguacate.jpg","Frutas");
 $producto[6] = new producto("Mango", "Tommy", "Unidad","1.59","Sin oferta", "img/mango.jpg","Frutas");
 $producto[7] = new producto("Tomate de ensalada", "Hidroponico", "Libra","1.20","Sin oferta", "img/tomate.jpg","Verduras");
 $producto[8] = new producto("Cebolla morada", "Campo vivo", "Libra","0.85","Antes:$0.95 Ahorro:$0.10", "img/cebollamorada.png","Verduras");
 $producto[9] = new producto("Guisquil", "Criollo", "Unidad","0.50","Sin oferta", "img/guisquil.jpg","Verduras");
 $producto[10] = new producto("Lechuga", "Romana", "Unidad","0.55","Antes:$0.69 Ahora:$0.55", "img/lechuga.jpg","Verduras");
 $producto[11] = new producto("Carne molida", "Pollo indio", "Libra","2.25","Antes:$2.50 Ahorro:$0.25", "img/carnemolida.jpg","Carnes");
 $producto[12] = new producto("Chorizo de res", "Embutidos Vicen", "227 g","2.85","Sin oferta", "img/chorizo.jpg","Carnes");
 $producto[13] = new producto("Costilla Ahumada", "Kreef", "Libra","6.05","Sin oferta", "img/costilla.jpg","Carnes");
 $producto[14] = new producto("Jamon Familiar", "Toledo", "200 g","1.00","Antes:$1.05 Ahorro:$0.05", "img/toledo.png","Carnes");
 $producto[15] = new producto("Piña", "Hawaiana", "Unidad","2.15","Sin oferta", "img/piña.jpg","Frutas");

 ?>