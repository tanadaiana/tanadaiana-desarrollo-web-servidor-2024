
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
/<?php
    // Día de la semana en inglés
    $dia_espanol = date("l");

    
    $dia_espanol = match ($dia_espanol) {
        "Monday" => "Lunes",
        "Tuesday" => "Martes",
        "Wednesday" => "Miércoles",
        "Thursday" => "Jueves",
        "Friday" => "Viernes",
        "Saturday" => "Sábado",
        "Sunday" => "Domingo",
    };

    echo "<h3>Hoy es $dia_espanol</h3>";

    // Mes actual en inglés
    $mes = date("F");

    // traduccir  del mes al español usando match
    $mes = match ($mes) {
        "January" => "Enero",
        "February" => "Febrero",
        "March" => "Marzo",
        "April" => "Abril",
        "May" => "Mayo",
        "June" => "Junio",
        "July" => "Julio",
        "August" => "Agosto",
        "September" => "Septiembre",
        "October" => "Octubre",
        "November" => "Noviembre",
        "December" => "Diciembre",
    };

    // Día y año
    $dia = date("j");
    $anno = date("Y");


    echo "<h3>Hoy es $dia_espanol, $dia de $mes de $anno</h3>";
    ?>
</body>
</html>