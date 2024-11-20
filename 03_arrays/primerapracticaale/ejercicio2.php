<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    ?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
    $barrios= [
        ["centro", 2543],
        ["huelin",  1109],
        ["malaga este ", 890],
        ["palam/palmilla ", 49],
    ];
     ?>
    <form action="" method="post">
    <label for="barrio">barrios</label>
    <imput type="text" name="barrios" id=" barrios" placeholder="barrios">

    <label for="viviendas" ></label>
    <select name="vivienda" id="vivienda" placeholder="vivienda">
    <option value="centro">centro</option>
    <option value="huelin">huelin</option>
    <option value="malaga este">malag este</option>
    <option value="palam/palmilla">palam/palmilla</option>
</select>
        <input type="submit" value="enviar">
    <br></br>
    </form>
    <?php
     if($__server["REQUEST_METHOD"]=="POST"){
        $viviendas=$_POST["viviendas"];
        
   
          

        $resultado = match(true){
            $viviendas < 0=> "no hay vivienda turistica",
            $viviendas>= 11 and $viviendas < 50 => "hay pocas viviendas turisticas",
            $viviendas>= 1000=> "hay demaciadas viviendas turisticas"
        };

        echo "<h1>$resultado</h1>";
    }?>
    
    </body>
</html>
