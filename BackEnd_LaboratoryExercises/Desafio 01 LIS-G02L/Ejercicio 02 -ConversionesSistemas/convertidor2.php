<!DOCTYPE html>
<html>
<head>
	<!-- Daniel Alexander Reyes Pineda - RP191495 -->
	<!-- Luis Alberto Del Cid Rivera - DR200018 -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/conversor.css">
	<title>Convertidor de números</title>
</head>
<body>
<section>
<div class="contenedor">
	<form action="" method="POST">
		<header>
			<h1>Conversor de sistemas de numeración</h1>
		</header>
	<div>
		<center><input type="text" name="numero" id="numero" placeholder="Ingrese un valor a convertir"></center>
	</div>
	<div class="encabezado">
	<center><label>Seleccione los sistemas que desea convertir:</label></center>
    </div>
    <br>
	<center><div class="content-select">
	 <select class="form-control" name="sistema1" id="sistema1">
		<option value="S01" selected>Sistema decimal</option>
		<option value="S02">Sistema binario</option>
		<option value="S03">Sistema octal</option>
		<option value="S04">Sistema hexadecimal</option>
	</select>
	<i></i>
    </div></center>
    <br>
    <center><div class="content-select">
	<select class="form-control" name="sistema2" id="sistema2">
		<option value="S01">Sistema decimal</option>
		<option value="S02" selected>Sistema binario</option>
		<option value="S03">Sistema octal</option>
		<option value="S04">Sistema hexadecimal</option>
	</select>
	<i></i>
	</div></center>	
	<br>
	<center><input type="submit" name="convertir" value="Convertir"><center>
	<div class="encabezado"> 
<?php
if(isset($_POST['convertir'])){ 
 $resultado="";
 $Valor=isset($_POST['numero']) ? $_POST['numero'] : "";
 $Sistema1=isset($_POST['sistema1']) ? $_POST['sistema1'] : "";
 $Sistema2=isset($_POST['sistema2']) ? $_POST['sistema2'] : "";

if($Valor != "") {
switch ($Sistema1) {
	case 'S01':
		//Estructura de control con las opciones de salida.
		if($Sistema2=="S02" && is_numeric($Valor)){
            $resultado=decbin($Valor);
		    echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S03" && is_numeric($Valor)){
            $resultado=decoct($Valor);
            echo($resultado);
		}
		elseif($Sistema2=="S04"){
			$resultado=dechex($Valor);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}

		else{
			echo "El resultado de la conversion es: " . $Valor;
		}

		break;
			
	case 'S02':

	    if($Sistema2=="S01" && is_numeric($Valor)){
            $resultado=bindec($Valor);
		    echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S03" && is_numeric($Valor)){
			$temp=bindec($Valor);
            $resultado=decoct($temp);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S04"){
			$temp=bindec($Valor);
			$resultado=dechex($temp);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}

		else{
			echo "El resultado de la conversion es: " . $Valor;
		}

		break;

	case 'S03':

	    if($Sistema2=="S01" && is_numeric($Valor)){
            $resultado=octdec($Valor);
		    echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S02" && is_numeric($Valor)){
			$temp=octdec($Valor);
            $resultado=decbin($temp);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S04"){
			$temp=octdec($Valor);
			$resultado=dechex($temp);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}

		else{
			echo "El resultado de la conversion es: " . $Valor;
		}
   
		break;

	case 'S04':

        if($Sistema2=="S01"){
            $resultado=hexdec($Valor);
		    echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S02"){
			$temp=hexdec($Valor);
            $resultado=decbin($temp);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}
		elseif($Sistema2=="S03"){
			$temp=hexdec($Valor);
			$resultado=decoct($temp);
            echo "El resultado de la conversion es: " . $resultado;
		    echo "</div>";
		}

		else{
			echo "El resultado de la conversion es: " . $Valor;
		}

		break;

	default:
	
		break;
}
	}
	else {
		echo "Ingrese primero un valor";
	}	
}
?>
</form>
</div>
</section>
<footer>
        Lenguaje interpretado en el servidor - 2023
</footer>
</body>
</html>