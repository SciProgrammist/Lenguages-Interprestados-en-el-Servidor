<!DOCTYPE html>
<html lang="es">
<head>
    <title>Año bisiesto</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, 
    initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0" />
    <!--What's this tag about?-->
    <meta http-equiv="Content-Script-Type" content="text/javascript">

    <link rel="stylesheet" hrerf="css/fonts.css" />
    <link rel="stylesheet" hrerf="css/formstyle.css" />
    <link rel="stylesheet" media="screen" hrerf="css/bisiesto.css" />
    <script src="js/validatedata.js"></script>
    <scripyt src="js/prefixfree.min.js"></scripyt>
</head>
<body>
<div class="wrapper">
<?php
    if(!isset($_POST['enviar'])):
?>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" name="frmdatos">
    <h2 class="contact">Años bisiestos</h2>
    <span class="contact">
        <label for="txtdato">Probar año:</label> &nbsp;&nbsp;
    </span>
    <input type="text" name="year" id=""/>
    <span> </span>
    <input />
</form>
   
</div>
</body>