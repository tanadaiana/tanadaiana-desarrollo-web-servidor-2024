<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php // Corregí el inicio de PHP. Debe ser "<?php" en lugar de "?php"

$clublectura = [
    ["fran", "12", "manga"],
    ["valentino", "8", "fantasía"],
    ["daiana", "39", "autoayuda"],
    ["jimena", "30", "embarazo"],
    ["monica", "58", "autoayuda"]
];

/*$librosleidos = [
    ["my hero academia", "desconocido para mí", "7 de julio de 2014"],
    ["el diario de greg", "Jeffrey Patrick Kinney", "1 de abril de 2007"],
    ["reinventarse a los 39", "autoinventado por la cara jajajaj", "todavía no salió a la venta, será best-seller"]
];*/

// Añadir más miembros al club
array_push($clublectura, ["jose", "25", "novela"]);
array_push($clublectura, ["carla", "18", "historia"]);

// Borrar un miembro a libre elección (por ejemplo, "daiana")
unset($clublectura[2]);

// Reasignar las claves
$clublectura = array_values($clublectura);

// Añadir la columna de estado (activo/inactivo)
for ($i = 0; $i < count($clublectura); $i++) {
    $clublectura[$i][3] = ($clublectura[$i][1] >= 20) ? "Activo" : "Inactivo"; // Considerando "Activo" si la edad es 20 o más
}

// Ordenar alfabéticamente por los nombres de los miembros
$_nombres = array_column($clublectura, 0);
array_multisort($_nombres, SORT_ASC, $clublectura);
?>

<!-- MOSTRAR LA TABLA DE MIEMBROS -->
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($clublectura as $miembro) {
            list($nombre, $edad, $genero, $estado) = $miembro;

            echo "<tr>";
            echo "<td>$nombre</td>";
            echo "<td>$edad</td>";
            echo "<td>$genero</td>";
            echo "<td>$estado</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

<!-- MOSTRAR LA TABLA DE LIBROS LEÍDOS -->
<table border="1">
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Fecha de publicación</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($librosleidos as $libro) {
            list($titulo, $autor, $fecha) = $libro;

            echo "<tr>";
            echo "<td>$titulo</td>";
            echo "<td>$autor</td>";
            echo "<td>$fecha</td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>