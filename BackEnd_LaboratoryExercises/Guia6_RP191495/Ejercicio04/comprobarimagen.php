<?PHP

function comprobarimagen($archivo) {
    /**
     * La expresion regular analiza si el archivo es de
     * una extension valida para una imagen gif|jpeg|jpg|png
     * utilizando la funcion preg_matc()
     */

    $patron = "/\.(gif|jpe?g|png)$/i";
    $verificado = preg_match($patron, $archivo);
    $esimagen = $verificado == true ? "(es imagen)" : " (no es imagen)";
    return $esimagen;
}
?>