<!--EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.-->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    

<form action=""   method="post">                                       <!--action"" ,recarga la pag       -->
    <label for="numero">numero</label>                                  <!--label etiqueta     -->
    <input type="number" name ="numero1" placeholder="numero1">        <!-- tipo numero, nombre de la variable ,placeholder para que te salga dentro de el cuadrarito el nombre-->
    <input type="number" name ="numero2" placeholder="numero2">
    <input type="number" name ="numero3" placeholder="numero3">
    <input type="submit" value="numero mayor">
</form>
<?php

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $numero1 =$_POST["numero1"];
    $numero2= $_POST["numero2"];
    $numero3=  $_POST["numero3"];

    $mayor=0;
    if( $numero1 > $mayor) $mayor=$numero1;
    if($mayor < $numero2 ) $mayor=$numero2;
    if($mayor < $numero3) $mayor =$numero3;
    echo "$mayor";
}
?>
</body>
</html>







