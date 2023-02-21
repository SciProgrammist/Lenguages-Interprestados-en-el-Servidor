<!DOCTYPE html>
<html>

<head>
	<!-- Daniel Alexander Reyes Pineda - RP191495 -->
	<!-- Luis Alberto Del Cid Rivera - DR200018 -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Convertidor de números</title>
</head>
<body>
<section>
<div>
	<form action="" method="POST">
	<div>
		<input type="text" name="numero" id="numero" placeholder="Ingrese un valor a convertir">
	</div>
	<label>Seleccione los sistemas que desea convertir:</label>
	 <select class="form-control" name="sistema1" id="sistema1">
		<option value="S01" selected>Sistema decimal</option>
		<option value="S02">Sistema binario</option>
		<option value="S03">Sistema octal</option>
		<option value="S04">Sistema hexadecimal</option>
	</select>
	<select class="form-control" name="sistema2" id="sistema2">
		<option value="S01">Sistema decimal</option>
		<option value="S02" selected>Sistema binario</option>
		<option value="S03">Sistema octal</option>
		<option value="S04">Sistema hexadecimal</option>
	</select>
	<input type="submit" name="convertir" value="Convertir">	
	</form> 
</div>
<article>
<?php
if(isset($_POST['convertir'])){ 
 $resultado="";
 $Valor=isset($_POST['numero']) ? $_POST['numero'] : "";
 $Sistema1=isset($_POST['sistema1']) ? $_POST['sistema1'] : "";
 $Sistema2=isset($_POST['sistema2']) ? $_POST['sistema2'] : "";

//Estructura de control con las opciones de entrada.	
switch ($Sistema1) {
	case 'S01':
		//Estructura de control con las opciones de salida.
		if($Sistema2=="S02"){
            $resultado=decbin($Valor);
		    echo $resultado;
		}
		elseif($Sistema2=="S03"){
            $resultado=decoct($Valor);
            echo($resultado);
		}
		elseif($Sistema2=="S04"){
			$resultado=dechex($Valor);
            echo($resultado);
		}

		else{
			echo $Valor;
		}

		break;
			
	case 'S02':

	    if($Sistema2=="S01"){
            $resultado=bindec($Valor);
		    echo $resultado;
		}
		elseif($Sistema2=="S03"){
			$temp=bindec($Valor);
            $resultado=decoct($temp);
            echo($resultado);
		}
		elseif($Sistema2=="S04"){
			$temp=bindec($Valor);
			$resultado=dechex($temp);
            echo($resultado);
		}

		else{
			echo $Valor;
		}

		break;

	case 'S03':

	    if($Sistema2=="S01"){
            $resultado=octdec($Valor);
		    echo $resultado;
		}
		elseif($Sistema2=="S02"){
			$temp=octdec($Valor);
            $resultado=decbin($temp);
            echo($resultado);
		}
		elseif($Sistema2=="S04"){
			$temp=octdec($Valor);
			$resultado=dechex($temp);
            echo($resultado);
		}

		else{
			echo $Valor;
		}
   
		break;

	case 'S04':

        if($Sistema2=="S01"){
            $resultado=hexdec($Valor);
		    echo $resultado;
		}
		elseif($Sistema2=="S02"){
			$temp=hexdec($Valor);
            $resultado=decbin($temp);
            echo($resultado);
		}
		elseif($Sistema2=="S03"){
			$temp=hexdec($Valor);
			$resultado=decoct($temp);
            echo($resultado);
		}

		else{
			echo $Valor;
		}

		break;

	default:
	
		break;
}
}
	
?>
</article>
</section>
</body>
</html>