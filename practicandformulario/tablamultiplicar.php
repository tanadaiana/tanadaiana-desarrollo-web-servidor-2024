<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estiloo.css">
    <?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    ?>

</head>
<body>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas de Multiplicar del 1 al 10</title>
   
</head>
<body>

<h1>Tablas de Multiplicar del 1 al 10</h1>

<form action="" method="post">
    <input type="submit" value="Mostrar Tablas de Multiplicar">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Generar tablas de multiplicar del 1 al 10
    for ($i = 1; $i <= 10; $i++) {
        echo "<h2>Tabla del $i</h2>";
        echo "<table>";
        echo "<tr><th>Multiplicando</th><th>Resultado</th></tr>";

        // Calcular la tabla de multiplicar del número actual
        for ($j = 1; $j <= 10; $j++) {
            $resultado = $i * $j;
            echo "<tr><td>$i x $j</td><td>$resultado</td></tr>";
        }

        echo "</table>";
    }
}
?>

</body>
</html>