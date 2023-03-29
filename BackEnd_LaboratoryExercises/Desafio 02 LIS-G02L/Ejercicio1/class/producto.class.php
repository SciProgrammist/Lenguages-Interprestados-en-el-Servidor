<?php

//Definición de la clase
class producto   {
    //Propiedades de la clase auto
    private $nombre;
    private $marca;
    private $unidad_medida;
    private $precio;
    private $oferta;
    private $image;
    private $categoria;
    
    //Método constructor
    function __construct($nombre='sin definir', $marca='sin definir', $unidad_medida='no definida',$precio=0,$oferta='No tiene oferta', $image='img/default.png',$categoria='sin definir'){
        //El constructor inicializada los valores de las propiedades
        //del objeto con los valores recibido en los argumentos 
        //del método constructor.
        $this->nombre=$nombre;
        $this->marca = $marca;
        $this->unidad_medida = $unidad_medida;
        $this->precio=$precio;
        $this->oferta = $oferta;
        $this->image = $image;
        $this->categoria=$categoria;
    }
    
    //Métodos de la clase
    function mostrar(){
        //El método mostrar() crea una tabla HTML donde se muestran 
        //los detalles del objeto auto, como la marca, una imagen,
        //el modelo y el color del auto.
        $tabla  = "<div class='col-4 mb-3'>";
        $tabla  .="<div class='card'>";
        $tabla  .="<div class='card-header'>". $this->nombre ."</div>";
        $tabla  .="<img class='card-img-top' src='". $this->image ."' alt='Card image cap'>";
        $tabla  .="<div class='card-body'>";
        $tabla  .="<h5 class='card-title'>". $this->nombre ."</h5>";
        $tabla  .="<p class='card-text'> Unidad de medida: ". $this->unidad_medida ."<br>";
        $tabla  .="<p class='card-text'> Marca: ". $this->marca ."<br>";
        $tabla .= "Precio: $". $this->precio ."</p>";
        $tabla .= "Oferta: ". $this->oferta ."</p>";
        $tabla .= "<input type='hidden' name='nombre' value=".$this->nombre.">";
        $tabla .= "<input type='hidden' name='marca' value=".$this->marca.">";
        $tabla .= "<input type='hidden' name='precio' value=".$this->precio.">";
        $tabla .= "<input type='number' name='cantidad' value='1' class='form-control'>";
        $tabla .= "<input type='submit' name='añadir' class='btn btn-warning' value='Añadir al carrito'>";
        
        $tabla  .="</div>";
        $tabla  .="</div>";
        $tabla  .="</div>";
        echo $tabla;
    }

    //Metodo para comprobar la categoria de un objeto de la clase producto
    function getCategoria(){
        return $this->categoria;
    }
}
?>