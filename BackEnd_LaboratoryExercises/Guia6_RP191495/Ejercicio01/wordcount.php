<?PHP
/**
 * El texto recivido en $texto es el texto que 
 * se ingreso en la caja de texto del formulario
 */
function wordcount($texto)
{
    //Eliminando espacios en blanco entre palabras
    $textoarea = preg_replace("/\s+/u", " ", trim($texto));
    /**
     * Contando las palabras separandolas por el espacio en blanco
     * y almacenandolas en la matriz $palabras haciendo uso de la
     * funcion preg_split()
     */
    $palabras = preg_split("/\s/u", $textoarea);
    return $palabras;

}
?>