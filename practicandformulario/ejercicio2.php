<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>
</head>
<body>
<form action=""  method="post">
<label for="operacion">operacion</label>

<label for="num1">num1</label>
<input type="text" name="num1" id="num1>
<label for="num2">num2</label>
<input type="text" name="num2" id="num2">
<label for="num3">num3</label>
<input type="text" name="num3" id="num3">
<input type="submit" value="enviar"> <!--esto lo q va a mostrar el boton -->
</form>

<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $num1=$_POST["num1"];
    $num2=$_POST["num2"];
    $num3=$_POST["num3"];
    
    $resultado="";

    for ($i=$num1; $i <= $num2; $i++) { 
        if ($i % $num3 ==0) {
            $resultado=$resultado * $i ;
        }
        echo "$resultado";
    }


    

?>






</body>
</html>