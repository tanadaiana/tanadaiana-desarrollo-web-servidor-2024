<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
<?php
    $suma = 0;
    for ($i = 0; $i <= 20; $i++) {
        if ($i % 2 == 0) {
            $suma += $i;
        }
    }
    echo "<h3>La suma de los números pares entre 0 y 20 es: $suma</h3>";
    ?>
</body>
</html>