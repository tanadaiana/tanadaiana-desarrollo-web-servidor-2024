<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
    <link rel="stylesheet" href="ArrayBi.css">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
<?php
    $edad = rand(-10, 140);

    if($edad >= 0 && $edad <= 4) {
        echo "EDAD: $edad - BEBÉ";
    } elseif($edad >= 5 && $edad <= 17) {
        echo "EDAD: $edad - MENOR DE EDAD";
    } elseif($edad >= 18 && $edad <= 65) {
        echo "EDAD: $edad - ADULTO";
    } elseif($edad >= 66 && $edad <= 120) {
        echo "EDAD: $edad - JUBILADO";
    } else {
        echo "EDAD: $edad - ERROR";
    }

    
    $resultado = match(true) {
        $edad >= 0 && $edad <= 4 => "EDAD: $edad - BEBÉ",
        $edad >= 5 && $edad <= 17 => "EDAD: $edad - MENOR DE EDAD",
        $edad >= 18 && $edad <= 65 => "EDAD: $edad - ADULTO",
        $edad >= 66 && $edad <= 120 => "EDAD: $edad - JUBILADO",
        default => "EDAD: $edad - ERROR"
    };

    echo "<h1>$resultado</h1>";
    ?>
</body>
</html>